<?php
require_once "../config.php";
session_start();
$total_a_pagar = 0;

if(isset($_SESSION['nome']) && !empty($_SESSION['nome'])){
    if($_SESSION['nome'] == "admin21"){
    }
    else{
        header("location:../pedir/index.php");
    }
}
else{
    header("location:../pedir/index.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ERP</title>
		<link rel="stylesheet" type="text/css" href="../_css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../_css/style.css">
		<link rel="stylesheet" type="text/css" href="../_css/bandeja.css">
        <link rel="stylesheet" type="text/css" href="../_css/index.css">
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="../_JS/sweetAlert.js"></script>

        <script src="_JS/slids.js" type="text/javascript"></script>
        <script src="_JS/modificar.js" type="text/javascript"></script>
        
	</head>

    <style>
    
        .bloco_img {
            width: 15%;
        }

    
    </style>

	<body>
        <nav>
            <div class="row" id="">
                <a href="index.php"><img src="../_img/icone.png" class="icone" width="80" height="60"></a>
                <?php
                    if($_SESSION['nome'] == "admin21"){
                        echo("<a href='../pedir/1sabores.php' class='nav-link'>NOVO PEDIDO</a>
                        <a class='nav-link'>PEDIDOS</a>
                        <a class='nav-link'>PRONTOS</a>");
                    }
                ?>
            </div>
        </nav>

		<div class="container-fluid text-center">
			<div class="row">
					<div class="col-lg-12 corpo">
                        
                        <form id="func" action="../pedir/1sabores.php" method="post" style="display:none">
                            <input type="text" name="ver" id="ver">
                            <input type="text" name="cliente" id="cliente">
                            <input type="text" name="voltar" id="voltar">
                        </form>

                        <form action="" method="post" id="band">
                            <script>
                                window.onload = entrar_bandeja()
                            </script>

                            <div id="opc3" style="display:block">
                                <h1>FILA DE PEDIDOS</h1>

                            <?php
                                    $gerir = new Gerente();
                                    $pedidos = $gerir->mostrar_agurdando();
                                   
                                    foreach($pedidos as $pedido){
                                        $id_pizza = $pedido['id'];
                                        $nomeCliente = $pedido['nome'];
                                        $situacao = $pedido['situacao'];

                                        $totPizzas = $gerir->total_pizzas($nomeCliente);
                                        $totBebidas = $gerir->total_bebidas($nomeCliente);
                                        ?>
                                            

                                
                                <div class="pedido pizzas col-lg-12 col-md-12 col-sm-12">
                                    <div class="bloco bloco_img">
                                        <img src="_img/cliente.png" class="pizza" alt="">
                                    </div>

                                    <div class="bloco">
                                        <?php

                                        echo("<h2 class='sem_margin'>$nomeCliente</h2>");
                                        echo("<p class='sem_margin'>$situacao</p>");
                                        echo("<p class='sem_margin'>Pizzas $totPizzas</p>");
                                        echo("<p class='sem_margin'>Bebidas $totBebidas</p>");
                                        ?>
                                    </div>
                                            
                                    <div class="bloco_a_direita">
                                        <img style="height:50px" src="../_img/remover.png" alt="" onclick="remover_pedido('<?=$nomeCliente;?>'')">
                                        <p>remover</p>
                                    </div>

                                    <div class="bloco_a_direita">
                                        <img style="height:50px" src="../_img/editar.png" alt="" onclick="editar_pedido('<?=$nomeCliente;?>')">
                                        <p>editar</p>
                                    </div>

                                    <div class="bloco_a_direita">
                                        <img style="height:50px" src="_img/relogio.png" alt="" onclick="preparar('<?=$nomeCliente;?>')">
                                        <p>Preparar</p>
                                    </div>
                                </div>

                                        <?php
                                        
                                    }

                                    $bebidas = $gerir->mostrar_bebidas($_SESSION['nome']);
                                    
                                    foreach($bebidas as $beb){
                                        
                                        $id_beb = $beb['id'];
                                        $nomebeb = $beb['bebida'];

                                       
                                    }
                                    echo("<script>document.getElementById('total_a_pagar').innerHTML = $total_a_pagar</script>");

                            ?>
                                    <input class="bt" type="button" value="Pedir mais" onclick="pedir_mais()">
                                    <input class="bt" type="button" value="Bebidas" onclick="bebidas()">
                                    <input class="bt confirm" type="button" value="Finalizar pedido" onclick="finalizar_pedido(<?=$total_a_pagar?>)">

                                </div>
                                
                            </div>

                            <div id="opc4" style="display:none">
                                <div class="pedido bebidas col-lg-12 col-md-12 col-sm-12">

                                <div class="bloco">
                                        <img onclick="adicionarbeb('Coca_2lt')" src="../_img/_bebidas/Coca_2lt.png" alt="">
                                        <figcaption>
                                            <p>Coca-cola 2Lt</p>
                                        </figcaption>
                                    </div>
                                    <div class="bloco">
                                        <img onclick="adicionarbeb('Coca_600ml')" src="../_img/_bebidas/Coca_600ml.png" alt="">
                                        <figcaption>
                                            <p>Coca-cola 600ml</p>
                                        </figcaption>
                                    </div>
                                    <div class="bloco">
                                        <img onclick="adicionarbeb('Coca_lata')" src="../_img/_bebidas/Coca_lata.png" alt="">
                                        <figcaption>
                                            <p>Coca-cola Lata</p>
                                        </figcaption>
                                    </div>
                                    <div class="bloco">
                                        <img onclick="adicionarbeb('Guarana_2lt')" src="../_img/_bebidas/Guarana_2lt.png" alt="">
                                        <figcaption>
                                            <p>Guarana 2Lt</p>
                                        </figcaption>
                                    </div>
                                    <div class="bloco">
                                        <img onclick="adicionarbeb('Guarana_600ml')" src="../_img/_bebidas/Guarana_600ml.png" alt="">
                                        <figcaption>
                                            <p>Guarana 600ml</p>
                                        </figcaption>
                                    </div>
                                    <div class="bloco">
                                        <img onclick="adicionarbeb('Guarana_lata')" src="../_img/_bebidas/Guarana_lata.png" alt="">
                                        <figcaption>
                                            <p>Guarana Lata</p>
                                        </figcaption>
                                    </div>
                                </div>
                            </div>
                                    
                            <input type="text" id="ver" name="ver" style="display:none" value="">
                            <input type="text" id="apagar" name="apagar" style="display:none" value="">
                            <input type="text" id="apagarbeb" name="apagarbeb" style="display:none" value="">
                            <input type="text" id="editar" name="editar" style="display:none" value="">
                            <input type="text" id="bebida" name="bebida" style="display:none" value="">
                            <input type="text" id="final" name="final" style="display:none" value="">
                            
                        </form>

                        

					</div>
			</div>

        </div>
        
        <?php
            if($_GET['resultado']){
                if($_GET['resultado'] == 'concluido'){
                    echo("<script>alteracao_concluida()</script>");
                }
            }
        ?>
        
	</body>
</html>
	