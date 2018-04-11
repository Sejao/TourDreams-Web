<?php




 ?>

<div id="selectgp">
     <p id ="titulogp"> Gerenciamento de Parceiros</p>



    <table class="table1 sortable">
        <tr>
                <td class="titulo2">
                        N de identificação
                </td>
                <td class="titulo2">
                        CNPJ
                </td>
                <td class="titulo2" >
                        Nome Parceiro
                </td>
                <td class="titulo2" >
                        Login
                </td>
                <td class="titulo2" >
                      Descrição
                </td>
                <td class="titulo2" >
                        opções
                </td>

        </tr>

    <?php

        require_once('controllers/parceiros_controller.php');

        $controller_parceiro = new ControllerParceiro();
        $rows = $controller_parceiro -> Listar();

        $cont = 0;

        while ($cont < count($rows)) {

    ?>
        <tr>
            <td class="tdnumero">
                <?php echo($rows[$cont]->idParceiro); ?>
            </td>
             <td class="tdnumero">
                <?php echo($rows[$cont]->cnpj); ?>
            </td>
             <td class="tdnumero">
                <?php echo($rows[$cont]->nome); ?>
            </td>
             <td class="tdnumero">
                <?php echo($rows[$cont]->login); ?>

            </td>
            <td class="tdnumero">
               <?php echo($rows[$cont]->descricao); ?>

           </td>
            <td class="tdnumero">
               <a href=<?php echo("router.php?controller=parceiro&modo=excluir&idParceiro=".$rows[$cont]->idParceiro);?>>
                 <img src="imagens/delete.png">
               </a>
               <a href=<?php echo("router.php?controller=parceiro&modo=alterar&idParceiro=".$rows[$cont]->idParceiro."&idLogin=".$rows[$cont]->idLogin );?>>
                 <img src="imagens/edit.png">
              </a>
           </td>
        </tr>

    <?php
    $cont +=1;
       }
    ?>
    </table>
    <table id="formulario">
      <tr>
              <td class="titulo2">
                      CNPJ
              </td>
              <td class="titulo2">
                      Nome Parceiro
              </td>
              <td class="titulo2" >
                      E-mail
              </td>
              <td class="titulo2" >
                      Senha
              </td>
              <td class="titulo2" >
                      Imagem
              </td>
      </tr>

      <?php
      $nome = null;
      $cnpj = null;
      $email = null;
      $senha = null;


      if(isset($_GET['modo'])){
        if ($_GET['modo']=='alterar') {
          $nome=$result->nome;
          $cnpj=$result->cnpj;
          $email =$result->email;
          $senha = $result->senha;
          $action="editar&idParceiro=".$idParceiro."&idLogin=".$_GET['idLogin'];
        }
      }


      ?>
      <form class="" action="router.php?controller=parceiro&modo=<?php echo($action)?>" method="post">


      <tr>
          <td class="tdnumero">
            <input class="inputFormulario" name="txtcnpj" value="<?php echo($cnpj)?>" placeholder="" >
          </td>
           <td class="tdnumero">
             <input class="inputFormulario" name="txtnome" value="<?php echo($nome)?>" placeholder="" >
          </td>
           <td class="tdnumero">
             <input class="inputFormulario" name="txtemail" value="<?php echo($email)?>" placeholder="" >
          </td>
           <td class="tdnumero">
             <input class="inputFormulario" name="txtsenha" value="<?php echo($senha)?>" placeholder="" >
          </td>
          <td class="tdimagem">
            <input class="" type="file" name="" value="" placeholder="" >
         </td>
      </tr>
      <?php


       ?>
      <tr>
        <td class="tdnumero">

        </td>
         <td class="tdnumero">

        </td>
         <td class="tdnumero">

        </td>
         <td class="tdnumero">

        </td>
        <td>
          <input type="submit" name="btnAlterar" value="" class="buttonAlterar">
        </td>
      </tr>
    </table>
</form>

</div>
