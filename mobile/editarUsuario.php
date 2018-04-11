<?php
	require_once('db.php');
	
	if($_GET['documento'] == 'rg')
	{
		$sql = "UPDATE tbl_cliente SET nomeCliente='".$_GET['nome']."', emailCliente='".$_GET['email']."', rg='".$_GET['numdoc']."', idTipoDeLocal='".$_GET['tipolocal']."' WHERE idCliente='".$_GET['idCliente']."'";
	}
	else if($_GET['documento'] == 'cpf')
	{
		$sql = "UPDATE tbl_cliente SET nomeCliente='".$_GET['nome']."', emailCliente='".$_GET['email']."', cpf='".$_GET['numdoc']."', idTipoDeLocal='".$_GET['tipolocal']."' WHERE idCliente='".$_GET['idCliente']."'";
	}
	
	if(mysql_query($sql))
	{
		echo ('ok');
	}
	else
	{
		echo ('erro');
	}
	

?>