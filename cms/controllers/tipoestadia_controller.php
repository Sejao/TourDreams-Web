<?php

    class ControllerTipoEstadia
    {

        public function Listar(){
            require_once('models/tipoestadia_class.php');

            $lstestadia = new TipoEstadia();
            return $lstestadia->SelectAll();


        }

        public function Inserir(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $estadia = $_POST['txtEstadia'];
                require_once('models/tipoestadia_class.php');

                $estadia_class = new TipoEstadia();
                $estadia_class->estadia = addslashes($estadia);
                $estadia_class->InsertEstadia();

                header('location:tipoEstadia.php');

            }
        }


        public function Excluir(){

            $idEstadia = $_GET['idEstadia'];
            require_once('models/tipoestadia_class.php');

            $estadia_class = new TipoEstadia();
            $estadia_class->idEstadia = $idEstadia;
            $estadia_class->DeleteEstadia();

            header('location:tipoEstadia.php');

        }

        public function Visualizar(){

            $idEstadia = $_GET['idEstadia'];
            require_once('models/tipoestadia_class.php');

            $estadia_class = new TipoEstadia();
            $estadia_class->idEstadia = $idEstadia;
            $result =  $estadia_class->SelectById();

            require_once('tipoEstadia.php');

        }

        public function Editar(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $idEstadia = $_GET['idEstadia'];
                $estadia = $_POST['txtEstadia'];
                require_once('models/tipoestadia_class.php');

                $estadia_class = new TipoEstadia();
                $estadia_class->idEstadia=$idEstadia;
                $estadia_class->estadia = addslashes($estadia);
                $estadia_class->UpdateEstadia();

                header('location:tipoEstadia.php');

            }
        }



    }




?>
