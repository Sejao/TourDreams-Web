
  <?php
  require_once('../models/db_class.php');
  //Instancia a classe Mysql_db.
  $conexao_db = new Mysql_db;
  //Chama o método conectar para estabelecer a conexão com o BD.
  $conexao_db->conectar();
  if (isset($_POST['parceiro'])) {
     $idParceiro = $_POST['parceiro'];

     $sql = "SELECT * FROM tbl_parceiro AS p INNER JOIN tbl_imagem AS i ON i.idImagem=p.idImagem WHERE idParceiro='".$idParceiro."';";
     $select = mysql_query($sql);
     if($rows=mysql_fetch_array($select)) {
         die('<div class="parceiroBox">
             <div class="imagemParceiro">
                 <img src="'.$rows['caminhoImagem'].'" alt="'.$rows['nomeParceiro'].'">
             </div>
             <div class="nomeParceiro">
               '.$rows['nomeParceiro'].'
             </div>
         </div>
         <div id="btnParceiro" onclick="abrirDetalhesParceiro('.$rows['idParceiro'].')">
             VER DETALHES
         </div>');
     }
  }
  ?>
