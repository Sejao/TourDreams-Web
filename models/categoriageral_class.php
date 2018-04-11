<?php

  class CategoriaGeral{
      
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
    


    public function SelectCategoria(){
      $sql = "select * from tbl_categoriafaq";
      $select = mysql_query($sql);
        
          
        $cont=0;
        while($rs=mysql_fetch_array($select)){

        $categoriageral[] = new CategoriaGeral();

        $categoriageral[$cont]->categoriaFaq=$rs['categoriaFaq'];
        $categoriageral[$cont]->idCategoria=$rs['idCategoriaFaq'];
        
        $cont++;    
       
      }

         return  $categoriageral;
    }
      
      
      public function SelectPergunta(){
      $sql = "select * from tbl_faq as f
            WHERE idCategoriaFaq =".$this->idCategoria.";";
      $select = mysql_query($sql);
        
          
          
        $cont=0;
        while($rs=mysql_fetch_array($select)){
            
            
        $listpergunta[] = new CategoriaGeral();

        $listpergunta[$cont]->pergunta=$rs['pergunta'];
        $listpergunta[$cont]->idFaq=$rs['idFaq'];

        
        $cont++;    
       
      }
          if(mysql_num_rows($select)>0){
          
         return  $listpergunta;
          }else{
              
              
          }
    }

  }



 ?>
