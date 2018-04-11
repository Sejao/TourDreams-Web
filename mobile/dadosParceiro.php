<?php
	require_once('db.php');
	
	$sql = "SELECT * FROM vw_loginparceiro WHERE login = '".$_GET['login']."';";
	if($select = mysql_query($sql))
	{
		if($rs = mysql_fetch_array($select))
		{
			$parceiro = array(
			"idParceiro"=>utf8_encode($rs['idParceiro']),
			"cnpj"=>utf8_encode($rs['cnpj']),
			"nomeParceiro"=>utf8_encode($rs['nomeParceiro']),
			"enailParceiro"=>utf8_encode($rs['emailParceiro']),
			"caminhoImagem"=>utf8_encode($rs['caminhoImagem'])
			);
			echo json_encode($parceiro);
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