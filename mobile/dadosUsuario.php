<?php
	require_once('db.php');
	
	$sql = "SELECT * FROM vw_usuario WHERE login = '".$_GET['login']."';";
	if($select = mysql_query($sql))
	{
		if($rs = mysql_fetch_array($select))
		{
			$usuario = array(
			"idCliente"=>utf8_encode($rs['idCliente']),
			"nomeCliente"=>utf8_encode($rs['nomeCliente']),
			"emailCliente"=>utf8_encode($rs['emailCliente']),
			"cpf"=>utf8_encode($rs['cpf']),
			"rg"=>utf8_encode($rs['rg']),
			"milhasPontuacao"=>utf8_encode($rs['milhasPontuacao']),
			"caminhoImagem"=>utf8_encode($rs['caminhoImagem']),
			"login"=>utf8_encode($rs['login']),
			"tipoLocal"=>utf8_encode($rs['tipoLocal']),
			"telefone"=>utf8_encode($rs['telefone'])
			);
			echo json_encode($usuario);
		}
		else
		{
			echo ('erro');
		}
	}
	else
	{
		echo ('erro');
	}
?>