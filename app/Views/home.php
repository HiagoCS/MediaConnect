<link rel="stylesheet" href="<?=base_url()?>/css/styleHome.css">

<!--carrossel de imagens-->
<div class="container-fluid">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="row">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner" id="imagensCarrosel">
                        <div class="carousel-item active">
                            <img src="https://neilpatel.com/wp-content/uploads/2019/06/mao-feminina-segurando-smartphone-em-frente-a-lapt.jpeg" class="d-block w-100" alt="..." style="height: 450px;">
                        </div>
                        <div class="carousel-item">
                            <img src="https://cdn.wizard.com.br/wp-content/uploads/2018/07/11194834/como-usar-as-redes-sociais-para-praticar-ingles.jpg" class="d-block w-100" alt="..." style="height: 450px;">
                        </div>
                        <div class="carousel-item">
                            <img src="https://neilpatel.com/wp-content/uploads/2019/08/profissional-trabalhando-em-marketing-digital.jpeg" class="d-block w-100" alt="..." style="height: 450px;">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!--breve descrição da empresa-->
    <div class="row">
        <div class="col-8 offset-2" id="descricao">
            <div class="align-middle row">
                <div class="col-4" id="espacoLogo">
                    <img src="<?=base_url()?>/imagens/logo-on.png" alt="..." id="logo">
                </div>
                <div class="col-8" id="textoDescricao">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pellentesque augue tempus leo hendrerit, eget congue augue iaculis. Donec fermentum luctus magna feugiat pellentesque. Mauris eu eleifend metus. Nam non turpis id erat malesuada imperdiet consectetur id nisl. Donec felis purus, sodales vitae blandit sit amet, feugiat id mi. Nullam efficitur iaculis accumsan. Proin augue ex, tempor accumsan elit ac, bibendum scelerisque purus. Vestibulum porttitor augue sit amet semper placerat.
                </div>
            </div>
        </div>
    </div>

    <!--planos-->
    <div class="row">
        <div class="col-8 offset-2" id="tituloPlano">
            <h3>Planos</h3>
        </div>
    </div>
    <div class="planos row">
        <div class="col-8 offset-2">
            <div class="row">
                <div class="tiposPlano col-3">
                    plano 1<br>
                    <button type="button" class="btn">Contratar</button>
                </div>
                <div class="tiposPlano col-4 offset-1">
                    plano 2<br>
                    <button type="button" class="btn">Contratar</button>
                </div>
                <div class="tiposPlano col-3 offset-1">
                    plano 3<br>
                    <button type="button" class="btn">Contratar</button>
                </div>
            </div>
        </div>
    </div>
</div>