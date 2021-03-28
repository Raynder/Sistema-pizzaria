<?php
require_once "../config.php";
session_start();
$total_a_pagar = 0;


if(isset($_POST['desconto']) && !empty($_POST['desconto'])){
    $gerir = new Gerente();
    $cliente_pagador = $_POST['cliente_pagador'];
    $total_calc = $gerir->calc_total($cliente_pagador);
    $desconto = $_POST['desconto'];
    $resultado = ($total_calc / 100) * $desconto;
    $gerir->alterar_desconto($resultado, $cliente_pagador);
}

if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
    $gerir = new Gerente();
    if($_SESSION['user'] == "admin"){
        if(isset($_POST['acao']) && !empty($_POST['acao'])){
            $nomePedido = $_POST['cliente_acao'];
            $acao = $_POST['acao'];
            $gerir->$acao($nomePedido);
        }
    }
    else{
        header("location:../pedir/index.php");
    }
    $_SESSION['tot'] = Count($gerir->mostrar_aguardando());
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

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ERP</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="JS/sweetAlert.js"></script>
        <script src="../JS/jquery.2.1.3.min.js"></script>

        <script src="JS/slids.js" type="text/javascript"></script>
        <script src="JS/modificar.js" type="text/javascript"></script>
        <script src="JS/alertPag.js" type="text/javascript"></script>

        <script>

            setInterval(function(){
                var slide = document.getElementById('slide').value
                mostrar(slide, 1)
            },5000)

            function mostrar(part){
                ajaxLoad('aguardando', 'result')
                ajaxLoad('preparando', 'result2')
                ajaxLoad('pronto', 'result3')
                
            }

            function ajaxLoad(part, idElement) {
                $.ajax
                ({
                    type: 'POST',
                    dataType: 'html',
                    url: 'att_pedidos/mostrar.php',

                    data: {part: part},
                    success: function(msg){
                        $('#'+idElement).html(msg);
                    }
                });
            }
            
            function play(){
                document.getElementById('audio').play()
            }    
        </script>
        
	</head>

    <style>
        * {
            margin: 0;
        }
        body {
            background: url("img/fundo.png");
        }
        html, body {
            height: 100%;
        }

        .contexto {
            min-height: 100%;
            /* equal to footer height */
            margin-bottom: -42px; 
        }
        .contexto:after {
            content: "";
            display: block;
        }

        .site-footer, .contexto:after {
            height: 42px; 
        }
        .site-footer {
            background: #000000d4;
        }

        nav{
            background-color: #000000d4;
            margin-bottom: 10px;
        }
        .bloco {
            background-color: rgb(255 255 255 / 86%);
            margin: -1px 11px;
            box-shadow: 6px -1px 11px 2px;
            border: solid 1px #000000d4;
            width: 31%;
            float: left;
        }
        
        .bloco h1{
            font-size: 16pt;
            border-bottom: solid 1px #000000d4;
            margin-bottom: 0px;
        }
        td {
            width: 1%;
            font-weight: bold;
        }
        tr{
            margin-top: 10px;
        }
    </style>

	<body>
        <nav>
            <div class="row" id="">
                <a href="admin.php"><img src="../img/icone.png" class="icone" width="40" height="30"></a>
                <?php
                    if($_SESSION['user'] == "admin"){
                        $asp = '"';
                        echo("<a href='../pedir/1sabores.php' class='nav-link'>NOVO PEDIDO</a>
                        <a onclick=$asp sair_bandeja('aguardando',0)$asp class='nav-link'>PEDIDOS</a>
                        <a onclick=$asp sair_bandeja('preparando',0)$asp  class='nav-link'>PREPARANDO</a>
                        <a onclick=$asp sair_bandeja('pronto',0)$asp  class='nav-link'>PRONTOS</a>");
                    }
                ?>
            </div>
        </nav>

        <audio src="audio.mp3" id="audio"></audio>

		<div id="contexto" class="container-fluid text-center contexto">
			<div class="row test2">
					<div class="col-lg-12 corpo">
                        
                        <form id="funcc" action="../pedir/1sabores.php" method="post" style="display:none">
                            <input type="text" name="ver" id="ver">
                            <input type="text" name="valor_func" id="valor_func">
                            <input type="text" name="func" id="func">
                        </form>

                        <form id="func_interna" action="" method="post" style="display:none">
                            <input type="text" id="acao" name="acao">
                            <input type="text" id="cliente_acao" name="cliente_acao">
                            <input type="text" id="desconto_removido" name="desconto_removido">
                            <input type="text" name="apagar" id="apagar">
                        </form>

                        <form action="" method="POST" id="band">
                        
                            <div id="opc1" class="bloco" style="display:block">
                                <h1>FILA DE PEDIDOS</h1>

                                <table >
                                    <tr>
                                        <td>ID</td>
                                        <td>Mesa</td>
                                        <td>Itens</td>
                                        <td>SubTotal</td>
                                    </tr>
                                    <tr>
                                        <td>224</td>
                                        <td>4</td>
                                        <td>2</td>
                                        <td>30,00</td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td>215</td>
                                        <td>8</td>
                                        <td>7</td>
                                        <td>120,00</td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td>201</td>
                                        <td>2</td>
                                        <td>5</td>
                                        <td>50,00</td>
                                    </tr>
                                </table>
                                
                                
                                
                                <!-- <span id="result">
                                </span> -->
                                <input type="text" style="display:none" id="slide" value="aguardando">
                                
                            </div>
                            
                            <div id="opc2" class="bloco" style="display:block">
                                <h1>PREPARANDO</h1>

                                <table >
                                    <tr class="titulo_tabela">
                                        <td>ID</td>
                                        <td>Mesa</td>
                                        <td>Itens</td>
                                        <td>SubTotal</td>
                                    </tr>
                                    <tr>
                                        <td>224</td>
                                        <td>4</td>
                                        <td>2</td>
                                        <td>30,00</td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td>215</td>
                                        <td>8</td>
                                        <td>7</td>
                                        <td>120,00</td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td>201</td>
                                        <td>2</td>
                                        <td>5</td>
                                        <td>50,00</td>
                                    </tr>
                                </table>

                                <!-- <span id="result2">
                                </span> -->
                                <input type="text" style="display:none" id="" value="aguardando">
                            </div>
                            
                            <div id="opc" class="bloco" style="display:block">
                                <h1>PRONTOS</h1>

                                <table >
                                    <tr>
                                        <td>ID</td>
                                        <td>Mesa</td>
                                        <td>Itens</td>
                                        <td>SubTotal</td>
                                    </tr>
                                    <tr>
                                        <td>224</td>
                                        <td>4</td>
                                        <td>2</td>
                                        <td>30,00</td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td>215</td>
                                        <td>8</td>
                                        <td>7</td>
                                        <td>120,00</td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td>201</td>
                                        <td>2</td>
                                        <td>5</td>
                                        <td>50,00</td>
                                    </tr>
                                </table>

                                <!-- <span id="result3">
                                </span> -->
                                <input type="text" style="display:none" id="" value="aguardando">
                            </div>

                            
                            <!-- <div id="opc4" style="display:none">
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
                                            <p class="">Valor <input type="number" name="valor_din" onchange="calc_troco()" id="valor_din">&nbsp;R$</p>
                                            <p class="">Troco <input type="text" id="troco" value="0">&nbsp;R$</p>
                                        </div>
                                    </div>
                                    <div style="display:none" id="valor_recebido_cart">
                                        <h1>Cartão</h1>
                                        <div class="pg receber">
                                            <p class="">Valor <input type="number" name="valor_cart">&nbsp;R$</p>
                                            <input type="text" id="cliente_pagador" name="cliente_pagador" style="display:none">
                                        </div>
                                    </div>
                                    
                                    <input class="" type="button" value="Pagar" onclick="efetuar_pagamento()">
                                
                                </form>
                                
                            </div> -->

                            
                            <?php
                                $test = 0;
                                if(isset($des) && $des > 0){
                                    echo("<script>document.getElementById('desconto').disabled = true</script>");
                                }
                                if(isset($_POST['valor_din']) && !empty($_POST['valor_din'])){
                                    $cliente_pagador = $_POST['cliente_pagador'];
                                    $resul = $gerir->pg_dinheiro($_POST['valor_din'],$cliente_pagador);
                                    if($resul == 0){
                                        echo("<script>pago()</script>");
                                        echo("<script>window.location.href = 'http://localhost/Sistema-pizzaria/gerenciar/' </script>");
                                    }
                                    else{
                                        $total_calc = $gerir->calc_total($cliente_pagador);
                                        echo("<script>resto()</script>");
                                        echo("<script>finaliza('$cliente_pagador',$total_calc, 1)</script>");
                                    }
                                    $test = 3;
                                }
                                if(isset($_POST['valor_cart']) && !empty($_POST['valor_cart'])){
                                    $cliente_pagador = $_POST['cliente_pagador'];
                                    $resul = $gerir->pg_cartao($_POST['valor_cart'],$cliente_pagador);
                                    if($resul == 0){
                                        echo("<script>pago()</script>");
                                        echo("<script>window.location.href = 'http://localhost/Sistema-pizzaria/gerenciar/' </script>");
                                    }
                                    else{
                                        $total_calc = $gerir->calc_total($cliente_pagador);
                                        echo("<script>resto()</script>");
                                        echo("<script>finaliza('$cliente_pagador',$total_calc, 1)</script>");
                                    }
                                    $test = 3;
                                }
                                if(isset($_POST['desconto_removido']) && !empty($_POST['desconto_removido'])){
                                    $cliente_pagador = $_POST['desconto_removido'];
                                    $total_calc = $gerir->calc_total($cliente_pagador);
                                    echo("<script>finaliza('$cliente_pagador',$total_calc, 1)</script>");
                                }
                            ?>
                            <script>
                                window.onload = mostrar(0, 0)
                            </script>
                                    
                            
                            
                        </form>

                        

					</div>
			</div>

        </div>

        <footer class="site-footer">
            <p style="color:white;font-size:10pt;">©Copyright 2021 Yummi</p>
        </footer>

        <script>

            window.onload = lerWidth()            
           

            function lerWidth(){
                tam1 = document.getElementById('contexto').offsetHeight
                tam1 = tam1-50
                document.getElementById('opc1').style.height = tam1+'px'
                document.getElementById('opc2').style.height = tam1+'px'
                document.getElementById('opc').style.height = tam1+'px'
            }
    
        </script>

        <?php
            if(isset($_SESSION['resultado']) && !empty($_SESSION['resultado'])){
                if($_SESSION['resultado'] == 'concluido'){
                    echo("<script>resto()</script>");
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