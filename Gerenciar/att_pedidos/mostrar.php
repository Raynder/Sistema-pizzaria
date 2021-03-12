<?php
    require_once "../../config.php";
    session_start();
    $asp = '"';
    $tot = $_SESSION['tot'];
    $part = $_POST['part'];

    if($part == 'aguardando'){        
        $func_js = "prepara";
    }
    else{
        if($part == 'preparando'){        
            $func_js = "termina";
        }
        else{
            $func_js = "finaliza";
        }
    }
    $nome_js = $func_js."r";

    $func = 'mostrar_'.$part;

    $gerir = new Gerente();
    $pedidos = $gerir->$func();

    $nvtot = Count($pedidos);

    if($pedidos){
        if($nvtot > $tot){
            echo("<script>document.getElementById('audio').play()</script>");
            $_SESSION['tot'] = $nvtot;
        }

        foreach($pedidos as $pedido){
            $id_pizza = $pedido['id'];
            $nomeCliente = $pedido['nome'];
            $situacao = $pedido['situacao'];
    
            $totPizzas = $gerir->total_pizzas($nomeCliente);
            $totBebidas = $gerir->total_bebidas($nomeCliente);
            
                
        
        
            echo("<div class=$asp pedido pizzas col-lg-12 col-md-12 col-sm-12$asp >
                <div class=$asp bloco bloco_img$asp >
                    <img src=$asp _img/cliente.png$asp  class=$asp pizza$asp  alt=$asp $asp >
                </div>
        
                <div class=$asp bloco$asp >
                    <h2 class=$asp sem_margin$asp >$nomeCliente</h2>
                    <p class=$asp sem_margin$asp >$situacao</p>
                    <p class=$asp sem_margin$asp >Pizzas $totPizzas</p>
                    <p class=$asp sem_margin$asp >Bebidas $totBebidas</p>
                    ?>
                </div>
                        
                <div class=$asp bloco_a_direita$asp >
                    <img style=$asp height:50px$asp  src=$asp ../_img/remover.png$asp  alt=$asp $asp  onclick=$asp remover_pedido('$nomeCliente')$asp >
                    <p>remover</p>
                </div>
        
                <div class=$asp bloco_a_direita$asp >
                    <img style=$asp height:50px$asp  src=$asp ../_img/editar.png$asp  alt=$asp $asp  onclick=$asp editar_pedido('$nomeCliente')$asp >
                    <p>editar</p>
                </div>
        
                <div class=$asp bloco_a_direita$asp >
                
                    <script src=$asp _JS/modificar.js$asp  type=$asp text/javascript$asp ></script>
                    <img style=$asp height:50px$asp  src=$asp _img/relogio.png$asp  alt=$asp $asp  onclick=$asp $func_js('$nomeCliente'");
                    if($func_js == 'finaliza'){
                        echo(",");
                        echo($gerir->calc_total($nomeCliente));
                        echo(",1");
                    }
                    echo(")$asp >
                    <p>$nome_js</p>
                    
                    <script src=$asp _JS/modificar.js$asp  type=$asp text/javascript$asp ></script>
                </div>
            </div>");
            
        }
    }
    else{
        echo "Não foi possivel encontrar os pedidos"; 
    }
    
    