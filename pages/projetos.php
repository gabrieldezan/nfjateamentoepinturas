<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
        <?php
        // CSS
        include 'php/css.php';
        ?>
        <title><?php echo "Projetos - " . $voResultadoConfiguracoes->titulo ?></title>
    </head>

    <body>
        <div class="preloader">
            <div class="lds-ellipsis">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <?php
        // MENU
        include 'php/menu.php';
        ?>

        <section class="breadcrumbs-section bg_cover" style="background-image: url(<?php echo URL . "assets/images/bg-pages.jpg" ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="breadcrumbs-content">
                            <h1>Projetos</h1>
                            <ul class="link">
                                <li><a href="<?php echo URL ?>">Home</a></li>
                                <li class="active">Projetos</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="project-area-v3 pt-115 pb-120" id="project-filter">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="filter-nav text-center mb-70">
                            <ul class="filter-btn">
                                <li data-filter="*" class="active">Todos</li>
                                <?php
                                $vsSqlCategorias = "SELECT descricao, id_galeria_grupo FROM galeria_grupo WHERE status = 1 ORDER BY descricao";
                                $vrsExecutaCategorias = mysqli_query($Conexao, $vsSqlCategorias) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                while ($voResultadoCategorias = mysqli_fetch_object($vrsExecutaCategorias)) {
                                    ?>
                                    <li data-filter="<?php echo ".cat-" . $voResultadoCategorias->id_galeria_grupo ?>"><?php echo $voResultadoCategorias->descricao ?></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row products-grid">
                    <?php
                    $vsSqlGaleria = "SELECT gi.titulo, gi.imagem1, gg.descricao, gg.id_galeria_grupo FROM galeria_imagem gi INNER JOIN galeria_grupo gg ON gi.id_galeria_grupo = gg.id_galeria_grupo ORDER BY id_galeria_imagem DESC";
                    $vrsExecutaGaleria = mysqli_query($Conexao, $vsSqlGaleria) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                    while ($voResultadoGaleria = mysqli_fetch_object($vrsExecutaGaleria)) {
                        ?>
                        <div class="col-lg-3 col-md-6 col-sm-12 <?php echo "cat-" . $voResultadoGaleria->id_galeria_grupo ?>">
                            <div class="project-item mb-30">
                                <div class="project-img">
                                    <img src="<?php echo URL . "wdadmin/uploads/galeria_imagens/" . $voResultadoGaleria->imagem1 ?>" title="<?php echo $voResultadoGaleria->titulo ?>" alt="<?php echo $voResultadoGaleria->titulo ?>">
                                    <div class="project-overlay">
                                        <div class="project-content">
                                            <div class="icon">
                                                <a href="<?php echo URL . "wdadmin/uploads/galeria_imagens/" . $voResultadoGaleria->imagem1 ?>" class="popup-icon img-popup"><i class="icofont-plus"></i></a>
                                            </div>
                                            <div class="content">
                                                <h4><a class="img-popup" href="<?php echo URL . "wdadmin/uploads/galeria_imagens/" . $voResultadoGaleria->imagem1 ?>"><?php echo $voResultadoGaleria->titulo ?></a></h4>
                                                <p class="p-name"><?php echo $voResultadoGaleria->descricao ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </section>

        <?php
        // RODAPÉ
        include 'php/rodape.php';
        ?>

        <a href="#" class="back-to-top" ><i class="flaticon-up-arrow-angle"></i></a>

        <?php
        // SCRIPT
        include 'php/script.php';
        ?>

    </body>
</html>