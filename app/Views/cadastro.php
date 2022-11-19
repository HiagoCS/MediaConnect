<link rel="stylesheet" href="<?=base_url()?>/css/styleCadastro.css">

<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1" id="titulo">
            <h2>Cadastro</h2>
        </div>
    </div>
    <form method="POST" action="<?php echo url_to('cadastrarUsuario') ?>">
        <div class="row">
            <div class="col-10 offset-1">
                <label for="nome" class="form-label">Digite seu nome:</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-5 offset-1">
                <label for="email" class="form-label">Digite seu email:</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                </div>
            </div>
            <div class="col-5">
                <div class="mb-3">
                    <label for="telefone" class="form-label">Digite seu telefone:</label>
                    <input type="number" class="form-control" id="telefone" placeholder="Telefone" name="telefone">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-5 offset-1">
                <label for="cpf" class="form-label">Digite seu CPF:</label>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" id="cpf" placeholder="CPF" name="cpf">
                </div>
            </div>
            <div class="col-5">
                <div class="mb-3">
                    <label for="cep" class="form-label">Digite seu CEP:</label>
                    <input type="number" class="form-control" id="cep" placeholder="CEP" name="cep">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-5 offset-1">
                <label for="senha" class="form-label">Digite uma senha:</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha">
                </div>
            </div>
            <div class="botao col-5">
                <button type="submit" class="btn btn-block" id="cadastro">Cadastrar-se</button>
            </div>
        </div>

    </form>
</div>