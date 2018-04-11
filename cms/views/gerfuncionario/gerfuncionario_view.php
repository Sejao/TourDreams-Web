<?php

    $idFuncionario = "";
    $nome = "";
    $email = "";
    $cpf = "";
    $rg = "";
    $action = "inserir";
    $botao="Salvar";


?>

<div class="bgModalFuncionario">
    <div class="caixaFormulario">
        <div class="headerModal">
            <h1>Cadastro de Funcionário</h1><h2 onclick="fecharModalFuncionarios()">X</h2>
        </div>
        <div class="divFormulario">


            <?php
                  $nome = null;
                  $cpf = null;
                  $email = null;
                  $senha = null;
                  $login = null;
                  $rg = null;



                  if(isset($_GET['modo'])){
                    if ($_GET['modo']=='visualizar') {
                      $nome = $result->nome;
                      $cpf = $result->cpf;
                      $email = $result->email;
                      $senha = $result->senha;
                      $login = $result->login;
                      $rg = $result->rg;
                    $botao = "Editar";
                        $idNivel = $_GET['idNivel'];
                        $idImagem = $_GET['idImagem'];

                        $action="editar&idFuncionario=".$_GET['idFuncionario']."&idLogin=".$_GET['idLogin']."&idNivel=".$_GET['idNivel']."&idImagem=".$_GET['idImagem'];
                    }
                  }


            ?>

            <form name="frmCadastroFunionario" class="frmCadastroFunionario" action="router.php?controller=funcionario&modo=<?php echo($action); ?>" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label>Login</label></td>
                    </tr>
                    <tr>
                        <td><input placeholder="Digite seu Login" type="text" name="txtLogin" value="<?php echo($login); ?>"></td>
                    </tr>
                    <tr>
                        <td><label>Senha</label></td>
                    </tr>
                    <tr>
                        <td><input placeholder="Digite sua senha" type="password" name="txtSenha" value="<?php echo($senha); ?>"></td>
                    </tr>
                    <tr>
                        <td><label>Nome</label></td>
                    </tr>
                    <tr>
                        <td><input placeholder="Ex.: Seu Nome" type="text" name="txtNome" value="<?php echo($nome); ?>"></td>
                    </tr>
                    <tr>
                        <td><label>Email</label></td>
                    </tr>
                    <tr>
                        <td><input placeholder="Ex.: seuemail@email.com" type="email" name="txtEmail" value="<?php echo($email); ?>"></td>
                    </tr>
                    <tr>
                        <td><label>CPF</label></td>
                    </tr>
                    <tr>
                        <td><input placeholder="Ex.: 000.000.000-00" type="text" name="txtCPF" value="<?php echo($cpf); ?>"></td>
                    </tr>
                    <tr>
                        <td><label>RG</label></td>
                    </tr>
                    <tr>
                        <td><input placeholder="Ex.: 00.000.000-0" type="text" name="txtRG" value="<?php echo($rg); ?>"></td>
                    </tr>
                    <tr>
                        <td><label>Nível de funcionário</label></td>
                    </tr>
                    <tr>
                        <td>
                            <select class="sltNivel" name="sltNivel">


                                 <?php
                                     require_once('controllers/funcionario_controller.php');

                                    $controller_funcionario= new ControllerFuncionario();
                                    $rows = $controller_funcionario -> ListarNivel();

                                    $contador = 0;

                                    while ($contador < count($rows)) {

                                        if($idNivel == $rows[$contador]->selectIdNivel){
                                            $marcar = "selected";
                                        }else{
                                            $marcar = "";
                                        }

                                ?>

                                <option <?php echo($marcar); ?> value="<?php echo($rows[$contador]->selectIdNivel) ?>"><?php echo($rows[$contador]->selectNivel) ?></option>


                                <?php
                                    $contador++;
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Imagem de Perfil</label></td>
                    </tr>
                    <tr>
                        <td><input type="file" name="fileFoto"></td>
                    </tr>

                    <tr>
                        <td><input type="submit" name="btn" value="<?php echo($botao); ?>"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>


<div class="sectionfuncionario">
    <div id="titulo">
        Gerenciamento de Funcionários
    </div>
    <div id="buscaFuncionario">
        <input placeholder="Buscar funcionário" type="text" name="bscFuncionario">
    </div>
    <div class ="boxdetalhes">
     <table>
        <tr>
            <td class="td_titulos">
                Imagem

            </td>
            <td class="td_titulos">
                Nome

            </td>
            <td class="td_titulos">
                CPF

            </td>
            <td class="td_titulos">
                Login

            </td>
            <td class="td_titulos">
                Email

            </td>
            <td class="td_titulos">
                Nível

            </td>
             <td class="td_titulos" >
                       Opções
            </td>

        </tr>
        <?php
             require_once('controllers/funcionario_controller.php');

            $controller_funcionario= new ControllerFuncionario();
            $rs = $controller_funcionario -> Listar();

            $cont = 0;

            while ($cont < count($rs)) {

        ?>
             <tr>
                 <td class="img">
                    <img src="<?php echo($rs[$cont]->caminhoImagem) ?>" >
                 </td>
                 <td class="tdcontas">
                     <?php echo($rs[$cont]->nome); ?>
                 </td>
                 <td class="tdcontas">
                     <?php echo($rs[$cont]->cpf); ?>
                 </td>
                 <td class="tdcontas">
                     <?php echo($rs[$cont]->login); ?>
                 </td>
                 <td class="tdcontas">
                     <?php echo($rs[$cont]->email); ?>
                 </td>
                 <td class="tdcontas">
                     <?php echo($rs[$cont]->nivel); ?>
                 </td>
                 <td class="tdcontas">
                    <a href="router.php?controller=funcionario&modo=visualizar&idFuncionario=<?php echo($rs[$cont]->idFuncionario); ?>&idLogin=<?php echo($rs[$cont]->idLogin); ?>&idNivel=<?php echo($rs[$cont]->idNivel); ?>&idImagem=<?php echo($rs[$cont]->idImagem); ?>"><img src="imagens/edit.png"></a>
                     <a href="router.php?controller=funcionario&modo=excluir&idFuncionario=<?php echo($rs[$cont]->idFuncionario); ?>&idLogin=<?php echo($rs[$cont]->idLogin); ?>"><img src="imagens/delete.png"></a>
                 </td>
            </tr>

        <?php
            $cont++;
        }
    ?>
        </table>
    </div>

    <div id="btnCadastrar" onclick="abrirModalFuncionarios()">
        <h1>Cadastrar Funcionário</h1>
    </div>


</div>
