<?php

  class Faq{

    public $idFaq;
    public $pergunta;
    public $resposta;
    public $idCategoriaFaq;



    public function __construct()
    {
        //Inclui o arquivo de conexão com o banco de dados.
        require_once('models/db_class.php');
        //Instancia a classe Mysql_db.
        $conexao_db = new Mysql_db;
        //Chama o método conectar para estabelecer a conexão com o BD.
        $conexao_db->conectar();
    }



         public function Insert($faq)
        {
            $sql = 'INSERT INTO tbl_faq (pergunta, resposta, idCategoriaFaq) VALUES ("'.$faq->pergunta.'","'.$faq->resposta.'","'.$faq->idCategoriaFaq.'")';
            if(mysql_query($sql))
            {
                return 'ok';
            }
            else
            {
                return 'erro';
            }

        }



    public function SelectFaq(){

      $sql = 'SELECT * FROM vw_faqcms';

      $select = mysql_query($sql);

      $cont = 0;


      while ($rs=mysql_fetch_array($select)) {

        $listFaq[] = new Faq();

        $listFaq[$cont]->idFaq = $rs['idFaq'];
        $pergunta = $rs['pergunta'];
        if(strlen($pergunta) >= 20)
        {
            $pergunta = $pergunta . '(...)';
        }
        $listFaq[$cont]->pergunta = $pergunta;
        $resposta =  $rs['resposta'];
        if(strlen($resposta) >= 20)
        {
            $resposta = $resposta . '(...)';
        }
        $listFaq[$cont]->resposta =$resposta;
        $listFaq[$cont]->categoriaFaq= $rs['categoriaFaq'];

        $cont +=1;
      }
       return $listFaq;
    }

    public function Delete($faq){
      $sql = "DELETE FROM tbl_faq where idFaq=".$faq->idFaq.";";
      if(mysql_query($sql)){
        return 'ok';
      }
      else {
        return 'erro';

      }
    }

    public function SelectById($faq){
      $sql = "select * from tbl_faq WHERE idFaq=".$faq->idFaq;
      $select = mysql_query($sql);

      if($rs=mysql_fetch_array($select)){

        $faq = new Faq();

        $faq->pergunta=$rs['pergunta'];
        $faq->resposta=$rs['resposta'];
        $faq->idCategoriaFaq=$rs['idCategoriaFaq'];

      }

         return  $faq;
    }

    public function Update($faq){


      $sql = "UPDATE tbl_faq set pergunta='".$faq->pergunta."',resposta='".$faq->resposta."', idCategoriaFaq='".$faq->idCategoriaFaq."' Where idFaq= ".$faq->idFaq;

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
