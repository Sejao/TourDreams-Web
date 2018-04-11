<?php
    $msg = '';
    $nome = '';
    $email = '';
    $telefone = '';
    $mensagem = '';
    if(isset($_GET['ok']))
    {
        $msg = 'Registro excluído com sucesso.';
    }
    if(isset($_GET['erro']))
    {
        $msg = 'Ocorreu um erro na exclusão do registro. Tente novamente';
    }

    if(isset($_GET['idFormulario']))
    {
        require_once('controllers/faleconosco_controller.php');
        $controller_faleconosco = new ControllerFaleConosco();
        $faleconosco = $controller_faleconosco->Visualizar();

        $nome = $faleconosco->nome;
        $email = $faleconosco->email;
        $telefone = $faleconosco->telefone;
        $mensagem = $faleconosco->mensagem;
    }
 ?>
<div id="shadowBg" onclick="fecharModalFaleConosco()">
</div>
<div id="modalVisualizar">
    <div id="modalConteudo">
        <table>
            <tr>
                <td>
                    <label for="txtNome">Nome</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="txtNome" readonly value="<?php echo($nome); ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="txtEmail">Email</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="email" name="txtEmail" readonly value="<?php echo($email); ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="txtTelefone">Telefone</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="tel" name="txtTelefone" readonly value="<?php echo($telefone); ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="txtMensagem">Mensagem</label>
                </td>
            </tr>
            <tr>
                <td><textarea name="txtMensagem" readonly><?php echo($mensagem); ?></textarea></td>
            </tr>
            <tr>
                <td>
                    <button type="button" name="btnFecharModal" onclick="fecharModalFaleConosco()">FECHAR</button>
                </td>
            </tr>
        </table>
    </div>
</div>
<div id="conteudo">
    <div id="msg"><?php echo ($msg); ?></div>
    <div id="abas">
        <button type="button" onclick="abrirGeral()" id="btngeral" style="background-color: #ccc;">Geral</button>
        <button type="button" onclick="abrirConta()" id="btnconta">Conta</button>
        <button type="button" onclick="abrirReservas()" id="btnreservas">Reservas</button>
        <button type="button" onclick="abrirFeedback()" id="btnfeedback">Feedback</button>
    </div>
    <div id="tableBox">
        <table id="geral" class="sortable">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Mensagem</th>
                <th>Opções</th>
            </tr>
            <?php
                //Inclusão do arquivo controller para fazer o SELECT.
                require_once('controllers/faleconosco_controller.php');

                /*Instância do objeto da controller e chamada para metódo de listagem
                dos registros*/
                $controller_faleconosco = new ControllerFaleConosco();
                $rowsGeral = $controller_faleconosco -> ListarGeral();

                $cont = 0;
                while($cont < count($rowsGeral))
                {
             ?>
            <tr>
                <td><?php echo($rowsGeral[$cont]->nome); ?></td>
                <td><?php echo($rowsGeral[$cont]->email); ?></td>
                <td><?php echo($rowsGeral[$cont]->telefone); ?></td>
                <td><?php echo($rowsGeral[$cont]->mensagem); ?></td>
                <td>
                    <a href=<?php echo("faleconosco.php?idFormulario=".$rowsGeral[$cont]->idFormulario); ?>><img src="imagens/find.png" alt="Editar"></a>
                    <a href=<?php echo ("router.php?controller=faleconosco&modo=excluir&idFormulario=".$rowsGeral[$cont]->idFormulario); ?>><img src="imagens/delete.png" alt="Excluir"></a>
                </td>
            </tr>
            <?php
                $cont += 1;
                }
             ?>
        </table>

        <table id="conta" class="sortable">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Mensagem</th>
                <th>Opções</th>
            </tr>
            <?php
                //Inclusão do arquivo controller para fazer o SELECT.
                require_once('controllers/faleconosco_controller.php');

                /*Instância do objeto da controller e chamada para metódo de listagem
                dos registros*/
                $controller_faleconosco = new ControllerFaleConosco();
                $rowsGeral = $controller_faleconosco -> ListarConta();

                $cont = 0;
                while($cont < count($rowsGeral))
                {
             ?>
            <tr>
                <td><?php echo($rowsGeral[$cont]->nome); ?></td>
                <td><?php echo($rowsGeral[$cont]->email); ?></td>
                <td><?php echo($rowsGeral[$cont]->telefone); ?></td>
                <td><?php echo($rowsGeral[$cont]->mensagem); ?></td>
                <td>
                    <a href=<?php echo("faleconosco.php?idFormulario=".$rowsGeral[$cont]->idFormulario); ?>><img src="imagens/find.png" alt="Editar"></a>
                    <a href=<?php echo ("router.php?controller=faleconosco&modo=excluir&idFormulario=".$rowsGeral[$cont]->idFormulario); ?>><img src="imagens/delete.png" alt="Excluir"></a>
                </td>
            </tr>
            <?php
                $cont += 1;
                }
             ?>
        </table>
        <table id="reservas" class="sortable">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Mensagem</th>
                <th>Opções</th>
            </tr>
            <?php
                //Inclusão do arquivo controller para fazer o SELECT.
                require_once('controllers/faleconosco_controller.php');

                /*Instância do objeto da controller e chamada para metódo de listagem
                dos registros*/
                $controller_faleconosco = new ControllerFaleConosco();
                $rowsGeral = $controller_faleconosco -> ListarReservas();

                $cont = 0;
                while($cont < count($rowsGeral))
                {
             ?>
            <tr>
                <td><?php echo($rowsGeral[$cont]->nome); ?></td>
                <td><?php echo($rowsGeral[$cont]->email); ?></td>
                <td><?php echo($rowsGeral[$cont]->telefone); ?></td>
                <td><?php echo($rowsGeral[$cont]->mensagem); ?></td>
                <td>
                    <a href=<?php echo("faleconosco.php?idFormulario=".$rowsGeral[$cont]->idFormulario); ?>><img src="imagens/find.png" alt="Editar"></a>
                    <a href=<?php echo ("router.php?controller=faleconosco&modo=excluir&idFormulario=".$rowsGeral[$cont]->idFormulario); ?>><img src="imagens/delete.png" alt="Excluir"></a>
                </td>
            </tr>
            <?php
                $cont += 1;
                }
             ?>
        </table>
        <table id="feedback" class="sortable">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Mensagem</th>
                <th>Opções</th>
            </tr>
            <?php
                //Inclusão do arquivo controller para fazer o SELECT.
                require_once('controllers/faleconosco_controller.php');

                /*Instância do objeto da controller e chamada para metódo de listagem
                dos registros*/
                $controller_faleconosco = new ControllerFaleConosco();
                $rowsGeral = $controller_faleconosco -> ListarFeedback();

                $cont = 0;
                while($cont < count($rowsGeral))
                {
             ?>
            <tr>
                <td><?php echo($rowsGeral[$cont]->nome); ?></td>
                <td><?php echo($rowsGeral[$cont]->email); ?></td>
                <td><?php echo($rowsGeral[$cont]->telefone); ?></td>
                <td><?php echo($rowsGeral[$cont]->mensagem); ?></td>
                <td>
                    <a href=<?php echo("faleconosco.php?idFormulario=".$rowsGeral[$cont]->idFormulario); ?>><img src="imagens/find.png" alt="Visualizar"></a>
                    <a href=<?php echo ("router.php?controller=faleconosco&modo=excluir&idFormulario=".$rowsGeral[$cont]->idFormulario); ?>><img src="imagens/delete.png" alt="Excluir"></a>
                </td>
            </tr>
            <?php
                $cont += 1;
                }
             ?>
        </table>
    </div>
</div>
<?php
    if(isset($_GET['idFormulario']))
    {
        ?>
            <script type="text/javascript">
                abrirModalFaleConosco();
            </script>
        <?php
    }
 ?>
