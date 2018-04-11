<?php
    require_once('controllers/paginapromocoes_controller.php');
    $listarPromocoes = new ControllerPromocao();

    $row = $listarPromocoes->Select();



 ?>

<div class="principalPromocoes">
  <div class="tituloPromocoes">
    Administração Promoções
  </div>
  <div class="conteudoPromocoes">
    <div class="tabela">
      <form  enctype="multipart/form-data" action="router.php?controller=paginapromocoes" method="post">
        <table>
          <tr>
            <td class="td">Selecione uma Imagem: </td>

            <td> <input type="file" name="fileFotosBannerUm" value=""></td>
          </tr>

        </table>
    </div>
    <div class="select">
        <li><img  class="img" src="../<?php echo($row->banner1)?>" alt=""></li>
    </div>
    <div class="tabela">
        <tr>
          <td class="td">Selecione uma Imagem: </td>
          <td> <input type="file" name="fileFotosBannerDois" value=""> </td>
        </tr>
      </table>
    </div>
    <div class="select">
      <li><img class="img" src="../<?php echo($row->banner2)?>" alt=""></li>
    </div>
  </div>
  <div class="botao">
    <input type="submit" name="" value="SALVAR" >

    </div>
  </form>
</div>
