<?php
	require_once('db.php');
	
	$sql = "SELECT * FROM vw_paginapromocoes;";
	

	$select = mysql_query($sql);
	
	$array = array();
	
	while($rs=mysql_fetch_array($select))
	{
		$promocao = array(
			"idPromocao" => utf8_encode($rs['id_promocoes']),
			"caminhoImagem" => utf8_encode($rs['caminhoImagem'])
		);
		$array[] = $promocao;
	}
	
	echo json_encode($array);
?>