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
        <title><?php echo "404 - " . $voResultadoConfiguracoes->titulo ?></title>
    </head>

    <body>
        <div class="preloader">
            <div class="lds-ellipsis">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

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
        
        <section class="error-banner bg_cover" style="background-image: url(assets/images/404-bg.jpg);">
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
        // SCRIPT
        include 'php/script.php';
        ?>

    </body>
</html>