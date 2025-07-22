<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use JasperPHP\JasperPHP;

class ReportController extends Controller
{
    public function index()
    {
        return view('relatorio.index');
    }

    public function getDatabaseConfig()
    {
        return [
            'driver' => 'generic',
            'host' => env('DB_HOST'),
            'port' => env('DB_PORT'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'database' => env('DB_DATABASE'),
            'jdbc_dir' => base_path() . env('JDBC_DIR', '/vendor/cossou/jasperphp/src/JasperStarter/jdbc'),
            'jdbc_driver' => 'com.mysql.jdbc.Driver',
            'jdbc_url' => 'jdbc:mysql://' . env('DB_HOST') . ':' . env('DB_PORT') . '/' . env('DB_DATABASE') . '?useSSL=false'
        ];
    }


    public function getDatabaseConfigMysql()
    {
        return [
            'driver' => 'mysql',
            'host' => env('DB_HOST'),
            'port' => env('DB_PORT'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'database' => env('DB_DATABASE')
        ];
    }

    public function generateReport(Request $request)
    {
        try {

            // coloca na variavel o caminho do novo relatório que será gerado
            $output = 'public/storage/relatorios/' . time() . '_Colaborador';
            // instancia um novo objeto JasperPHP

            $extensao = $request->extensao;

            $report = new JasperPHP;
              
            $report->process(
                str_replace('\\', '/', public_path() . '/storage/relatorios/Colaborador.jrxml'),
                str_replace('\\', '/', base_path($output)),
                array($extensao),
                [],
                $this->getDatabaseConfig(),
            )->execute();

            $file = '../'.$output. '.'.$extensao;
            $path = $file;

            // caso o arquivo não tenha sido gerado retorno um erro 404
            if (!file_exists($file)) {
                abort(404);
                throw new Exception('Arquivo não encontrado');
            }
            
            if($extensao == 'xls'){
                header('Content-Description: Arquivo Excel');
                header('Content-Type: application/x-msexcel');
                header('Content-Disposition: attachment; filename="'.basename($file).'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                flush(); // Flush system output buffer
                readfile($file);
                response()->download($file, 'Colaborador.xls');
                return redirect()->back();
            } elseif($extensao == 'pdf'){
                $file = file_get_contents($file);
            
                unlink($path);
            
                return response($file, 200)
                    ->header('Content-Type', 'application/pdf')
                    ->header('Content-Disposition', 'inline; filename="colaborador.pdf"');
            }
            

        } catch (Exception $e) {
            return redirect()->back()->with('msg', 'Erro ao gerar relatório: ' . $e->getMessage());
        }

    }

    public function getParametros()
    {
        $output =
            $jasper = new JasperPHP;

        $jasper->list_parameters(storage_path('app/public') . '/relatorios/Colaborador.jrxml')->execute();

        foreach ($output as $parameter_description) {
            $parameter_description = trim($parameter_description);
            //echo $parameter_description . '<br>' ;
            $dados = explode(" ", trim($parameter_description), 4);
            echo '<strong>Parametro:</strong>  ' . $dados[1] .
                ' <strong>Tipo de Dados:</strong>  ' . $dados[2] .
                ' <strong>Descricao do Campo:</strong>   ' . $dados[3] . '<br>';
        }
    }
}
