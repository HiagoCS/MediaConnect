<link rel="stylesheet" href="<?=base_url()?>/css/styleLogin.css">

<div class="container">
    <div class="row align-items-center">
        <div class="col-4 offset-4" id="titulo">
            <h2>Login</h2>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="centralizar col-4 offset-4">
        <img src="<?=base_url()?>/imagens/logo.png" alt="..." id="logo">
        </div>
    </div>
    <form method="post" action="feed">
        <div class="row">
            <div class="col-4 offset-4">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4 offset-4">
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha">
                    <button type="button" class="link btn btn-link" id="esqueceuSenha">Esqueceu sua senha?</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="centralizar col-4 offset-4 d-grid gap-2">
                <button type="submit" class="btn btn-block" id="entrar">Entrar</button>
            </div>
        </div>

        <div class="row">
            <div class="centralizar col-4 offset-4">
                <a href="cadastro"><button type="button" class="link btn btn-link">Não tem uma conta? Cadastre-se</button></a>
            </div>
        </div>
    </form>
</div>