<?php

    $cidade = null;
    $estadia = null;
    $qtdEstrelas = null;
    $parceiro = null;
    $avaliacao = null;
    $preco = null;
    $comodidadesHotel = null;
    $comodidadesQuarto=null;

  class ControllerSelectBuscaAvancada{


    public function ListarTipoDeEstadia(){

      require_once('models/buscaAvancada_class.php');
      $lstestadia = new SelectBuscaAvancada();
      return $lstestadia->SelectTipoDeEstadia();


    }

    public function ListarParceiro(){

      require_once('models/buscaAvancada_class.php');
      $lstParceiro = new SelectBuscaAvancada();
      return $lstParceiro->SelectParceiro();
    }


    public function ListarComodidadeHotel(){

      require_once('models/buscaAvancada_class.php');
      $lstComodidadeHotel = new SelectBuscaAvancada();
      return $lstComodidadeHotel->SelectComodidadeHotel();

    }

    public function ListarComodidadeQuarto(){

      require_once('models/buscaAvancada_class.php');
      $lstComodidadeQuarto = new SelectBuscaAvancada();
      return $lstComodidadeQuarto->SelectComodidadeQuarto();
    }


    public function BuscaAcancada(){

      $cidade = $_GET['txtDestinoAvancado'];
      $estadia = $_GET['slcTipoEstadia'];
      $qtdEstrelas = $_GET['slcEstrela'];
      $parceiro = $_GET['slcParceiro'];
      $avaliacao = $_GET['slcAvaliacao'];
      $preco = $_GET['slcPreco'];


      require_once ('models/buscaAvancada_class.php');
      $lstBuscaAvancada = new SelectBuscaAvancada();
      $lstBuscaAvancada->cidade=$cidade;
      $lstBuscaAvancada->estadia=$estadia;
      $lstBuscaAvancada->qtdEstrelas=$qtdEstrelas;
      $lstBuscaAvancada->parceiro=$parceiro;
      $lstBuscaAvancada->avaliacao=$avaliacao;
      $lstBuscaAvancada->preco=$preco;
      return $lstBuscaAvancada ->SelectDaBuscaAvancada();
    }


    public function BuscaAcancadaFiltro(){

    @  $estadia = $_GET['slcTipoEstadia'];
    @  $qtdEstrelas = $_GET['slcEstrela'];
    @  $parceiro = $_GET['slcParceiro'];
    @  $avaliacao = $_GET['slcAvaliacao'];
    @  $preco = $_GET['slcPreco'];

      require_once('models/buscaAvancada_class.php');
      $lstBuscaAvancadaFiltro = new SelectBuscaAvancada();

      $lstBuscaAvancadaFiltro->estadia=$estadia;
      $lstBuscaAvancadaFiltro->qtdEstrelas=$qtdEstrelas;
      $lstBuscaAvancadaFiltro->parceiro=$parceiro;
      $lstBuscaAvancadaFiltro->avaliacao=$avaliacao;
      $lstBuscaAvancadaFiltro->preco=$preco;
      return $lstBuscaAvancadaFiltro ->SelectDaBuscaAvancadaFiltro();

    }
  }
 ?>
