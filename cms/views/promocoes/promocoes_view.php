<div class="sectionpromo">
    <div id="titulo">
    Gerenciamento de Promoções
    </div>
    <table class="table sortable">

        <tr>
            <td class="tdtitulo">
                Numero de Identificação
            </td>

            <td class="tdtitulo">
              Qtd. Porcentagem
            </td>
            <td class="tdtitulo">
                Milhas Pontuação
            </td>


            <td class="tdtitulo">
                Opções
            </td>
        </tr>

        <?php
        require_once('controllers/promocoes_controller.php');

        $controller_promocoes = new ControllerPromocoes();
        $rows = $controller_promocoes -> Listar();

        $cont = 0;

        while ($cont < count($rows)) {

        ?>
        <tr>
            <td class="td_conteudo">
                <?php echo($rows[$cont]->idMilhas); ?>
            </td>

             <td class="td_conteudo">
                <?php echo($rows[$cont]->valor); ?>
            </td>
             <td class="td_conteudo">
               <?php echo($rows[$cont]->desconto); ?>%
            </td>


            <td class="td_conteudo">
               <a href=<?php echo("router.php?controller=promocoes&modo=alterar&idMilhas=".$rows[$cont]->idMilhas); ?>><img src="imagens/edit.png"></a>
               <a href=<?php echo("router.php?controller=promocoes&modo=excluir&idMilhas=".$rows[$cont]->idMilhas); ?>><img src="imagens/delete.png"></a>
            </td>

        </tr>
            <?php
        $cont++;
        }
    ?>
    </table>

    <?php

      $valor = null;
      $desconto = null;

      if(isset($_GET['modo'])){
        if($_GET['modo'] == 'alterar'){
          $valor = $result->valor;
          $desconto = $result->desconto;
          $action ="editar&idMilhas=".$_GET['idMilhas'];

        }
      }

     ?>

    <div class="crud">
      <form class="" action="router.php?controller=promocoes&modo=<?php echo($action)?>" method="post">


        <table class="table02">

          <tr>
            <td class="tdCrud">Quatidade de Porcentagem</td>
          </tr>
          <tr>
            <td>
              <input type="text" name="txtquantidade" value="<?php echo($valor)?>" class="input">
            </td>
          </tr>
          <tr>
            <td class="tdCrud">Milhas de Pontuação</td>
          </tr>
          <tr>
            <td>
              <input type="text" name="txtmilhas" value="<?php echo($desconto)?>" class="input">
            </td>
          </tr>
        </table>
        <div class="buttonAlterar">
          <input type="submit" name="" value="alterar">
        </div>
        </form>
    </div>
</div>
