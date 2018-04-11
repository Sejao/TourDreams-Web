<?php
    require_once('controllers/conhecaseudestino_controller.php');
    require_once('models/conhecaseudestino_class.php');

    $ControllerConhecaseuDestinoImagem = new ControllerConhecaseuDestino();
    $rows = $ControllerConhecaseuDestinoImagem->ListarImagem();




        ?>
<section id="section">
  <div class="principal">
    <div  class="isolamentoPartedeCima">
      <img src="<?php echo($rows->caminhoImagem) ?>" alt="">
      <div class="absolute">
        <div class="titulo">

          <div class="tituloum wow fadeInUp" >
            Conheça seu Destino
          </div>

        </div>
        <div class="barradepesquisa">
          <form method="post" action="conhecaseudestinobusca.php" autocomplete="off">
          <div class="alinharbarra">
            <table>
              <tr>
                <td>
                  <input class="barra" size="80" placeholder="Buscar Destino" name="txtBuscarDestino" id="txtBuscarDestino">
                  <div id="buscaConheca">
                  </div>
              </td>
              <td>
                  <input class="botao" type="image" alt="img" src="imagens/pesquisar.png" >
              </td>
            </tr>
          </table>
          </div>
        </form>
        </div>
      </div>
    </div>
    <div class="pardebaixo">
      <div class="titulodois">
        <div class="linhaesquerda"></div>
        <div class="letras">
          Mais pesquisados
        </div>
        <div class="linhadireita"></div>
      </div>
      <div class="cont">
          <?php
              require_once('controllers/conhecaseudestino_controller.php');
              require_once('models/conhecaseudestino_class.php');

              $ControllerConhecaseuDestino = new ControllerConhecaseuDestino();
              $rows = $ControllerConhecaseuDestino->Listar();

              $cont = 0;

              while ($cont < count ($rows)) {


                  ?>
                    <a href="hotelQuarto.php?idHotel=<?php echo($rows[$cont]->idHotel) ?>">
                      <div class="maispesquisados">
                        <div class="imagem">
                          <img class="img" src="<?php echo($rows[$cont]->caminhoImagem) ?>" alt="<?php echo($rows[$cont]->hotel) ?>">
                        </div>
                        <div class="direito">
                          <div class="titulohotel">
                            <?php echo($rows[$cont]->hotel); ?>
                          </div>
                          <div class="contConheca">
                            <div class="estrelinhas">
                              <?php
                                $estrelas = 0;
                                while ($estrelas<$rows[$cont]->qtdEstrelas)
                                {
                                    ?><img alt="" src="imagens/busca/estrela.png"><?php
                                    $estrelas += 1;
                                }
                               ?>
                            </div>
                            <table>
                                <tr>
                                    <td><?php echo($rows[$cont]->logradouro.', '.$rows[$cont]->numero) ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo($rows[$cont]->bairro) ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo($rows[$cont]->cidade.' - '.$rows[$cont]->uf) ?></td>
                                </tr>
                            </table>
                          </div>
                          <div class="valor">
                            <span><?php echo('R$ '.$rows[$cont]->valorMinimo) ?></span>
                          </div>
                        </div>
                      </div>
                  </a>
                  <?php
                  $cont++;
              }

           ?>
      </div>
    </div>
  </div>
</section>
