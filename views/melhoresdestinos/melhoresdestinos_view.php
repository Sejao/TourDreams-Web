<?php

  require_once('controllers/melhoresDestinos_controller.php');
  $listMelhores = new ControllerMelhoresDestinos();
  $listUltimas = new ControllerMelhoresDestinos();


  $row = $listMelhores->ListarMelhoresDestinos();
  $rowUltimas = $listUltimas->ListarUltimaReserva();



 ?>
<section id="sectionUltimasReservas">
    <div id="contSuperior">
        <!--Imagem banner superior-->
        <div id="divBanner">

            <h2 class="wow fadeInUp"  data-wow-delay="0.3s">Só aqui você encontra os melhores destinos</h2>
            <img class="wow fadeIn"  alt="" src="<?php echo($row->caminhoImagem);?>"  onmousedown="return false">
        </div>
        <!---->
        <!--Recomendações baseadas nas últimas reservas-->
        <div class="divDivisoria">
            Baseado nas últimas reservas
        </div>
        <div class="divUltimas">
            <div id="segura">
                <section>
                    <?php
                        $cont = 0;
                        while($cont < count($rowUltimas)){
                    ?>
                        <script type="text/javascript">
                            var largura = 460 * <?php echo(count($rowUltimas)); ?>;
                            $('#segura').css("width",largura + "px");
                        </script>
                        <div class="divHotel">
                            <div class="fotoHotel">
                                <img alt="" src="<?php echo($rowUltimas[$cont]->caminhoImagem) ?>"  onmousedown="return false">
                            </div>
                            <div class="contHotel">
                                <table class="tblInfoHotel">
                                    <tr>
                                        <td>
                                            <?php echo($rowUltimas[$cont]->hotel); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo($rowUltimas[$cont]->cidade." - ".$rowUltimas[$cont]->uf); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo($rowUltimas[$cont]->logradouro." - N° ".$rowUltimas[$cont]->numero); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php

                                                $i = 0;
                                                while($i < $rowUltimas[$cont]->qtdEstrelas ){
                                            ?>
                                                <img alt="" src="imagens/busca/estrela.png">
                                            <?php
                                                    $i++;
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <?php
                            $cont++;
                        }
                    ?>
                </section>
            </div>
        </div>
        <button onclick="moverEsquerda(this)" id="btn-prev">&#60;</button>
        <button onclick="moverDireita(this)" id="btn-next">&#62;</button>
        <!---->
    </div>
</section>
<!--Recomendações baseadas no perfil do usuário-->
<section id="sectionBaseadoPerfil">
    <div id="contInferior">
        <div class="divDivisoria" style="line-height:1;height:50px; margin-top: 10px;">
            Baseado no seu perfil
        </div>
        <div class="divUltimas">
            <div id="segura2">
                <section>
                    <?php
                        $listPerfil = new ControllerMelhoresDestinos();
                        $rowPerfil = $listPerfil->ListarBaseadoPerfil();
                        $contador2 = 0;
                        while($contador2 < count($rowPerfil)){
                    ?>
                    <script type="text/javascript">
                        var largura2 = 460 * <?php echo(count($rowPerfil)) ?>;
                        $('#segura2').css("width",largura2 + "px");

                    </script>
                    <div class="divHotel">
                        <div class="fotoHotel">
                            <img alt="" src="<?php echo($rowPerfil[$contador2]->caminhoImagemPerfil) ?>"  onmousedown="return false">
                        </div>
                        <div class="contHotel">
                            <table class="tblInfoHotel">
                                <tr>
                                    <td>
                                        <?php echo($rowPerfil[$contador2]->hotelPerfil); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo($rowPerfil[$contador2]->cidadePerfil." - ".$rowPerfil[$contador2]->ufPerfil); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo($rowPerfil[$contador2]->logradouroPerfil." - N° ".$rowPerfil[$contador2]->numeroPerfil); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php

                                            $x = 0;
                                            while($x < $rowPerfil[$contador2]->qtdEstrelasPerfil ){
                                        ?>
                                            <img alt="" src="imagens/busca/estrela.png">
                                        <?php
                                                $x++;
                                            }
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php
                            $contador2++;
                        }
                    ?>
                </section>
            </div>
        </div>
        <button onclick="moverEsquerda2(this)" id="btn-ant">&#60;</button>
        <button onclick="moverDireita2(this)" id="btn-prox">&#62;</button>
    </div>
</section>
<!---->
