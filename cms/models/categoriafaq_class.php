<?php

  class CategoriaFaq{
      
    public $idCategoriaFaq;  
    public $categoriaFaq;  
      
      
      
    public function __construct()
    {
        //Inclui o arquivo de conexão com o banco de dados.
        require_once('models/db_class.php');
        //Instancia a classe Mysql_db.
        $conexao_db = new Mysql_db;
        //Chama o método conectar para estabelecer a conexão com o BD.
        $conexao_db->conectar();
    }
      
      
      
         public function Insert($categoriafaq)
        {
            $sql = 'INSERT INTO tbl_categoriafaq (categoriaFaq) VALUES ("'.$categoriafaq->categoriaFaq.'")';
            if(mysql_query($sql))
            {
                return 'ok';
            }
            else
            {
                return 'erro';
            }
            
        }
      
      

    public function SelectCategoriaFaq(){

      $sql = 'select * from tbl_categoriafaq';
       
      $select = mysql_query($sql);

      $cont = 0;


      while ($rs=mysql_fetch_array($select)) {
          
        $listCategoriaFaq[] = new CategoriaFaq();

      $listCategoriaFaq[$cont]->idCategoriaFaq= $rs['idCategoriaFaq'];
        $listCategoriaFaq[$cont]->categoriaFaq = $rs['categoriaFaq'];
        
        $cont +=1;
      }
       return $listCategoriaFaq;
    }

    public function Delete($categoriafaq){
      $sql = "DELETE FROM tbl_categoriafaq where idCategoriaFaq=".$categoriafaq->idCategoriaFaq.";";
      if(mysql_query($sql)){
        return 'ok';
      }
      else {
        return 'erro';

      }
    }

    public function SelectById($categoriafaq){
      $sql = "select * from tbl_categoriafaq WHERE idCategoriaFaq=".$categoriafaq->idCategoriaFaq;
      $select = mysql_query($sql);

      if($rs=mysql_fetch_array($select)){

        $categoriafaq = new CategoriaFaq();

        $categoriafaq->categoriaFaq=$rs['categoriaFaq'];       
      }

         return  $categoriafaq;
    }

    public function Update($categoriafaq){

   
      $sql = "UPDATE tbl_categoriafaq set categoriaFaq='".$categoriafaq->categoriaFaq."' Where idCategoriaFaq= ".$categoriafaq->idCategoriaFaq;
        
        if(mysql_query($sql))
        {
            return 'ok';
        }else
        {
            return 'erro';
        }
  

    }

  }



 ?>
