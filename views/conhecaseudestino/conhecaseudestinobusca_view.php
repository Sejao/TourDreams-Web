<section class="sectionnn">
  <div class="auxiliar">

    <?php

    require_once('controllers/buscarDestino_controller.php');
    require_once('models/buscarDestino_class.php');

    $controllerBuscarDestino = new ControllerBuscarDestino();
    $rows = $controllerBuscarDestino->Buscar();

    $cont = 0;

    while ($cont < count($rows)) {

     ?>

    <div class="conteudo">
      <div class="fotoPessoa">
        <div class="foto">
          <div class="fotinhaMulher">

          </div>
        </div>
        <div class="titulo">
          <div class="nome">
            <table>
              <tr>
                <td class="nomePessoa">
                  <?php echo ($rows[$cont]->nomeCliente); ?>
                </td>
              </tr>
              <tr>
                <td class="subtitulo">
                  Publicou, sobre <?php echo ($rows[$cont]->cidade); ?>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="comentario">
        <div class="alinhamento">
          "<?php echo ($rows[$cont]->mensagem);?>"
        </div>
      </div>
      <div class="estrelinhas">
        <img src="imagens/busca/estrela.png">
        <img src="imagens/busca/estrela.png">
        <img src="imagens/busca/estrela.png">
        <img src="imagens/busca/estrela.png">
        <img src="imagens/busca/estrelaa.png">

      </div>
    </div>
    <?php

    $cont++;

    }

     ?>
</div>
</section>
