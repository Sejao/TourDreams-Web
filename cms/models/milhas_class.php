<?php

  class Milhas{
      
    public $idRecompensa;  
    public $valorPontos;  
    public $desconto;  
      
      
      
    public function __construct()
    {
        //Inclui o arquivo de conexão com o banco de dados.
        require_once('models/db_class.php');
        //Instancia a classe Mysql_db.
        $conexao_db = new Mysql_db;
        //Chama o método conectar para estabelecer a conexão com o BD.
        $conexao_db->conectar();
    }
      
      
      
         public function Insert($milhas)
        {
            $sql = 'INSERT INTO tbl_milhasrecompensa (valorPontos, desconto) VALUES ("'.$milhas->valorPontos.'","'.$milhas->desconto.'")';
            if(mysql_query($sql))
            {
                return 'ok';
            }
            else
            {
                return 'erro';
            }
            
        }
      
      

    public function SelectMilhas(){

      $sql = 'select * from tbl_milhasrecompensa';
       
      $select = mysql_query($sql);

      $cont = 0;


      while ($rs=mysql_fetch_array($select)) {

        $listMilhas[] = new Milhas();

        $listMilhas[$cont]->idRecompensa = $rs['idRecompensa'];
        $listMilhas[$cont]->valorPontos = $rs['valorPontos'];
        $listMilhas[$cont]->desconto = $rs['desconto'];
    
        $cont +=1;
      }
       return $listMilhas;
    }

    public function Delete($milhas){
      $sql = "DELETE FROM tbl_milhasrecompensa where idRecompensa=".$milhas->idRecompensa.";";
      if(mysql_query($sql)){
        return 'ok';
      }
      else {
        return 'erro';

      }
    }

    public function SelectById($milhas){
      $sql = "select * from tbl_milhasrecompensa WHERE idRecompensa=".$milhas->idRecompensa;
      $select = mysql_query($sql);

      if($rs=mysql_fetch_array($select)){

        $milhas = new Milhas();

        $milhas->valorPontos=$rs['valorPontos'];
        $milhas->desconto=$rs['desconto'];
       
      }

         return  $milhas;
    }

    public function Update($milhas){

   
      $sql = "UPDATE tbl_milhasrecompensa set valorPontos='".$milhas->valorPontos."', desconto='".$milhas->desconto."'Where idRecompensa= ".$milhas->idRecompensa;
        
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
