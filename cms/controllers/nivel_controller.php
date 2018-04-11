<?php
    class ControllerNivel
    {

        public function Listar(){
            require_once('models/nivel_class.php');

            $lstnivel = new Nivel();
            return $lstnivel->SelectAll();
        }

        public function Inserir(){
            require_once('models/nivel_class.php');
            $nivel = $_POST['txtNivel'];
            $nivel_class = new Nivel();
            $nivel_class->nivel = addslashes($nivel);
            $nivel_class->InsertNivel();
            header('location:nivelFuncionario.php');
        }

        public function Excluir(){
            require_once('models/nivel_class.php');
            $idNivel = $_GET['idNivel'];
            $nivel_class = new Nivel();
            $nivel_class->idNivel = $idNivel;
            $nivel_class->DeletarNivel();
            header('location:nivelFuncionario.php');
        }

        public function Visualizar(){
            require_once('models/nivel_class.php');
            $idNivel = $_GET['idNivel'];

            $lstnivel = new Nivel();
            $lstnivel->idNivel = $idNivel;
            $result = $lstnivel->SelectById();

            require_once('nivelFuncionario.php');
        }

        public function Editar(){
            require_once('models/nivel_class.php');
            $idNivel = $_GET['idNivel'];
            $nivel = $_POST['txtNivel'];

            $nivel_class = new Nivel();
            $nivel_class->idNivel = $idNivel;
            $nivel_class->nivel = $nivel;
            $nivel_class->Update();

            header('location:nivelFuncionario.php');
        }


    }


?>
