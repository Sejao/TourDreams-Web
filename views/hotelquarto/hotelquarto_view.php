<?php

    require_once('controllers/hotelquarto_controller.php');

    $controller_hotel = new ControllerHotel;
    $rs = $controller_hotel->BuscaHotel();
    $row2 = $controller_hotel->BuscaImagemHotel();
    $row3 = $controller_hotel->BuscaPrimeiraImagem();
    $row4 = $controller_hotel->BuscaComodidadesHotel();
    $row5 = $controller_hotel->BuscaQuarto();
    $avaliacoes = $controller_hotel->BuscaAvaliacao();

    $rat = $rs[0]->avaliacao;

    $cont = 0;

    while($cont<count($rs)){

?>

<!--Conteúdo superior-->
<section id="sectionCima">
    <div id="contCima">
        <!--Detalhes do Hotel-->
        <div id="divTitulos">
            <table id="tblTitulo">
                <tr>
                    <td id="tdnomeHotel"><?php echo($rs[$cont]->hotel); ?></td>
                    <td id="tdlocalHotel"><?php echo($rs[$cont]->logradouro); ?> N° <?php echo($rs[$cont]->numero); ?>, <?php echo($rs[$cont]->bairro); ?>, <?php echo($rs[$cont]->cidade); ?> - <?php echo($rs[$cont]->uf); ?></td>
                    <td id="tdEstrelas">
                        <?php

                            $i = 1;
                            while($i <= $rs[$cont]->qtdEstrelas){
                        ?>
                            <img draggable="false" alt="" src="imagens/busca/estrela.png">
                        <?php
                                $i++;
                            }
                        ?>
                    </td>
                    <td id="tdAvaliacao"><?php echo(round($rat)); ?></td>
                </tr>
            </table>
        </div>
        <!---->
        <div id="divInformacoes">
            <!--Slider-->
            <div id="divisao1">
                <div id="divImgGrande">
                    <?php
                        $x= 0;

                        while($x < count($row3)){
                    ?>
                    <img draggable="false" alt="" src="<?php echo($row3[$x]->firstImg); ?>">

                    <?php
                        $x++;
                        }
                    ?>
                </div>
                <div id="carrossel">
                    <?php


                        $contador = 0;
                        while ($contador < count($row2)){
                    ?>
                    <div class="miniatura" onclick="trocaImg('<?php echo($row2[$contador]->caminhoImagem); ?>')"><img draggable="false" alt="" src="<?php echo($row2[$contador]->caminhoImagem); ?>"></div>
                    <?php
                        $contador++;
                    }
                    ?>
                </div>
            </div>
            <!---->
            <div id="divisao2">
                <div id="divHorarios">
                    <table id="tableHorarios">
                        <tr>
                            <td><img draggable="false" alt="" src="imagens/hotelquarto/calendarIn.png"><span>Check-in: <?php echo($rs[$cont]->checkin); ?></span></td>
                            <td><img draggable="false" alt="" src="imagens/hotelquarto/calendarOut.png"><span>Check-out: <?php echo($rs[$cont]->checkout); ?></span></td>
                        </tr>
                    </table>
                </div>

                <div id="divInfoHotel"><?php echo($rs[$cont]->descricao); ?></div>
            </div>

        <?php
            $cont++;
            }
        ?>
        <!-- Div de Comodidades -->
        <hr>
        <div id="divComodidades">

            <div class="separador">

                    <?php
                        $contador2 = 0;

                        while($contador2 < count($row4)){

                            $cur = 0;
                            foreach($row4 as $value){
                                if($cur == 0)
                                {
                                    echo '<ul>';
                                }
                                echo '    <li>' . $row4[$contador2]->comodidadeHotel . '</li>';
                                $contador2++;
                                if($cur == 5)
                                {
                                    echo '</ul>';
                                    $cur = 0;
                                }
                                else
                                {
                                    $cur++;
                                }
                            }


                        }
                    ?>
                </ul>
            </div>

        </div>
        <hr>
    </div>

    <div class="container">

        <section id="sliderhome">
            <div id="meuSlider" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#meuSlider" data-slide-to="0" class="active"></li>
                    <?php
                        $contadorIndex = 1;

                        while($contadorIndex < count($row2)){
                    ?>
                    <li data-target="#meuSlider" data-slide-to="<?php echo($contadorIndex); ?>"></li>
                    <?php

                        $contadorIndex++;
                        }
                    ?>


                </ol>
                <div class="carousel-inner">
                    <div class="item active"><img style="height:100%;width:100%;" src="<?php echo($row2[0]->caminhoImagem); ?>" alt="Slider 1" /></div>
                    <?php

                        $contadorImg = 1;

                        while($contadorImg < count($row2)){

                    ?>
                    <div class="item"><img style="height:100%;width:100%;" src="<?php echo($row2[$contadorImg]->caminhoImagem); ?>" alt ="Slide" /></div>
                    <?php
                            $contadorImg++;
                        }
                    ?>


                </div>
                <a class="left carousel-control" href="#meuSlider" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#meuSlider" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </section>


    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>


    <div id="divComodidades2">

        <div class="separador">

                <?php
                    $contador2 = 0;

                    while($contador2 < count($row4)){

                        $cur = 0;
                        foreach($row4 as $value){
                            if($cur == 0)
                            {
                                echo '<ul>';
                            }
                            echo '    <li>' . $row4[$contador2]->comodidadeHotel . '</li>';
                            $contador2++;
                            if($cur == 5)
                            {
                                echo '</ul>';
                                $cur = 0;
                            }
                            else
                            {
                                $cur++;
                            }
                        }


                    }
                ?>
            </ul>
        </div>

    </div>



    </div>
</section>
<!---->
<!--Conteúdo inferior-->
<section id="sectionBaixo">
    <div id="contBaixo">
        <?php
            $contador3 = 0;

            while($contador3<count($row5)){

                $preco = number_format($row5[$contador3]->vlrDiario,2,",","");
        ?>
        <!-- Sugestões de Quarto -->
        <div class="divQuarto">
            <div class="divInfoQuarto">
                <div class="imgQuarto">
                    <img draggable="false" alt="" src="<?php echo($row5[$contador3]->caminhoImagem); ?>">
                </div>
                <div class="divTituloQuarto">
                    <div class="nomeQuarto">
                        <?php echo($row5[$contador3]->nomeQuarto); ?>
                    </div>
                </div>
                <div class="textoQuarto"><?php echo($row5[$contador3]->descricao); ?></div>
                <div class="comodidadesQuarto">
                    <h1>Inclusos neste quarto</h1>
                    <?php
                        $contador = 0;
                        while($contador < 10){
                    ?>
                    <div class="comodidadeDoQuarto">
                        <ul>
                            <li>Wi-Fi</li>
                        </ul>
                    </div>
                    <?php
                            $contador++;
                        }
                    ?>
                </div>
            </div>

            <div class="divReservar"> <!-- botão para reservar -->
                <div class="divPreco">
                    <h3>Diárias de</h3>
                    <h1>R$ <?php echo($preco); ?></h1>
                </div>
                <?php
                    if(isset($_SESSION['login'])){
                        if($_SESSION['login'] == 'true'){

                            $_SESSION['idQuarto'] = $row5[$contador3]->idQuarto;
                ?>
                            <div class="botaoReservar">
                                <a href="reserva.php"><h1>RESERVAR</h1></a>
                            </div>

                <?php
                        }
                    }else{


                ?>
                    <a href="login.php"><div class="botaoReservar">
                        <h1>RESERVAR</h1>
                    </div></a>
                <?php
                    }
                ?>
            </div>


        </div>
        <?php
                $contador3++;
            }
        ?>
    </div>
</section>
<section id="sectionAvaliacao">
    <div id="avaliacaoBox">
        <div id="avaliacaoConteudoEsquerdo">
            <?php
                $atendimento = round($avaliacoes->atendimento);
                $conforto = round($avaliacoes->conforto);
                $lazer = round($avaliacoes->lazer);
                $limpeza = round($avaliacoes->limpeza);
                $localizacao = round($avaliacoes->localizacao);
                $preco = round($avaliacoes->preco);
                $rating = '';

                $rat = round($rat);
                if($rat <= 20)
                    $rating = '<span style="color:#ccc;">Ruim</span>';
                if($rat > 20 && $rat <= 40)
                    $rating = '<span style="color:#ff0000;">Razoável</span>';
                if($rat > 40 && $rat <= 60)
                    $rating = '<span style="color:yellow;">Bom</span>';
                if($rat > 60 && $rat <= 80)
                    $rating = '<span style="color:#aff252;">Muito Bom</span>';
                if($rat > 80)
                    $rating = '<span style="color:green;">Excelente</span>';

             ?>
            <h1><?php echo($rating); ?></h1>
            <table>
                <tr>
                    <td>Atendimento</td>
                </tr>
                <tr>
                    <td><div class="barraAvaliacao"><div class="progresso avaliacaoAtendimento" style="width:<?php echo($atendimento); ?>%;"></div></div><span><?php echo(number_format($avaliacoes->atendimento)) ?></span></td>
                </tr>
                <tr>
                    <td>Conforto</td>
                </tr>
                <tr>
                    <td><div class="barraAvaliacao"><div class="progresso avaliacaoConforto" style="width:<?php echo($conforto); ?>%;"></div></div><span><?php echo(number_format($avaliacoes->conforto)) ?></span></td>
                </tr>
                <tr>
                    <td>Lazer</td>
                </tr>
                <tr>
                    <td><div class="barraAvaliacao"><div class="progresso avaliacaoLazer" style="width:<?php echo($lazer); ?>%;"></div></div><span><?php echo(number_format($avaliacoes->lazer)) ?></span></td>
                </tr>
                <tr>
                    <td>Limpeza</td>
                </tr>
                <tr>
                    <td><div class="barraAvaliacao"><div class="progresso avaliacaoLimpeza"  style="width:<?php echo($limpeza); ?>%;"></div></div><span><?php echo(number_format($avaliacoes->limpeza)) ?></span></td>
                </tr>
                <tr>
                    <td>Localização</td>
                </tr>
                <tr>
                    <td><div class="barraAvaliacao"><div class="progresso avaliacaoLocalizacao" style="width:<?php echo($localizacao); ?>%;"></div></div><span><?php echo(number_format($avaliacoes->localizacao)) ?></span></td>
                </tr>
                <tr>
                    <td>Preço</td>
                </tr>
                <tr>
                    <td><div class="barraAvaliacao"><div class="progresso avaliacaoPreco" style="width:<?php echo($preco); ?>%;"></div></div><span><?php echo(number_format($avaliacoes->preco)) ?></span></td>
                </tr>
            </table>
        </div>
        <div id="avaliacaoConteudoDireito">
            <script>
                function redirect(){
                    window.location.href = "login.php";
                }
            </script>
                <?php
                    if(!isset($_SESSION['idCliente']))
                    {
                        ?>
                        <table>
                            <tr>
                                <td><h1>Efetue o login para enviar uma avaliação</h1></td>
                            </tr>
                            <tr>
                                <td><input onclick="redirect()" type="submit" id="btnEnviar" value="LOGIN"></td>
                            </tr>
                        </table>
                        <?php
                    }
                    else
                    {
                        ?>
                        <table id="formAvaliacao">
                            <tr>
                                <td colspan="2"><h2>Envie sua avaliação!</h2></td>
                            </tr>
                            <tr>
                                <th>Atendimento</th><td><input type="number" id="txtAtendimento" value="50" min="0" max="100" required><input type="hidden" id="txtIdHotel" value="<?php echo($_GET['idHotel']) ?>"><input type="hidden" id="txtIdCliente" value="<?php echo($_SESSION['idCliente']) ?>"></td>
                            </tr>
                            <tr>
                                <th>Conforto</th><td><input type="number" id="txtConforto" value="50" min="0" max="100" required></td>
                            </tr>
                            <tr>
                                <th>Lazer</th><td><input type="number" id="txtLazer" value="50" min="0" max="100" required></td>
                            </tr>
                            <tr>
                                <th>Limpeza</th><td><input type="number" id="txtLimpeza" value="50" min="0" max="100" required></td>
                            </tr>
                            <tr>
                                <th>Localização</th><td><input type="number" id="txtLocalizacao" value="50" min="0" max="100" required></td>
                            </tr>
                            <tr>
                                <th>Preço</th><td><input type="number" id="txtPreco" value="50" min="0" max="100" required></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" id="btnEnviar" value="ENVIAR" onclick="enviarAvaliacao()"></td>
                            </tr>
                        </table>
                        <?php
                    }
                 ?>
                 <table style="display: none;" id="msgAvaliacao">
                     <tr>
                         <td><h1>Obrigado pelo feedback!</h1></td>
                     </tr>
                     <tr>
                         <td><span id="smiley">:)</span></td>
                     </tr>
                 </table>
        </div>
    </div>
</section>
<!---->
