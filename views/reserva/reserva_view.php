<?php
    //Recebe as datas para completar os valores padrões de seleção de dia/mês
    date_default_timezone_set('America/Sao_Paulo');
    $dataInicio = date('d/m/Y', time());                                        //Recebe o dia atual
    $dataFim = date('d/m/Y', strtotime("+1 day"));                              //Recebe o dia seguinte
    $mesAtual = date('m/Y', time());                                            //Recebe o mês atual
 ?>
<form action="router.php?controller=reserva" method="post">
<section>
    <?php
        $msg = '';
        require_once('controllers/reserva_controller.php');
        $reserva_controller = new ControllerReserva();
        $row = $reserva_controller->ListarQuarto($_SESSION['idQuarto']);


        $listaDesconto = new ControllerReserva();
        $listaDesconto->idCliente = $_SESSION['idCliente'];
        $row2 = $listaDesconto->listarMilhasDesconto();



        $valorDiarioFormatado = number_format($row->valorDiario,2,",",".");
        $valorTotalFormatado = number_format($row->valorDiario + (($row->valorDiario * 10)/100),2,",",".");



        $taxaFormatada = number_format(($row->valorDiario * 10)/100,2,",",".");

        $msg = '';

        if(isset($_GET['datainvalida'])){
            $msg = "Data inválida!";
        }


    ?>
    <!--Formulário de reserva-->
    <div id="formBox">
        <span>Conclua sua reserva, <?php echo($_SESSION['nome']." ".$_SESSION['sobreNome']); ?> <a href="perfilUsuario.php">(trocar usuário)</a></span>

        <table id="formularioReserva">
            <tr>
                <td><label id="msg"><?php echo($msg); ?></label></td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="txtValorDiario" value="<?php echo($row->valorDiario); ?>">
                    <input type="hidden" name="txtIdQuarto" value="<?php echo($_SESSION['idQuarto']); ?>">
                    <input type="hidden" name="txtIdCliente" value="<?php echo($_SESSION['idCliente']); ?>">
                    <label >Data de entrada*</label>
                </td>
            </tr>
            <tr>
                <td><input id="dataEntrada" onchange="mudarTotal(<?php echo($valorDiarioFormatado); ?>)" type="text" name="dataEntrada" value="<?php echo($dataInicio); ?>" class="datepicker" ></td>
            </tr>
            <tr>
                <td><label for="dataSaida">Data de saída*</label></td>
            </tr>
            <tr>
                <td><input type="text" id="dataSaida" onchange="mudarTotal(<?php echo($valorDiarioFormatado); ?>)" name="dataSaida" value="<?php echo($dataFim); ?>" class="datepicker"  ></td>
            </tr>

        </table>
        <hr>
        <table id="formularioCartao">
            <tr>
                <td><label for="txtTitular">Nome do titular (Igual ao cartão)*</label></td>
            </tr>
            <tr>
                <td><input id="txtTitular" onkeyup="validar(this,'text');" type="text" maxlength="30" name="txtTitular"  class="txtLongo"></td>
            </tr>
            <tr>
                <td><label style="float:left;margin-right:5px;">Número do cartão*</label></td>
            </tr>
            <tr>
                <td><input id="txtNumeroCartao" type="text" name="txtNumero"    class="txtLongo"></td>
            </tr>
            <tr>
                <td><label>Código de segurança*</label></td>
            </tr>
            <tr>
                <td><input id="txtCodigoSeguranca" type="text" name="txtCodigo"  ></td>
            </tr>
            <tr>
                <td><label>Validade do cartão*</label></td>
            </tr>
            <tr>
                <td><input id="txtValidade" type="text" name="txtValidade" class="monthPicker" value="<?php echo($mesAtual); ?>" ></td>
            </tr>
        </table>
    </div>
    <!---->
    <!--Caixa lateral de informações-->
    <div id="dadosBox">

        <div id="imgQuarto">
            <img src="<?php echo($row->caminhoImagem); ?>" alt="Quarto">
        </div>
        <table>
            <tr>
                <td colspan="2"><span class="raleway"><?php echo($row->nomeQuarto); ?></span></td>
            </tr>
            <tr>
                <td colspan="2"><?php echo($row->nomeHotel); ?></td>
            </tr>
            <tr>
                <td colspan="2"><?php echo($row->logradouro); ?> n°<?php echo($row->numero); ?>, <?php echo($row->bairro); ?></td>
            </tr>
            <tr>
                <td colspan="2"><?php echo($row->cidade); ?>-<?php echo($row->uf); ?></td>
            </tr>
            <tr>
                <td>Check-in: <?php echo($row->checkin); ?></td>
                <td>Check-out: <?php echo($row->checkout); ?></td>
            </tr>
            <tr>
                <td colspan="2">Qtd. máxima de hóspedes: <?php echo($row->maxHospedes); ?></td>
            </tr>
            <tr>
                <td colspan="2"><hr></td>
            </tr>
            <tr>
                <td colspan="2"><span class="raleway">Milhas Travel Fidelidade</span></td>
            </tr>
            <tr>
                <td colspan="2">Você tem: <span><?php echo($row2[$cont]->milhasPontuacao) ?></span> pontos</td>
            </tr>
            <tr>
                <td colspan="2"><input type="radio" name="radDesconto" value="0,0" checked><label>0 pontos (0% de desconto)</label></td>
            </tr>
            <?php



                $cont = 0;
                while ($cont < count($row2)) {
            ?>
                <tr>
                    <td colspan="2"><input <?php if($row2[$cont]->milhasPontuacao < $row2[$cont]->valorPontos){echo ('disabled');} ?>
                         type="radio" name="radDesconto" value="<?php echo($row2[$cont]->desconto.",".$row2[$cont]->valorPontos); ?>" ><label ><?php echo ($row2[$cont]->valorPontos); ?>
                              pontos (<?php echo($row2[$cont]->desconto) ?>% de desconto)</label></td>
                </tr>
            <?php
                    $cont++;
                }
            ?>
            <tr>
                <td colspan="2"><hr></td>
            </tr>
            <tr>
                <td id="subTotal" colspan="2">Sub-total: R$ <?php echo($valorDiarioFormatado); ?></td>
            </tr>
            <tr>
                <td id="taxa" colspan="2">Taxas: R$ <?php echo($taxaFormatada); ?> (10% do Sub-Total)</td>
            </tr>
            <tr>
                <td colspan="2">Descontos: R$ 0,00</td>
            </tr>
            <tr>
                <td colspan="2"><span id="total">Total: R$ <?php echo($valorTotalFormatado); ?></span></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="btnReservar" value="RESERVAR"></td>
            </tr>
        </table>
    </div>
    <!---->
</section>
</form>
