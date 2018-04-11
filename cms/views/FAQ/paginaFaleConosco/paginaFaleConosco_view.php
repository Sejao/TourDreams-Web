<?php

  require_once('controllers/paginafaleconosco_controller.php');
  $faleConosco = new ControllerPaginaFaleconosco();

  $rows = $faleConosco->Select();


 ?>
<div class="principalFaleconosco">
  <div class="tituloFaleconosco">
    Administração Fale Conosco
  </div>
  <div class="conteudoFaleconosco">
    <div class="part1">
      <div class="botoes">
        <div class="botoesSeparados">
          <form enctype="multipart/form-data" action="router.php?controller=paginafaleconosco" method="POST">


          <div class="tituloBotao">
            Contato
          </div>
          <div class="img">
            <img src="../<?php echo($rows->contato); ?>" alt="Contato" onclick="irContato()" onmousedown="return false">
          </div>
          <div class="input">
            <input type="file" name="fileFotosContato" value="">
          </div>
        </div>
        <div class="botoesSeparados">
          <div class="tituloBotao">
            Faq
          </div>
          <div class="img">
            <img  src="../<?php echo($rows->faq); ?>" alt="FAQ" onclick="irFAQ()" onmousedown="return false"onmousedown="return false">
          </div>
          <div class="input">
            <input type="file" name="fileFotosFaq" value="">
          </div>
        </div>
        <div class="botoesSeparados">
          <div class="tituloBotao">
            Ainda com Duvida
          </div>
          <div class="img">
            <img  src="../<?php echo($rows->duvida); ?>" alt="Formulário" onclick="irForm()" onmousedown="return false">
          </div>
          <div class="input">
            <input type="file" name="fileFotosDuvida" value="">
          </div>
        </div>
      </div>
      <div class="icones">
        <div class="iconesQuadrado">
          <div class="tituloIcones">
            Geral
          </div>
          <div class="imgIcones">
            <div class="imgRedondo">
              <img src="../<?php echo($rows->geral); ?>" alt="Geral" onmousedown="return false">
            </div>
          </div>
          <div class="inputIcones">
            <input type="file" name="fileFotosGeral" value="">
          </div>
        </div>
        <div class="iconesQuadrado">
          <div class="tituloIcones">
            Contas
          </div>
          <div class="imgIcones">
            <div class="imgRedondo">
              <img src="../<?php echo($rows->conta); ?>" alt="Conta" onmousedown="return false">
            </div>
          </div>
          <div class="inputIcones">
            <input type="file" name="fileFotosConta" value="">
          </div>
        </div>
        <div class="iconesQuadrado">
          <div class="tituloIcones">
            Reservas
          </div>
          <div class="imgIcones">
            <div class="imgRedondo">
              <img src="../<?php echo($rows->reserva); ?>" alt="Reservas" onmousedown="return false">
            </div>
          </div>
          <div class="inputIcones">
            <input type="file" name="fileFotosReservas" value="">
          </div>
        </div>
        <div class="iconesQuadrado">
          <div class="tituloIcones">
            Feedback
          </div>
          <div class="imgIcones">
            <div class="imgRedondo">
              <img src="../<?php echo($rows->feedback); ?>" alt="Feedback" onmousedown="return false">
            </div>
          </div>
          <div class="inputIcones">
            <input type="file" name="fileFotosFeedback" value="">
          </div>
        </div>
      </div>
    </div>
    <div class="part2">
      <div class="tituloBack">
        Imagem Background
      </div>
      <div class="conteudoBack">
        <div class="isoladorBack">
          <img class="isoladorBack" src="../<?php echo($rows->bg); ?>" alt="">
        </div>
      </div>
      <div class="inputBack">
        <input type="file" name="fileFotosBackground" value="">
      </div>
    </div>
  </div>
  <div class="botao">
    <input type="submit" name="" value="SALVAR" >

    </div>
  </form>
</div>
