<?php

    class ControllerTipoLocal
    {

        public function Listar(){
            require_once('models/tipolocal_class.php');

            $lstlocal = new TipoLocal();
            return $lstlocal->SelectAll();
        }

        public function ListarCidadeLocal(){
            require_once('models/tipolocal_class.php');

            $lstcidadelocal = new TipoLocal();
            return $lstcidadelocal->SelectCidadeLocal();
        }



        public function Inserir(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $local = $_POST['txtLocal'];
                require_once('models/tipolocal_class.php');

                $local_class = new TipoLocal();
                $local_class->local = addslashes($local);
                $local_class->InsertLocal();

                header('location:tipoLocal.php');

            }
        }

        public function Excluir(){

            $idLocal = $_GET['idLocal'];
            require_once('models/tipolocal_class.php');

            $local_class = new TipoLocal();
            $local_class->idLocal = $idLocal;
            $local_class->DeleteLocal();

            header('location:tipoLocal.php');

        }

        public function Visualizar(){

            $idLocal = $_GET['idLocal'];
            require_once('models/tipolocal_class.php');

            $local_class = new TipoLocal();
            $local_class->idLocal = $idLocal;
            $result =  $local_class->SelectById();

            require_once('tipoLocal.php');

        }

        public function VisualizarLocalCidade(){

            $idCidade = $_GET['idCidade'];
            require_once('models/tipolocal_class.php');

            $localcidade_class = new TipoLocal();
            $localcidade_class->idCidade = $idCidade;
            $resultado =  $localcidade_class->SelectByIdLocalCidade();

            require_once('tipoLocal.php');

        }

        public function Editar(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $idLocal = $_GET['idLocal'];
                $local = $_POST['txtLocal'];
                require_once('models/tipolocal_class.php');

                $local_class = new TipoLocal();
                $local_class->idLocal=$idLocal;
                $local_class->local = addslashes($local);
                $local_class->UpdateLocal();

                header('location:tipoLocal.php');

            }
        }

        public function EditarLocalCidade(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $idCidade = $_GET['idCidade'];
                $local = $_POST['sltTipoLocal'];
                require_once('models/tipolocal_class.php');

                $localcidade_class = new TipoLocal();
                $localcidade_class->idCidade=$idCidade;
                $localcidade_class->local = $local;
                $localcidade_class->UpdateLocalCidade();

                header('location:tipoLocal.php');

            }
        }

    }

?>
