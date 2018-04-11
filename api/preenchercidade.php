<?php
require_once('../models/db_class.php');
//Instancia a classe Mysql_db.
$conexao_db = new Mysql_db;
//Chama o método conectar para estabelecer a conexão com o BD.
$conexao_db->conectar();
if (isset($_POST['idEstado'])) {
    $idEstado = $_POST['idEstado'];

   $sql = "select * from tbl_cidade where idEstado=".$idEstado.";";
   $select = mysql_query($sql);


  if(mysql_num_rows($select) > 0)
  {
      $stringHTML =
         "<tr>
            <td>
             <select name='sltCidade'>";
      while($rows=mysql_fetch_array($select)) {

          $idCidade = $rows['idCidade'];
          $cidade = $rows['cidade'];
          $stringHTML = $stringHTML.


          "<option value='".$idCidade."'>".$cidade."</option>";
      }
      $stringHTML.'</select>
                        </td>
                        </tr>';
  }else{
      @$stringHTML = "<tr><td><select name='sltCidade'><option>Selecione uma cidade</option></select></td></tr>";
  }


  @die($stringHTML);
}
?>
