<section>
    <!--Caixa de filtros-->
    <div id="filtrosBox">
        <h3 id="filtrosBoxTitulo"><span>Filtros de busca</span></h3>
        <form action="busca.php?modo=avancada" method="GET">
        <div id="filtros">

            <h3>Preço</h3>
            <ul>
                <li><input type="radio" name="slcPreco" value="<100">R$ 0,00 - R$ 99,99</li>
                <li><input type="radio" name="slcPreco" value="<300">R$ 100,00 - R$ 299,99</li>
                <li><input type="radio" name="slcPreco" value="<500">R$ 300,00 - R$ 499,99</li>
                <li><input type="radio" name="slcPreco" value="<1000">R$ 500,00 - R$ 999,99</li>
                <li><input type="radio" name="slcPreco" value=">1000">Acima de R$ 1000,00</li>
            </ul>
            <h3>Tipo</h3>
            <ul>
              <?php

                require_once ('controllers/buscaAvancada_controller.php');
                 $controllerSelectBuscaAvancada = new ControllerSelectBuscaAvancada();
                 $rows = $controllerSelectBuscaAvancada->ListarTipoDeEstadia();
                 $cont = 0;

                 while ($cont < count($rows)) {


               ?>
                <li><input type="radio" name="slcTipoEstadia" value="<?php echo ($rows[$cont]->idEstadia); ?>"><?php echo ($rows[$cont]->estadia); ?></li>
                <?php
                 $cont += 1;
              }
                 ?>
            </ul>
            <h3>Parceiros</h3>
            <ul>
              <?php

              require_once('controllers/buscaAvancada_controller.php');

              $controllerParceiro = new ControllerSelectBuscaAvancada();
              $rows = $controllerParceiro->ListarParceiro();
              $cont = 0;

              while ($cont < count($rows)) {



               ?>
                <li><input type="radio" name="slcParceiro" value="<?php echo ($rows[$cont]->idParceiro); ?>"><?php echo ($rows[$cont]->parceiro); ?></li>

                <?php
                $cont+= 1;
              }
                 ?>
            </ul>
            <h3>Estrelas</h3>
            <ul>
                <li><input type="radio" name="slcEstrela" value="1">1 Estrela</li>
                <li><input type="radio" name="slcEstrela" value="2">2 Estrelas</li>
                <li><input type="radio" name="slcEstrela" value="3">3 Estrelas</li>
                <li><input type="radio" name="slcEstrela" value="4">4 Estrelas</li>
                <li><input type="radio" name="slcEstrela" value="5">5 Estrelas</li>
            </ul>
            <h3>Avaliação</h3>
            <ul>
                <li><input type="radio" name="slcAvaliacao" value="<25">Menor que 25</li>
                <li><input type="radio" name="slcAvaliacao" value="<50">Menor que 50</li>
                <li><input type="radio" name="slcAvaliacao" value="<75">Menor que 75</li>
                <li><input type="radio" name="slcAvaliacao" value=">75">Acima de 75</li>
            </ul>
            <h3>Comodidades do Hotel</h3>
            <ul>
              <?php

                  require_once('controllers/buscaAvancada_controller.php');

                $controllerComodidadeHotel = new ControllerSelectBuscaAvancada();
                $rows = $controllerComodidadeHotel->ListarComodidadeHotel();
                $cont = 0;

                while ($cont < count ($rows)) {



               ?>
                <li><input type="checkbox" name="<?php echo('chk'.$rows[$cont]->idComodidadeHotel) ?>" value="<?php echo ($rows[$cont]->comodidadesHotel) ?>"><label ><?php echo ($rows[$cont]->comodidadesHotel) ?></label></li>
                <?php
                $cont +=1;
              }
                 ?>
            </ul>
            <h3>Comodidades do Quarto</h3>
            <ul>
              <?php

              require_once('controllers/buscaAvancada_controller.php');

              $controllerComodidadeQuarto = new ControllerSelectBuscaAvancada();
              $rows = $controllerComodidadeQuarto->ListarComodidadeQuarto();
              $cont =0;
              while ($cont < count($rows)) {


               ?>
                <li><input type="checkbox" name="<?php echo('comodidadeHotel'.$rows[$cont]->idComodidadeQuarto)?>" value="<?php echo ($rows[$cont]->comodidadesQuarto); ?>"><label><?php echo ($rows[$cont]->comodidadesQuarto); ?></label></li>
                <?php
                $cont +=1;
              }
                 ?>
            </ul>
        </div>

        <input type="submit" name="btn_pesquisar" value="FILTRO">
        </form>
    </div>
    <!---->
    <!--Caixa de resulttados-->
    <div id="resultadosBox">
        <div class="infoBuscaBox">
            <span class="qtdResultados">12/150 Hotéis</span>
            <div class="paginacao">
                <a href="#">&laquo;</a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">7</a>
                <a href="#">8</a>
                <a href="#">9</a>
                <a href="#">&raquo;</a>
            </div>
            <div class="ordenacao">
                <select name="slcOrdenacao">
                    <option value="relevancia" selected>Ordenar por: Relevância</option>
                    <option value="menorpreco">Ordenar por: Menor preço</option>
                    <option value="maiorpreco">Ordenar por: Maior preço</option>
                    <option value="avaliacao">Ordenar por: Avaliação</option>
                </select>
            </div>
        </div>
        <?php


            require_once('controllers/buscaRapida_controller.php');
            require_once('models/buscaRapida_class.php');

        if(isset($_GET['estado'])){
            require_once('controllers/buscaestado_controller.php');
            require_once('models/buscaEstado_class.php');
            $estado = $_GET['estado'];
            $controllerBuscaEstado = new controllerBuscaEstado();
            $controllerBuscaEstado->estado = $estado;
            $rows = $controllerBuscaEstado->buscaEstado();

        }elseif(isset($_GET['regiao'])){
            require_once('controllers/buscaRegiao_controller.php');
            require_once('models/buscaRegiao_class.php');
            $regiao = $_GET['regiao'];
            $controllerBuscaRegiao = new controllerBuscaRegiao();
            $controllerBuscaRegiao->regiao = $regiao;
            $rows = $controllerBuscaRegiao->buscaRegiao();
        }elseif (isset($_GET['btn_pesquisar'])) {
              if($_GET['btn_pesquisar']  == 'PESQUISAR'){


              $controllerSelectBuscaAvancada = new ControllerSelectBuscaAvancada();
              $rows = $controllerSelectBuscaAvancada->BuscaAcancada();

          }elseif($_GET['btn_pesquisar'] == 'buscaRapida') {


              $controllerBuscaRapida = new ControllerBuscaRapida();
              $rows = $controllerBuscaRapida->Buscar();
        }
            elseif($_GET['btn_pesquisar']  == 'FILTRO') {


              $controllerSelectBuscaAvancadaFiltro = new ControllerSelectBuscaAvancada();
              $rows = $controllerSelectBuscaAvancadaFiltro->BuscaAcancadaFiltro();
              }
          }

            $cont = 0;

            while ($cont < count ($rows)) {

                /*  if $rows['idHotel'];
                  $idHotel_x = $rows['idHotel'];
*/
                ?>
                <div class="resultado">
                    <div class="resultadoImg">
                        <div class="parceiroDestaque">
                           <div class="ribbon"><span>DESTAQUE</span></div>
                        </div>
                        <img src="<?php echo ($rows[$cont]->imagemHotel); ?>" alt="" class="hotelImg">
                    </div>

                    <div class="resultadoInfo">
                        <table>
                            <tr>
                                <td><h3><?php echo ($rows[$cont]->hotel); ?></h3></td>
                            </tr>
                            <tr>
                                <td>
                                    <?php
                                       $qtd = rand(1, 5);
                                        $contestrelas = 1;
                                        while ($contestrelas <= $rows[$cont]->qtdEstrelas){
                                            ?>
                                                <img src="imagens/busca/estrela.png" alt="">
                                            <?php
                                            $contestrelas += 1;
                                        }
                                     ?>
                                 </td>
                            </tr>
                            <tr>
                                <td><?php echo ($rows[$cont]->bairro); ?>, <?php echo ($rows[$cont]->cidade); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo ($rows[$cont]->nomeParceiro); ?></td>
                            </tr>

                        </table>
                    </div>
                    <div class="resultadoReservar">
                        <table>
                            <tr>
                                <td>
                                    <h3><?=rand(0,10);?></h3>
                                    <h5>123 avaliações</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2><?php
                                    if(isset($_SESSION['cotacao']))
                                    {
                                        echo($_SESSION['simbolo'].' '.number_format(floatval($rows[$cont]->preco)/$_SESSION['cotacao'], 2, ",", "."));

                                    }
                                    else
                                    {
                                        echo('R$ '.number_format(floatval($rows[$cont]->preco), 2, ",", "."));
                                    }
                                    ?>
                                </h2>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="hotelQuarto.php?idHotel=<?php echo($rows[$cont]->idHotel) ?>"><div class="btnReservar">RESERVAR</div></a></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <?php
                $cont++;
            }

         ?>



        <div class="infoBuscaBox" style="margin-top: 25px; padding-bottom: 10px;">
            <span class="qtdResultados">12/150 Hotéis</span>
            <div class="paginacao">
                <a href="#">&laquo;</a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">7</a>
                <a href="#">8</a>
                <a href="#">9</a>
                <a href="#">&raquo;</a>
            </div>
            <div class="ordenacao">
                <select name="slcOrdenacao">
                    <option value="relevancia" selected>Ordenar por: Relevância</option>
                    <option value="menorpreco">Ordenar por: Menor preço</option>
                    <option value="maiorpreco">Ordenar por: Maior preço</option>
                    <option value="avaliacao">Ordenar por: Avaliação</option>
                </select>
            </div>
        </div>

    </div>
</section>
