<?php

    class Informacao{

        public $emailTourdreams;
        public $logradouro;
        public $numero;
        public $cidade;
        public $uf;
        public $telefone;



        public function SelectInformacao(){

          $sql = 'select * from vw_informacao';

          $select = mysql_query($sql);

          $cont = 0;


          while ($rs=mysql_fetch_array($select)) {

            $listInformacao[] = new Informacao();

            $listInformacao[$cont]->emailTourdreams = $rs['emailTourdreams'];
            $listInformacao[$cont]->logradouro = $rs['logradouro'];
            $listInformacao[$cont]->numero = $rs['numero'];
            $listInformacao[$cont]->cidade = $rs['cidade'];
            $listInformacao[$cont]->uf = $rs['uf'];
            $listInformacao[$cont]->telefone = $rs['telefone'];

            $cont +=1;
          }
           return $listInformacao;
        }





    }
?>
