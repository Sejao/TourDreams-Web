<?php 
	require_once('db.php');
	$array = array();
	
	$sql = "SELECT m.idMensagem, m.mensagem, m.dataMensagem, c.idCidade, c.cidade, u.idCliente, u.nomeCliente, i.caminhoImagem FROM tbl_mensagemdestino AS m INNER JOIN tbl_cidade AS c ON c.idCidade=m.idCidade INNER JOIN tbl_cliente AS u ON u.idCliente=m.idCliente INNER JOIN tbl_imagem AS i ON i.idImagem=u.idImagem;";
	$select = mysql_query($sql);
	
	while($rows=mysql_fetch_array($select))
	{
		$avaliacao = array(
			"idMensagem"=>utf8_encode($rows['idMensagem']),
			"mensagem"=>utf8_encode($rows['mensagem']),
			"dataMensagem"=>utf8_encode($rows['dataMensagem']),
			"idCidade"=>utf8_encode($rows['idCidade']),
			"cidade"=>utf8_encode($rows['cidade']),
			"idCliente"=>utf8_encode($rows['idCliente']),
			"nomeCliente"=>utf8_encode($rows['nomeCliente']),
			"caminhoImagem"=>utf8_encode($rows['caminhoImagem'])
		);
		$array[] = $avaliacao;
	}
	
	echo json_encode($array);

?>