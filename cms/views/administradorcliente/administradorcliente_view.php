<div class="conteudo">

  <div class="busca">

    <input type="text" name="" value="" placeholder="Buscar Cliente">
    <input type="submit" name="" value="Buscar">
  </div>
  <div class="tituloConteudo">
    Gerenciamento de Clientes
  </div>
  <div class="container">


    <?php
        //Inclusão do arquivo controller para fazer o SELECT.
        require_once('controllers/usuarios_controller.php');

        /*Instância do objeto da controller e chamada para metódo de listagem
        dos registros*/
        $controller_usuario = new ControllerUsuario();
        $rows = $controller_usuario -> Listar();

        $cont = 0;
        while($cont < count($rows))
        {
     ?>
    <div class="clientesConteudo">
      <div class="fotoCliente">
        <div class="imagem">
            <img src="imagens/usuario/mulher2.jpg">
        </div>
      </div>
      <div class="informaçoesCliente">
               <table>
                 <tr>
                   <td class="td">Nome do Usuário</td>
                   <td class="td">Telefone</td>
                   <td class="td">Tipo de Local</td>
                 </tr>
               </table>
               <table>
              <tr>
                  <td class="tdconteudo"><?php echo($rows[$cont]->nome); ?></td>
                  <td class="tdconteudo"><?php echo($rows[$cont]->telefone); ?></td>
                  <td class="tdconteudo"><?php echo($rows[$cont]->tipoLocal); ?></td>
              </tr>

          </table>
          <div class="buttonReservas">
            <h1>
              Reservas
            </h1>
          </div>
      </div>
    </div>
    <?php
        $cont += 1;
        }
     ?>
 </div>
</div>
