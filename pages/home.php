<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    // HEAD
    include 'php/head.php';
    ?>
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="google-site-verification" content="Ck6Fr3PLS70nQg0Y2PE6CtOOAMBRauH0Wupo9iVSQAU">
    <meta property="description" content="<?php echo substr(strip_tags(trim($voResultadoConfiguracoes->descricao)), 0, strrpos(substr(strip_tags(trim($voResultadoConfiguracoes->descricao)), 0, 200), ' ')) . '...'; ?>">
    <meta property="og:title" content="<?php echo $voResultadoConfiguracoes->titulo ?>">
    <meta property="og:description" content="<?php echo substr(strip_tags(trim($voResultadoConfiguracoes->descricao)), 0, strrpos(substr(strip_tags(trim($voResultadoConfiguracoes->descricao)), 0, 200), ' ')) . '...'; ?>">
    <meta property="og:image" content="<?php echo "https://" . $_SERVER['HTTP_HOST'] . URL . "wdadmin/uploads/informacoes_gerais/" . $voResultadoConfiguracoes->logo_principal ?>">
    <meta property="og:url" content="<?php echo "https://" . $_SERVER['HTTP_HOST'] . URL ?>">
    <title><?php echo $voResultadoConfiguracoes->titulo ?></title>
</head>

<body class="royal_preloader">

    <header class="header-area header-area-v1">
        <div class="header-navigation">
            <div class="nav-container">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 logo-col col-6">
                            <div class="site-branding">
                                <div class="brand-logo">
                                    <a href="<?php echo URL ?>">
                                        <img src="<?php echo URL . "wdadmin/uploads/informacoes_gerais/" . $voResultadoConfiguracoes->logo_principal ?>" title="<?php echo $voResultadoConfiguracoes->titulo ?>" alt="<?php echo $voResultadoConfiguracoes->titulo ?>">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-6">
                            <div class="nav-menu">
                                <div class="navbar-close">
                                    <div class="cross-wrap">
                                        <span class="top"></span>
                                        <span class="bottom"></span>
                                    </div>
                                </div>
                                <nav class="main-menu">
                                    <ul>
                                        <li class="menu-item"><a href="<?php echo URL ?>">Home</a></li>
                                        <li class="menu-item"><a class="page_scroll" href="<?php echo URL . "#sobre" ?>">Sobre</a></li>
                                        <li class="menu-item menu-item-has-children">
                                            <a class="page_scroll" href="<?php echo URL . "#servicos" ?>">Serviços</a>
                                            <ul class="sub-menu">
                                                <?php
                                                $vsSqlServicosMenu = "SELECT titulo, url_amigavel FROM servicos WHERE status = 1";
                                                $vrsExecutaServicosMenu = mysqli_query($Conexao, $vsSqlServicosMenu) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                                while ($voResultadoServicosMenu = mysqli_fetch_object($vrsExecutaServicosMenu)) {
                                                ?>
                                                    <li><a href="<?php echo URL . "servicos/" . $voResultadoServicosMenu->url_amigavel ?>"><?php echo $voResultadoServicosMenu->titulo ?></a></li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                        <li class="menu-item"><a href="<?php echo URL . "projetos" ?>">Projetos</a></li>
                                        <li class="menu-item"><a class="page_scroll" href="<?php echo URL . "#clientes" ?>">Clientes</a></li>
                                        <li class="menu-item"><a class="page_scroll" href="<?php echo URL . "#contato" ?>">Contato</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="navbar-toggler float-right">
                                <span></span><span></span><span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="banner-area-v1">
        <div class="hero-slider-one">
            <?php
            $vsSqlBanner = "SELECT titulo, descricao, imagem, link FROM banner ORDER BY id_banner DESC";
            $vrsExecutaBanner = mysqli_query($Conexao, $vsSqlBanner) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
            while ($voResultadoBanner = mysqli_fetch_object($vrsExecutaBanner)) {
            ?>
                <div class="single-hero bg_cover" style="background-image: url(<?php echo URL . "wdadmin/uploads/banners_slideshow/" . $voResultadoBanner->imagem ?>);">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="hero-content">
                                    <h1><?php echo $voResultadoBanner->titulo ?></h1>
                                    <?php if ($voResultadoBanner->descricao != null || !empty($voResultadoBanner->descricao)) { ?>
                                        <h4><?php echo $voResultadoBanner->descricao ?></h4>
                                    <?php } ?>
                                    <?php if ($voResultadoBanner->link != null || !empty($voResultadoBanner->link)) { ?>
                                        <a href="<?php echo $voResultadoBanner->link ?>" class="main-btn">Ver Mais</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="hero-arrows"></div>
    </section>

    <section id="sobre" class="about-area-v1 pt-100 pb-100">
        <div class="container">
            <div class="row">
                <?php
                $vsSqlSobre = "SELECT titulo, texto, imagem FROM sobre";
                $vrsExecutaSobre = mysqli_query($Conexao, $vsSqlSobre) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                while ($voResultadoSobre = mysqli_fetch_object($vrsExecutaSobre)) {
                ?>
                    <div class="col-lg-6">
                        <div class="about-img-box">
                            <img class="img-responsive" src="<?php echo URL . "wdadmin/uploads/sobre/" . $voResultadoSobre->imagem ?>" title="<?php echo $voResultadoSobre->titulo ?>" alt="<?php echo $voResultadoSobre->titulo ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content-box">
                            <div class="section-title">
                                <h2><?php echo $voResultadoSobre->titulo ?></h2>
                            </div>
                            <?php echo $voResultadoSobre->texto ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

    <section class="team-area-v3 team-area-v4 bg_cover pb-100">
        <div class="custom-container">
            <div class="team-wrapper bg_cover" style="background-image: url(assets/images/team-bg.webp);">
                <div class="row team-slide-one">
                    <?php
                    $vsSqlDiferenciais = "SELECT titulo, imagem FROM informacoes WHERE id_conteudo_personalizado = 1 ORDER BY id_informacoes";
                    $vrsExecutaDiferenciais = mysqli_query($Conexao, $vsSqlDiferenciais) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                    while ($voResultadoDiferenciais = mysqli_fetch_object($vrsExecutaDiferenciais)) {
                    ?>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="team-item text-center mb-55">
                                <div class="team-img">
                                    <img src="<?php echo URL . "wdadmin/uploads/informacoes/" . $voResultadoDiferenciais->imagem ?>" alt="<?php echo $voResultadoDiferenciais->titulo ?>">
                                </div>
                                <div class="team-content">
                                    <h4><?php echo $voResultadoDiferenciais->titulo ?></h4>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section id="servicos" class="service-area-v2 bg_cover pb-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center mb-70">
                        <h2>Confira abaixo nossos serviços</h2>
                    </div>
                </div>
            </div>
            <div class="row service-slider-two">
                <?php
                $vsSqlServicos = "SELECT titulo, resumo, imagem, icone, url_amigavel FROM servicos WHERE status = 1";
                $vrsExecutaServicos = mysqli_query($Conexao, $vsSqlServicos) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                while ($voResultadoServicos = mysqli_fetch_object($vrsExecutaServicos)) {
                ?>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="service-item mb-40">
                            <div class="service-img">
                                <a href="<?php echo URL . "servicos/" . $voResultadoServicos->url_amigavel ?>">
                                    <img src="<?php echo URL . "wdadmin/uploads/servicos/" . $voResultadoServicos->imagem ?>" title="<?php echo $voResultadoServicos->titulo ?>" alt="<?php echo $voResultadoServicos->titulo ?>">
                                </a>
                                <div class="icon">
                                    <i class="<?php echo $voResultadoServicos->icone ?>"></i>
                                </div>
                            </div>
                            <div class="service-content">
                                <h3><a href="<?php echo URL . "servicos/" . $voResultadoServicos->url_amigavel ?>"><?php echo $voResultadoServicos->titulo ?></a></h3>
                                <p><?php echo $voResultadoServicos->resumo . "..." ?></p>
                                <a href="<?php echo URL . "servicos/" . $voResultadoServicos->url_amigavel ?>" class="main-btn">Ver mais</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

    <section class="project-area-v1 pb-100">
        <div class="project-main-section">
            <div class="project-bg bg_cover" style="background-image: url(<?php echo URL . "assets/images/home-projetos-bg.webp" ?>);"></div>
            <div class="container">
                <div class="col-lg-8">
                    <div class="section-title section-white-title mb-100">
                        <h2 class="pb-25">Veja abaixo alguns de<span>nossos projetos</span></h2>
                    </div>
                    <div class="play-content">
                        <a href="<?php echo URL . "projetos" ?>" class="main-btn">Ver Todos</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="project-slide-wrapper">
            <div class="container">
                <div class="row project-slide-one">
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
                        LIMIT 6
                    ";
                    $vrsExecutaProjetos = mysqli_query($Conexao, $vsSqlProjetos) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                    while ($voResultadoProjetos = mysqli_fetch_object($vrsExecutaProjetos)) {
                    ?>
                        <div class="col-lg-4">
                            <div class="project-item">
                                <div class="project-img">
                                    <img src="<?php echo URL . "wdadmin/uploads/galeria_imagens/" . $voResultadoProjetos->imagem1 ?>" title="<?php echo $voResultadoProjetos->titulo ?>" alt="<?php echo $voResultadoProjetos->titulo ?>">
                                    <div class="project-overlay">
                                        <div class="project-content">
                                            <div class="icon">
                                                <a title="<?php echo $voResultadoProjetos->titulo ?>" href="<?php echo URL . "projeto/" . $voResultadoProjetos->url_categoria . "/" . $voResultadoProjetos->url_amigavel ?>" class="popup-icon"><i class="icofont-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="project-info">
                                    <h4><a title="<?php echo $voResultadoProjetos->titulo ?>" href="<?php echo URL . "projeto/" . $voResultadoProjetos->url_categoria . "/" . $voResultadoProjetos->url_amigavel ?>"><?php echo $voResultadoProjetos->titulo ?></a></h4>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section id="clientes" class="awards-area bg_cover" style="background-image: url(<?php echo URL . "assets/images/awards-bg-2.webp" ?>)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="section-title section-white-title">
                        <h2>Veja nossos clientes</h2>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="awards-slide">
                        <?php
                        $vsSqlClientes = "SELECT descricao, imagem, link FROM clientes WHERE status = 1 ORDER BY id_clientes DESC";
                        $vrsExecutaClientes = mysqli_query($Conexao, $vsSqlClientes) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                        while ($voResultadoClientes = mysqli_fetch_object($vrsExecutaClientes)) {
                            if ($voResultadoClientes->link != null || !empty($voResultadoClientes->link)) {
                        ?>
                                <div class="single-awards">
                                    <a href="<?php echo $voResultadoClientes->link ?>" target="_blank" rel="noopener">
                                        <img src="<?php echo URL . "wdadmin/uploads/clientes/" . $voResultadoClientes->imagem ?>" title="<?php echo $voResultadoClientes->descricao ?>" alt="<?php echo $voResultadoClientes->descricao ?>">
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div class="single-awards">
                                    <img src="<?php echo URL . "wdadmin/uploads/clientes/" . $voResultadoClientes->imagem ?>" title="<?php echo $voResultadoClientes->descricao ?>" alt="<?php echo $voResultadoClientes->descricao ?>">
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-page-section contact-home-section pt-120 pb-85" id="contato">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-info-list">
                        <?php
                        $vsSqlContato = "SELECT telefone, endereco, cidade, estado, link FROM enderecos WHERE id_enderecos = 1";
                        $vrsExecutaContato = mysqli_query($Conexao, $vsSqlContato) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                        while ($voResultadoContato = mysqli_fetch_object($vrsExecutaContato)) {
                        ?>
                            <div class="info-box d-flex align-items-start mb-45">
                                <div class="icon">
                                    <i class="icofont-headphone-alt"></i>
                                </div>
                                <div class="info">
                                    <h4>Telefones</h4>
                                    <p><a target="_blank" rel="noopener" href="<?php echo "https://web.whatsapp.com/send?l=pt_BR&phone=55" . str_replace(array("(", ")", "-", " "), "", $voResultadoConfiguracoes->whatsapp) ?>"><i class="fab fa-whatsapp"></i> <?php echo $voResultadoConfiguracoes->whatsapp ?></a></p>
                                    <?php if ($voResultadoContato->telefone != null || !empty($voResultadoContato->telefone)) { ?>
                                        <p><a href="<?php echo "tel:55" . str_replace(array("(", ")", "-", " "), "", $voResultadoContato->telefone) ?>"><?php echo $voResultadoContato->telefone ?></a></p>
                                    <?php } ?>
                                    <p><a href="<?php echo "tel:55" . str_replace(array("(", ")", "-", " "), "", $voResultadoConfiguracoes->celular1) ?>"><?php echo $voResultadoConfiguracoes->celular1 ?></a></p>
                                </div>
                            </div>
                            <div class="info-box d-flex align-items-start mb-45">
                                <div class="icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="info">
                                    <h4>E-mail</h4>
                                    <p><a href="<?php echo "mailto:" . $voResultadoConfiguracoes->email ?>"><?php echo $voResultadoConfiguracoes->email ?></a></p>
                                </div>
                            </div>
                            <div class="info-box d-flex align-items-start mb-45">
                                <div class="icon">
                                    <i class="far fa-map"></i>
                                </div>
                                <div class="info">
                                    <h4>Endereço</h4>
                                    <p><a href="<?php echo $voResultadoContato->link ?>" target="_blank" rel="noopener"><?php echo $voResultadoContato->endereco . " - " . $voResultadoContato->cidade . " - " . $voResultadoContato->estado ?></a></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="contact-form-wrapper">
                        <div class="section-title mb-50">
                            <h2>Entre em contato conosco</h2>
                            <div class="title-span-line">
                                <span class="line line-1"></span>
                                <span class="line line-2"></span>
                                <span class="line line-3"></span>
                            </div>
                        </div>
                        <div class="contact-form">
                            <form id="form_contato" method="post">
                                <input type="hidden" id="vsUrl" name="vsUrl" value="<?php echo URL ?>">
                                <input type="hidden" id="vsEmailContato" name="vsEmailContato" value="<?php echo EMAIL_CONTATO ?>">
                                <input type="hidden" id="vsNomeEmpresa" name="vsNomeEmpresa" value="<?php echo $voResultadoConfiguracoes->nome_empresa ?>">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="text" class="form_control" placeholder="Nome" id="vsNome" name="vsNome" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="text" class="form_control" placeholder="Telefone" id="vsTelefone" name="vsTelefone" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="email" class="form_control" placeholder="E-Mail" id="vsEmail" name="vsEmail" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="text" class="form_control" placeholder="Assunto" id="vsAssunto" name="vsAssunto" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form_group">
                                            <textarea class="form_control" placeholder="Mensagem" id="vsMensagem" name="vsMensagem" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form_group">
                                            <button id="botao_enviar_mensagem" class="main-btn">Enviar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-area footer-area-v1 bg_cover" style="background-image: url(<?php echo URL . "assets/images/footer-bg-1.webp" ?>);">
        <div class="footer-widget pt-120 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="widget about-widget mb-40">
                            <img src="<?php echo URL . "wdadmin/uploads/informacoes_gerais/" . $voResultadoConfiguracoes->logo_secundaria ?>" title="<?php echo $voResultadoConfiguracoes->titulo ?>" alt="<?php echo $voResultadoConfiguracoes->titulo ?>">
                            <?php
                            $vsSqlTextoRodape = "SELECT resumo_texto FROM sobre";
                            $vrsExecutaTextoRodape = mysqli_query($Conexao, $vsSqlTextoRodape) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                            while ($voResultadoTextoRodape = mysqli_fetch_object($vrsExecutaTextoRodape)) {
                            ?>
                                <p><?php echo $voResultadoTextoRodape->resumo_texto ?></p>
                            <?php
                            }
                            ?>
                            <ul class="social-link">
                                <li><a title="Whatsapp" href="<?php echo "https://web.whatsapp.com/send?l=pt_BR&phone=55" . str_replace(array("(", ")", "-", " "), "", $voResultadoConfiguracoes->whatsapp) ?>" rel="noopener" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                <?php
                                $vsSqlRedesSociais = "SELECT titulo, link, icone FROM redes_sociais";
                                $vrsExecutaRedesSociais = mysqli_query($Conexao, $vsSqlRedesSociais) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                while ($voResultadoRedesSociais = mysqli_fetch_object($vrsExecutaRedesSociais)) {
                                ?>
                                    <li><a title="<?php echo $voResultadoRedesSociais->titulo ?>" href="<?php echo $voResultadoRedesSociais->link ?>" title="<?php echo $voResultadoRedesSociais->titulo ?>" target="_blank" rel="noopener"><i class="<?php echo $voResultadoRedesSociais->icone ?>"></i></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="widget widget-categories mb-40">
                            <h4 class="widget-title">Links</h4>
                            <ul class="widget-link">
                                <li><a href="<?php echo URL ?>">Home</a></li>
                                <li><a class="page-scroll" href="<?php echo URL . "#sobre" ?>">Sobre</a></li>
                                <li><a href="<?php echo URL . "projetos" ?>">Projetos</a></li>
                                <li><a class="page-scroll" href="<?php echo URL . "#clientes" ?>">Clientes</a></li>
                                <li><a class="page-scroll" href="<?php echo URL . "#contato" ?>">Contato</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="widget widget-categories mb-40">
                            <h4 class="widget-title">Serviços</h4>
                            <ul class="widget-link">
                                <?php
                                $vsSqlServicosRodape = "SELECT titulo, url_amigavel FROM servicos WHERE status = 1";
                                $vrsExecutaServicosRodape = mysqli_query($Conexao, $vsSqlServicosRodape) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                while ($voResultadoServicosRodape = mysqli_fetch_object($vrsExecutaServicosRodape)) {
                                ?>
                                    <li><a href="<?php echo URL . "servicos/" . $voResultadoServicosRodape->url_amigavel ?>"><?php echo $voResultadoServicosRodape->titulo ?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="widget widget-categories mb-40">
                            <h4 class="widget-title">Contatos</h4>
                            <ul class="widget-link contatos">
                                <?php
                                $vsSqlContatosRodape = "SELECT telefone FROM enderecos WHERE id_enderecos = 1";
                                $vrsExecutaContatosRodape = mysqli_query($Conexao, $vsSqlContatosRodape) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                                while ($voResultadoContatosRodape = mysqli_fetch_object($vrsExecutaContatosRodape)) {
                                ?>
                                    <li><i class="fab fa-whatsapp"></i> <a target="_blank" rel="noopener" href="<?php echo "https://web.whatsapp.com/send?l=pt_BR&phone=55" . str_replace(array("(", ")", "-", " "), "", $voResultadoConfiguracoes->whatsapp) ?>"><?php echo $voResultadoConfiguracoes->whatsapp ?></a></li>
                                    <li><i class="icofont-headphone-alt"></i> <a href="<?php echo "tel:55" . str_replace(array("(", ")", "-", " "), "", $voResultadoContatosRodape->telefone) ?>"><?php echo $voResultadoContatosRodape->telefone ?></a></li>
                                    <li><i class="far fa-envelope"></i> <a href="<?php echo "mailto:" . $voResultadoConfiguracoes->email ?>"><?php echo $voResultadoConfiguracoes->email ?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright-text">
                            <p><span><?php echo $voResultadoConfiguracoes->nome_empresa ?></span>. Todos direitos reservados.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 logo-wd">
                        <a class="logo-wd-float-right" href="https://webdezan.com.br" target="_blank">
                            <img src="<?php echo URL . "assets/images/logo-wd.webp" ?>" title="Web Dezan - Agência Digital" alt="Web Dezan - Agência Digital">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <a href="#" title="Voltar ao topo" class="back-to-top"><i class="flaticon-up-arrow-angle"></i></a>

    <?php
    // CSS
    include 'php/css.php';

    // SCRIPT
    include 'php/script.php';
    ?>
    <script src="<?php echo URL . "wdadmin/js/jquery.mask.min.js" ?>" rel="stylesheet"></script>
    <script src="<?php echo URL . "wdadmin/assets/plugins/sweetalert/sweetalert.min.js" ?>"></script>
    <link href="<?php echo URL . "wdadmin/assets/plugins/sweetalert/sweetalert.min.css" ?>" rel="stylesheet">
    <script src="<?php echo URL . "wdadmin/js/contato.min.js" ?>"></script>
    <script type="text/javascript">
        $(".features-item:first").addClass("border-radius-left");
        $(".features-item:last").addClass("border-radius-right");
    </script>
</body>

</html>