<?php 
	require_once('db.php');
	
	$array = array();
	
	$sql = "SELECT * FROM tbl_tipodelocal WHERE idTipoDeLocal <> 1";
	$select = mysql_query($sql);
	
	while($rows=mysql_fetch_array($select))
	{
		$tipodelocal = array(
			"idTipoDeLocal"=>utf8_encode($rows['idTipoDeLocal']),
			"tipoDeLocal"=>utf8_encode($rows['TipoDeLocal'])
		);
		$array[] = $tipodelocal;
	}
	
	echo json_encode($array);

?>