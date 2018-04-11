<?php
class Login
    {
        /*  Criação dos atributos iguais aos campos na tabela tbl_cadastro no
        banco de dados.
        */

        public $login;
        public $senha;
        public $nomeFuncionario;
        public $nivel;

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

        //Método para inserir um novo registro.
        public function Auth($login)
        {
            $sql = "SELECT * FROM vw_logincms WHERE tipoLogin='cms' AND login='".$login->login."' AND senha='".$login->senha."'";
            if ($select = mysql_query($sql))
            {
                if($rows=mysql_fetch_array($select))
                {
                    $returnlogin = new Login();
                    $returnlogin->nomeFuncionario=$rows['nomeFuncionario'];
                    $returnlogin->login=$rows['login'];
                    $returnlogin->senha=$rows['senha'];
                    $returnlogin->nivel=$rows['nivel'];

                    return $returnlogin;
                }
                else
                {
                    return 'null';
                }
            }
            else
            {
                return 'db';
            }
        }
}
?>
