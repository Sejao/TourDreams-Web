<?php
    
  class ComodidadesQuarto{
      
    public $idComodidade;  
    public $nomeComodidade;  
 
      
      
    public function __construct()
    {
        //Inclui o arquivo de conexão com o banco de dados.
        require_once('models/db_class.php');
        //Instancia a classe Mysql_db.
        $conexao_db = new Mysql_db;
        //Chama o método conectar para estabelecer a conexão com o BD.
        $conexao_db->conectar();
    }
      
      
      
         public function Insert($comodidadesquarto)
        {
            $sql = 'INSERT INTO tbl_comodidadesquarto (nomeComodidade) VALUES ("'.$comodidadesquarto->nomeComodidade.'")';
            
         
            if(mysql_query($sql))
            {
                return 'ok';
            }
            else
            {
                return 'erro';
            }
            
        }
      
      

    public function SelectComodidadesQuarto(){
        

      $sql = 'select * from tbl_comodidadesquarto';
      $select = mysql_query($sql);

      $cont = 0;
               
      while ($rs=mysql_fetch_array($select)) {
  
        $listComodidadesQuarto[] = new ComodidadesQuarto(); 
          
        $listComodidadesQuarto[$cont]->idComodidade = $rs['idComodidade'];
        $listComodidadesQuarto[$cont]->nomeComodidade=$rs['nomeComodidade'];
      
    
        $cont +=1;
       
      }
       
      
           return $listComodidadesQuarto;
     
    }

    public function Delete($comodidadesquarto){
      $sql = "DELETE FROM tbl_comodidadesquarto where idComodidade=".$comodidadesquarto->idComodidade.";";
      if(mysql_query($sql)){
        return 'ok';
      }
      else {
        return 'erro';

      }
    }

    public function SelectById($comodidadesquarto){
      $sql = "select * from tbl_comodidadesquarto WHERE idComodidade=".$comodidadesquarto->idComodidade;
      $select = mysql_query($sql);

      if($rs=mysql_fetch_array($select)){

        $comodidadesquarto = new ComodidadesQuarto();

        $comodidadesquarto->nomeComodidade=$rs['nomeComodidade'];
       
       
      }

         return  $comodidadesquarto;
    }

    public function Update($comodidadesquarto){

   
      $sql = "UPDATE tbl_comodidadesquarto set nomeComodidade='".$comodidadesquarto->nomeComodidade."'Where idComodidade= ".$comodidadesquarto->idComodidade;
        
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
