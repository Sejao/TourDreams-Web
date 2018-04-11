<?php
class Login
    {
        /*  Criação dos atributos iguais aos campos na tabela tbl_cadastro no
        banco de dados.
        */

        public $login;
        public $senha;
        public $idParceiro;

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
            $sql = "SELECT * FROM vw_tipologin WHERE login='".$login->login."' AND senha='".$login->senha."'";
            if ($select = mysql_query($sql))
            {
                if($rows=mysql_fetch_array($select))
                {
                    $tipoLogin = $rows['tipoLogin'];
                    $idLogin = $rows['idLogin'];
                    $returnLogin = new Login;

                    if($tipoLogin == 'usuario')
                    {
                        $sql = "SELECT * FROM vw_loginusuario WHERE idLogin=".$idLogin;
                        if($select = mysql_query($sql))
                        {
                            if($rows=mysql_fetch_array($select))
                            {
                                $returnLogin->nome=$rows['nomeCliente'];
                                $returnLogin->login=$rows['login'];
                                $returnLogin->senha=$rows['senha'];
                                $returnLogin->idCliente=$rows['idCliente'];
                                $returnLogin->caminhoImagem=$rows['caminhoImagem'];
                                $returnLogin->tipoLogin=$tipoLogin;
                                $returnLogin->idLogin=$idLogin;
                            }
                        }
                    }
                    else if($tipoLogin == 'parceiro')
                    {
                        $sql = "SELECT * FROM vw_loginparceiro WHERE idLogin=".$idLogin;
                        if($select = mysql_query($sql))
                        {
                            if($rows=mysql_fetch_array($select))
                            {
                                $returnLogin->nome=$rows['nomeParceiro'];
                                $returnLogin->login=$rows['login'];
                                $returnLogin->senha=$rows['senha'];
                                $returnLogin->caminhoImagem=$rows['caminhoImagem'];
                                $returnLogin->idParceiro=$rows['idParceiro'];
                                $returnLogin->idLogin=$idLogin;
                                $returnLogin->tipoLogin=$tipoLogin;
                            }
                        }
                    }
                    return $returnLogin;
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
