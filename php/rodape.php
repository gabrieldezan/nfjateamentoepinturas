<footer class="footer-area footer-area-v1 bg_cover" style="background-image: url(<?php echo URL . "assets/images/bg/footer-bg-1.jpg" ?>);">
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
                            <li><a href="<?php echo "https://api.whatsapp.com/send?l=pt_BR&phone=55" . str_replace(array("(", ")", "-", " "), "", $voResultadoConfiguracoes->whatsapp) ?>" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                            <?php
                            $vsSqlRedesSociais = "SELECT titulo, link, icone FROM redes_sociais";
                            $vrsExecutaRedesSociais = mysqli_query($Conexao, $vsSqlRedesSociais) or die("Erro ao efetuar a operação no banco de dados! <br> Arquivo:" . __FILE__ . "<br>Linha:" . __LINE__ . "<br>Erro:" . mysqli_error($Conexao));
                            while ($voResultadoRedesSociais = mysqli_fetch_object($vrsExecutaRedesSociais)) {
                                ?>
                                <li><a href="<?php echo $voResultadoRedesSociais->link ?>" title="<?php echo $voResultadoRedesSociais->titulo ?>" target="_blank"><i class="<?php echo $voResultadoRedesSociais->icone ?>"></i></a></li>
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
                                <li><i class="fab fa-whatsapp"></i> <a target="_blank" href="<?php echo "https://api.whatsapp.com/send?l=pt_BR&phone=55" . str_replace(array("(", ")", "-", " "), "", $voResultadoConfiguracoes->whatsapp) ?>"><?php echo $voResultadoConfiguracoes->whatsapp ?></a></li>
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
                <div class="col-lg-6">
                    <div class="copyright-text">
                        <p><span><?php echo $voResultadoConfiguracoes->nome_empresa ?></span>. Todos direitos reservados.</p>
                    </div>
                </div>
                <div class="col-lg-6 logo-wd">
                    <a class="logo-wd-float-right" href="https://webdezan.com.br" target="_blank">
                        <img src="<?php echo URL . "assets/images/logo-wd.png" ?>" title="Web Dezan - Agência Digital" alt="Web Dezan - Agência Digital">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>