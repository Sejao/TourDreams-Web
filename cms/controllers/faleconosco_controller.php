<?php
class ControllerFaleConosco
{
    public function ListarGeral()
    {
        require_once('models/faleconosco_class.php');
        $lst_faleconosco_geral = new FaleConosco();
        return $lst_faleconosco_geral->SelectGeral();
    }

    public function ListarConta()
    {
        require_once('models/faleconosco_class.php');
        $lst_faleconosco_geral = new FaleConosco();
        return $lst_faleconosco_geral->SelectConta();
    }

    public function ListarReservas()
    {
        require_once('models/faleconosco_class.php');
        $lst_faleconosco_geral = new FaleConosco();
        return $lst_faleconosco_geral->SelectReservas();
    }

    public function ListarFeedback()
    {
        require_once('models/faleconosco_class.php');
        $lst_faleconosco_geral = new FaleConosco();
        return $lst_faleconosco_geral->SelectFeedback();
    }

    public function Excluir()
    {
        $idFormulario = $_GET['idFormulario'];

        $faleconosco_class = new FaleConosco();
        $faleconosco_class->idFormulario = $idFormulario;
        $result = $faleconosco_class->Delete($faleconosco_class);

        if($result == 'erro')
        {
            header('location:faleconosco.php?erro');
        }
        else
        {
            header('location:faleconosco.php?ok');
        }
    }

    public function Visualizar()
    {
        $idFormulario= $_GET['idFormulario'];
        require_once('models/faleconosco_class.php');
        $faleconosco = new FaleConosco();
        $faleconosco->idFormulario=$idFormulario;
        return $faleconosco->SelectId($faleconosco);
    }
}
 ?>
