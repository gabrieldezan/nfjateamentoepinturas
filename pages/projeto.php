<?php
$vsSqlProjeto = "
    SELECT
        gi.titulo,
        gi.imagem1,
        gi.imagem2,
        gi.imagem3,
        gi.imagem4,
        gi.imagem5,
        gi.youtube,
        gi.descricao,
        gg.descricao AS categoria,
        gg.id_galeria_grupo
    FROM
        galeria_imagem gi
        INNER JOIN galeria_grupo gg ON gi.id_galeria_grupo = gg.id_galeria_grupo
    WHERE
        gg.status = 1 AND
        gg.url_amigavel = '$categoria' AND
        gi.url_amigavel = '$parametro'
";
$vrsExecutaProjeto = mysqli_query($Conexao, $vsSqlProjeto) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
$vrsQntProjeto = mysqli_num_rows($vrsExecutaProjeto);
if ($vrsQntProjeto > 0) {
    $voResultadoProjeto = mysqli_fetch_object($vrsExecutaProjeto);
?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <?php
        // HEAD
        include 'php/head.php';
        ?>
        <meta name="robots" content="index, follow">
        <meta name="googlebot" content="index, follow">
        <meta property="description" content="<?php echo substr(strip_tags(trim($voResultadoProjeto->descricao)), 0, strrpos(substr(strip_tags(trim($voResultadoProjeto->descricao)), 0, 200), ' ')) . '...'; ?>">
        <meta property="og:title" content="<?php echo $voResultadoProjeto->titulo . " - " . $voResultadoConfiguracoes->titulo ?>">
        <meta property="og:description" content="<?php echo substr(strip_tags(trim($voResultadoProjeto->descricao)), 0, strrpos(substr(strip_tags(trim($voResultadoProjeto->descricao)), 0, 200), ' ')) . '...'; ?>">
        <meta property="og:image" content="<?php echo "https://" . $_SERVER['HTTP_HOST'] . URL . "wdadmin/uploads/galeria_imagens/" . $voResultadoProjeto->imagem1 ?>">
        <meta property="og:url" content="<?php echo "https://" . $_SERVER['HTTP_HOST'] . URL . "projeto/" . $categoria . "/" . $parametro ?>">
        <title><?php echo $voResultadoProjeto->titulo . " - " . $voResultadoConfiguracoes->titulo ?></title>
    </head>

    <body class="royal_preloader">

        <?php
        // MENU
        include 'php/menu.php';
        ?>

        <section class="breadcrumbs-section bg_cover" style="background-image: url(<?php echo URL . "assets/images/bg-pages.webp" ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-content">
                            <h1>Projetos</h1>
                            <ul class="link">
                                <li><a href="<?php echo URL ?>">Home</a></li>
                                <li><a href="<?php echo URL . "projetos" ?>">Projetos</a></li>
                                <li class="active"><?php echo $voResultadoProjeto->titulo ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="project-details-page-section pt-130">
            <div class="container">
                <div class="row project-details-wrapper">
                    <div class="col-lg-12">
                        <div class="project-content">
                            <div class="project-slide-four mb-40">
                                <div class="col-lg-12">
                                    <div class="project-item">
                                        <div class="project-img">
                                            <a href="<?php echo URL . "wdadmin/uploads/galeria_imagens/" . $voResultadoProjeto->imagem1 ?>" class="popup-icon img-popup">
                                                <img src="<?php echo URL . "wdadmin/uploads/galeria_imagens/" . $voResultadoProjeto->imagem1 ?>" title="<?php echo $voResultadoProjeto->titulo ?>" alt="<?php echo $voResultadoProjeto->titulo ?>">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php if (!empty($voResultadoProjeto->imagem2)) { ?>
                                    <div class="col-lg-12">
                                        <div class="project-item">
                                            <div class="project-img">
                                                <a href="<?php echo URL . "wdadmin/uploads/galeria_imagens/" . $voResultadoProjeto->imagem2 ?>" class="popup-icon img-popup">
                                                    <img src="<?php echo URL . "wdadmin/uploads/galeria_imagens/" . $voResultadoProjeto->imagem2 ?>" title="<?php echo $voResultadoProjeto->titulo ?>" alt="<?php echo $voResultadoProjeto->titulo ?>">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                if (!empty($voResultadoProjeto->imagem3)) { ?>
                                    <div class="col-lg-12">
                                        <div class="project-item">
                                            <div class="project-img">
                                                <a href="<?php echo URL . "wdadmin/uploads/galeria_imagens/" . $voResultadoProjeto->imagem3 ?>" class="popup-icon img-popup">
                                                    <img src="<?php echo URL . "wdadmin/uploads/galeria_imagens/" . $voResultadoProjeto->imagem3 ?>" title="<?php echo $voResultadoProjeto->titulo ?>" alt="<?php echo $voResultadoProjeto->titulo ?>">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                if (!empty($voResultadoProjeto->imagem4)) { ?>
                                    <div class="col-lg-12">
                                        <div class="project-item">
                                            <div class="project-img">
                                                <a href="<?php echo URL . "wdadmin/uploads/galeria_imagens/" . $voResultadoProjeto->imagem4 ?>" class="popup-icon img-popup">
                                                    <img src="<?php echo URL . "wdadmin/uploads/galeria_imagens/" . $voResultadoProjeto->imagem4 ?>" title="<?php echo $voResultadoProjeto->titulo ?>" alt="<?php echo $voResultadoProjeto->titulo ?>">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                if (!empty($voResultadoProjeto->imagem5)) { ?>
                                    <div class="col-lg-12">
                                        <div class="project-item">
                                            <div class="project-img">
                                                <a href="<?php echo URL . "wdadmin/uploads/galeria_imagens/" . $voResultadoProjeto->imagem5 ?>" class="popup-icon img-popup">
                                                    <img src="<?php echo URL . "wdadmin/uploads/galeria_imagens/" . $voResultadoProjeto->imagem5 ?>" title="<?php echo $voResultadoProjeto->titulo ?>" alt="<?php echo $voResultadoProjeto->titulo ?>">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="content-box mb-30">
                                <h3><?php echo $voResultadoProjeto->titulo ?></h3>
                                <?php if (!empty($voResultadoProjeto->descricao)) { ?>
                                    <p class="text-justify">
                                        <?php echo $voResultadoProjeto->descricao ?>
                                    </p>
                                <?php } ?>
                            </div>
                            <?php if (!empty($voResultadoProjeto->youtube)) { ?>
                                <div class="content-box mb-35">
                                    <iframe style="width:100%;height:600px;" src="<?php echo "https://www.youtube.com/embed/" . substr($voResultadoProjeto->youtube, 32, 11) ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="releted-project-section pt-30 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="section-title text-center mb-50">
                            <h2><?php echo "Mais Projetos de " . $voResultadoProjeto->categoria ?></h2>
                            <div class="title-span-line tex t-center">
                                <span class="line line-1"></span>
                                <span class="line line-2"></span>
                                <span class="line line-3"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row project-slide-three">
                    <?php
                    $vsSqlGaleria = "SELECT titulo, imagem1, url_amigavel FROM galeria_imagem WHERE id_galeria_grupo = $voResultadoProjeto->id_galeria_grupo ORDER BY id_galeria_imagem DESC LIMIT 6";
                    $vrsExecutaGaleria = mysqli_query($Conexao, $vsSqlGaleria) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                    while ($voResultadoGaleria = mysqli_fetch_object($vrsExecutaGaleria)) {
                    ?>
                        <div class="col-lg-4">
                            <div class="project-item mb-30">
                                <div class="project-img">
                                    <img src="<?php echo URL . "wdadmin/uploads/galeria_imagens/" . $voResultadoGaleria->imagem1 ?>" title="<?php echo $voResultadoGaleria->titulo ?>" alt="<?php echo $voResultadoGaleria->titulo ?>">
                                    <div class="project-overlay">
                                        <div class="project-content">
                                            <div class="icon">
                                                <a href="<?php echo URL . "projeto/" . $categoria . "/" . $voResultadoGaleria->url_amigavel ?>" class="popup-icon"><i class="icofont-plus"></i></a>
                                            </div>
                                            <div class="content">
                                                <h4><a href="<?php echo URL . "projeto/" . $categoria . "/" . $voResultadoGaleria->url_amigavel ?>"><?php echo $voResultadoGaleria->titulo ?></a></h4>
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

        // CSS
        include 'php/css.php';

        // SCRIPT
        include 'php/script.php';
        ?>

    </body>

    </html>
<?php
}
