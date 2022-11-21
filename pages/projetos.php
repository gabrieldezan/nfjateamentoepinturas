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
    <meta property="og:title" content="<?php echo "Projetos - " . $voResultadoConfiguracoes->titulo ?>">
    <meta property="og:description" content="<?php echo substr(strip_tags(trim($voResultadoProjeto->descricao)), 0, strrpos(substr(strip_tags(trim($voResultadoProjeto->descricao)), 0, 200), ' ')) . '...'; ?>">
    <meta property="og:image" content="<?php echo "https://" . $_SERVER['HTTP_HOST'] . URL . "wdadmin/uploads/galeria_imagens/" . $voResultadoProjeto->imagem1 ?>">
    <meta property="og:url" content="<?php echo "https://" . $_SERVER['HTTP_HOST'] . URL . "projetos" ?>">
    <title><?php echo "Projetos - " . $voResultadoConfiguracoes->titulo ?></title>
</head>

<body class="royal_preloader">

    <?php
    // MENU
    include 'php/menu.php';
    ?>

    <section class="breadcrumbs-section bg_cover" style="background-image: url(<?php echo URL . "assets/images/bg-pages.webp" ?>);">
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
                            $vsSqlProjetosCategorias = "SELECT id_galeria_grupo, descricao FROM galeria_grupo WHERE status = 1 ORDER BY descricao";
                            $vrsExecutaProjetosCategorias = mysqli_query($Conexao, $vsSqlProjetosCategorias) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                            while ($voResultadoProjetosCategorias = mysqli_fetch_object($vrsExecutaProjetosCategorias)) {
                            ?>
                                <li data-filter="<?php echo ".categoria-" . $voResultadoProjetosCategorias->id_galeria_grupo ?>"><?php echo $voResultadoProjetosCategorias->descricao ?></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row products-grid">
                <?php
                $vsSqlProjetos = "
                    SELECT
                        gi.titulo,
                        gi.url_amigavel,
                        gi.id_galeria_grupo,
                        gg.url_amigavel AS url_categoria,
                        gi.imagem1
                    FROM
                        galeria_imagem gi
                        INNER JOIN galeria_grupo gg ON gi.id_galeria_grupo = gg.id_galeria_grupo
                    ORDER BY
                        id_galeria_imagem DESC
                ";
                $vrsExecutaProjetos = mysqli_query($Conexao, $vsSqlProjetos) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                while ($voResultadoProjetos = mysqli_fetch_object($vrsExecutaProjetos)) {
                ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 <?php echo "categoria-" . $voResultadoProjetos->id_galeria_grupo ?>">
                        <div class="project-item mb-30">
                            <div class="project-img">
                                <img src="<?php echo URL . "wdadmin/uploads/galeria_imagens/" . $voResultadoProjetos->imagem1 ?>" title="<?php echo $voResultadoProjetos->titulo ?>" alt="<?php echo $voResultadoProjetos->titulo ?>">
                                <div class="project-overlay">
                                    <div class="project-content">
                                        <div class="icon">
                                            <a href="<?php echo URL . "projeto/" . $voResultadoProjetos->url_categoria . "/" . $voResultadoProjetos->url_amigavel ?>" class="popup-icon"><i class="icofont-plus"></i></a>
                                        </div>
                                        <div class="content">
                                            <h4><a href="<?php echo URL . "projeto/" . $voResultadoProjetos->url_categoria . "/" . $voResultadoProjetos->url_amigavel ?>"><?php echo $voResultadoProjetos->titulo ?></a></h4>
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