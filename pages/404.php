<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    // HEAD
    include 'php/head.php';
    ?>
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta property="description" content="<?php echo substr(strip_tags(trim($voResultadoConfiguracoes->descricao)), 0, strrpos(substr(strip_tags(trim($voResultadoConfiguracoes->descricao)), 0, 200), ' ')) . '...'; ?>">
    <meta property="og:title" content="<?php echo "404 - " . $voResultadoConfiguracoes->titulo ?>">
    <meta property="og:description" content="<?php echo substr(strip_tags(trim($voResultadoConfiguracoes->descricao)), 0, strrpos(substr(strip_tags(trim($voResultadoConfiguracoes->descricao)), 0, 200), ' ')) . '...'; ?>">
    <meta property="og:image" content="<?php echo "https://" . $_SERVER['HTTP_HOST'] . URL . "wdadmin/uploads/informacoes_gerais/" . $voResultadoConfiguracoes->logo_principal ?>">
    <meta property="og:url" content="<?php echo "https://" . $_SERVER['HTTP_HOST'] . URL . "404" ?>">
    <title><?php echo "404 - " . $voResultadoConfiguracoes->titulo ?></title>
</head>

<body class="royal_preloader">

    <header class="error-header transparent-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo">
                        <a href="<?php echo URL ?>">
                            <img src="<?php echo URL . "wdadmin/uploads/informacoes_gerais/" . $voResultadoConfiguracoes->logo_principal ?>" title="<?php echo $voResultadoConfiguracoes->titulo ?>" alt="<?php echo $voResultadoConfiguracoes->titulo ?>">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="error-banner bg_cover" style="background-image: url(<?php echo URL . "assets/images/404-bg.webp" ?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="error-content">
                        <h1><span>OPS,</span><br>A página solicitada não existe.</h1>
                        <a href="<?php echo URL ?>" class="secondary-btn">Voltar à página inicial</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    // CSS
    include 'php/css.php';

    // SCRIPT
    include 'php/script.php';
    ?>

</body>

</html>