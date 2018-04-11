<?php
	$login = $_GET['login'];
	$senha = $_GET['senha'];
	$nome = $_GET['nome'];
	$email = $_GET['email'];
	$documento= $_GET['documento'];
	$numdoc = $_GET['numdoc'];
	$celular = $_GET['celular'];
	$idTipoDeLocal = $_GET['idTipoDeLocal'];
	
	require_once('db.php');
	
	$erro = 0;
	
	$sql = "INSERT INTO tbl_login(login, senha, idTipoLogin)
	VALUES ('".$login."', '".$senha."', '1')";
	if(!mysql_query($sql))
	{
		$erro = 1;
	}
	$sql = "SELECT LAST_INSERT_ID() AS idLogin";
	
	if($select = mysql_query($sql))
	{
		if($rows=mysql_fetch_array($select))
		{
			$idLogin = utf8_encode($rows['idLogin']);
		}
	}
	else
	{
		$erro = 1;
	}
	
	$sql = "INSERT INTO tbl_telefone(telefone, idTipoTelefone)
	VALUES ('".$celular."', '2')";
	if(!mysql_query($sql))
	{
		$erro = 1;
	}
	
	$sql = "SELECT LAST_INSERT_ID() AS idTelefone";
	if($select = mysql_query($sql))
	{
		if($rows=mysql_fetch_array($select))
		{
			$idTelefone = utf8_encode($rows['idTelefone']);
		}
	}
	else
	{
		$erro = 1;
	}
	
	$sql = "INSERT INTO tbl_imagem(caminhoImagem)
	VALUES ('imagens/usuario/padrao.png')";
	if(!mysql_query($sql))
	{
		$erro = 1;
	}
	
	$sql = "SELECT LAST_INSERT_ID() AS idImagem";
	if($select = mysql_query($sql))
	{
		if($rows=mysql_fetch_array($select))
		{
			$idImagem = utf8_encode($rows['idImagem']);
		}
	}
	else
	{
		$erro = 1;
	}
	
	if($documento == 'rg')
	{
		$sql = "INSERT INTO tbl_cliente (cpf, rg, nomeCliente, idImagem, idLogin, emailCliente, idTipoDeLocal, idTelefone)
		VALUES('', '".$numdoc."', '".$nome."', '".$idImagem."', '".$idLogin."', '".$email."', '".$idTipoDeLocal."', '".$idTelefone."')";
		if(!mysql_query($sql))
		{
			$erro = 1;
		}
		echo $sql;
	}
	
	if($documento == 'cpf')
	{
		$sql = "INSERT INTO tbl_cliente (cpf, rg, nomeCliente, idImagem, idLogin, emailCliente, idTipoDeLocal, idTelefone)
		VALUES('".$numdoc."', '', '".$nome."', '".$idImagem."', '".$idLogin."', '".$email."', '".$idTipoDeLocal."', '".$idTelefone."')";
		if(!mysql_query($sql))
		{
			$erro = 1;
		}
	}
	
	if($erro == 1)
	{
		echo 'erro';
	}
	else
	{
		echo 'ok';
	}

?>