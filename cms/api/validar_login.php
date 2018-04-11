<?php
require_once('../models/db_class.php');
//Instancia a classe Mysql_db.
$conexao_db = new Mysql_db;
//Chama o método conectar para estabelecer a conexão com o BD.
$conexao_db->conectar();
if (isset($_POST['login'])) {
   $login = $_POST['login'];

   $sql = "SELECT login FROM tbl_login WHERE login='".$login."';";
   $select = mysql_query($sql);
   if(mysql_num_rows($select) > 0) {
       die('<img src="imagens/naook.svg" id="imgvalidacao"/><span id="msgnaook">Login indisponível</span>');
   }
   else
   {
       die('<img src="imagens/ok.svg" id="imgvalidacao"/><span id="msgok">Login disponível</span>');
   }
}
?>
