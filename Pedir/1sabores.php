<?php
    require_once "../config.php";
    session_start();

    if(isset($_POST['cliente']) && !empty($_POST['cliente'])){
        if($_POST['cliente'] == 'admin21'){
            $user = 'admin';
        }
        else{
            $user = $_POST['user'];
        }

        $nome = $_POST['cliente'];
        $_SESSION['cliente'] = $_POST['cliente'];

        if($user == 'admin'){
            $_SESSION['user'] = $user;
        }
        else{
            $pedir = new Pedidos();
            $nomes = $pedir->nomes($_POST['cliente']);
            if(Count($nomes) > 0){
                header("location:index.php?nome=jaexiste");
            }
            else{
                $_SESSION['nome'] = $_POST['cliente'];
                $_SESSION['user'] = $user;
            }
        }
    }
    else{
        if(isset($_SESSION['cliente']) && !empty($_SESSION['cliente'])){
            $nome = $_SESSION['cliente'];
        }
        else{
            header("index.php");
        }
    }

    if(isset($_POST['func']) && !empty($_POST['func'])){
        $func = $_POST['func'];
        $valor_func = $_POST['valor_func'];
        $functions = new Functions();
        
        $functions->$func($valor_func);
    }

    $total_a_pagar = 0;
    $iniciar_aux = 1;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ERP</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/bandeja.css">
        <link rel="stylesheet" type="text/css" href="../css/index.css">
        <link rel="stylesheet" type="text/css" href="../css/tougle.css">
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="../JS/sweetAlert.js"></script>

        <script src="JS/x1.js" type="text/javascript"></script>
        <script src="JS/auxiliar.js" type="text/javascript"></script>
        <script src="JS/modificar.js" type="text/javascript"></script>
        <script type="text/javascript" src="../JS/funcoes.js"></script>
        <script src="../JS/jquery.2.1.3.min.js"></script>

        <script>
            function qtd_sabores(qtd_sab){
                $.ajax
                ({
                    type: 'POST',
                    datatype: 'html',
                    url: 'sabores.php',

                    data: {qtd_sab: qtd_sab},
                    success: function(msg){
                        $('#result').html(msg);
                    }
                })
            }
        </script>
	</head>

    <style>
    
        .imgem{
            float: left;
        }
        .imgem img{
            width: 75%;
        }
        .imgem p{
            font-size: 20pt;
        }
        .imgem.im1 {
            left: 6%;
        }
        .imgem.im3 {
            right: 6%;
        }
    
    </style>

	<body>
        <nav>
            <div class="row" id="">
                <a href="index.php"><img src="../img/icone.png" class="icone" width="80" height="60"></a>
                <?php
                    if($_SESSION['user'] == "admin"){
                        echo("<a href='1sabores.php' class='nav-link aa'>NOVO PEDIDO</a>
                        <a href='../Gerenciar/index.php' class='nav-link aa'>PEDIDOS</a>");
                    }
                ?>
            </div>
        </nav>

		<div class="container-fluid text-center">
			<div class="row">
					<div class="col-lg-12 corpo">

                        <form action="" method="post" id="band">
                            <div class="lin">

                                <div class="conteudo">

                                    <div class="tamanhos" id="sabores">
                                        <h1>QUANTOS SABORES?</h1>
                                        <a onclick="qtd_sabores(1)"><img src="../img/sabor1x.png" alt=""></a>
                                        <a onclick="qtd_sabores(2)"><img src="../img/sabor2x.png" alt=""></a>
                                        <a onclick="qtd_sabores(3)"><img src="../img/sabor3x.png" alt=""></a>

                                    </div>

                                    <div class="tamanhos" id="tamanhos" style="display:none">
                                        <h1>TAMANHO DA PIZZA?</h1>

                                            <div onclick="selec('pequena')" class="imgem im1 col-lg-4 col-md-4 col-sm-4 col-4">
                                                <img src="../img/sabor1x.png" alt="pizza pequena" class="imgt" id="idpequena">
                                                <figcaption>
                                                    <p>Pequena</p>
                                                </figcaption>
                                            </div>

                                            <div onclick="selec('media')" class="imgem im2 col-lg-4 col-md-4 col-sm-4 col-4">
                                                <img src="../img/sabor1x.png" alt="pizza media"  class="imgt" id="idmedia">
                                                <figcaption>
                                                    <p>Media</p>
                                                </figcaption>
                                            </div>

                                            <div onclick="selec('grande')" class="imgem im3 col-lg-4 col-md-4 col-sm-4 col-4">
                                                <img src="../img/sabor1x.png" alt="pizza grande" class="imgt" id="idgrande">
                                                <figcaption>
                                                    <p>Grande</p>
                                                </figcaption>
                                            </div>
                                        
                                        

                                    </div>


                                    <div id="opc1">

                                        <h1>ESCOLHA AQUI OS SABORES!</h1>


                                        <section class="mesa col-lg-6 col-sm-6 col-md-6 container clearfix">

                                        <div class="bandeja_toda">
                                            <div id="result">
                                            
                                            
                                            </div>
                                            <input class='bt' type='button' value='Avançar' onclick='x3_conferir(1)'>
                                            <input id='ver_pedidos' class='bt confirm' type='button' value='Pedidos' onclick='sair_bandeja(2)'>

                                            
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
                                        
                                            <input type="checkbox" name="tamanho" value="pequena" id="pequena">
                                            <input type="checkbox" name="tamanho" value="media" id="media">
                                            <input type="checkbox" name="tamanho" value="grande" id="grande">

                                        </div>

                                        <h1>DEFINA A BORDA!</h1>

                                        <div>
                                            <select name="nbor" class="bordas">
                                                <option selected value=" ">Nenhuma Borda</option>
                                                <option value="Catupiri ">Borda de Catupiri</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-12">
                                            <label id="titulo"><p>Observações:</p></label>
                                        </div>
                                        <div class="col-lg-12">

                                        <div class="d-grid gap-2 col-10 mx-auto">
                                            <button class="btn btn-primary edit" type="button">Ingredientes</button>
                                        </div>

                                        <textarea id="entrada-text" class="entrada" placeholder="Campo opcional" rows="2" name="obs"></textarea>
                                                
                                        <div class="d-grid gap-2 col-10 mx-auto">
                                            <button class="btn btn-primary enviar" onclick="x3_conferir(2)" type="button">Enviar</button>
                                        </div>                               
                                        </div>

                                    </div>
                                </div>

                                <div id="ingredientes" style="display:none">
                                    <h1>Pizza de Calabresa</h1>

                                    <div class="pedido pizzas col-lg-12 col-md-12 col-sm-12">
                                        <div class="bloco">
                                            <h2 class='sem_margin'>Calabresa</h2>
                                        </div>
                                        
                                        <div class="bloco_a_direita">
                                            <input type="checkbox" class="tougle" name="" id="">
                                        </div>
                                    </div>

                                    <div class="pedido pizzas col-lg-12 col-md-12 col-sm-12">
                                        <div class="bloco">
                                            <h2 class='sem_margin'>Mussarela</h2>
                                        </div>
                                        
                                        <div class="bloco_a_direita">
                                            <input type="checkbox" class="tougle" name="" id="">
                                        </div>
                                    </div>

                                    <div class="pedido pizzas col-lg-12 col-md-12 col-sm-12">
                                        <div class="bloco">
                                            <h2 class='sem_margin'>Cebola</h2>
                                        </div>
                                        
                                        <div class="bloco_a_direita">
                                            <input type="checkbox" class="tougle" name="" id="">
                                        </div>
                                    </div>

                                    <div class="pedido pizzas col-lg-12 col-md-12 col-sm-12">
                                        <div class="bloco">
                                            <h2 class='sem_margin'>Molho de tomate</h2>
                                        </div>
                                        
                                        <div class="bloco_a_direita">
                                            <input type="checkbox" class="tougle" name="" id="">
                                        </div>
                                    </div>

                                    <input class='bt' type='button' value='Avançar' onclick='sair_bandeja(1)'>

                                </div>

                                        <div id="opc3" style="display:none">
                                            <h1>Pedidos de <?=$_SESSION['cliente'];?></h1>

                                        <?php
                                            $pedir = new Pedidos();
                                            $pedidos = $pedir->mostrar_pedidos($_SESSION['cliente']);
                                            $a = count($pedidos);
                                            if($a == 0){
                                                echo("<script>document.getElementById('ver_pedidos').style.display = 'none'</script>");
                                            }
                                            foreach($pedidos as $pedido){
                                                $id_pizza = $pedido['id'];
                                                $sabor1 = $pedido['sabor1'];
                                                $sabor2 = $pedido['sabor2'];
                                                $sabor3 = $pedido['sabor3'];
                                                $borda = $pedido['borda'];
                                                $tamanho = $pedido['tamanho'];
                                                $observacao = $pedido['observacao'];
                                                ?>
                                                    

                                        
                                        <div class="pedido pizzas col-lg-12 col-md-12 col-sm-12">
                                            <div class="bloco">
                                                <img src="img1x/<?=$sabor1?>.png" class="pizza" alt="">
                                            </div>

                                            <div class="bloco">
                                                <?php
                                                
                                                if($sabor3 != ""){
                                                    echo("<h2 class='sem_margin'>$sabor1 X $sabor2 X $sabor3</h2>");
                                                }
                                                else{
                                                    if($sabor2 != ""){
                                                        echo("<h2 class='sem_margin'>$sabor1 X $sabor2</h2>");
                                                    } 
                                                    else{
                                                        echo("<h2 class='sem_margin'>$sabor1");
                                                    }
                                                }

                                                echo("<p class='sem_margin'>$borda</p>");
                                                echo("<p class='sem_margin'>$tamanho</p>");
                                                echo("<p class='vermelhor sem_margin'>$observacao</p>");

                                                //Calcular total a pagar
                                                $total_a_pagar = $pedir->calc_total($_SESSION['cliente']);
                                                ?>
                                            </div>
                                                    
                                            <div class="bloco_a_direita">
                                                <img style="height:50px" src="../img/remover.png" alt="" onclick="remover_pizza(<?=$id_pizza;?>)">
                                                <p>remover</p>
                                            </div>

                                            <div class="bloco_a_direita">
                                                <img style="height:50px" src="../img/editar.png" alt="" onclick="editar_pizza(<?=$id_pizza;?>)">
                                                <p>editar</p>
                                            </div>
                                        </div>

                                                <?php
                                                
                                            }

                                            $bebidas = $pedir->mostrar_bebidas($_SESSION['cliente']);
                                            
                                            foreach($bebidas as $beb){
                                                ?>
                                                    

                                        
                                        <div class="pedido pizzas col-lg-12 col-md-12 col-sm-12">
                                            <div class="bloco">
                                                <img src="../img/bebidas/<?=$beb['bebida'];?>.png" class="pizza" alt="">
                                            </div>

                                            <div class="bloco">
                                                <?php
                                                $id_beb = $beb['id'];
                                                $nomebeb = $beb['bebida'];

                                                echo("<h1 class='sem_margin'>$nomebeb</h1>");
                                                ?>
                                            </div>
                                                    
                                            <div class="bloco_a_direita">
                                                <img style="height:50px" src="../img/remover.png" alt="" onclick="remover_bebida(<?=$id_beb;?>)">
                                                <p>remover</p>
                                            </div>

                                        </div>
                                        <?php
                                            }
                                            echo("<script>document.getElementById('total_a_pagar').innerHTML = $total_a_pagar</script>");

                                        ?>
                                            <input class="bt" type="button" value="Pedir mais" onclick="pedir_mais()">
                                            <input class="bt" type="button" value="Bebidas" onclick="bebidas()">
                                            <input class="bt confirm" type="button" value="Finalizar pedido" onclick="finalizar_pedido(<?=$total_a_pagar?>)">

                                    </div>

                                <div id="opc4" style="display:none">
                                    <div class="pedido bebidas col-lg-12 col-md-12 col-sm-12">

                                    <div class="bloco">
                                            <img onclick="adicionarbeb('Coca_2lt')" src="../img/bebidas/Coca_2lt.png" alt="">
                                            <figcaption>
                                                <p>Coca-cola 2Lt</p>
                                            </figcaption>
                                        </div>
                                        <div class="bloco">
                                            <img onclick="adicionarbeb('Coca_600ml')" src="../img/bebidas/Coca_600ml.png" alt="">
                                            <figcaption>
                                                <p>Coca-cola 600ml</p>
                                            </figcaption>
                                        </div>
                                        <div class="bloco">
                                            <img onclick="adicionarbeb('Coca_lata')" src="../img/bebidas/Coca_lata.png" alt="">
                                            <figcaption>
                                                <p>Coca-cola Lata</p>
                                            </figcaption>
                                        </div>
                                        <div class="bloco">
                                            <img onclick="adicionarbeb('Guarana_2lt')" src="../img/bebidas/Guarana_2lt.png" alt="">
                                            <figcaption>
                                                <p>Guarana 2Lt</p>
                                            </figcaption>
                                        </div>
                                        <div class="bloco">
                                            <img onclick="adicionarbeb('Guarana_600ml')" src="../img/bebidas/Guarana_600ml.png" alt="">
                                            <figcaption>
                                                <p>Guarana 600ml</p>
                                            </figcaption>
                                        </div>
                                        <div class="bloco">
                                            <img onclick="adicionarbeb('Guarana_lata')" src="../img/bebidas/Guarana_lata.png" alt="">
                                            <figcaption>
                                                <p>Guarana Lata</p>
                                            </figcaption>
                                        </div>
                                    </div>
                                </div>
                                        
                                <input type="text" id="ver" name="ver" style="display:none" value="">
                                <input type="text" id="func" name="func" style="display:none" value="">
                                <input type="text" id="valor_func" name="valor_func" style="display:none" value="">
                                
                                </div>

                            </div>
                                
                            
                            

                        </form>

                        

					</div>
			</div>

        </div>

        <footer>

        </footer>
        
        <script src="JS/slids.js" type="text/javascript"></script>
        
        <?php
            if(isset($_POST['ver'])){
                $f = $_POST['ver'];
                if($f == "meusPedidos"){
                    echo("<script>mostrar_pedidos()</script>");
                    $iniciar_aux = 2;
                }
            }
        ?>
        <script>
            window.onload = iniciar(<?=$iniciar_aux;?>)
        </script>
	</body>
</html>
	