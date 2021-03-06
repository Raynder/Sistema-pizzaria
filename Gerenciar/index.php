<?php
require_once "../config.php";
session_start();
$total_a_pagar = 0;

if(isset($_SESSION['nome']) && !empty($_SESSION['nome'])){
    if($_SESSION['nome'] == "admin21"){
        if(isset($_POST['acao']) && !empty($_POST['acao'])){
            $nomePedido = $_POST['cliente_acao'];
            $acao = $_POST['acao'];
            $gerir = new Gerente();
            $gerir->$acao($nomePedido);
        }
    }
    else{
        header("location:../pedir/index.php");
    }
}
else{
    header("location:../pedir/index.php");
}
if(isset($_POST['apagar'])){ 
    $nome_apagar = $_POST['apagar'];
    $gerir = new Gerente();
    $gerir->remover_pedido($nome_apagar);
}
if(isset($_POST['desconto_removido'])){ 
    $remov = $_POST['desconto_removido'];
    $gerir = new Gerente();
    $gerir->remover_desconto($remov);
}
if(isset($_POST['desconto']) && !empty($_POST['desconto'])){
    $gerir = new Gerente();
    $cliente_pagador = $_POST['cliente_pagador'];
    $total_desconto = $_POST['valor_total'] - $_POST['total_pagar'];
    $gerir->alterar_desconto($total_desconto,$cliente_pagador);
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
        
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="_JS/sweetAlert.js"></script>

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
                        <a onclick='sair_bandeja(0)' class='nav-link'>PEDIDOS</a>
                        <a onclick='sair_bandeja(1)' class='nav-link'>PREPARANDO</a>
                        <a onclick='sair_bandeja(2)' class='nav-link'>PRONTOS</a>");
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

                        <form id="func_interna" action="" method="post" style="display:none">
                            <input type="text" id="acao" name="acao">
                            <input type="text" id="cliente_acao" name="cliente_acao">
                            <input type="text" id="desconto_removido" name="desconto_removido">
                            <input type="text" name="apagar" id="apagar">
                        </form>

                        <form action="" method="post" id="band">
                            <div id="opc1" style="display:block">
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
                                        <img style="height:50px" src="../_img/remover.png" alt="" onclick="remover_pedido('<?=$nomeCliente;?>')">
                                        <p>remover</p>
                                    </div>

                                    <div class="bloco_a_direita">
                                        <img style="height:50px" src="../_img/editar.png" alt="" onclick="editar_pedido('<?=$nomeCliente;?>')">
                                        <p>editar</p>
                                    </div>

                                    <div class="bloco_a_direita">
                                    
                                        <script src="_JS/modificar.js" type="text/javascript"></script>
                                        <img style="height:50px" src="_img/relogio.png" alt="" onclick="prepara('<?=$nomeCliente;?>')">
                                        <p>Preparar</p>
                                        
                                        <script src="_JS/modificar.js" type="text/javascript"></script>
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

                            </div>

                            <div id="opc2" style="display:none">
                                <h1>FILA DE PEDIDOS</h1>

                            <?php
                                    $gerir = new Gerente();
                                    $pedidos = $gerir->mostrar_preparando();
                                   
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
                                        <img style="height:50px" src="_img/relogio.png" alt="" onclick="termina('<?=$nomeCliente;?>')">
                                        <p>Terminar</p>
                                    </div>
                                </div>

                                        <?php
                                        
                                    }

                                    $bebidas = $gerir->mostrar_bebidas_preparando($_SESSION['nome']);
                                    
                                    foreach($bebidas as $beb){
                                        
                                        $id_beb = $beb['id'];
                                        $nomebeb = $beb['bebida'];

                                       
                                    }
                                    echo("<script>document.getElementById('total_a_pagar').innerHTML = $total_a_pagar</script>");

                            ?>

                            </div>

                            <div id="opc3" style="display:none">
                                <h1>FILA DE PEDIDOS</h1>

                            <?php
                                    $gerir = new Gerente();
                                    $pedidos = $gerir->mostrar_pronto();
                                   
                                    foreach($pedidos as $pedido){
                                        $id_pizza = $pedido['id'];
                                        $nomeCliente = $pedido['nome'];
                                        $situacao = $pedido['situacao'];
                                        $des = $pedido['desconto'];

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
                                        <img style="height:50px" src="_img/relogio.png" alt="" onclick="finaliza('<?=$nomeCliente?>',<?=$gerir->calc_total($nomeCliente);?>, 1)">
                                        <p>Finalizar</p>
                                    </div>
                                </div>

                                        <?php
                                        
                                    }

                                    $bebidas = $gerir->mostrar_bebidas($_SESSION['nome']);
                                    
                                    foreach($bebidas as $beb){
                                        
                                        $id_beb = $beb['id'];
                                        $nomebeb = $beb['bebida'];

                                       
                                    }

                            ?>

                            </div>

                            <div id="opc4" style="display:none">
                                <form action="" method="post" id="pagamento">
                                    <h1>PAGAMENTO</h1>
                                    <div class="pg">
                                        <p>Valor total: <input value="0" class="valor_total" type="text" name="valor_total" id="valor_total" disabled>&nbsp;R$</p>
                                    </div>
                                    <div class="pg">
                                        <p>Desconto %<input value="" type="number" name="desconto" id="desconto" onchange="alterar_valor(this)">&nbsp;R$</p>
                                    </div>
                                    <input class="bt" type="button" value="Retirar Desconto" onclick="remover_desconto('<?=$nomeCliente?>')">
                                    <div class="pg">
                                        <p>Total a pagar <input value="0" type="number" class="total_pagar" name="total_pagar" id="total_pagar" disabled>&nbsp;R$</p>
                                    </div>
                                    <h1>FORMA DE PAGAMENTO</h1>

                                    <input class="bt" type="button" value="Dinheiro" onclick="pagar_com('valor_recebido_din')">
                                    <input class="bt" type="button" value="Cartão" onclick="pagar_com('valor_recebido_cart')">

                                    <div style="display:none" id="valor_recebido_din">
                                        <h1>Dinheiro</h1>
                                        <div class="pg receber">
                                            <p class="">Valor <input type="number" name="valor_recebido_din">&nbsp;R$</p>
                                            <p class="">Troco <input type="number" id="troco">&nbsp;R$</p>
                                        </div>
                                    </div>
                                    <div style="display:none" id="valor_recebido_cart">
                                        <h1>Cartão</h1>
                                        <div class="pg receber">
                                            <p class="">Valor <input type="number" name="valor_recebido_cart">&nbsp;R$</p>
                                            <input type="text" id="cliente_pagador" name="cliente_pagador" style="display:none">
                                        </div>
                                    </div>
                                    
                                    <input class="" type="button" value="Pagar" onclick="efetuar_pagamento()">
                                    <?php
                                        
                                    ?>
                                
                                </form>
                            </div>
                            <?php
                                $test = 0;
                                if($des > 0){
                                    echo("<script>document.getElementById('desconto').disabled = true</script>");
                                }
                                if(isset($_POST['valor_recebido_din']) && !empty($_POST['valor_recebido_din'])){
                                    $cliente_pagador = $_POST['cliente_pagador'];
                                    $resul = $gerir->pg_dinheiro($_POST['valor_recebido_din'],$cliente_pagador);
                                    if($resul == 0){
                                        echo("<script>alert('Pagamento concluido')</script>");
                                        echo("<script>window.location.href = 'http://localhost/Sistema-pizzaria/gerenciar/' </script>");
                                    }
                                    else{
                                        $total_calc = $gerir->calc_total($cliente_pagador);
                                        echo("<script>finaliza('$cliente_pagador',$total_calc, 0)</script>");
                                        echo("<script>alert('Esperando pagamento restante')</script>");
                                    }
                                    $test = 3;
                                }
                                if(isset($_POST['valor_recebido_cart']) && !empty($_POST['valor_recebido_cart'])){
                                    $cliente_pagador = $_POST['cliente_pagador'];
                                    $resul = $gerir->pg_cartao($_POST['valor_recebido_cart'],$cliente_pagador);
                                    if($resul == 0){
                                        echo("<script>alert('Pagamento concluido')</script>");
                                        echo("<script>window.location.href = 'http://localhost/Sistema-pizzaria/gerenciar/' </script>");
                                    }
                                    else{
                                        $total_calc = $gerir->calc_total($cliente_pagador);
                                        echo("<script>finaliza('$cliente_pagador',$total_calc, 0)</script>");
                                        echo("<script>alert('Esperando pagamento restante')</script>");
                                    }
                                    $test = 3;
                                }
                                if(isset($_POST['desconto']) && !empty($_POST['desconto'])){
                                    $cliente_pagador = $_POST['cliente_pagador'];
                                    $total_calc = $gerir->calc_total($cliente_pagador);
                                    echo("<script>finaliza('$cliente_pagador',$total_calc, 1)</script>");
                                }
                                if(isset($_POST['desconto_removido']) && !empty($_POST['desconto_removido'])){
                                    $cliente_pagador = $_POST['desconto_removido'];
                                    $total_calc = $gerir->calc_total($cliente_pagador);
                                    echo("<script>finaliza('$cliente_pagador',$total_calc, 1)</script>");
                                }
                            ?>
                            <script>
                                window.onload = iniciar(<?=$test?>)
                            </script>
                                    
                            
                            
                        </form>

                        

					</div>
			</div>

        </div>
        
        <?php
            if(isset($_SESSION['resultado']) && !empty($_SESSION['resultado'])){
                if($_SESSION['resultado'] == 'concluido'){
                    echo("<script>alteracao_concluida()</script>");
                    unset($_SESSION['resultado']);
                }
            }
            if(isset($_POST['acao']) && !empty($_POST['acao'])){
                if($_POST['acao'] == 'preparar'){
                    echo("<script>muda(1)</script>");
                }
                if($_POST['acao'] == 'terminar'){
                    echo("<script>muda(2)</script>");
                }
            }
        ?>
        
	</body>
</html>
	