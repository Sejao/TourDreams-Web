<?php
class ControllerMoeda
{
    public function Listar()
    {
        require_once('models/moeda_class.php');
        $lstMoeda = new Moeda();
        return $lstMoeda->SelectAll();
    }
}
 ?>
