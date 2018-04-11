<?php
class FaleConosco
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
        public function SelectGeral()
        {
            $sql = 'SELECT * FROM vw_faleconosco WHERE categoria="geral";';
            $select = mysql_query($sql);

            $cont = 0;

            /*Laço de repetição para armazenar os registros do banco de dados em
            um array de objetos*/
            while($rs=mysql_fetch_array($select))
            {
                //Instância da classe Contato, criando uma coleção de objetos
                $listFaleConosco[] = new FaleConosco();

                /*Armazena em cada objeto um registro do banco de dados
                referenciando pelo índice $cont*/
                $listFaleConosco[$cont]->idFormulario = $rs['idFormulario'];
                $listFaleConosco[$cont]->nome = $rs['nome'];
                $listFaleConosco[$cont]->email = $rs['email'];
                $listFaleConosco[$cont]->mensagem = $rs['mensagem'];
                $listFaleConosco[$cont]->telefone = $rs['telefone'];
                $listFaleConosco[$cont]->categoria = $rs['categoria'];

                $cont += 1;
            }

            return $listFaleConosco;
        }

        public function SelectConta()
        {
            $sql = 'SELECT * FROM vw_faleconosco WHERE categoria="conta";';
            $select = mysql_query($sql);

            $cont = 0;

            /*Laço de repetição para armazenar os registros do banco de dados em
            um array de objetos*/
            while($rs=mysql_fetch_array($select))
            {
                //Instância da classe Contato, criando uma coleção de objetos
                $listFaleConosco[] = new FaleConosco();

                /*Armazena em cada objeto um registro do banco de dados
                referenciando pelo índice $cont*/
                $listFaleConosco[$cont]->idFormulario = $rs['idFormulario'];
                $listFaleConosco[$cont]->nome = $rs['nome'];
                $listFaleConosco[$cont]->email = $rs['email'];
                $listFaleConosco[$cont]->mensagem = $rs['mensagem'];
                $listFaleConosco[$cont]->telefone = $rs['telefone'];
                $listFaleConosco[$cont]->categoria = $rs['categoria'];

                $cont += 1;
            }

            return $listFaleConosco;
        }

        public function SelectReservas()
        {
            $sql = 'SELECT * FROM vw_faleconosco WHERE categoria="reservas";';
            $select = mysql_query($sql);

            $cont = 0;

            /*Laço de repetição para armazenar os registros do banco de dados em
            um array de objetos*/
            while($rs=mysql_fetch_array($select))
            {
                //Instância da classe Contato, criando uma coleção de objetos
                $listFaleConosco[] = new FaleConosco();

                /*Armazena em cada objeto um registro do banco de dados
                referenciando pelo índice $cont*/
                $listFaleConosco[$cont]->idFormulario = $rs['idFormulario'];
                $listFaleConosco[$cont]->nome = $rs['nome'];
                $listFaleConosco[$cont]->email = $rs['email'];
                $listFaleConosco[$cont]->mensagem = $rs['mensagem'];
                $listFaleConosco[$cont]->telefone = $rs['telefone'];
                $listFaleConosco[$cont]->categoria = $rs['categoria'];

                $cont += 1;
            }

            return $listFaleConosco;
        }

        public function SelectFeedback()
        {
            $sql = 'SELECT * FROM vw_faleconosco WHERE categoria="feedback";';
            $select = mysql_query($sql);

            $cont = 0;

            /*Laço de repetição para armazenar os registros do banco de dados em
            um array de objetos*/
            while($rs=mysql_fetch_array($select))
            {
                //Instância da classe Contato, criando uma coleção de objetos
                $listFaleConosco[] = new FaleConosco();

                /*Armazena em cada objeto um registro do banco de dados
                referenciando pelo índice $cont*/
                $listFaleConosco[$cont]->idFormulario = $rs['idFormulario'];
                $listFaleConosco[$cont]->nome = $rs['nome'];
                $listFaleConosco[$cont]->email = $rs['email'];
                $listFaleConosco[$cont]->mensagem = $rs['mensagem'];
                $listFaleConosco[$cont]->telefone = $rs['telefone'];
                $listFaleConosco[$cont]->categoria = $rs['categoria'];

                $cont += 1;
            }

            return $listFaleConosco;
        }

        public function Delete($faleconosco)
        {
            $sql = "DELETE FROM tbl_formulario WHERE idFormulario = ".$faleconosco->idFormulario.";";
            if (mysql_query($sql)) {
                return 'ok';
            }
            else
            {
                return 'erro';
            }
        }
}
?>
