<?php

  require_once('controllers/paginaLanding_controller.php');
  $listaLanding = new ControllerLanding();

  $rows = $listaLanding->ListarImagemLanding();



 ?>
<div class="principalLanding">
    <div class="tituloLading">
      Administração LandingPage
    </div>
    <div class="conteudoLading">
      <div class="tabela">
        <form class="" action="router.php?controller=landing" enctype="multipart/form-data" method="post">
          <table>
            <tr>
              <td class="td">Selecione uma Imagem: </td>
              <td><input type="file" name="fileFotoss" value=""></td>
            </tr>
          </table>

      </div>

    </div>
    <div class="imagem">
    
      <img class="imagemGrande" src="../<?php echo($rows->caminhoImagem);?>" alt="background"  draggable="false" onmousedown="return false" style="user-drag: none">
    </div>
    <div class="botao">
      <input type="submit" name="" value="SALVAR" >

      </div>
    </div>
      </form>
</div>
