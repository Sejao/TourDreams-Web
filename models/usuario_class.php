<?php

  class Usuario{

    public $login;
    public $senha;
    public $nome;
    public $email;
    public $cpf;
    public $rg;
    public $telefone;
    public $tipoLocal;

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

    public function SelectReservas(){

        $sql = "select t.idTransacao, t.dataInicio, t.dataFim, t.vlrTotal, t.status, p.nome, h.hotel
                from tbl_transacao as t
                inner join tbl_quarto as q
                on t.idQuarto = q.idQuarto
                inner join tbl_hotel as h
                on q.idHotel = h.idHotel
                inner join tbl_plataforma as p
                on t.idPlataforma = p.idPlataforma where t.idCliente =".$this->idCliente." order by t.dtTransacao desc;";

        $select = mysql_query($sql);

        $cont = 0;
        if(mysql_num_rows($select) > 0){

            while($rs = mysql_fetch_array($select)){

                $lstreserva[] = new Usuario();

                $lstreserva[$cont]->hotel = $rs['hotel'];
                $lstreserva[$cont]->dataEntrada = $rs['dataInicio'];
                $lstreserva[$cont]->dataSaida = $rs['dataFim'];
                $lstreserva[$cont]->vlrTotal = $rs['vlrTotal'];
                $lstreserva[$cont]->status = $rs['status'];
                $lstreserva[$cont]->plataforma = $rs['nome'];
                $lstreserva[$cont]->idTransacao = $rs['idTransacao'];

                $cont++;

            }

            return $lstreserva;

        }else{
            echo "Não há reservas!";
        }


    }

    public function SelectUltimaReserva(){

        $sql = "select t.idTransacao,t.dataInicio, t.dataFim, t.vlrTotal, h.hotel, h.qtdEstrelas, l.logradouro, l.numero,b.bairro,c.idCidade, c.cidade,e.uf,p.nomeParceiro, i.caminhoImagem
                from tbl_transacao as t
                inner join tbl_quarto as q
                on t.idQuarto = q.idQuarto
                inner join tbl_hotel as h
                on q.idHotel = h.idHotel
                inner join tbl_logradouro as l
                on h.idLogradouro = l.idLogradouro
                inner join tbl_bairro as b
                on l.idBairro = b.idBairro
                inner join tbl_cidade as c
                on b.idCidade = c.idCidade
                inner join tbl_estado as e
                on c.idEstado = e.idEstado
                inner join tbl_parceiro as p
                on h.idParceiro = p.idParceiro
                inner join tbl_imagem as i
                inner join tbl_hotelimagem as hi
                on hi.idHotel = h.idHotel and hi.idImagem = i.idImagem
                where t.idCliente =".$this->idCliente."
                group by t.idTransacao
                order by t.idTransacao desc limit 1;";

        $select = mysql_query($sql);

        if($rs = mysql_fetch_array($select)){

            $listReserva = new Usuario();

            $listReserva->dataEntrada = $rs['dataInicio'];
            $listReserva->dataSaida = $rs['dataFim'];
            $listReserva->vlrTotal = $rs['vlrTotal'];
            $listReserva->hotel = $rs['hotel'];
            $listReserva->qtdEstrelas = $rs['qtdEstrelas'];
            $listReserva->logradouro = $rs['logradouro'];
            $listReserva->numero = $rs['numero'];
            $listReserva->bairro = $rs['bairro'];
            $listReserva->cidade = $rs['cidade'];
            $listReserva->caminhoImagem = $rs['caminhoImagem'];
            $listReserva->uf = $rs['uf'];
            $listReserva->nomeParceiro = $rs['nomeParceiro'];

            return $listReserva;

        }


    }


    public function Insert($usuario){

        $sql = "INSERT INTO tbl_login(login, senha, idTipoLogin) VALUES(
        '".$usuario->login."','".$usuario->senha."','1')";
          if(mysql_query($sql)){
            $sql = "SELECT LAST_INSERT_ID() AS idLogin";
              if($select = mysql_query($sql)){
                if($rows = mysql_fetch_array($select)){
                  $idLogin = $rows['idLogin'];
                  $sql = "INSERT INTO tbl_telefone(telefone, idTipoTelefone) VALUES(
                    '".$usuario->telefone."','2')";
                    if(mysql_query($sql)){
                      $sql = "SELECT LAST_INSERT_ID() AS idTelefone";
                      if($select = mysql_query($sql)){
                        if($rows = mysql_fetch_array($select)){
                          $idTelefone = $rows['idTelefone'];

                          $sql = "INSERT INTO tbl_imagem(caminhoImagem) VALUES('imagens/usuario/padrao.png')";
                          if(mysql_query($sql))
                          {
                              $sql = "SELECT LAST_INSERT_ID() AS idImagem";
                              if($select = mysql_query($sql))
                              {
                                  if($rows=mysql_fetch_array($select))
                                  {
                                      $idImagem = $rows['idImagem'];
                                      $sql = "INSERT INTO tbl_cliente(cpf, rg, nomeCliente, idImagem, idLogin, emailCliente, idTipoDeLocal, idTelefone)
                                      VALUES('".$usuario->cpf."', '".$usuario->rg."', '".$usuario->nome."', '".$idImagem."', '".$idLogin."','".$usuario->email."', '".$usuario->tipoLocal."', '".$idTelefone."')";
                                      if(mysql_query($sql)){
                                        return 'ok';
                                      }else {
                                        return 'erro';
                                      }
                                  }
                              }
                          }
                        }
                      }
                    }
                }
              }
          }

    }

    public function SelectById($usuario){
      $sql = "SELECT * FROM vw_loginusuario WHERE idLogin=".$usuario->idLogin;
      $select = mysql_query($sql);

      if($rs=mysql_fetch_array($select)){

        $listar = new Usuario();

        $listar->nome=$rs['nomeCliente'];
        $listar->email=$rs['emailCliente'];
        $listar->tipoLocal=$rs['tipoLocal'];
        $listar->milhasPontuacao=$rs['milhasPontuacao'];
        $listar->rg=$rs['rg'];
        $listar->cpf=$rs['cpf'];
        $listar->telefone=$rs['telefone'];
        $listar->idCliente=$rs['idCliente'];
        $listar->idTelefone=$rs['idTelefone'];
        $listar->idLogin=$rs['idLogin'];
        $listar->caminhoImg=$rs['caminhoImagem'];
        return  $listar;
      }
  }

      public function Delete($usuario)
      {
          $sql = "SELECT idTelefone FROM tbl_cliente WHERE idLogin=".$usuario->idLogin;
          $select = mysql_query($sql);
          if ($rows=mysql_fetch_array($select))
          {
              $idTelefone = $rows['idTelefone'];

              $sql = "DELETE FROM tbl_cliente WHERE idLogin=".$usuario->idLogin;
              if(!mysql_query($sql))
              {
                  return 'erro';
              }

              $sql = "DELETE FROM tbl_login WHERE idlogin=".$usuario->idLogin;
              if(!mysql_query($sql))
              {
                  return 'erro';
              }

              $sql = "DELETE FROM tbl_telefone WHERE idTelefone=".$idTelefone;
              if(!mysql_query($sql))
              {
                  return 'erro';
              }


          }
          return 'ok';
      }

      public function Update($usuario)
      {
          $sql = "UPDATE tbl_cliente SET nomeCliente='".$usuario->nome."', emailCliente='".$usuario->email."', cpf='".$usuario->cpf."', rg='".$usuario->rg."', idTipoDeLocal='".$usuario->tipoLocal."' WHERE idCliente='".$usuario->idCliente."'";
          if(!mysql_query($sql))
          {
              return 'erro';
          }

          $sql = "UPDATE tbl_telefone SET telefone='".$usuario->telefone."' WHERE idTelefone='".$usuario->idTelefone."'";
          if(!mysql_query($sql))
          {
              return 'erro';
          }

          return 'ok';
      }

      public function UpdateImage($usuario)
      {
          $sql = "SELECT idImagem FROM tbl_cliente WHERE idCliente='".$usuario->idCliente."'";
          if($select = mysql_query($sql))
          {
              if($rows=mysql_fetch_array($select))
              {
                  $idImagem = $rows['idImagem'];
                  $sql = "UPDATE tbl_imagem SET caminhoImagem='".$usuario->caminhoImg."' WHERE idImagem=".$idImagem;
                  mysql_query($sql);
              }
          }
      }

}

 ?>
