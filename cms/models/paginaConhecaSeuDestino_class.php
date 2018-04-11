<?php



  class Conheca{
    public function __construct()
    {
    
        require_once('models/db_class.php');
        $conexao_db = new Mysql_db;
        $conexao_db->conectar();
    }

    public function SelectConheca(){

      $sql = "select * from tbl_imagem where idImagem = 179 ";
      $select = mysql_query($sql);
      if ($rs=mysql_fetch_array($select)) {

          $lstConheca = new Conheca();
          $lstConheca->caminhoImagem=$rs['caminhoImagem'];
          
          return $lstConheca;
              
      }



    
    }
    public function UpDateConheca(){


        $sql = "update tbl_imagem set caminhoImagem = '".$this->caminhoImg."' where idImagem= 179; ";
        mysql_query($sql) or die(mysql_error());




    }

  }
   
    

?>
