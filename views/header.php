<?php
	session_start();
	$msgLogin = '';
	if(isset($_GET['erroLogin']))
	{
		$msgLogin = "Usuário ou senha incorretos. Tente novamente.";
	}
	if(isset($_GET['dbLogin']))
	{
		$msgLogin = "Há um erro no servidor de login. Tente novamente mais tarde";
	}
	if(isset($_GET['cotacao']))
	{
		$_SESSION['cotacao'] = $_GET['cotacao'];
		$_SESSION['moeda'] = $_GET['moeda'];
		$_SESSION['simbolo'] = $_GET['simbolo'];
		header('Location:homepage.php');
	}
 ?>
<!--Modal de busca avançada-->
<div id="buscaAvancadaBackground">
	<form action="busca.php?modo=avancada&btn_pesquisar=PESQUISAR" method="get" autocomplete="off">
		<div id="buscaAvancadaBox">
			<div id="fecharBusca"><h4>Busca Avançada</h4><span onclick="abrirBusca()">X</span></div>
			<div id="conteudoBuscaEsquerda">
				<table>
					<tr>
						<td><label>Destino</label></td>
					</tr>
					<tr>
						<td><input type="text" name="txtDestinoAvancado" value="" id="txtDestinoAvancado" required onkeyup="buscaAvancada()">
							<div id="buscaTRA">
							</div>
						</td>
					</tr>
					<tr>
						<td><label>Tipo de estadia</label></td>
					</tr>
					<tr>
						<td>
							<select name="slcTipoEstadia">
								<option value="0">Selecione uma estadia</option>
								<?php

									require_once ('controllers/buscaAvancada_controller.php');
								   $controllerSelectBuscaAvancada = new ControllerSelectBuscaAvancada();
									 $rows = $controllerSelectBuscaAvancada->ListarTipoDeEstadia();
									 $cont = 0;

									 while ($cont < count($rows)) {


								 ?>
								 <option value="<?php echo ($rows[$cont]->idEstadia); ?>"><?php echo ($rows[$cont]->estadia); ?></option>


								 <?php
								 $cont += 1;
									}

								  ?>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Estrelas</label></td>
					</tr>
					<tr>
						<td>
							<select name="slcEstrela">

								<option value="0">Selecione a quantidade de estrelas</option>
								<option value="1">1 Estrela</option>
								<option value="2">2 Estrelas</option>
								<option value="3">3 Estrelas</option>
								<option value="4">4 Estrelas</option>
								<option value="5">5 Estrelas</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Parceiro</label></td>
					</tr>
					<tr>
						<td>
							<select name="slcParceiro">
								 <option value="0">Selecione um Parceiro</option>
								<?php

								require_once('controllers/buscaAvancada_controller.php');

								$controllerParceiro = new ControllerSelectBuscaAvancada();
								$rows = $controllerParceiro->ListarParceiro();
								$cont = 0;

								while ($cont < count($rows)) {



								 ?>

								<option value="<?php echo ($rows[$cont]->idParceiro); ?>"><?php echo ($rows[$cont]->parceiro); ?></option>

								<?php
								$cont +=1;
								}

								 ?>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Avaliação</label></td>
					</tr>
					<tr>
						<td>
							<select name="slcAvaliacao">
								<option value="0">Selecione uma Avaliação</option>
								<option value="25">Menor que 25</option>
								<option value="50">Menor que 50</option>
								<option value="75">Menor que 75</option>
								<option value="75">Acima de 75</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Preço</label></td>
					</tr>
					<tr>
						<td>
							<select name="slcPreco">
								<option value=">0">Selecione um preço</option>
								<option value="<100">R$ 0,00 - R$ 99,99</option>
								<option value="<300">R$ 100,00 - R$ 299,99</option>
								<option value="<500">R$ 300,00 - R$ 499,99</option>
								<option value="<1000">R$ 500,00 - R$ 999,99</option>
								<option value=">1000">Acima de R$ 1000,00</option>
							</select>
						</td>
					</tr>
				</table>
			</div>
			<div id="conteudoBuscaDireita">
				<div id="comodidadesBox">
					<h3>Comodidades do Hotel</h3>
					<ul>
						<?php

								require_once('controllers/buscaAvancada_controller.php');

							$controllerComodidadeHotel = new ControllerSelectBuscaAvancada();
							$rows = $controllerComodidadeHotel->ListarComodidadeHotel();
							$cont = 0;

							while ($cont < count ($rows)) {



						 ?>
						<li><input type="checkbox" name="<?php echo('chk'.$rows[$cont]->idComodidadeHotel) ?>" value="<?php echo ($rows[$cont]->comodidadesHotel) ?>"><label><?php echo ($rows[$cont]->comodidadesHotel) ?></label></li>
						<?php
						$cont +=1;
						}
						 ?>
					</ul>
					<h3>Comodidades do Quarto</h3>
					<ul>
						<?php

						require_once('controllers/buscaAvancada_controller.php');

						$controllerComodidadeQuarto = new ControllerSelectBuscaAvancada();
						$rows = $controllerComodidadeQuarto->ListarComodidadeQuarto();
						$cont =0;
						while ($cont < count($rows)) {


						 ?>
						<li><input type="checkbox" name="<?php echo('comodidadeHotel'.$rows[$cont]->idComodidadeQuarto)?>" value="<?php echo ($rows[$cont]->comodidadesQuarto); ?>"><label><?php echo ($rows[$cont]->comodidadesQuarto); ?></label></li>

						<?php
						$cont+=1;
					}
						 ?>
					</ul>
				</div>
                <script type="text/javascript">
                	$("#comodidadesBox").accordion();
                	$("#buscaAvancadaBackground").toggle();
                    $("#buscaAvancadaBackground").css('opacity', 1);
                </script>
			</div>
				<input type="submit" id="btnBuscaAvancada" value="PESQUISAR" name="btn_pesquisar">
		</div>
	</form>
</div>
<!---->
<div id="modalBg" onclick="fecharMenuResponsivo()">
</div>
<div id="menuResponsivoBox">
	<div id="menuResponsivoBusca">
		<form method="post" action="busca.php?btn_pesquisar=buscaRapida" autocomplete="off">
			<input type="text" name="txtDestino2" placeholder="Digite seu destino..." id="txtDestino2" required>
			<input type="image" src="imagens/pesquisar.png"  draggable="false" onmousedown="return false" style="user-drag: none" alt="Pesquisar">
		</form>
		<input type="image" onclick="abrirBusca()" src="imagens/pesquisaravancado.png"  draggable="false" onmousedown="return false" style="user-drag: none" alt="Busca avançada">
	</div>
	<ul>
		<li><a href="homepage.php">Home</a></li>
		<li><a href="sobrenos.php">Sobre nós</a></li>
		<li><a href="parceiros.php">Nossos Parceiros</a></li>
		<li><?php if(isset($_SESSION['login'])){
						if($_SESSION['login'] == 'true'){
			?>
				<a href="melhoresDestinos.php">Melhores Destinos</a>
			<?php
						}
					}else{

			?>
							<a href="login.php?melhoresdestinos">Melhores Destinos</a>
		<?php } ?></li>
		<li><a href="conhecaseudestino.php">Conheça seu Destino</a></li>
		<li><a href="promocoes.php">Promoções</a></li>
		<li><a href="faleconosco.php">Fale Conosco</a></li>
	</ul>
	<hr>
	<ul>
		<li><a href="login.php">Login</a></li>
		<li><a href="registroUsuario.php">Criar conta</a></li>
	</ul>
</div>
<!--Cabeçalho-->
<header>
	<div id="headerMenu">
		<div id="menuResponsivo" onclick="abrirMenuResponsivo()">
			&#9776;
		</div>
		<!--Logo da empresa-->
		<div id="headerLogo">
			<a href="homepage.php">
				<img src="imagens/TourDreams.png" alt="TourDreams" onmousedown="return false">
			</a>
		</div>
		<!---->
		<!--Formulário de busca-->

		<div id="headerBusca">
			<form method="post" action="busca.php?btn_pesquisar=buscaRapida" autocomplete="off">
				<input type="text" name="txtDestino" placeholder="Digite seu destino..." id="txtDestino" required>
				<div id="buscaTR">
				</div>
				<input type="image" src="imagens/pesquisar.png"  draggable="false" onmousedown="return false" style="user-drag: none" alt="Pesquisar">
			</form>
				<input type="image" onclick="abrirBusca()" src="imagens/pesquisaravancado.png"  draggable="false" onmousedown="return false" style="user-drag: none" alt="Busca avançada">
		</div>
		<!---->
		<!--Botão de login-->
		<?php
			if(isset($_SESSION['login']))
			{
				if($_SESSION['login'] != 'true')
				{
					?>
					<div class="headerBtn" style="border-left: 2px solid #fff;" onclick="headerLogin()">
						<img src="imagens/user.svg" alt="Login" draggable="false" onmousedown="return false" style="user-drag: none" >
						Login
					</div>
					<?php
				}
				else
				{
					?>
					<div class="headerBtn" style="border-left: 2px solid #fff;">
						<img src="imagens/user.svg" alt="Login" draggable="false" onmousedown="return false" style="user-drag: none" onclick="<?php if($_SESSION['tipoLogin'] == 'usuario'){echo ('abrirPerfilUsuario()');}else{echo ('abrirPerfilParceiro('.$_SESSION['idParceiro'].')');} ?>">
						<?php echo($_SESSION['nome']); ?>
					</div>
					<?php
				}
			}
			else
			{
				?>
				<div class="headerBtn" style="border-left: 2px solid #fff;" onclick="headerLogin()">
					<img src="imagens/user.svg" alt="Login" draggable="false" onmousedown="return false" style="user-drag: none" >
					Login
				</div>
				<?php
			}
		 ?>
		<!---->
		<!--Botão de moeda-->
		<div class="headerBtn" style="margin-right: 0; " onclick="headerMoeda()">
			<img style="width:68px;height:68px;margin-top:7px;" src="imagens/coin.svg" alt="Moeda" draggable="false" onmousedown="return false">
			Moeda
		</div>
		<!---->
	</div>
	<!--Menu da páginas-->
	<div id="headerCategorias">
		<div id="headerCategoriasBox">
			<ul id="categorias">
				<li><a href="homepage.php">HOME</a></li>
				<li><a href="sobrenos.php">SOBRE NÓS</a></li>
				<li><a href="parceiros.php">NOSSOS PARCEIROS</a></li>
				<li><?php if(isset($_SESSION['login'])){
								if($_SESSION['login'] == 'true'){
					?>
						<a href="melhoresDestinos.php">MELHORES DESTINOS</a>
					<?php
								}
							}else{

					?>
									<a href="login.php?melhoresdestinos">MELHORES DESTINOS</a>
				<?php } ?>
				</li>
				<li><a href="conhecaseudestino.php">CONHEÇA SEU DESTINO</a></li>
				<li><a href="promocoes.php">PROMOÇÕES</a></li>
				<li><a href="faleconosco.php">FALE CONOSCO</a></li>
			</ul>
		</div>
	</div>
	<!---->
	<!--Menu de login-->
	<div id="headerLogin" style="display: none;">
		<form action="router.php?controller=login" method="POST">
			<table>
				<tr>
			    	<td colspan="2"><h2>Acesse sua Conta</h2></td>
				</tr>
				<tr>
					<td colspan="2"><div id="msgLogin"><?php echo ($msgLogin); ?></div></td>
				</tr>
				<tr>
					<td colspan="2"><label>Login</label></td>
				</tr>
				<tr>
					<td colspan="2"><input type="text" name="txtLogin" placeholder="login@exemplo.com"></td>
				</tr>
				<tr>
					<td colspan="2"><label>Senha</label></td>
				</tr>
				<tr>
					<td colspan="2"><input type="password" name="txtSenha" placeholder="******"></td>
				</tr>
				<tr>
					<td style="width: 50%; max-width: 50%;"><input type="submit" name="btnLogin" value="Login" id="btnLogin"></td><td style="width: 50%; max-width: 50%;"><input type="submit" name="btnRegistro" value="Criar Conta" id="btnNovoUsuario"></td>
				</tr>
				<tr>
					<td colspan="2"><a href="#"><h3>Esqueci minha senha</h3></a></td>
				</tr>
			</table>
		</form>
	</div>
	<!---->
	<!--Menu de moeda-->
	<div id="headerMoeda" style="display: none;">
		<ul>
			<?php
			//Inclusão do arquivo controller para fazer o SELECT.
			require_once('controllers/moedas_controller.php');

			/*Instância do objeto da controller e chamada para metódo de listagem
			dos registros*/
			$controller_moeda = new ControllerMoeda();
			$moeda = $controller_moeda -> Listar();

			$cont = 0;
			while($cont < count($moeda))
			{
			?>
				<li><a href="?cotacao=<?php echo($moeda[$cont]->valor) ?>&moeda=<?php echo($moeda[$cont]->nome) ?>&simbolo=<?php echo($moeda[$cont]->simbolo) ?>"><?php echo($moeda[$cont]->nome.' ('.$moeda[$cont]->simbolo.')') ?></a></li>
			<?php
			$cont += 1;
			}
			 ?>
		</ul>
	</div>
	<!---->
</header>
<!---->
