<?php
require_once('../models/db_class.php');
//Instancia a classe Mysql_db.
$conexao_db = new Mysql_db;
//Chama o método conectar para estabelecer a conexão com o BD.
$conexao_db->conectar();
if (isset($_POST['idFaq'])) {
    $idFaq = $_POST['idFaq'];
    
   

   $sql = "select * from tbl_faq where idFaq=".$idFaq.";";
   $select = mysql_query($sql);


  if(mysql_num_rows($select) > 0)
  {
      $stringHTML = "<div>";
         
      while($rows=mysql_fetch_array($select)) {

          $resposta = $rows['resposta'];
        
          $stringHTML = $stringHTML.$resposta;


          
      }
      $stringHTML.'</div>';
  }else{
      
  }


  die($stringHTML);
}