<?php
    $botao = 'SALVAR';
    $modo = 'inserir';
?>
<div class="conteudo">

    <div class="tituloPagina">
        <h1>Tipos de Local</h1>
    </div>
    <div class="divTabela">
        <table class="sortable">
            <tr>
                <th id="thTipoLocal">Tipo de Local</th>
                <th id="thOpcoes">Opções</th>
            </tr>
            <?php

                require_once('controllers/tipolocal_controller.php');

                $controller_estadia = new ControllerTipoLocal();
                $rows = $controller_estadia->Listar();

                $cont = 0;

                while($cont < count($rows)){

            ?>
            <tr>
                <td><?php echo($rows[$cont]->local) ?></td>
                <td><a href="router.php?controller=tipolocal&modo=visualizar&idLocal=<?php echo($rows[$cont]->idTipoLocal); ?>"><img src="imagens/edit.png"></a>            <a href="router.php?controller=tipolocal&modo=excluir&idLocal=<?php echo($rows[$cont]->idTipoLocal); ?>"><img src="imagens/delete.png"></a></td>
            </tr>
            <?php
                    $cont++;
                }
            ?>
        </table>
    </div>
    <div class="formLocal">

        <?php

            $local = null;
            $idLocal = null;

            if(isset($_GET['modo'])){
                if($_GET['modo']=='visualizar'){
                    $botao = 'ALTERAR';
                    $local = $result->local;
                    $idLocal = $result->idTipoLocal;
                    $modo = 'editar&idCidade='.$idCidade;
                }
            }

        ?>
        <form class="" action="router.php?controller=tipolocalcidade&modo=<?php echo($modo); ?>" method="post">
            <table>
                <tr>
                    <td><input type="text" name="txtLocal" placeholder="Digite o tipo de local" value="<?php echo($local); ?>"></td>
                    <td><input type="submit" name="" value="<?php echo($botao); ?>"></td>
                </tr>
            </table>
        </form>
    </div>

    <div class="tituloPagina">
        <h1>Tipos de Local das Cidades</h1>
    </div>

    <div class="divTabelaCidade">
        <table class="sortable">
            <tr>
                <th id="thCidade">Cidade</th>
                <th id="thTipoLocal">Tipo de Local</th>
                <th id="thOpcoes">Opções</th>
            </tr>
            <?php

                require_once('controllers/tipolocal_controller.php');

                $controller_estadia = new ControllerTipoLocal();
                $row = $controller_estadia->ListarCidadeLocal();

                $contador = 0;

                while($contador < count($row)){

            ?>
            <tr>
                <td><?php echo($row[$contador]->cidade) ?> - <?php echo($row[$contador]->uf) ?></td>
                <td><?php echo($row[$contador]->tipolocal) ?></td>
                <td><a href="router.php?controller=tipolocalcidade&modo=visualizarlocalcidade&idCidade=<?php echo($row[$contador]->idcidade); ?>"><img src="imagens/edit.png"></a></td>
            </tr>
            <?php
                    $contador++;
                }
            ?>
        </table>
    </div>
    <div class="formLocalCidade">

        <?php

            $cidade = null;
            $idCidade = null;

            if(isset($_GET['modo'])){
                if($_GET['modo']=='visualizarlocalcidade'){
                    $cidade = $resultado->cidade;
                    $idCidade = $resultado->idCidade;
                    $modo = 'editarlocalcidade&idCidade='.$idCidade;
                }
            }

        ?>
        <form class="" action="router.php?controller=tipolocalcidade&modo=<?php echo($modo); ?>" method="post">
            <table>
                <tr>
                    <td><input readonly type="text" name="txtLocal" placeholder="Cidade" value="<?php echo($cidade); ?>"></td>
                    <td>
                        <select name="sltTipoLocal">
                            <option value="0">Selecione um tipo de Local</option>
                            <?php
                            require_once('controllers/tipolocal_controller.php');

                            $controller_estadia = new ControllerTipoLocal();
                            $rows = $controller_estadia->Listar();

                            $cont = 0;

                            while($cont < count($rows)){
                            ?>
                            <option value="<?php echo($rows[$cont]->idTipoLocal); ?>"><?php echo($rows[$cont]->local); ?></option>
                            <?php
                                $cont++;
                            }
                            ?>
                        </select>
                    </td>
                    <td><input type="submit" name="" value="ALTERAR"></td>
                </tr>
            </table>
        </form>
    </div>

</div>
