
<?php

  require_once('controllers/sobrenos_controller.php');

  $listar = new Sobre();
  $row = $listar->Select();


 ?>

<section>
    <!--Cabeçalho do conteúdo-->
    <div id="cabecalho">
        <h2>Sobre nós</h2>
    </div>
    <!---->
    <!--Descrição da empresa-->
    <div id="conteudoSuperior">
        <div id="descricao">
            <p><?php echo ($row->descricaoSuperior); ?></p>
        </div>
    </div>
    <!---->
    <!--Visão, valores e missão-->
    <div id="conteudoMeio">
        <div id="missoes">
            <div class="missaoBox">
                <div class="img"><img src="<?php echo ($row->imgvisao); ?>" alt=""></div>
                <h3>Visão</h3>
                <P><?php echo ($row->visao); ?></P>
            </div>
            <div class="missaoBox">
                <div class="img"><img src="<?php echo ($row->imgvalores); ?>" alt=""></div>
                <h3>Valores</h3>
                <p><?php echo ($row->valores); ?></P>
            </div>
            <div class="missaoBox">
                <div class="img"><img src="<?php echo ($row->imgmissao); ?>" alt=""></div>
                <h3>Missão</h3>
                <p><?php echo ($row->missao); ?></p>
            </div>
        </div>
    </div>
    <!---->
    <div id="conteudoInferior">
        <!--Histórico da empresa-->
        <div id="historicoBox">
            <div class="historico">
                <h3><?php echo ($row->anoUm); ?></h3>
                <p><?php echo ($row->descricaoUm); ?></p>
            </div>
            <div class="historico">
                <h3><?php echo ($row->anoDois); ?></h3>
                <p><?php echo ($row->descricaoDois); ?></p>
            </div>
            <div class="historico">
                <h3><?php echo ($row->anoTres); ?></h3>
                <p><?php echo ($row->descricaoTres); ?></p>
            </div>
        </div>
        <!---->
        <!--Imagem ilustrativa-->
        <div id="imagemTourDreams">
            <img src="<?php echo ($row->imgempresa); ?>" alt="TourDreams" />
        </div>
        <!---->
    </div>
</section>
