<?php

    class controllerBuscaEstado
    {


        public function buscaEstado(){

            require_once('models/buscaEstado_class.php');
            $lstbusca = new BuscaEstado();
            $lstbusca->estado = $this->estado;
            return $lstbusca->selectByEstado();


        }



    }


?>
