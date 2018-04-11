<?php




 ?>

<div class="selectgpp">
    <div id="titulogpp">
        Gerenciamento Comodidades de Quarto
    </div>
    <div id="containerTable">
        <table class="table11 sortable">
            <tr>
                <td class ="titulo22">
                   Identificação
                </td>
                <td class ="titulo22">
                    Nome da Comodidade
                </td>
                
                <td class="titulo22">
                    Opções
                </td>
            
            </tr>

        <?php

            require_once('controllers/comodidadesquarto_controller.php');

            $controller_comodidadesquarto = new ControllerComodidadesQuarto();
            $rows = $controller_comodidadesquarto -> Listar();

            $cont = 0;

            while ($cont < count($rows)) {

        ?>
            <tr> 
                <td class="tdnumeros">
                    <?php echo($rows[$cont]->idComodidade); ?>
                </td>
                <td class="tdnumeros">
                    <?php echo($rows[$cont]->nomeComodidade); ?>
                </td>
                  

                <td class="tdnumeros">
                   <a href=<?php echo("router.php?controller=comodidadesquarto&modo=excluir&idComodidade=".$rows[$cont]->idComodidade);?>>
                     <img src="imagens/delete.png" alt="delete">
                   </a>
                   <a href=<?php echo("router.php?controller=comodidadesquarto&modo=visualizar&idComodidade=".$rows[$cont]->idComodidade);?>>
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
              <td class="titulo22">
                      Nome da Comodidade
              </td>
              
      </tr>

      <?php
      $nomeComodidade = null;
     
      $action = "inserir";

      if(isset($_GET['modo'])){
        if ($_GET['modo']=='visualizar') {
          $nomeComodidade=$result->nomeComodidade;
       
          $action="editar&idComodidade=".$_GET['idComodidade'];
        }
      }


      ?>
      <form class="" action="router.php?controller=comodidadesquarto&modo=<?php echo($action)?>" method="post">


      <tr>
          <td class="tdnumeros">
            <input class="inputFormulario" name="txtnomecomodidade" value="<?php echo($nomeComodidade);?>" placeholder="" >
          </td>
           
           <td  class="tdnumeros">
          <input type="submit" name="btnAlterar" value="" class="btnAlterar">
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