<!--Rodapé-->
<footer>
    <div id="footer">
        <!--Caixa de links úteis de navegação-->
        <div id="footerLinkBox">
            <h3>Links úteis</h3>
            <div class="footerLink">
                <ul>
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="sobrenos.php">Sobre Nós</a></li>
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
                    <li><a href="conhecaseudestino.php">Conheça seu destino</a></li>
                    <li><a href="promocoes.php">Promoções da semana</a></li>
                    <li><a href="faleconosco.php">Fale Conosco</a></li>
                </ul>
            </div>
            <div class="footerLink">
                <ul>
                    <li onclick="buscarRegiao('Norte')">Norte</li>
                    <li onclick="buscarRegiao('Nordeste')">Nordeste</li>
                    <li onclick="buscarRegiao('Centro-Oeste')">Centro-Oeste</li>
                    <li onclick="buscarRegiao('Sudeste')">Sudeste</li>
                    <li onclick="buscarRegiao('Sul')">Sul</li>
                </ul>
            </div>
        </div>
        <!---->
        <!--Caixa de espaçamento-->
        <div id="footerParceirosBox">
        </div>
        <!---->
        <!--Caixa dos dados da empresa-->
        <div id="footerDados">
            <div id="footerLogo">
                <img src="imagens/TourDreams.png" alt="TourDreams" onmousedown="return false">
            </div>
            <h3>Nossas redes sociais:</h3>
            <div id="footerRedeSocialBox">
                <a href="#">
                    <div class="footerRedeSocial">
                        <img id="face" src="imagens/faceBranco.svg" alt="Facebook" onmousedown="return false">
                    </div>
                </a>
                <a href="#">
                    <div class="footerRedeSocial">
                        <img id="twitter" src="imagens/twitterBranco.svg" alt="Twitter" onmousedown="return false">
                    </div>
                </a>
                <a href="#">
                    <div class="footerRedeSocial">
                        <img id="youtube" src="imagens/youtubeBranco.svg" alt="YouTube" onmousedown="return false">
                    </div>
                </a>
                <a href="#">
                    <div class="footerRedeSocial">
                        <img id="insta" src="imagens/instaBranco.svg" alt="Instagram" onmousedown="return false">
                    </div>
                </a>
                <a href="#">
                    <div class="footerRedeSocial">
                        <img id="gmail" src="imagens/gmailBranco.svg" alt="Email" onmousedown="return false">
                    </div>
                </a>
            </div>
        </div>
        <!---->
    </div>
</footer>
<!---->
