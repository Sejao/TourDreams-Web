<?php




 ?>

<div class="selectgpp">
    <div id="titulogpp">
        <h1>Gerenciamento de Categoria FAQ</h1>
    </div>

    <div id="containerTable">

        <table class="sortable">
            <tr>
                <th>
                    Categoria
                </th>
                <th class="thOpcoes">
                    Opções
                </th>
            </tr>

        <?php

            require_once('controllers/categoriafaq_controller.php');

            $controller_categoriafaq = new ControllerCategoriaFaq();
            $rows = $controller_categoriafaq -> Listar();

            $cont = 0;

            while ($cont < count($rows)) {

        ?>
            <tr>

                <td class="tdnumeros">
                   <?php echo($rows[$cont]->categoriaFaq); ?>
                </td>

                <td class="tdnumeros">
                   <a href=<?php echo("router.php?controller=categoriafaq&modo=excluir&idCategoriaFaq=".$rows[$cont]->idCategoriaFaq);?>>
                     <img src="imagens/delete.png" alt="delete">
                   </a>
                   <a href=<?php echo("router.php?controller=categoriafaq&modo=visualizar&idCategoriaFaq=".$rows[$cont]->idCategoriaFaq);?>>
                     <img src="imagens/edit.png" alt="edit">
                  </a>
               </td>
            </tr>
             <?php
        $cont +=1;
           }
        ?>
        </table>
    </div>

    <table class="formulariozinho">
      <tr>
              <th>
                  Categoria
              </th>
              <th class="thOpcoes">
              </th>
      </tr>

      <?php
      $categoriaFaq = null;
      $action = "inserir";

      if(isset($_GET['modo'])){
        if ($_GET['modo']=='visualizar') {
          $categoriaFaq=$result->categoriaFaq;

          $action="editar&idCategoriaFaq=".$_GET['idCategoriaFaq'];
        }
      }


      ?>
      <form class="" action="router.php?controller=categoriafaq&modo=<?php echo($action)?>" method="post">


      <tr>
          <td class="tdnumeros">
            <input type="text" placeholder="Geral" name="txtcategoriafaq" value="<?php echo($categoriaFaq);?>" placeholder="" >
          </td>
           <td  class="tdnumeros">
          <input type="submit" name="btnAlterar" value="SALVAR">
        </td>
         </tr>
      <?php


       ?>
      <tr>
        <td class="tdnumeros">

        </td>
      </tr>

        </form>


    </table>

</div>
