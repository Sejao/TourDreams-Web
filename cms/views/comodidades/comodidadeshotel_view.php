<?php




 ?>

<div class="selectgpp">
    <div id="titulogpp">
        Gerenciamento Comodidades de Hotel
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

            require_once('controllers/comodidadeshotel_controller.php');

            $controller_comodidadeshotel = new ControllerComodidadesHotel();
            $rows = $controller_comodidadeshotel -> Listar();

            $cont = 0;

            while ($cont < count($rows)) {

        ?>
            <tr> 
                <td class="tdnumeros">
                    <?php echo($rows[$cont]->idComodidadeHotel); ?>
                </td>
                <td class="tdnumeros">
                    <?php echo($rows[$cont]->nomeComodidade); ?>
                </td>
                  

                <td class="tdnumeros">
                   <a href=<?php echo("router.php?controller=comodidadeshotel&modo=excluir&idComodidadeHotel=".$rows[$cont]->idComodidadeHotel);?>>
                     <img src="imagens/delete.png" alt="delete">
                   </a>
                   <a href=<?php echo("router.php?controller=comodidadeshotel&modo=visualizar&idComodidadeHotel=".$rows[$cont]->idComodidadeHotel);?>>
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
       
          $action="editar&idComodidadeHotel=".$_GET['idComodidadeHotel'];
        }
      }


      ?>
      <form class="" action="router.php?controller=comodidadeshotel&modo=<?php echo($action)?>" method="post">


      <tr>
          <td class="tdnumeros">
            <input class="inputFormulario" name="txtnomecmodidade" value="<?php echo($nomeComodidade);?>" placeholder="" >
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