<?php
$vsSqlServico = "
    SELECT
        id_servicos,
        titulo,
        imagem,
        descricao
    FROM
        servicos
    WHERE
        status = 1 AND
        url_amigavel = '$parametro'
";
$vrsExecutaServico = mysqli_query($Conexao, $vsSqlServico) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
$vrsQntServico = mysqli_num_rows($vrsExecutaServico);
if ($vrsQntServico > 0) {
    $voResultadoServico = mysqli_fetch_object($vrsExecutaServico);
    ?>
    <html lang="pt-br">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
            <link rel="shortcut icon" href="<?php echo URL . "wdadmin/uploads/informacoes_gerais/" . $voResultadoConfiguracoes->favicon ?>" type="image/png">
            <?php
            // CSS
            include 'php/css.php';
            ?>
            <title><?php echo $voResultadoServico->titulo . " -  " . $voResultadoConfiguracoes->titulo ?></title>
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
                                <h1><?php echo $voResultadoServico->titulo ?></h1>
                                <ul class="link">
                                    <li><a href="<?php echo URL ?>">Home</a></li>
                                    <li>Serviços</li>
                                    <li class="active"><?php echo $voResultadoServico->titulo ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="service-details-section pt-120 pb-120">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="service-details-wrapper">
                                <div class="service-img">
                                    <img src="<?php echo URL . "wdadmin/uploads/servicos/" . $voResultadoServico->imagem ?>" title="<?php echo $voResultadoServico->titulo ?>" alt="<?php echo $voResultadoServico->titulo ?>">
                                </div>
                                <div class="service-content">
                                    <h3 class="title"><?php echo $voResultadoServico->titulo ?></h3>
                                    <?php echo $voResultadoServico->descricao ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sidebar-widget-area">
                                <div class="widget widget-catageory mb-40">
                                    <h4 class="widget-title">Nossos Serviços</h4>
                                    <ul class="categeory-link">
                                        <?php
                                    $vsSqlServicos = "SELECT titulo, url_amigavel FROM servicos WHERE status = 1 AND id_servicos != $voResultadoServico->id_servicos";
                                    $vrsExecutaServicos = mysqli_query($Conexao, $vsSqlServicos) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                    while ($voResultadoServicos = mysqli_fetch_object($vrsExecutaServicos)) {
                                        ?>
                                        <li><a href="<?php echo URL . "servicos/" . $voResultadoServicos->url_amigavel ?>"><?php echo $voResultadoServicos->titulo ?></a></li>
                                        <?php
                                    }
                                    ?>
                                    </ul>
                                </div>
                                <div class="widget widget-cta mb-40">
                                    <?php
                                    $vsSqlChamada = "SELECT titulo, imagem, icone FROM informacoes WHERE id_informacoes = 6";
                                    $vrsExecutaChamada = mysqli_query($Conexao, $vsSqlChamada) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                    while ($voResultadoChamada = mysqli_fetch_object($vrsExecutaChamada)) {
                                        ?>
                                        <div class="cta-content bg_cover text-center" style="background-image: url(<?php echo URL . "wdadmin/uploads/informacoes/" . $voResultadoChamada->imagem ?>);">
                                            <h3><?php echo $voResultadoChamada->titulo ?></h3>
                                            <i class="<?php echo $voResultadoChamada->icone ?>"></i>
                                            <?php
                                            $vsSqlTelefone = "SELECT telefone FROM enderecos WHERE id_enderecos = 1";
                                            $vrsExecutaTelefone = mysqli_query($Conexao, $vsSqlTelefone) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                            while ($voResultadoTelefone = mysqli_fetch_object($vrsExecutaTelefone)) {
                                                ?>
                                                <h4 class="call"><a href="<?php echo "tel:55" . str_replace(array("(", ")", "-", " "), "", $voResultadoTelefone->telefone) ?>"><?php echo $voResultadoTelefone->telefone ?></a></h4>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
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
    <?php
}