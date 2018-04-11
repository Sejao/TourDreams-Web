<?php

    class Funcionario{


        public $idFuncionario;
        public $idLogin;
        public $nome;
        public $email;
        public $cpf;
        public $rg;
        public $idImagem;
        public $caminhoImagem;
        public $idNivel;
        public $nivel;
        public $login;
        public $senha;
        public $uploadfile;
        public $upload_ext;
        public $selectIdNivel;
        public $selectNivel;


        public function __construct()
        {
            //Inclui o arquivo de conexão com o banco de dados.
            require_once('models/db_class.php');
            //Instancia a classe Mysql_db.
            $conexao_db = new Mysql_db;
            //Chama o método conectar para estabelecer a conexão com o BD.
            $conexao_db->conectar();
        }


        public function InserirFuncionario($funcionario)
        {

            if($funcionario->caminhoImagem != null){

                $sql = "insert into tbl_imagem(caminhoImagem) values('".$funcionario->caminhoImagem."')";
                if(mysql_query($sql)){
                    $sql = "SELECT LAST_INSERT_ID() as idImagem";
                    $select = mysql_query($sql);
                    if($rs = mysql_fetch_array($select)){
                        $idImagem = $rs['idImagem'];

                        $sql = "INSERT INTO tbl_login(login, senha, idTipoLogin) VALUES('".$funcionario->login."','".$funcionario->senha."', 3);";
                        mysql_query($sql);
                            $sql = "SELECT LAST_INSERT_ID() as idLogin";
                            $select = mysql_query($sql);
                                if($rs = mysql_fetch_array($select)){
                                    $idLogin = $rs['idLogin'];
                                        $sql = "INSERT INTO tbl_funcionario(nomeFuncionario,idImagem,cpf,rg,emailFuncionario,idLogin,idNivelFuncionario) VALUES('".$funcionario->nome."',".$idImagem.",'".$funcionario->cpf."','".$funcionario->rg."','".$funcionario->email."',".$idLogin.",".$funcionario->idNivel.")";
                                        echo($sql);
										mysql_query($sql)or die(mysql_error());
                                }


                    }

                }


            }else {
                $sql = "INSERT INTO tbl_login(login, senha, idTipoLogin) VALUES('".$funcionario->login."','".$funcionario->senha."', 3);";
                mysql_query($sql);
                    $sql = "SELECT LAST_INSERT_ID() as idLogin";
                    $select = mysql_query($sql);
                        if($rs = mysql_fetch_array($select)){
                            $idLogin = $rs['idLogin'];
                                $sql = "INSERT INTO tbl_funcionario(nomeFuncionario,idImagem,cpf,rg,emailFuncionario,idLogin,idNivelFuncionario) VALUES('".$funcionario->nome."',1,'".$funcionario->cpf."','".$funcionario->rg."','".$funcionario->email."',".$idLogin.",".$funcionario->idNivel.")";
                                mysql_query($sql);
                        }
            }







        }


        public function SelectAll()
        {
            $sql="SELECT f.idLogin, f.idImagem, f.idNivelFuncionario, f.idFuncionario, f.nomeFuncionario, f.cpf, f.emailFuncionario, l.login, i.caminhoImagem, n.nivel from tbl_funcionario as f INNER JOIN tbl_login as l ON f.idLogin = l.idLogin INNER JOIN tbl_imagem as i ON f.idImagem = i.idImagem INNER JOIN tbl_nivelfuncionario as n ON f.idNivelFuncionario = n.idNivelFuncionario";

            $select = mysql_query($sql);

          $cont = 0;


          while ($rs=mysql_fetch_array($select)) {

            $listFuncionario[] = new Funcionario();

            $listFuncionario[$cont]->nome = $rs['nomeFuncionario'];
            $listFuncionario[$cont]->idLogin = $rs['idLogin'];
            $listFuncionario[$cont]->idFuncionario = $rs['idFuncionario'];
            $listFuncionario[$cont]->cpf = $rs['cpf'];
            $listFuncionario[$cont]->email = $rs['emailFuncionario'];
            $listFuncionario[$cont]->login = $rs['login'];
            $listFuncionario[$cont]->nivel = $rs['nivel'];
            $listFuncionario[$cont]->idImagem = $rs['idImagem'];
            $listFuncionario[$cont]->caminhoImagem = $rs['caminhoImagem'];
            $listFuncionario[$cont]->idNivel = $rs['idNivelFuncionario'];

            $cont +=1;
          }
           return $listFuncionario;

        }


        public function Deletar($funcionario){

            $sql = "delete from tbl_funcionario where idFuncionario=".$funcionario->idFuncionario.";";
            mysql_query($sql);

            $sql = "delete from tbl_login where idLogin =".$funcionario->idLogin.";";
            mysql_query($sql);

        }


        public function SelectById($funcionario){

            $sql = "SELECT f.idNivelFuncionario, f.idLogin ,f.idFuncionario, f.nomeFuncionario, f.rg, f.cpf, f.emailFuncionario, l.senha, l.login, i.caminhoImagem, n.nivel from tbl_funcionario as f INNER JOIN tbl_login as l ON f.idLogin = l.idLogin INNER JOIN tbl_imagem as i ON f.idImagem = i.idImagem INNER JOIN tbl_nivelfuncionario as n ON f.idNivelFuncionario = n.idNivelFuncionario where idFuncionario=".$funcionario->idFuncionario.";";

            $select = mysql_query($sql);

            if($rs = mysql_fetch_array($select)){

                $lista = new Funcionario();

                $lista->nome=$rs['nomeFuncionario'];
                $lista->idLogin=$rs['idLogin'];
                $lista->idFuncionario=$rs['idFuncionario'];
                $lista->rg=$rs['rg'];
                $lista->cpf=$rs['cpf'];
                $lista->email=$rs['emailFuncionario'];
                $lista->login=$rs['login'];
                $lista->senha=$rs['senha'];
                $lista->nivel=$rs['nivel'];


                return $lista;



            }

        }



        public function Editar($funcionario){

            if($funcionario->caminhoImagem != null){

                $sql = "update tbl_imagem set caminhoImagem ='".$funcionario->caminhoImagem."' where idImagem=".$funcionario->idImagem;
                if(mysql_query($sql)){

                        $sql = "UPDATE tbl_login set login='".$funcionario->login."', senha='".$funcionario->senha."' WHERE idLogin=".$funcionario->idLogin;
                         mysql_query($sql);
                         $sql = "UPDATE tbl_funcionario set nomeFuncionario='".$funcionario->nome."', cpf='".$funcionario->cpf."', rg='".$funcionario->rg."', emailFuncionario='".$funcionario->email."', idNivelFuncionario=".$funcionario->idNivel." where idFuncionario= ".$funcionario->idFuncionario;

                         mysql_query($sql);

                         header('location:gerfuncionario.php');
                    }



            }else{

                $sql = "UPDATE tbl_login set login='".$funcionario->login."', senha='".$funcionario->senha."' WHERE idLogin=".$funcionario->idLogin;
                 mysql_query($sql);
                 $sql = "UPDATE tbl_funcionario set nomeFuncionario='".$funcionario->nome."', cpf='".$funcionario->cpf."', rg='".$funcionario->rg."', emailFuncionario='".$funcionario->email."', idNivelFuncionario=".$funcionario->idNivel." where idFuncionario= ".$funcionario->idFuncionario;

                 mysql_query($sql);

                 header('location:gerfuncionario.php');


            }
        }





        public function SelectNivel()
        {
            $sql="SELECT * from tbl_nivelfuncionario";

            $select = mysql_query($sql);

          $cont = 0;


          while ($rs=mysql_fetch_array($select)) {

            $listNivel[] = new Funcionario();

            $listNivel[$cont]->selectIdNivel = $rs['idNivelFuncionario'];
            $listNivel[$cont]->selectNivel = $rs['nivel'];


            $cont +=1;
          }
           return $listNivel;

        }


    }


?>
