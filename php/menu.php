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
                                    <li class="menu-item"><a href="<?php echo URL . "#sobre" ?>">Sobre</a></li>
                                    <li class="menu-item menu-item-has-children"><a href="<?php echo URL . "#servicos" ?>">Serviços</a>
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
                                    <li class="menu-item"><a href="<?php echo URL . "#clientes" ?>">Clientes</a></li>
                                    <li class="menu-item"><a href="<?php echo URL . "#contato" ?>">Contato</a></li>
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