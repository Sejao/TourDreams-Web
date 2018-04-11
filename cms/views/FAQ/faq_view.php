<?php




 ?>

<div class="selectgpp">
    <div id="titulogpp">
        <h1>Gerenciamento do FAQ</h1>
    </div>
    <div id="containerTable">
        <table class="sortable">
            <tr>
                <th>
                   Pergunta
               </th>
                 <th>
                    Resposta
                </th>
                <th>
                    Categoria
                </th>
                <th class="thOpcoes">

                    Opções
                </th>
            </tr>

        <?php

            require_once('controllers/faq_controller.php');

            $controller_faq = new ControllerFaq();
            $rows = $controller_faq -> Listar();

            $cont = 0;

            while ($cont < count($rows)) {

        ?>
            <tr>
                <td class="tdnumeros">
                    <?php echo($rows[$cont]->pergunta); ?>
                </td>
                  <td class="tdnumeros">
                   <?php echo($rows[$cont]->resposta); ?>
                </td>
                <td class="tdnumeros">
                   <?php echo($rows[$cont]->categoriaFaq); ?>
                </td>

                <td class="tdnumeros">
                   <a href=<?php echo("router.php?controller=faq&modo=excluir&idFaq=".$rows[$cont]->idFaq);?>>
                     <img src="imagens/delete.png" alt="delete">
                   </a>
                   <a href=<?php echo("router.php?controller=faq&modo=visualizar&idFaq=".$rows[$cont]->idFaq);?>>
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
                      Pergunta
              </th>
              <th>
                     Resposta
              </th>

               <th class="titulo22">
                   Categoria
              </th>

              <th class="thOpcoes"></th>
      </tr>

      <?php
      $pergunta = null;
      $resposta = null;
      $idCategoriaFaq = null;
      $action = "inserir";

      if(isset($_GET['modo'])){
        if ($_GET['modo']=='visualizar') {
          $pergunta=$result->pergunta;
          $resposta=$result->resposta;
          $idCategoriaFaq=$result->idCategoriaFaq;

          $action="editar&idFaq=".$_GET['idFaq'];
        }
      }


      ?>
      <form class="" action="router.php?controller=faq&modo=<?php echo($action)?>" method="post">


      <tr>
          <td class="tdnumeros">
            <input type="text" name="txtpergunta" value="<?php echo($pergunta);?>" placeholder="" >
          </td>
           <td class="tdnumeros">
             <input type="text" name="txtresposta" value="<?php echo($resposta);?>" placeholder="" >
          </td>
            <td class="tdnumeros">

             <select class="inputFormulario" name="txtcategoria" value="<?php echo($idCategoriaFaq);?>" placeholder="" >
              <?php
            	$sql="select * from tbl_categoriafaq";
				$select = mysql_query($sql);

				while($rs = mysql_fetch_array($select))

                {
				?>
				<option value="<?php echo($rs['idCategoriaFaq']);?>"><?php echo($rs['categoriaFaq']);?></option>

				<?php
				}
				?>
                </select>
          </td>
           <td class="tdnumeros">
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
