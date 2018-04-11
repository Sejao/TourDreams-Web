<?php
    
  class ComodidadesHotel{
      
    public $idComodidadeHotel;  
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
      
      
      
         public function Insert($comodidadeshotel)
        {
            $sql = 'INSERT INTO tbl_comodidadeshotel (nomeComodidade) VALUES ("'.$comodidadeshotel->nomeComodidade.'")';
            
         
            if(mysql_query($sql))
            {
                return 'ok';
            }
            else
            {
                return 'erro';
            }
            
        }
      
      

    public function SelectComodidadesHotel(){
        

      $sql = 'select * from tbl_comodidadeshotel';
      $select = mysql_query($sql);

      $cont = 0;
               
      while ($rs=mysql_fetch_array($select)) {
  
        $listComodidadesHotel[] = new ComodidadesHotel(); 
          
        $listComodidadesHotel[$cont]->idComodidadeHotel = $rs['idComodidadeHotel'];
        $listComodidadesHotel[$cont]->nomeComodidade=$rs['nomeComodidade'];
      
    
        $cont +=1;
       
      }
       
      
           return $listComodidadesHotel;
     
    }

    public function Delete($comodidadeshotel){
      $sql = "DELETE FROM tbl_comodidadeshotel where idComodidadeHotel=".$comodidadeshotel->idComodidadeHotel.";";
      if(mysql_query($sql)){
        return 'ok';
      }
      else {
        return 'erro';

      }
    }

    public function SelectById($comodidadeshotel){
      $sql = "select * from tbl_comodidadeshotel WHERE idComodidadeHotel=".$comodidadeshotel->idComodidadeHotel;
      $select = mysql_query($sql);

      if($rs=mysql_fetch_array($select)){

        $comodidadeshotel = new ComodidadesHotel();

        $comodidadeshotel->nomeComodidade=$rs['nomeComodidade'];
       
       
      }

         return  $comodidadeshotel;
    }

    public function Update($comodidadeshotel){

   
      $sql = "UPDATE tbl_comodidadeshotel set nomeComodidade='".$comodidadeshotel->nomeComodidade."' Where idComodidadeHotel= ".$comodidadeshotel->idComodidadeHotel;
    mysql_query($sql);    
   
  

    }

  }



 ?>
