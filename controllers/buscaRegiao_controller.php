<?php

    class controllerBuscaRegiao
    {

        public function buscaRegiao(){

            require_once('models/buscaRegiao_class.php');
            $lstbusca = new BuscaRegiao();
            $lstbusca->regiao = $this->regiao;
            return $lstbusca->selectByRegiao();


        }

    }

?>
