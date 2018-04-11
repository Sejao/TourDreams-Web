<section>
    <div id="conteudo">
        <div id="titulopagina">Nossos parceiros</div>
            <div id="melhoresParceirosBox">
                <?php
                  require_once('controllers/parceirosDestaque_controller.php');

                  $controllerParceiro_destaque = new ControllerParceiroDestaque();
                  $rows = $controllerParceiro_destaque->Listar();
                  $cont = 0;

                  while ($cont < count($rows)) {
                 ?>
                    <div class="parceiroBox" onclick="abrirDetalhesParceiro(<?php echo($rows[$cont]->idParceiro); ?>)">
                        <div class="imagemParceiro">
                            <img src="<?php echo($rows[$cont]->imagem); ?>" alt="<?php echo($rows[$cont]->nome); ?>">
                        </div>
                        <div class="nomeParceiro">
                            <?php echo($rows[$cont]->nome); ?>
                        </div>
                    </div>
                <?php
                $cont += 1;
                }
                 ?>
             </div>
         <div id="selectParceiroBox">
             <div id="tituloParceiro">
                 Selecione um parceiro
             </div>
             <select id="slcBuscaParceiro">
                 <?php
                     require_once('controllers/parceirosDestaque_controller.php');

                     $controllerParceiro_destaque = new ControllerParceiroDestaque();
                     $rows = $controllerParceiro_destaque->Listar();

                     $x = 0;
                     while ($x < count($rows)) {

                   ?>
                   <option value="<?php echo ($rows[$x]->idParceiro); ?>" ><?php echo ($rows[$x]->nome); ?></option>
                   <?php
                     $x++;
                     }
                   ?>
             </select>
             <div id="conteudoBuscaParceiro">
             </div>
    </div>
    <div id="modalParceiro">
        <div id="tituloModalParceiro">
            <span>Nome</span>
        </div>
        <div id="fecharModalParceiro">
            <span onclick="fecharDetalhesParceiro()">X</span>
        </div>
        <div id="conteudoModalParceiro">
        </div>
    </div>
</div>
</section>
