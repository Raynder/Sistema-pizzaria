<?php
require_once "../config.php";
session_start();
session_destroy();
$valor = 0;
if(isset($_GET['resultado']) && !empty($_GET['resultado'])){
    if($_GET['resultado'] == 'concluido'){
        $pedir = new Pedidos();
        $total = $pedir->contar_pedidos();
        $valor = 1;
    }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ERP</title>
		<link rel="stylesheet" type="text/css" href="../_css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../_css/style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="_JS/sweetAlert.js"></script>
	</head>

    <style>
        body, html {
            width: 100%;
            height: 100%;
            font-family: Arial, Tahoma, sans-serif;
        }

        #fundo-externo {
            overflow: hidden; /* para que não tenha rolagem se a imagem de fundo for maior que a tela */
            width: 100%;
            height: 100%;
            position: relative; /* criamos um contexto para posicionamento */
        }

        #fundo {
            position: fixed; /* posição fixa para que a possível rolagem da tela não revele espaços em branco */
            width: 100%;
            height: 100%;
        }

        #fundo img {
            width: 100%; /* com isso imagem ocupará toda a largura da tela. Se colocarmos height: 100% também, a imagem irá distorcer */
            position: absolute;
        }
        #site {
            border-radius: 50px;
            display: none;
            position: absolute;
            top: 50%;
            height: 0;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 0;
            padding: 20px;
            background: #FFF; /* fundo branco para navegadores que não suportam rgba */
            background: rgb(0 0 0 / 90%); /* fundo preto com um pouco de transparência */
        }
        h1{
            color: white;
            font-size: 0pt;
            font-family: 'Dancing Script', cursive;
        }
        .test{
            color: white;
            font-size: 0pt;
            font-family: 'Dancing Script', cursive;
        }
        .opaco{
            opacity: .3;
        }

        p {
            margin-bottom: 1.5em;
        }
        .mesa{
            top: 50%;
            position: relative;
            transform: translateY(-50%);
        }
        input{
            border-radius: 20px;
            box-shadow: 0 0 0 0;
            border: 0 none;
            outline: 0;
        }
        input[type='submit']{
            margin-top: 5%;
        }
    </style>

    <script>
    
    
    function alerta(){
        var tam1 = 0
        var tam2 = 0
        var tam3 = 0
        var cont = 0
        var opaco = 1

        var site = document.getElementById("site")
        var letra = document.getElementById("letra")
        var fundo = document.getElementById("fundo-externo")
        site.style.display = "block"

        var intervalo = setInterval(function(){
            tam1 += 2,5
            tam2 += 20
            tam3 += 2.56
            if(tam1 <= 50){
                site.style.width = tam1+'%'
                site.style.height = tam2+'px'
                letra.style.fontSize = tam3+'pt'
            }
            else{
                clearInterval(intervalo)
            }
            cont++
            if(cont == 3){
                fundo.style.opacity = opaco
                opaco = opaco - 0.1
                cont = 0
            }
        },10)
    }
    </script>

	<body>
    <div id="fundo-externo">
        <div id="fundo" onclick="alerta()">
            <img src="../_img/fundo.png" alt="" />
        </div>
    </div>
        <div id="site" class="container-fluid text-center">
			<div class="row">
                <div class="col-lg-12 corpo">
                    <div class="nome">
                        <h1 id="letra">Seu nome:</h1>
                        <form action="1sabores.php" method="post">
                            <input type="text" name="cliente">
                            <input type="submit" value="OK">
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        
	</body>
    <script>
        
    pedidofeito(<?=$total?>,<?=$valor?>)
    </script>
</html>
<?php

?>
	