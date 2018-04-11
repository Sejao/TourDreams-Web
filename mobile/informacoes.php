<?php 
	require_once('db.php');
	
	$sql = "SELECT * FROM vw_informacao";
	if($select = mysql_query($sql))
	{
		if($rows = mysql_fetch_array($select))
		{
			$return = utf8_encode($rows['telefone']).";".utf8_encode($rows['emailTourdreams']).";".utf8_encode($rows['logradouro']).",".utf8_encode($rows['numero']).";".utf8_encode($rows['cidade'])." - ".utf8_encode($rows['uf']);
			echo $return;
		}
	}

?>