<?php
class Usuario
    {
        /*  Criação dos atributos iguais aos campos na tabela tbl_cadastro no
        banco de dados.
        */

        public $idFormulario;
        public $nome;
        public $email;
        public $mensagem;
        public $telefone;
        public $categoria;

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

        public function SelectId($form)
        {
            $sql = 'SELECT * FROM vw_faleconosco WHERE idFormulario='.$form->idFormulario;
            $select = mysql_query($sql);
            if($rows=mysql_fetch_array($select))
            {
                $faleconosco = new FaleConosco();
                $faleconosco->idFormulario = $rows['idFormulario'];
                $faleconosco->nome = $rows['nome'];
                $faleconosco->email = $rows['email'];
                $faleconosco->mensagem = $rows['mensagem'];
                $faleconosco->telefone = $rows['telefone'];
                $faleconosco->categoria = $rows['categoria'];


            }
            return $faleconosco;
        }

        //Método para inserir um novo registro.
        public function SelectAll()
        {
            $sql = 'SELECT * FROM vw_usuario;';
            $select = mysql_query($sql);

            $cont = 0;

            /*Laço de repetição para armazenar os registros do banco de dados em
            um array de objetos*/
            while($rs=mysql_fetch_array($select))
            {
                //Instância da classe Contato, criando uma coleção de objetos
                $lstUsuario[] = new Usuario();

                /*Armazena em cada objeto um registro do banco de dados
                referenciando pelo índice $cont*/
                $lstUsuario[$cont]->idUsuario = $rs['idCliente'];
                $lstUsuario[$cont]->nome = $rs['nomeCliente'];
                $lstUsuario[$cont]->telefone = $rs['telefone'];
                $lstUsuario[$cont]->tipoLocal = $rs['tipoLocal'];
                $cont += 1;
            }

            return $lstUsuario;
        }

}
?>
