<?php
class Mysql_db
{
    //Atributos para estabelecer a conexão com o BD.
    public $server;
    public $user;
    public $password;

    //Construtor ou método mágico é criado utilizando dois caracteres '_'.
    public function __construct()
    {
        $this->server = 'dbtourdreams.mysql.uhserver.com';
        $this->user = 'sixcode';
        $this->password = 'tourdreams@127';

    }

    //Método para conectar no banco de dados
    public function conectar()
    {
        /*  Estabelece a conexão com o banco de dados. Se a conexão for bem
        sucedida, exibe uma mensagem de erro e destrói a conexão.
        */
        if ($conexao = mysql_connect($this->server, $this->user, $this->password))
        {
			mysql_set_charset('utf8');
            mysql_select_db('dbtourdreams');
            return $conexao;

        }
        else
        {
            echo ('Erro na conexão com o banco de dados. Tente novamente ou
            entre em contato com o administrador.');
            die();
        }
    }

    //Método desconecta do banco de dados.
    public function desconectar()
    {
        mysql_close($conexao);
    }
}
?>
