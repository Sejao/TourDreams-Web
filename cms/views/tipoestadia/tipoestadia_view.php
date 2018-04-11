<?php
    $botao = 'SALVAR';
    $modo = 'inserir';
?>
<div class="sectionTipoEstadia">

    <div class="tituloPagina">
        <h1>Tipos de Estadia</h1>
    </div>
    <div class="divTabela">
        <table class="sortable">
            <tr>
                <th id="thTipoEstadia">Tipo de Estadia</th>
                <th id="thOpcoes">Opções</th>
            </tr>
            <?php

                require_once('controllers/tipoestadia_controller.php');

                $controller_estadia = new ControllerTipoEstadia();
                $rows = $controller_estadia->Listar();

                $cont = 0;

                while($cont < count($rows)){

            ?>
            <tr>
                <td><?php echo($rows[$cont]->estadia) ?></td>
                <td><a href="router.php?controller=tipoestadia&modo=visualizar&idEstadia=<?php echo($rows[$cont]->idTipoEstadia); ?>"><img src="imagens/edit.png"></a>            <a href="router.php?controller=tipoestadia&modo=excluir&idEstadia=<?php echo($rows[$cont]->idTipoEstadia); ?>"><img src="imagens/delete.png"></a></td>
            </tr>
            <?php
                    $cont++;
                }
            ?>
        </table>
    </div>
    <div class="formNivel">

        <?php

            $estadia = null;
            $idEstadia = null;

            if(isset($_GET['modo'])){
                if($_GET['modo']=='visualizar'){
                    $botao = 'ALTERAR';
                    $estadia = $result->estadia;
                    $idEstadia = $result->idEstadia;
                    $modo = 'editar&idEstadia='.$idEstadia;
                }
            }

        ?>
        <form class="" action="router.php?controller=tipoestadia&modo=<?php echo($modo); ?>" method="post">
            <table>
                <tr>
                    <td><input type="text" name="txtEstadia" placeholder="Digite o nome da estadia" value="<?php echo($estadia); ?>"></td>
                    <td><input type="submit" name="" value="<?php echo($botao); ?>"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
