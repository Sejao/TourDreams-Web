<?php

  require_once('controllers/reservas_controller.php');
  $listarReservas = new ControllerReservas();
  $row = $listarReservas->Atutalizar();



 ?>

<div id="selectgpp">
    <div id="reservaConteudo">
        <p id ="titulogpp"> Gerenciamento de Reservas</p>

       <div class="container">
       <table class="table11 sortable">
           <tr>
                   <td class="titulo22">
                       N da Reserva
                   </td>
                   <td class="titulo22">
                           Nome
                   </td>
                   <td class="titulo22" >
                           CPF
                   </td>
                   <td class="titulo22" >
                           Situação
                   </td>
                   <td class="titulo22" >
                           Valor Total
                   </td>
                   <td class="titulo22" >
                           Hotel
                   </td>
                   <td class="titulo22" >
                           Quarto
                   </td>
                   <td class="titulo22" >
                          Opções
                   </td>

           </tr>


           <?php
           $cont=0;

           while ($cont<count($row)) {

           ?>
           <tr>
               <td class="tdnumeros">
                  <?php echo ($row[$cont]->numeroReserva); ?>
               </td>
                <td class="tdnumeros">
                   <?php echo ($row[$cont]->cliente); ?>
               </td>
                <td class="tdnumeros">
                   <?php echo ($row[$cont]->cpf); ?>
               </td>
                <td class="tdnumeros">
                  <?php echo ($row[$cont]->status); ?>
               </td>
               <td class="tdnumeros">
                  R$ <?php echo ($row[$cont]->valor); ?>,00
               </td>
               <td class="tdnumeros">
                  <?php echo ($row[$cont]->hotel); ?>
               </td>
               <td class="tdnumeros">
                  <?php echo ($row[$cont]->quarto); ?>
               </td>
                <td class="tdnumeros">
                  <a href="#"><img src="imagens/delete.png"></a>

              </td>
           </tr>

          <?php
                $cont++;
              }
          ?>

       </table>
           </div>

    </div>
</div>
