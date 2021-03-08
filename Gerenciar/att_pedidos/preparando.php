<?php
    require_once "../../config.php";
    $tot = $_POST['tot'];

    $gerir = new Gerente();
    $pedidos = $gerir->mostrar_agurdando();

    $nvtot = Count($pedidos);

    if($pedidos){
        if($nvtot > $tot){
            echo("<script>document.getElementById('audio').play()</script>");
            echo("<script>document.getElementById('tot').value = $nvtot</script>");
        }

        foreach($pedidos as $pedido){
            $id_pizza = $pedido['id'];
            $nomeCliente = $pedido['nome'];
            $nomeClienteAspas = "'".$pedido['nome']."'";
            $situacao = $pedido['situacao'];
    
            $totPizzas = $gerir->total_pizzas($nomeCliente);
            $totBebidas = $gerir->total_bebidas($nomeCliente);
            
                
        
        
            echo("<div class='pedido pizzas col-lg-12 col-md-12 col-sm-12'>
                <div class='bloco bloco_img'>
                    <img src='_img/cliente.png' class='pizza' alt=''>
                </div>
        
                <div class='bloco'>
                    <h2 class='sem_margin'>$nomeCliente</h2>
                    <p class='sem_margin'>$situacao</p>
                    <p class='sem_margin'>Pizzas $totPizzas</p>
                    <p class='sem_margin'>Bebidas $totBebidas</p>
                    ?>
                </div>
                        
                <div class='bloco_a_direita'>
                    <img style='height:50px' src='../_img/remover.png' alt='' onclick='remover_pedido($nomeClienteAspas)'>
                    <p>remover</p>
                </div>
        
                <div class='bloco_a_direita'>
                    <img style='height:50px' src='../_img/editar.png' alt='' onclick='editar_pedido$nomeClienteAspas)'>
                    <p>editar</p>
                </div>
        
                <div class='bloco_a_direita'>
                
                    <script src='_JS/modificar.js' type='text/javascript'></script>
                    <img style='height:50px' src='_img/relogio.png' alt='' onclick='prepara($nomeClienteAspas)'>
                    <p>Preparar</p>
                    
                    <script src='_JS/modificar.js' type='text/javascript'></script>
                </div>
            </div>");
            
        }
    }
    else{
        echo "Não foi possivel encontrar os pedidos"; 
    }
    
    