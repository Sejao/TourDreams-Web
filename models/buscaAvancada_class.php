<?php

  class SelectBuscaAvancada{

    public function __construct()
    {
        //Inclui o arquivo de conexão com o banco de dados.
        require_once('models/db_class.php');
        //Instancia a classe Mysql_db.
        $conexao_db = new Mysql_db;
        //Chama o método conectar para estabelecer a conexão com o BD.
        $conexao_db->conectar();
    }

    public function SelectTipoDeEstadia(){

      $sql = "select * from tbl_tipodeestadia";
      $select = mysql_query($sql);
      $cont = 0;

      while($rs=mysql_fetch_array($select)){

        $listBusca[] = new SelectBuscaAvancada();


        $listBusca[$cont]->idEstadia=$rs['idTipoEstadia'];
        $listBusca[$cont]->estadia=$rs['estadia'];

        $cont +=1;


      }

      return $listBusca;

    }

    public function SelectParceiro(){

      $sql = "select * from tbl_parceiro";
      $select = mysql_query($sql);
      $cont = 0;

      while ($rs=mysql_fetch_array($select)) {
        $listBusca [] = new SelectBuscaAvancada();

        $listBusca[$cont]->idParceiro=$rs['idParceiro'];
        $listBusca[$cont]->parceiro=$rs['nomeParceiro'];

        $cont +=1;
      }
      return $listBusca;

    }

    public function SelectComodidadeHotel(){

      $sql = "select * from tbl_comodidadeshotel";
      $select = mysql_query($sql);
      $cont = 0;

      while ($rs=mysql_fetch_array($select)) {

        $listComo[] = new SelectBuscaAvancada();

        $listComo[$cont]->idComodidadeHotel=$rs['idComodidadeHotel'];
        $listComo[$cont]->comodidadesHotel=$rs['nomeComodidade'];

        $cont +=1;

      }
      return $listComo;
    }

    public function SelectComodidadeQuarto(){

      $sql = "select * from tbl_comodidadesquarto";
      $select = mysql_query($sql);
      $cont =0;

      while ($rs=mysql_fetch_array($select)) {

        $listComo[] = new SelectBuscaAvancada();

        $listComo[$cont]->idComodidadeQuarto=$rs['idComodidade'];
        $listComo[$cont]->comodidadesQuarto=$rs['nomeComodidade'];

        $cont +=1;
      }

      return $listComo;
    }

    public function SelectDaBuscaAvancada(){


      $sqlHotel = "select * from tbl_comodidadeshotel";
      $selectHotel = mysql_query($sqlHotel);

      $listHotel = array();

      $IdComodidades ="0";

      while ($rs=mysql_fetch_array($selectHotel)) {

        $itemHotel = new SelectBuscaAvancada();

        $itemHotel->id=$rs['idComodidadeHotel'];


          if(isset($_GET['chk'.$itemHotel->id])){

              $IdComodidades = $IdComodidades.','.$itemHotel->id;


          }

        //$listHotel[] = $itemHotel;

      }





        $sql = "select distinct * from vw_busca";


        $where = " where cidade='".$this->cidade."'";

        if($this->cidade != null){
              $where = $where ." and cidade='".$this->cidade."'";
        }

        if($this->parceiro > 0){
              $where = $where ." and idParceiro=".$this->parceiro;
        }

        if($this->estadia > 0){
              $where = $where ." and idTipoEstadia=".$this->estadia;
        }

        if($this->qtdEstrelas > 0 ){
                $where = $where ." and qtdEstrelas =".$this->qtdEstrelas;
        }

        if($this->avaliacao > 0 ){
                $where = $where ." and avaliacao >=".$this->avaliacao;
        }

        if($this->preco != null ){

                $where = $where ." and valorDiario ".$this->preco;
        }


        if($IdComodidades !="0"){
          $where = $where ." and idComodidadeHotel  in(".$IdComodidades.")";
      }else{
          $where = $where ." group by idHotel";
      }


        $sql = $sql.$where.";";


        // echo ($sql);

        $select = mysql_query($sql);
        $cont = 0;

        $listComo = array();


        while ($rs=mysql_fetch_array($select)) {

          $item =  new SelectBuscaAvancada();

          //$listComo[] = new SelectBuscaAvancada();


          $sql = "select * from tbl_imagem
                    inner join tbl_hotel as h
                    inner join tbl_hotelimagem as hi
                    on hi.idHotel = h.idHotel and hi.idImagem = tbl_imagem.idImagem
                    where h.idHotel =".$rs['idHotel']." limit 1;";

        $selectImagemHotel = mysql_query($sql);

            if($row = mysql_fetch_array($selectImagemHotel)){

              $item->bairro=$rs['bairro'];
              $item->logradouro=$rs['logradouro'];
              $item->preco=$rs['valorDiario'];
              $item->cidade=$rs['cidade'];
              $item->nomeParceiro=$rs['nomeParceiro'];

              $item->hotel=$rs['hotel'];
              $item->idHotel=$rs['idHotel'];
              $item->imagemHotel=$row['caminhoImagem'];
              $item->qtdEstrelas=$rs['qtdEstrelas'];


              $listComo[] = $item;
            }
        }

        if (mysql_num_rows($select)>0) {

          return $listComo;
        }else{
          echo "Nenhum Hotel Encontrado";
        }



    }

    public function SelectDaBuscaAvancadaFiltro(){


      $sqlHotel = "select * from tbl_comodidadeshotel";
      $selectHotel = mysql_query($sqlHotel);

      $listHotel = array();

      $IdComodidades ="0";

      while ($rs=mysql_fetch_array($selectHotel)) {

        $itemHotel = new SelectBuscaAvancada();

        $itemHotel->id=$rs['idComodidadeHotel'];


          if(isset($_GET['chk'.$itemHotel->id])){

              $IdComodidades = $IdComodidades.','.$itemHotel->id;

          }

        //$listHotel[] = $itemHotel;

      }





        $sql = "select distinct * from vw_busca";


        $where = " where idHotel>0";



        if($this->parceiro > 0){
              $where = $where ." and idParceiro=".$this->parceiro;
        }

        if($this->estadia > 0){
              $where = $where ." and idTipoEstadia=".$this->estadia;
        }

        if($this->qtdEstrelas > 0 ){
                $where = $where ." and qtdEstrelas =".$this->qtdEstrelas;
        }

        if($this->avaliacao > 0 ){
                $where = $where ." and avaliacao >=".$this->avaliacao;
        }

        if($this->preco != null ){

                $where = $where ." and valorDiario ".$this->preco;
        }


        if($IdComodidades !="0"){
          $where = $where ." and idComodidadeHotel in(".$IdComodidades.")";
        }


        $sql = $sql.$where.";";


        //echo $where;

      //  echo ($sql);

        $select = mysql_query($sql);
        $cont = 0;

        $listComo = array();


        while ($rs=mysql_fetch_array($select)) {

          $item =  new SelectBuscaAvancada();

          //$listComo[] = new SelectBuscaAvancada();


          $sql = "select * from tbl_imagem
                    inner join tbl_hotel as h
                    inner join tbl_hotelimagem as hi
                    on hi.idHotel = h.idHotel and hi.idImagem = tbl_imagem.idImagem
                    where h.idHotel =".$rs['idHotel']." limit 1;";

        $selectImagemHotel = mysql_query($sql);

            if($row = mysql_fetch_array($selectImagemHotel)){

                  $item->bairro=$rs['bairro'];
                  $item->logradouro=$rs['logradouro'];
                  $item->preco=$rs['valorDiario'];
                  $item->cidade=$rs['cidade'];
                  $item->nomeParceiro=$rs['nomeParceiro'];

                  $item->hotel=$rs['hotel'];
                  $item->imagemHotel=$row['caminhoImagem'];
                  $item->qtdEstrelas=$rs['qtdEstrelas'];


                  $listComo[] = $item;
              }
        }

        if (mysql_num_rows($select)>0) {

          return $listComo;
        }else{
          echo "Nenhum Hotel Encontrado";
        }




    }

  }

 ?>
