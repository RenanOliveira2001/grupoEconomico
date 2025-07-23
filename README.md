Passo a passo para rodar o projeto de maneira local

1 - Instalar o PHP e MySQL via xampp em sua máquina Link: https://www.apachefriends.org/pt_br/index.html

2 - Instalar o composer: https://getcomposer.org/

3- Instalar o VSCode ou qualquer editor de texto ou IDE de sua preferência Link VSCode: https://code.visualstudio.com/

4 - Baixar o projeto do GitHub

5 - Após as instalações abrir o projeto em seu editor de texto ou IDE

6 - Após abrir o abra o terminal do editor de texto ou CMD na pasta do projeto e utilize o comando composer install para baixar
todas as depedências

7 - o método de autenticação utilizar o jetstream, então baixe e instale o NODE.js link: https://nodejs.org/pt

8 - Abra o CMD e acesse a pasta do projeto e utilize o comando npm run dev

9 - Renomeie o arquivo .env.example para .env

10 - Acesse PHPMyAdmin do MySQL crie um novo banco de dados chamado grupoecon

11 - Abra o terminal do VSCode

12 - Utilize o comando php artisan migrate:fresh para criar as tabelas no banco

13 - No terminal rode o comando php artisan serve e utilize a aplicação Link: http://127.0.0.1:8000/