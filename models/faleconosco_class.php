<?php
class FaleConosco
    {
        /*  Criação dos atributos iguais aos campos na tabela tbl_cadastro no
        banco de dados.
        */

        public $idCategoriaFormulario;
        public $nome;
        public $email;
        public $telefone;
        public $mensagem;

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

        public function Insert($form)
        {
            $sql = "INSERT INTO tbl_telefone (telefone, idTipoTelefone) VALUES (
            '".$form->telefone."', '2')";
            if (mysql_query($sql)) {

                $sql = "SELECT LAST_INSERT_ID() AS idTelefone";
                if ($select = mysql_query($sql)) {
                    if($rows = mysql_fetch_array($select))
                    {
                        $idTelefone = $rows['idTelefone'];
                        $sql = "INSERT INTO tbl_formulario(nomeFormulario, emailFormulario, mensagemFormulario, idTelefoneFormulario, idCategoriaFormulario)
                        VALUES ('".$form->nome."', '".$form->email."', '".$form->mensagem."', '".$idTelefone."', '".$form->idCategoriaFormulario."')";
                        if (mysql_query($sql)) {
                            return 'ok';
                        }
                        else {
                            return 'erro';
                        }

                    }
                }
            }
        }

        public function SelectFale(){

          $sql = " select * from vw_paginafaleconosco";

          $select = mysql_query($sql);
          if($rs=mysql_fetch_array($select)){
            $listar = new FaleConosco();
            $listar->contato=$rs['Contato'];
            $listar->faq=$rs['FAQ'];
            $listar->duvida=$rs['Duvida'];
            $listar->geral=$rs['Geral'];
            $listar->conta=$rs['Conta'];
            $listar->reserva=$rs['Reserva'];
            $listar->feedback=$rs['FeedBack'];
            $listar->background=$rs['Background'];

            return $listar;

          }

        }
}
?>
