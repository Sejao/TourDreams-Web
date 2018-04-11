<?php
  require_once('controllers/paginaConhecaSeuDestino_controllers.php');
  $listaConheca = new ControllerConheca();

  $rows = $listaConheca->ListarConheca();
 ?>
<div class="conteudoPagina">

    <div class="titulo">
        Administração Conheça seu Destino
    </div>

    <div class="conteudo">
              <form class="" action="router.php?controller=conheca" enctype="multipart/form-data" method="post">
              <table>
                <tr>
                  <td class="</form>">Selecione uma Imagem: </td>
                  <td><input type="file" name="fileFotos" value=""></td>
                </tr>
              </table>

                <div class="Imagem1">


                  <img class="Imagem2" src="../<?php echo($rows->caminhoImagem);?>"   draggable="false" onmousedown="return false" style="user-drag: none">
                </div>
                <div class="btnSalvar">
                  <input type="submit" name="" value="SALVAR" >
                </div>
            </form>
    </div>

</div>
