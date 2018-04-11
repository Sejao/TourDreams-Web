<?php
    $modo = 'inserir';
    $idMoeda = '';
    $nome = '';
    $valor = '';
    $simbolo = '';
    $msg = '';
	$action = 'inserir';
    if(isset($_GET['modo']))
    {
        $modo = 'editar';
        $action = $modo.'&idMoeda='.$_GET['idMoeda'];

        $idMoeda = $resultado->idMoeda;
        $nome = $resultado->nome;
        $valor = $resultado->valor;
        $simbolo = $resultado->simbolo;
    }
    if(isset($_GET['erro']))
    {
        $msg = 'Houve um erro na operação. Tente novamente.';
    }
 ?>
<div class="sectionpromo">
    <div id="titulo">
    Gerenciamento de Moedas
    </div>
    <div id="msg">
        <span><?php echo ($msg); ?></span>
    </div>
    <table class="table sortable">
        <tr>
            <td class="tdtitulo">
                Nome
            </td>

            <td class="tdtitulo">
              Valor
            </td>
            <td class="tdtitulo">Símbolo</td>
            <td class="tdtitulo">
                Opções
            </td>
        </tr>
        <?php
            //Inclusão do arquivo controller para fazer o SELECT.
            require_once('controllers/moedas_controller.php');

            /*Instância do objeto da controller e chamada para metódo de listagem
            dos registros*/
            $controller_moeda = new ControllerMoeda();
            $moeda = $controller_moeda -> Listar();

            $cont = 0;
            while($cont < count($moeda))
            {
         ?>
         <tr>
             <td class="td_conteudo">
                 <?php echo ($moeda[$cont]->nome) ?>
             </td>
              <td class="td_conteudo">
                  <?php echo ($moeda[$cont]->valor) ?>
             </td>
             <td class="td_conteudo">
                 <?php echo ($moeda[$cont]->simbolo) ?>
             </td>
             <td class="td_conteudo">
                <a href=<?php echo("router.php?controller=moeda&modo=visualizar&idMoeda=".$moeda[$cont]->idMoeda); ?>><img src="imagens/edit.png"></a>
                <a href=<?php echo("router.php?controller=moeda&modo=excluir&idMoeda=".$moeda[$cont]->idMoeda); ?>><img src="imagens/delete.png"></a>
             </td>

         </tr>
        <?php
            $cont += 1;
            }
         ?>
    </table>
    <div class="crud">
      <form action="router.php?controller=moeda&modo=<?php echo($action); ?>" method="post">
        <table class="table02">
          <tr>
            <td class="tdCrud">Nome</td>
          </tr>
          <tr>
            <td>
              <input type="text" name="txtNome" class="input" value="<?php echo($nome) ?>">
            </td>
          </tr>
          <tr>
            <td class="tdCrud">Símbolo</td>
          </tr>
          <tr>
              <td><input type="text" name="txtSimbolo" class="input" value="<?php echo($simbolo) ?>"></td>
          </tr>
          <tr>
              <td class="tdCrud">Valor</td>
          </tr>
          <tr>
            <td>
              <input type="text" name="txtValor" class="input" value="<?php echo($valor) ?>">
            </td>
          </tr>
        </table>
        <div class="buttonAlterar">
          <input type="submit" name="btnMoeda" value="<?php echo($modo); ?>">
        </div>
        </form>
    </div>
</div>
