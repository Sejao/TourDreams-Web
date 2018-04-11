<?php 
	$login = $_GET['login'];
	$senha = $_GET['senha'];
	
	require_once('db.php');
	
	$sql = "SELECT * FROM tbl_login WHERE login='".$login."' AND senha='".$senha."';";
	
	if($select = mysql_query($sql))
	{
		if($rows = mysql_fetch_array($select))
		{
			if(utf8_encode($rows['idTipoLogin']) == 2)
			{
				echo ('parceiro');
			}
			else if(utf8_encode($rows['idTipoLogin']) == 1)
			{
				echo ('usuario');
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
	}
	else
	{
		echo ('erro');
	}
	
	
?>