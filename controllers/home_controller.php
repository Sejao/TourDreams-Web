<?php

    class ControllerHome
    {

        public function ListarHome(){
            require_once('models/home_class.php');
            $lsthome = new Home();
            return $lsthome->SelectHome();


        }

    }

?>
