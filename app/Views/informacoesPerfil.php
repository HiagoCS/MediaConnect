<link rel="stylesheet" href="<?=base_url()?>/css/styleInformacoesPerfil.css">

<div class="container-fluid">
    <div class="row">
        <div class="col-10 offset-1" id="titulo">
            <h2>Informações de Perfil</h2>
        </div>
    </div>
    <form method="POST">
        <div class="row">
            <div class="col-5 offset-1">
                <label for="nome" class="form-label">Nome completo:</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
                </div>
            </div>

            <div class="col-5">
                <label for="fotoPerfil" class="form-label">Selecione uma foto de perfil:</label>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="fotoPerfil" placeholder="Selecione uma foto de perfil" name="fotoPerfil">
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-10 offset-1">
                <label for="descrição" class="form-label">Digite sua descrição:</label>
                <div class="input-group mb-3">
                    <textarea class="form-control" id="descrição" rows="3" placeholder="Breve descrição sobre seu trabalho" name="descrição"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-3 offset-1">
                <label for="fotoTrabalho" class="form-label">Selecione uma foto de seu trabalho:</label>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="fotoTrabalho1" placeholder="Selecione uma foto de seu trabalho" name="fotoTrabalho1">
                </div>
            </div>
            <div class="col-4">
                <label for="fotoTrabalho" class="form-label">Selecione uma foto de seu trabalho:</label>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="fotoTrabalho2" placeholder="Selecione uma foto de seu trabalho" name="fotoTrabalho2">
                </div>
            </div>
            <div class="col-3">
                <label for="fotoTrabalho" class="form-label">Selecione uma foto de seu trabalho:</label>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="fotoTrabalho3" placeholder="Selecione uma foto de seu trabalho" name="fotoTrabalho3">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-10 offset-1">
                <label for="portifolio" class="form-label">Digite o link do seu portifólio:</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="portifolio" placeholder="Link do portifólio" name="portifolio">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-5 offset-1">
                <label for="redeSocial" class="form-label">Nome de usuário no Linkedin:</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="nomeLinkedin" placeholder="Linkedin" name="nomeLinkedin">
                </div>
            </div>
            <div class="col-5">
                <label for="redeSocial" class="form-label">Nome de usuário no Instagram:</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="nomeInstagram" placeholder="Instagram" name="nomeInstagram">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-10 offset-1 d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-block" id="salvar">Salvar</button>
            </div>
        </div>
    </form>
</div>