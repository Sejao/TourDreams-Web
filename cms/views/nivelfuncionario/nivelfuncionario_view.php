<?php
    $botao = 'SALVAR';
    $modo = 'inserir';
?>
<div class="sectionNivel">
    <div id="conteudoFuncionario">
        <div class="tituloPagina">
            <h1>Níveis de Funcionário</h1>
        </div>
        <div class="divTabela">
            <table class="sortable">
                <tr>
                    <th>Nível</th>
                    <th class="thOpcoes">Opções</th>
                </tr>
                <?php

                    require_once('controllers/nivel_controller.php');

                    $controller_nivel = new ControllerNivel();
                    $rows = $controller_nivel->Listar();

                    $cont = 0;

                    while($cont < count($rows)){

                ?>
                <tr>
                    <td><?php echo($rows[$cont]->nivel) ?></td>
                    <td><a href="router.php?controller=nivel&modo=visualizar&idNivel=<?php echo($rows[$cont]->idNivel); ?>"><img src="imagens/edit.png"></a>            <a href="router.php?controller=nivel&modo=excluir&idNivel=<?php echo($rows[$cont]->idNivel); ?>"><img src="imagens/delete.png"></a></td>
                </tr>
                <?php
                        $cont++;
                    }
                ?>
            </table>
        </div>
        <div class="formNivel">

            <?php

                $nivel = null;
                $idNivel = null;

                if(isset($_GET['modo'])){
                    if($_GET['modo']=='visualizar'){
                        $botao = 'ALTERAR';
                        $nivel = $result->nivel;
                        $idNivel = $result->idNivel;
                        $modo = 'editar&idNivel='.$idNivel;
                    }
                }

            ?>
            <form class="" action="router.php?controller=nivel&modo=<?php echo($modo); ?>" method="post">
                <table>
                    <tr>
                        <td><input type="text" name="txtNivel" placeholder="Digite o nome do nível" value="<?php echo($nivel); ?>"></td>
                        <td><input type="submit" name="" value="<?php echo($botao); ?>"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
