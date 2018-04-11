<?php

  class Parceiro{

    public $login;
    public $senha;
    public $nome;
    public $email;
    public $cnpj;
    public $telefone;
    public $idParceiro;
    public $caminhoImg;

    //Método construtor da classe
    public function __construct()
    {
        //Inclui o arquivo de conexão com o banco de dados.
        require_once('models/db_class.php');
        //Instancia a classe Mysql_db.
        $conexao_db = new Mysql_db;
        //Chama o método conectar para estabelecer a conexão com o BD.
        $conexao_db->conectar();
    }

    public function Insert($parceiro_class){

      $sql = "INSERT INTO tbl_login(login, senha, idTipoLogin) VALUES(
        '".$parceiro_class->login."','".$parceiro_class->senha."',2)";
          mysql_query($sql);
            $sql = "SELECT LAST_INSERT_ID() AS idLogin";
              $select = mysql_query($sql);
                if($rows = mysql_fetch_array($select)){
                  $idLogin = $rows['idLogin'];
                  $sql = "INSERT INTO tbl_telefone(telefone, idTipoTelefone) VALUES(
                    '".$parceiro_class->telefone."',1)";
                    mysql_query($sql);
                      $sql = "SELECT LAST_INSERT_ID() AS idTelefone";
                      $select = mysql_query($sql);
                        if($rows = mysql_fetch_array($select)){
                          $idTelefone = $rows['idTelefone'];
                          $sql = "INSERT INTO tbl_imagem (caminhoImagem) VALUES ('imagens/usuario/padrao.png');";
                          mysql_query($sql);
                          $sql = "SELECT LAST_INSERT_ID() AS idImagem";
                          $select = mysql_query($sql);
                          if($rows = mysql_fetch_array($select))
                          {
                              $idImagem = $rows['idImagem'];
                              $sql = "INSERT INTO tbl_parceiro(cnpj, nomeParceiro, idImagem, idLogin, emailParceiro) VALUES('".$parceiro_class->cnpj."', '".$parceiro_class->nome."',".$idImagem.",".$idLogin.",'".$parceiro_class->email."')";
                              if(mysql_query($sql)){
                                return 'ok';
                              }else {
                                return 'erro';
                            }
                          }
                        }
                }


    }


    public function SelectById($parceiro){
      $sql = "SELECT * FROM vw_loginparceiro WHERE idLogin=".$parceiro->idLogin;
      $select = mysql_query($sql);

      if($rs=mysql_fetch_array($select)){

        $listar = new Parceiro();

        $listar->nome=$rs['nomeParceiro'];
        $listar->idParceiro=$rs['idParceiro'];
        $listar->caminhoImg=$rs['caminhoImagem'];

        return  $listar;
      }
  }



  }
 ?>
