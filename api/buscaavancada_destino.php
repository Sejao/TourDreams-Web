<?php
require_once('../models/db_class.php');
//Instancia a classe Mysql_db.
$conexao_db = new Mysql_db;
//Chama o método conectar para estabelecer a conexão com o BD.
$conexao_db->conectar();
if (isset($_POST['busca'])) {
   $destino = $_POST['busca'];

   $sql = "SELECT cidade, estado, idCidade FROM tbl_cidade AS C INNER JOIN tbl_estado AS E ON C.idEstado=E.idEstado WHERE cidade LIKE '$destino%' LIMIT 5";

   $select = mysql_query($sql);
   echo '

<ul>

   ';

   while ($rows = mysql_fetch_array($select)) {
       $cidade = $rows['cidade'];
       $cidade = str_replace("'", "&apos;", $cidade);
       ?>
   <li onclick='preencherAvancado("<?php echo $cidade; ?>")'>

   <a>
   <?php echo $rows['cidade'].', '.$rows['estado']; ?>
   </a></li>
   <?php
}}
?>
