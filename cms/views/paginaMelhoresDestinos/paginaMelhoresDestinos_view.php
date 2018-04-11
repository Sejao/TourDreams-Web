<?php

  require_once('controllers/paginaMelhoresDestinos_controller.php');
  $listaMelhores = new ControllerMelhores();

  $rows = $listaMelhores->ListarImagemMelhores();

 ?>
<div class="principalLanding">
    <div class="tituloLading">
      Administração Melhores Destinos
    </div>
    <div class="conteudoLading">
      <div class="tabela">
        <form class="" action="router.php?controller=melhores" enctype="multipart/form-data" method="post">
          <table>
            <tr>
              <td class="td">Selecione uma Imagem: </td>
              <td><input type="file" name="fileFotos" value=""></td>
            </tr>
          </table>

      </div>

    </div>
    <div class="imagem">
      <img class="ImagemGrande" src="../<?php echo($rows->caminhoImagem);?>" alt=""  draggable="false" onmousedown="return false" style="user-drag: none">
    </div>
    <div class="botao">
      <input type="submit" name="" value="SALVAR" >

      </div>
    </div>
      </form>
</div>
