<?php
	require_once('db.php');
	
	$sql = "SELECT * FROM vw_buscamobile WHERE idHotel =".$_GET['idHotel'];
	if($select = mysql_query($sql))
	{
		if($rs = mysql_fetch_array($select))
		{
			$hotel = array(
			"idHotel"=>utf8_encode($rs['idHotel']),
			"hotel"=>utf8_encode($rs['hotel']),
			"checkin"=>utf8_encode($rs['checkin']),
			"checkout"=>utf8_encode($rs['checkout']),
			"descricao"=>utf8_encode($rs['descricao']),
			"caminhoImagem"=>utf8_encode($rs['caminhoImagem']),
			"qtdEstrelas"=>utf8_encode($rs['qtdEstrelas']),
			"valorMinimo"=>utf8_encode($rs['valorMinimo']),
			"bairro"=>utf8_encode($rs['bairro']),
			"cidade"=>utf8_encode($rs['cidade']),
			"uf"=>utf8_encode($rs['uf']),
			"avaliacao"=>utf8_encode($rs['avaliacao']),
			"qtdAvaliacoes"=>utf8_encode($rs['qtdAvaliacoes']),
			"tipoEstadia"=>utf8_encode($rs['tipoEstadia']),
			"regiao"=>utf8_encode($rs['regiao'])
			);
			echo json_encode($hotel);
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