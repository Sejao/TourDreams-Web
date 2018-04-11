<?php

    class ControllerPerfilParceiro
    {


        public function SelectHotel(){

            require_once('models/perfilparceiro_class.php');
            $lsthotel = new PerfilParceiro();
            $idParceiro = $_GET['idParceiro'];
            $lsthotel->idParceiro = $idParceiro;
            return $lsthotel->SelecionarHoteis();

        }

        public function Comodidades(){

            require_once('models/perfilparceiro_class.php');

            $lstComodidade = new PerfilParceiro();
            return $lstComodidade->SelectComodidades();



        }

        public function ListarPendentes(){
            require_once('models/perfilparceiro_class.php');
            $lstPendentes = new PerfilParceiro();
            $lstPendentes->idParceiro=$this->idParceiro;
            return $lstPendentes->SelectPendentes();


        }

        public function ListarAprovadas(){
            require_once('models/perfilparceiro_class.php');
            $lstAprovadas = new PerfilParceiro();
            $lstAprovadas->idParceiro=$this->idParceiro;
            return $lstAprovadas->SelectAprovadas();


        }

        public function Aprovar(){
            require_once('models/perfilparceiro_class.php');
            $aprovar = new PerfilParceiro();
            $aprovar->idTransacao = $_GET['idTransacao'];
            $aprovar->InsertAprovacao();

            header('location:perfilParceiro.php?idParceiro='.$_GET['idParceiro']);

        }

        public function Reprovar(){
            require_once('models/perfilparceiro_class.php');
            $reprovar = new PerfilParceiro();
            $reprovar->idTransacao = $_GET['idTransacao'];
            $reprovar->InsertReprovacao();

            header('location:perfilParceiro.php?idParceiro='.$_GET['idParceiro']);

        }

        public function Deletar(){
            require_once('models/perfilparceiro_class.php');
            $deletar = new PerfilParceiro();
            $deletar->idTransacao = $_GET['idTransacao'];
            $deletar->Delete();

            header('location:perfilParceiro.php?idParceiro='.$_GET['idParceiro']);

        }


    }


?>
