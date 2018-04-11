<?php

	require_once('controllers/landing_controller.php');
	$listarLanding = new ControllerLanding();

	$row = $listarLanding->ListarLanding();


 ?>

<script type="text/javascript">
	//Oculta os menus e modal de busca não utilizados
	$('#headerCategorias').hide();
	$("#headerBusca").hide();
	$("#buscaAvancadaBackground").hide();
</script>
<!--Imagem de fundo-->
<div id="background">
	<img src="<?php echo($row->caminhoImagem);?>" alt="background"  draggable="false" onmousedown="return false" style="user-drag: none">
</div>
<!---->
<!--Formulário de busca-->
<section>
	<div id="formBox">
		<form method="post" action="busca.php?btn_pesquisar=buscaRapida">
			<input type="text" name="txtDestino" placeholder="Digite seu destino...">
			<input type="image" alt="img" src="imagens/pesquisar.png"  draggable="false" onmousedown="return false" style="user-drag: none">
		</form>
		<a href="homepage.php">
			<div id="buttonEntrar"  onmousedown="return false">
				Entrar no site
			</div>
		</a>
	</div>
</section>
<!---->



/ .
