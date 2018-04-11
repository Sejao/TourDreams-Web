<?php
    if($_SESSION['login'] != 'true')
    {
        header('location: homepage.php');
    }
    //Inclusão do arquivo controller para fazer o SELECT.
    require_once('controllers/usuarios_controller.php');

    /*Instância do objeto da controller e chamada para metódo de listagem
    dos registros*/
    $controller_usuario = new ControllerUsuario();
    $usuario = $controller_usuario -> Buscar($_SESSION['idLogin']);

    $msg = '';

    if(isset($_GET['erro']))
    {
        $msg = "Ocorreu um erro na edição de seus dados. Tente novamente.";
    }

    if(isset($_GET['erroperm']))
    {
        $msg = "Ocorreu um erro no envio da imagem. Tente novamente.";
    }

    if(isset($_GET['erroformato']))
    {
        $msg = "Formato de arquivo não permitido. Formatos permitidos: jpg, jpeg, png e gif.";
    }

?>
<div class="comentariosInsert">
  <div class="alinhamentoComentario">
    <div class="tituloComentario">
      <div class="isolamento">
          Adicionar Comentário
      </div>
      <div class="button">
        <img src="imagens\perfilparceiro\close-button.svg" alt="" onclick="fecharModalComentario()">
      </div>
    </div>
    <div class="conteudoComentario">
      <form class="" action="index.html" method="post">
        <table>

          <tr>
            <td>
              <textarea name="name" ></textarea>
            </td>
          </tr>
          <tr>
            <td>
              <input  class="buttonSalvarComentario"type="submit" name="" value="Salvar">
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<section>


    <!--Caixa de conteúdo-->
    <div id="perfilBox">
        <div id="conteudoEsquerdo">
            <!--Dados do perfil-->
            <div id="dadosPerfil">
                <div id="imagem" onclick="abrirModalEditar()">
                    <img src="<?php echo($usuario->caminhoImg); ?>" alt="Imagem do Usuário"/>
                    <div>TROCAR IMAGEM</div>
                </div>
                <table>
                    <tr>
                        <th>
                            <?php echo ($usuario->nome); ?> <img src="imagens/perfilUsuario/edit.ico" alt="Editar Perfil" onclick="abrirModalEditar()"><img src="imagens/perfilUsuario/delete.png" alt="Excluir Conta" onclick="abrirModalExcluir()"><a href="router.php?controller=deslogar"><img src="imagens/perfilUsuario/logout.png" alt="Fazer Logout"></a>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <?php echo ($usuario->email) ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo ($usuario->telefone) ?></td>
                    </tr>
                    <tr>
                        <td>
                            Procura viajar para: <?php echo ($usuario->tipoLocal); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tem viajado para: campo
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Você possui <span><?php echo ($usuario->milhasPontuacao); ?></span> pontos Milhas Travel Fidelidade
                        </td>
                    </tr>
                    <tr>
                        <td><div id="msg"><?php echo ($msg); ?></span></td>
                    </tr>
                </table>
            </div>
            <!---->
            <!--Histórico de transações-->
            <div id="historicoBox">
                <table class="sortable">
                    <tr>
                        <th>Hotel</th>
                        <th>Data Entrada</th>
                        <th>Data Saída</th>
                        <th>Valor Total</th>
                        <th>Status</th>
                        <th>Plataforma</th>
                    </tr>
                    <?php
                        $lstReservas = new ControllerUsuario();
                        $lstReservas->idCliente = $_SESSION['idCliente'];
                        $row2 = $lstReservas->ListarReservas();

                        $contador = 0;

                        while($contador < count($row2)){

                     ?>
                    <tr>
                        <td><?php echo($row2[$contador]->hotel); ?></td>
                        <td><?php echo(implode("/",array_reverse(explode("-",$row2[$contador]->dataEntrada)))); ?></td>
                        <td><?php echo(implode("/",array_reverse(explode("-",$row2[$contador]->dataSaida)))); ?></td>
                        <td>R$ <?php echo(number_format($row2[$contador]->vlrTotal,2,",",".")); ?></td>
                        <td><?php echo($row2[$contador]->status); ?></td>
                        <td><?php echo($row2[$contador]->plataforma); ?></td>
                    </tr>
                    <?php
                            $contador++;
                        }
                     ?>
                </table>

            </div>
            <!---->
        </div>
        <!--Última viagem-->
        <div id="conteudoDireito">
            <?php
            $lstUltimaReserva = new ControllerUsuario();
            $lstUltimaReserva->idCliente = $_SESSION['idCliente'];
            $row3 = $lstUltimaReserva->ListarUltimaReserva();

            ?>
            <div id="ultimaViagem"><span>Sua última viagem</span></div>
            <div id="imagemUltimaViagem"><img src="<?php echo($row3->caminhoImagem); ?>" alt="Última viagem"></div>
            <div id="nomeHotel"><span><?php echo($row3->hotel); ?></span></div>
            <div id="estrelas">
            <?php

                $cont = 1;
                while ($cont <= $row3->qtdEstrelas)
                {
                    ?>
                        <img src="imagens/busca/estrela.png" alt="">
                    <?php
                    $cont += 1;
                }
             ?>
            </div>
            <table>
                <tr>
                    <td><?php echo($row3->logradouro." N° ".$row3->numero.", ".$row3->bairro.", ".$row3->cidade." - ".$row3->uf); ?></td>
                </tr>
                <tr>
                    <td><?php echo($row3->nomeParceiro) ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Data de Início: <?php echo(implode("/",array_reverse(explode("-",$row3->dataEntrada)))); ?></td>
                </tr>
                <tr>
                    <td>Data de Saída: <?php echo(implode("/",array_reverse(explode("-",$row3->dataSaida)))); ?></td>
                </tr>
                <tr>
                    <td>Valor: <?php echo(number_format($row3->vlrTotal,2,",",".")); ?></td>
                </tr>
            </table>


            <div class="comentario" onclick="abrirModalComentario()">
              Deixar um comentário sobre <?php echo($row3->cidade); ?>
            </div>

        </div>
        <!---->
    </div>
    <!---->
    <div id="modalExcluir">
        <div id="cabecalhoModalExcluir">
            Deseja mesmo excluir sua conta?
        </div>
        <table>
            <tr>
                <td colspan="2">
                    <p>
                        Esse processo não pode ser desfeito.
                    </p>
                </td>
            </tr>
            <form action="router.php?controller=usuario&modo=excluir&idLogin=<?php echo($_SESSION['idLogin']) ?>" method="post">
            <tr>
                <td>
                    <input type="submit" name="btnExcluir" value="Sim">
                </td>
                <td>
                    <input type="button" onclick="fecharModalExcluir()" value="Não">
                </td>
            </tr>
            </form>
        </table>
    </div>
    <div id="modalEditar">
        <form action="router.php?controller=usuario&modo=editar&idLogin=<?php echo($_SESSION['idLogin']) ?>" method="post" enctype="multipart/form-data">
        <div id="conteudoModalEditar">
            <table>
                <tr>
                    <td>
                        <label>Nome</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="txtNome" value="<?php echo($usuario->nome) ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="email" name="txtEmail" value="<?php echo($usuario->email); ?>" required>
                    </td>
                </tr>
                <?php
                    if($usuario->rg == '')
                    {
                        ?>
                        <tr><td><label>CPF</label></td></tr>
                        <tr><td><input type="text" name="txtCpf" value="<?php echo($usuario->cpf); ?>" required></td></tr>
                        <?php
                    }
                    else
                    {
                        ?>
                        <tr><td><label>RG</label></td></tr>
                        <tr><td><input type="text" name="txtRg" value="<?php echo($usuario->rg); ?>" required></td></tr>
                        <?php
                    }
                 ?>
                 <tr>
                     <td>
                         <label>Telefone</label>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         <input type="tel" name="txtTelefone" value="<?php echo($usuario->telefone); ?>" required>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         <label>Local que procura frequentemente</label>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         <select name="slcTipoLocal" required>
                             <?php
                                $sql = "SELECT * FROM tbl_tipodelocal WHERE idTipoDeLocal <> 1";
                                $select = mysql_query($sql);
                                while($rows=mysql_fetch_array($select))
                                {
                                    ?>
                                    <option value="<?php echo($rows['idTipoDeLocal']) ?>"><?php echo ($rows['TipoDeLocal']) ?></option>
                                    <?php
                                }

                             ?>
                         </select>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         <input type="hidden" name="txtIdCliente" value="<?php echo($usuario->idCliente) ?>">
                         <input type="hidden" name="txtIdTelefone" value="<?php echo($usuario->idTelefone) ?>">
                     </td>
                 </tr>
            </table>
        </div>
        <div id="imgBox">
            <table>
                <tr>
                    <td colspan="2">
                        <img src="<?php echo($usuario->caminhoImg) ?>" alt="Usuário" id="imgPreview">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="file" name="filImg" id="filImg" onchange="readURL(this)" accept="image/jpeg, image/gif, image/x-png">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="button" onclick="fecharModalEditar()" value="Cancelar">
                    </td>
                    <td>
                        <input type="submit" name="btnEditarUsuario" value="Editar">
                    </td>
                </tr>
            </table>
        </div>
        </form>
    </div>
</section>
