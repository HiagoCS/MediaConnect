<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Media Connect</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #AB035C;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="<?=base_url()?>/imagens/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Media Connect
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="feed">Serviços</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link">Quem somos?</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link">Contato</a>
                    </li>
                </ul>
                <form class="d-flex" role="pesquisar">
                    <input class="form-control me-2" type="pesquisar" placeholder="Pesquisar" aria-label="pesquisar">
                    <button class="btn btn-outline" style="background-color: #DB3B8D; color: #EFD2E1;" type="submit">Pesquisar</button>
                </form>
                <ul class="navbar-nav d-flex">
                    <li class="nav-item">
                        <a class="nav-link" href="login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>