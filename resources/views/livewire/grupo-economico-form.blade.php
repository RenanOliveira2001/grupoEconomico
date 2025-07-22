<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Cadastre o Novo Grupo</h1>
    <form method="POST" wire:submit.prevent="create">
        @csrf
        <div class = "form-group" enctype="multipart/form-data">
            <label for="nome">Nome do Grupo</label>
            <input type="text" name="nome" id="nome" class="form-control" required wire:model.defer ="nome">
        </div>
        <button id="btnSave" type="submit" class="btn btn-primary">Salvar</button>
        <a href="/grupo_economico" id="btnSave" type="submit" class="btn btn-danger">Voltar</a>
    </form>
</div>