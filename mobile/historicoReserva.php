<?php
	require_once('db.php');
	
	$sql = "SELECT * FROM vw_reservas_mobile WHERE login='".$_GET['login']."' GROUP BY idTransacao;";
	

	$select = mysql_query($sql);
	
	$array = array();
	
	while($rs=mysql_fetch_array($select))
	{
		$historico = array(
			"idTransacao"=>utf8_encode($rs['idTransacao']),
			"dataInicio"=>utf8_encode($rs['dataInicio']),
			"dataFim"=>utf8_encode($rs['dataFim']),
			"desconto"=>utf8_encode($rs['desconto']),
			"vlrTotal"=>utf8_encode($rs['vlrTotal']),
			"dtTransacao"=>utf8_encode($rs['dtTransacao']),
			"status"=>utf8_encode($rs['status']),
			"hotel"=>utf8_encode($rs['hotel']),
			"caminhoImagem"=>utf8_encode($rs['caminhoImagem'])
		);
		$array[] = $historico;
	}
	
	echo json_encode($array);
?>