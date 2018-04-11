<?php
require_once('../models/db_class.php');
//Instancia a classe Mysql_db.
$conexao_db = new Mysql_db;
//Chama o método conectar para estabelecer a conexão com o BD.
$conexao_db->conectar();
if (isset($_POST['idQuarto'])) {
    $idQuarto = $_POST['idQuarto'];


   $sql = "select * from tbl_quarto where idQuarto=".$idQuarto.";";
   $select = mysql_query($sql);


  if(mysql_num_rows($select) > 0)
  {
      $stringHTML =
         '<div class="contModal">';
      while($rows=mysql_fetch_array($select)) {

          $idQuarto = $rows['idQuarto'];



          '';
      }
      $stringHTML.'</table>';
  }else{
       $stringHTML =
       '<table>
        <tr>
            <td><h1>Este hotel não possui quartos</h1></td>
        </tr>
       </table>';
  }


  die($stringHTML);
}



?>
