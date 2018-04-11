<?php

  class Melhores{

    public function __construct()

    {
        //Inclui o arquivo de conexão com o banco de dados.
        require_once('models/db_class.php');
        //Instancia a classe Mysql_db.
        $conexao_db = new Mysql_db;
        //Chama o método conectar para estabelecer a conexão com o BD.
        $conexao_db->conectar();
    }

    public function SelectMelhores(){

      $sql = "select * from vw_melhoresdestinos;";
      $select = mysql_query($sql);

      if ($rs = mysql_fetch_array($select)) {

        $listaMelhores = new Melhores();
        $listaMelhores->caminhoImagem=$rs['caminhoImagem'];


        return $listaMelhores;

      }
    }


    public function SelectUltimas(){
        $sql = "select t.idTransacao,t.idQuarto, h.hotel, tl.idTipoDeLocal, tl.TipoDeLocal
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
                inner join tbl_tipodelocal as tl
                on c.idTipoDeLocal = tl.idTipoDeLocal
                where t.idCliente =".$this->idCliente."
                order by t.idTransacao desc limit 1;";
        $select = mysql_query($sql);

        if($rs = mysql_fetch_array($select)){

            $idTipoDeLocal = $rs['idTipoDeLocal'];

            $sql = "select * from tbl_hotel as h
                    inner join tbl_logradouro as l
                    on h.idLogradouro = l.idLogradouro
                    inner join tbl_bairro as b
                    on l.idBairro = b.idBairro
                    inner join tbl_cidade as c
                    on b.idCidade = c.idCidade
                    inner join tbl_estado as e
                    on c.idEstado = e.idEstado
                    inner join tbl_imagem as i
                    inner join tbl_hotelimagem as hi
                    on hi.idHotel = h.idHotel and hi.idImagem = i.idImagem
                    where c.idTipoDeLocal = ".$idTipoDeLocal."
                    group by h.idHotel
                    order by rand() limit 6;";

            $select = mysql_query($sql);

            $cont = 0;

            while($rs = mysql_fetch_array($select)){

                $listaUltimas[] = new Melhores();

                $listaUltimas[$cont]->hotel = $rs['hotel'];
                $listaUltimas[$cont]->cidade = $rs['cidade'];
                $listaUltimas[$cont]->uf = $rs['uf'];
                $listaUltimas[$cont]->logradouro = $rs['logradouro'];
                $listaUltimas[$cont]->caminhoImagem = $rs['caminhoImagem'];
                $listaUltimas[$cont]->numero = $rs['numero'];
                $listaUltimas[$cont]->bairro = $rs['bairro'];
                $listaUltimas[$cont]->qtdEstrelas = $rs['qtdEstrelas'];

                $cont++;

            }

            return $listaUltimas;

        }

    }

    public function SelectPerfil(){
        $sql = "select tl.* from tbl_tipodelocal as tl
                inner join tbl_cliente as c
                on c.idTipoDeLocal = tl.idTipoDeLocal
                where c.idCliente =".$this->idCliente.";";
        $select = mysql_query($sql);

        

        if($rs = mysql_fetch_array($select)){

            $idTipoDeLocal = $rs['idTipoDeLocal'];

            $sql = "select h.hotel,h.qtdEstrelas,c.cidade,e.uf,l.logradouro,l.numero,i.caminhoImagem from tbl_hotel as h
                    inner join tbl_logradouro as l
                    on h.idLogradouro = l.idLogradouro
                    inner join tbl_bairro as b
                    on l.idBairro = b.idBairro
                    inner join tbl_cidade as c
                    on b.idCidade = c.idCidade
                    inner join tbl_estado as e
                    on c.idEstado = e.idEstado
                    inner join tbl_imagem as i
                    inner join tbl_hotelimagem as hi
                    on hi.idHotel = h.idHotel and hi.idImagem = i.idImagem
                    where c.idTipoDeLocal = ".$idTipoDeLocal."
                    group by h.idHotel
                    order by rand() limit 6;";



            $select = mysql_query($sql);

            $contador = 0;

            while($rs = mysql_fetch_array($select)){

                $listaUltimas[] = new Melhores();

                $listaUltimas[$contador]->hotelPerfil = $rs['hotel'];
                $listaUltimas[$contador]->cidadePerfil = $rs['cidade'];
                $listaUltimas[$contador]->ufPerfil = $rs['uf'];
                $listaUltimas[$contador]->logradouroPerfil = $rs['logradouro'];
                $listaUltimas[$contador]->caminhoImagemPerfil = $rs['caminhoImagem'];
                $listaUltimas[$contador]->numeroPerfil = $rs['numero'];

                $listaUltimas[$contador]->qtdEstrelasPerfil = $rs['qtdEstrelas'];

                $contador++;

            }

            return $listaUltimas;

        }

    }

  }



 ?>
