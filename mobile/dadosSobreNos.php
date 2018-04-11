<?php
	require_once('db.php');
	
	$sql = "SELECT * FROM vw_sobrenos_mobile";
	if($select = mysql_query($sql))
	{
		if($rs = mysql_fetch_array($select))
		{

			echo(utf8_encode($rs['descricaoSuperior']).';'.utf8_encode($rs['imgVisao']).';'.utf8_encode($rs['visao']).';'.utf8_encode($rs['imgValores']).';'.utf8_encode($rs['valores']).';'.utf8_encode($rs['imgMissao']).';'.utf8_encode($rs['missao']).';'.utf8_encode($rs['anoUm']).';'.utf8_encode($rs['descricaoUm']).';'.utf8_encode($rs['anoDois']).';'.utf8_encode($rs['descricaoDois']).';'.utf8_encode($rs['anoTres']).';'.utf8_encode($rs['descricaoTres']).';');
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