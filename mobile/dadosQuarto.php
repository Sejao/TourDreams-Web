<?php 
	require_once('db.php');
	
	$sql = "SELECT * FROM vw_quartos WHERE idQuarto=".$_GET['idQuarto'];
	$select = mysql_query($sql);
	
	while($rows=mysql_fetch_array($select))
	{
		$quarto = array(
			"idQuarto"=>utf8_encode($rows['idQuarto']),
			"nome"=>utf8_encode($rows['nome']),
			"valorDiario"=>utf8_encode($rows['valorDiario']),
			"descricao"=>utf8_encode($rows['descricao']),
			"maxHospedes"=>utf8_encode($rows['maxHospedes']),
			"idHotel"=>utf8_encode($rows['idHotel']),
			"caminhoImagem"=>utf8_encode($rows['caminhoImagem']),
			"hotel"=>utf8_encode($rows['hotel']),
			"bairro"=>utf8_encode($rows['bairro']),
			"cidade"=>utf8_encode($rows['cidade']),
			"uf"=>utf8_encode($rows['uf'])
		);
		echo json_encode($quarto);
	}
	
	

?>