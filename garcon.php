<?php
require_once "config.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ERP</title>
		<link rel="stylesheet" type="text/css" href="_css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="_css/style.css">
		<link rel="stylesheet" type="text/css" href="_css/bandeja.css">
        <script src="_JS/bandeja.js"></script>
        <script type="text/javascript" src="_JS/funcoes.js"></script>
	</head>

	<body>
		<div class="container-fluid text-center">
			<div class="row">
					<div class="col-lg-12 corpo">

						<h1>FAZER PEDIDO!</h1>

                        <form action="" method="post">

                            <section class="mesa col-lg-6 col-sm-6 col-md-6 container clearfix">

                                <div class="bandeja_toda">
                                    <div class="centro">
                                        <img id="toda_bandeja" class="bandeja" src="_img/tudo.png">
                                        <img id="direito" class="bandeja" src="_img/direito.png">
                                        <img id="esquerdo" class="bandeja" src="_img/esquerdo.png">
                                        <img id="baixo" class="bandeja" src="_img/baixo.png">

                                        <select onchange="mudaFoto1(this.value)" name="nsab1" id="isab1" class="abs entrada-hidden direito">
                                            <optgroup>
                                                <option selected value="">Sabor 1</option>
                                                <option>Calabresa</option>
                                                <option>Bacon</option>
                                                <option>Atum</option>
                                                <option value="Frango_Catupiri">Frango Catupiri</option>
                                            </optgroup>
                                        </select>

                                        <select onchange="mudaFoto2(this.value)" name="nsab2" id="isab2" class="abs entrada-hidden bottom">
                                            <optgroup>
                                                <option selected value="">Sabor 2</option>
                                                <option>Calabresa</option>
                                                <option>Bacon</option>
                                                <option>Atum</option>
                                                <option value="Frango_Catupiri">Frango Catupiri</option>
                                            </optgroup>

                                        </select>

                                        <select onchange="mudaFoto3(this.value)" name="nsab3" id="isab2" class="abs entrada-hidden esquerdo">
                                            <optgroup>
                                                <option selected value="">Sabor 3</option>
                                                <option>Calabresa</option>
                                                <option>Bacon</option>
                                                <option>Atum</option>
                                                <option value="Frango_Catupiri">Frango Catupiri</option>
                                            </optgroup>

                                        </select>
                                    </div>
                                    
                                </div>


                                <!--BOTÃO DE PEDIR PIZZA, E VALOR DO PEDIDO -->
                                <div class="row">
                                    <!--<input class="botao-pedir col-lg-6 col-md-6 col-sm-6 col-6" type="image" src="_imagens/confirmar.png"> -->

                                    <valor id="valor"class="col-lg-6 col-md-6 col-sm-6 col-6 right"><h2 id="valorhtml"></h2></valor>
                                </div>
                                </form>


                            </section>
                        </form>

					</div>
			</div>

		</div>
	</body>
</html>
<?php

if(isset($_POST[''])){

	
}
	