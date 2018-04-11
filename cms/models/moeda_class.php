<?php
class Moeda
    {
        /*  Criação dos atributos iguais aos campos na tabela tbl_cadastro no
        banco de dados.
        */
        public $idMoeda;
        public $nome;
        public $valor;

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

        public function Insert($moeda)
        {
            $sql = 'INSERT INTO tbl_moeda (moeda, valor, simbolo) VALUES ("'.$moeda->nome.'","'.$moeda->valor.'", "'.$moeda->simbolo.'")';
            if(mysql_query($sql))
            {
                return 'ok';
            }
            else
            {
                return 'erro';
            }
        }

        public function Update($moeda)
        {
            $sql = 'UPDATE tbl_moeda SET moeda="'.$moeda->nome.'", valor='.$moeda->valor.', simbolo="'.$moeda->simbolo.'" WHERE idMoeda='.$moeda->idMoeda;
            if(mysql_query($sql))
            {
                return 'ok';
            }
            else
            {
                return 'erro';
            }
        }

        public function SelectById($moeda_class)
        {
            $sql = 'SELECT * FROM tbl_moeda WHERE idMoeda='.$moeda_class->idMoeda;
            $select = mysql_query($sql);
            if($rows=mysql_fetch_array($select))
            {
                $moeda = new Moeda();
                $moeda->idFormulario = $rows['idMoeda'];
                $moeda->nome = $rows['moeda'];
                $moeda->valor = $rows['valor'];
                $moeda->simbolo = $rows['simbolo'];
            }
            return $moeda;
        }

        //Método para inserir um novo registro.
        public function SelectAll()
        {
            $sql = 'SELECT * FROM tbl_moeda;';
            $select = mysql_query($sql);

            $cont = 0;

            /*Laço de repetição para armazenar os registros do banco de dados em
            um array de objetos*/
            while($rs=mysql_fetch_array($select))
            {
                //Instância da classe Contato, criando uma coleção de objetos
                $lstMoeda[] = new Moeda();

                /*Armazena em cada objeto um registro do banco de dados
                referenciando pelo índice $cont*/
                $lstMoeda[$cont]->idMoeda = $rs['idMoeda'];
                $lstMoeda[$cont]->nome = $rs['moeda'];
                $lstMoeda[$cont]->valor = $rs['valor'];
                $lstMoeda[$cont]->simbolo = $rs['simbolo'];
                $cont += 1;
            }

            return $lstMoeda;
        }

        public function Delete($moeda)
        {
            $sql = 'DELETE FROM tbl_moeda WHERE idMoeda='.$moeda->idMoeda;
            if(mysql_query($sql))
            {
                return 'ok';
            }
            else
            {
                return 'erro';
            }
        }

}
?>
