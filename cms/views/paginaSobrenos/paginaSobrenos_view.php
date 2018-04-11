<?php

  require_once('controllers/paginasobrenos_controller.php');

  $listar = new ControllerSobrenos();

  $row = $listar->Select();


 ?>
<div class="principalSobreNos">
  <div class="tituloSobreNos">
    Administração Sobre nós
  </div>
  <div class="isoladorConteudo">
    <div class="conteudoSobreNos">
      <div class="superiorEsquerda">
        <div class="tituloSobreNosInferior">
          Sobre nós
        </div>
        <form enctype="multipart/form-data" action="router.php?controller=sobrenos"  method="post">


        <textarea name="txtdescricaosuperior" value="" class="descricaoSobrenos">
          <?php echo ($row->descricaoSuperior);?>
        </textarea>
      </div>
      <div class="inferiorEsquerda">
        <div class="tiraVisaoMissaoValores">
          <div class="foto">
            <div class="fotinho">
              <input type="file" name="fileFotoVisao" value="">
              <img src="../<?php echo ($row->imgvisao);?>" alt="">

            </div>
          </div>
          <div class="conteudo">
            <h3>Visão</h3>
            <p>
            <textarea name="txtvisao" value="" class="conteudoArea">
            <?php echo ($row->visao);?>
            </textarea>
            </p>
          </div>
        </div>
        <div class="tiraVisaoMissaoValores">
          <div class="foto">
            <div class="fotinho">
              <input type="file" name="fileFotoValores" value="">
              <img src="../<?php echo ($row->imgvalores);?>" alt="">
            </div>
          </div>
          <div class="conteudo">
            <h3>Valores</h3>
            <p>
              <textarea name="txtvalores" value="" class="conteudoArea">
                <?php echo ($row->valores);?>
              </textarea>
            </p>
          </div>
        </div>
        <div class="tiraVisaoMissaoValores">
          <div class="foto">
            <div class="fotinho">
              <input type="file" name="fileFotoMissao" value="">
              <img src="../<?php echo ($row->imgmissao);?>" alt="">
            </div>
          </div>
          <div class="conteudo">
            <h3>Missão</h3>
            <p>
              <textarea name="txtmissao" value="" class="conteudoArea">
                <?php echo ($row->missao);?>
              </textarea>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="conteudoSobreNos2">
      <div class="superiorDireita">
        <div class="tiraAno">
          <textarea name="txtanoum" value="" class="tituloAno">
            <?php echo ($row->anoUm);?>
          </textarea>
          <textarea name="txtdescricaoum" value="" class="conteudoAno">
            <?php echo ($row->descricaoUm);?>
          </textarea>
        </div>
        <div class="tiraAno">
          <textarea name="txtanodois" value="" class="tituloAno">
            <?php echo ($row->anoDois);?>
          </textarea>
          <textarea name="txtdescricaodois" value="" class="conteudoAno">
          <?php echo ($row->descricaoDois);?>
          </textarea>
        </div>
        <div class="tiraAno">
          <textarea name="txtanotres" value="" class="tituloAno">
            <?php echo ($row->anoTres); ?>
          </textarea>
          <textarea name="txtdescricaotres" value="" class="conteudoAno">
          <?php echo ($row->descricaoTres);?>
          </textarea>
        </div>
      </div>
      <div class="inferiorDireita">
        <div class="fotoDireita">
          <input type="file" name="fileFotoInferior" value="">
          <img src="../<?php echo ($row->imgempresa);?>" alt="TourDreams" />
        </div>
      </div>
    </div>
  </div>
  <div class="">
    <div class="botao">
      <input type="submit" name="" value="SALVAR" >
    </div>
  </div>
  </form>


</div>
