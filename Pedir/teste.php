<?php
require_once "../config.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ERP</title>
		<link rel="stylesheet" type="text/css" href="../_css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../_css/style.css">
		<link rel="stylesheet" type="text/css" href="../_css/bandeja.css">
        <script src="_JS/x2.js" type="text/javascript"></script>
        <script src="_JS/slids.js" type="text/javascript"></script>
        <script type="text/javascript" src="../_JS/funcoes.js"></script>
	</head>

    <style>
    
        .imgem{
            float: left;
        }
        .imgem img{
            width: 60%;
        }
        .imgem p{
            font-size: 20pt;
        }
        .imgem.im1 {
            left: 10%;
        }
        .imgem.im3 {
            right: 10%;
        }
    
    </style>

	<body>
		<div class="container-fluid text-center">
			<div class="row">
					<div class="col-lg-12 corpo">

                        <form action="" method="get" id="band">

                                
                            
                            <div class="tamanhos" id="sabores">
                                <h1>QUANTOS SABORES?</h1>
                                <a href="1sabores.php"><img src="sabor1x.png" alt=""></a>
                                <a href="2sabores.php"><img src="sabor2x.png" alt=""></a>
                                <a href="3sabores.php"><img src="sabor3x.png" alt=""></a>

                            </div>

                            <div class="tamanhos" id="tamanhos" style="display:none">
                                <h1>TAMANHO DA PIZZA?</h1>

                                    <div onclick="selec('pequena')" class="imgem im1 col-lg-4 col-md-4 col-sm-4 col-4">
                                        <img src="sabor1x.png" alt="pizza pequena" class="imgt" id="idpequena">
                                        <figcaption>
                                            <p>Pequena</p>
                                        </figcaption>
                                    </div>

                                    <div onclick="selec('media')" class="imgem im2 col-lg-4 col-md-4 col-sm-4 col-4">
                                        <img src="sabor1x.png" alt="pizza media"  class="imgt" id="idmedia">
                                        <figcaption>
                                            <p>Media</p>
                                        </figcaption>
                                    </div>

                                    <div onclick="selec('grande')" class="imgem im3 col-lg-4 col-md-4 col-sm-4 col-4">
                                        <img src="sabor1x.png" alt="pizza grande" class="imgt" id="idgrande">
                                        <figcaption>
                                            <p>Grande</p>
                                        </figcaption>
                                    </div>
                                
                                

                            </div>


                            <div id="opc1">

                                <h1>ESCOLHA AQUI OS SABORES!</h1>


                                <section class="mesa col-lg-6 col-sm-6 col-md-6 container clearfix">

                                    <div class="bandeja_toda">
                                        <div class="centro x2">
                                            <img id="direito" class="bandeja" src="_img2x/direito.png">
                                            <img id="esquerdo" class="bandeja" src="_img2x/esquerdo.png">

                                            <select onchange="mudaFoto1(this.value)" name="nsab1" id="isab1" class="entrada-hidden direito2x">
                                                <optgroup>
                                                    <option value="calabresa">Calabresa</option>
                                                    <option value="bacon">Bacon</option>
                                                    <option value="atum">Atum</option>
                                                    <option value="Frango_Catupiri">Frango Catupiri</option>
                                                </optgroup>
                                            </select>

                                            <select onchange="mudaFoto2(this.value)" name="nsab2" id="isab2" class="entrada-hidden esquerdo2x">
                                                <optgroup>
                                                    <option value="calabresa">Calabresa</option>
                                                    <option value="bacon">Bacon</option>
                                                    <option value="atum">Atum</option>
                                                    <option value="Frango_Catupiri">Frango Catupiri</option>
                                                </optgroup>

                                            </select>

                                            <input type="button" value="enviar" onclick="sair_bandeja()">

                                        </div>
                                        
                                    </div>


                                    <!--BOTÃO DE PEDIR PIZZA, E VALOR DO PEDIDO -->
                                    <div class="row">
                                        <!--<input class="botao-pedir col-lg-6 col-md-6 col-sm-6 col-6" type="image" src="_imagens/confirmar.png"> -->

                                        <valor id="valor"class="col-lg-6 col-md-6 col-sm-6 col-6 right"><h2 id="valorhtml"></h2></valor>
                                    </div>


                                    
                                </section>

                            </div>

                            <div id="opc2" style="display:none">


                                <div class="checks">
                                
                                    <input type="checkbox" name="pequena" id="pequena">
                                    <input type="checkbox" name="media" id="media">
                                    <input type="checkbox" name="grande" id="grande">

                                </div>

                                <h1>DEFINA A BORDA!</h1>

                                <div>
                                    <select name="nbor" class="bordas">
                                        <option selected value=" ">Nenhuma Borda</option>
                                        <option value="Catupiri ">Borda de Catupiri</option>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <label id="titulo"><p>Deseja remover algo?<br>informe aqui:</p></label>
                                </div>
                                <div class="col-lg-12">

                                <textarea id="entrada-text" class="entrada"
                                        placeholder="Dica: Sem cebola na de Calabresa e sem azeitona em todas." rows="7"
                                        name="obs"></textarea>
                                        <input type="submit">                                </div>

                            </div>

                        </form>

                        

					</div>
			</div>

        </div>
        <script>
            window.onload = entrar_bandeja()
        </script>
	</body>
</html>
<?php

if(isset($_POST[''])){

	
}
	