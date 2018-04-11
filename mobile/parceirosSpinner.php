<?php 
	require_once('db.php');
	
	$array = array();
	
	$sql = "SELECT idParceiro, cnpj, nomeParceiro, emailParceiro, caminhoImagem FROM tbl_parceiro AS p INNER JOIN tbl_imagem AS i ON i.idImagem=p.idImagem;";
	$select = mysql_query($sql);
	
	while($rows=mysql_fetch_array($select))
	{
		$parceiro = array(
			"idParceiro"=>utf8_encode($rows['idParceiro']),
			"cnpj"=>utf8_encode($rows['cnpj']),
			"nomeParceiro"=>utf8_encode($rows['nomeParceiro']),
			"emailParceiro"=>utf8_encode($rows['emailParceiro']),
			"caminhoImagem"=>utf8_encode($rows['caminhoImagem'])
		);
		$array[] = $parceiro;
	}
	
	echo json_encode($array);

?>