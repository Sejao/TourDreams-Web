  <?php
  require_once('../models/db_class.php');
  //Instancia a classe Mysql_db.
  $conexao_db = new Mysql_db;
  //Chama o método conectar para estabelecer a conexão com o BD.
  $conexao_db->conectar();
  if (isset($_POST['funcionario'])) {
     $nome = $_POST['funcionario'];

     $sql = "SELECT f.idLogin, f.idImagem, f.idNivelFuncionario, f.idFuncionario, f.nomeFuncionario, f.cpf, f.emailFuncionario, l.login, i.caminhoImagem, n.nivel from tbl_funcionario as f INNER JOIN tbl_login as l ON f.idLogin = l.idLogin INNER JOIN tbl_imagem as i ON f.idImagem = i.idImagem INNER JOIN tbl_nivelfuncionario as n ON f.idNivelFuncionario = n.idNivelFuncionario WHERE f.nomeFuncionario LIKE '".$nome."%'";
     $select = mysql_query($sql);
     $stringHTML =
        '<table>
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
        </tr>';
    if(mysql_num_rows($select) > 0)
    {
        while($rows=mysql_fetch_array($select)) {
            $stringHTML = $stringHTML.
               '<tr>
                   <td class="img">
                       <img src="'.$rows['caminhoImagem'].'"
                   </td>
                   <td class="tdcontas">
                       '.$rows['nomeFuncionario'].'
                   </td>
                   <td class="tdcontas">
                       '.$rows['cpf'].'
                   </td>
                   <td class="tdcontas">
                       '.$rows['login'].'
                   </td>
                   <td class="tdcontas">
                       '.$rows['emailFuncionario'].'
                   </td>
                   <td class="tdcontas">
                       '.$rows['nivel'].'
                   </td>
                   <td class="contas">
                       <a href="router.php?controller=funcionario&modo=visualizar&idFuncionario='.$rows['idFuncionario'].'&idLogin='.$rows['idLogin'].'&idNivel='.$rows['idNivelFuncionario'].'&idImagem='.$rows['idImagem'].'"><img src="imagens/edit.png"></a>
                       <a href="router.php?controller=funcionario&modo=excluir&idFuncionario='.$rows['idFuncionario'].'&idLogin='.$rows['idLogin'].'"><img src="imagens/delete.png"></a>
                   </td>
               </tr>';
        }
    }
     $stringHTML.'</table>';
     die($stringHTML);
  }
  ?>
