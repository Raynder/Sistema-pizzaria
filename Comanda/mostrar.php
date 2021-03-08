<?php
    require_once "../config.php";
    session_start();
    $nome = $_SESSION['cliente'];
    $asp = '"';
    
    $pedir = new Mesa();

    $pedidos = $pedir->mostrar_pedidos($nome);
    $a = count($pedidos);

    if($pedidos){
        foreach($pedidos as $pedido){
            $sabor1 = $pedido['sabor1'];
            $sabor2 = $pedido['sabor2'];
            $sabor3 = $pedido['sabor3'];
            $borda = $pedido['borda'];
            $tamanho = $pedido['tamanho'];
            $observacao = $pedido['observacao'];

            echo("
                    <div class=$asp pedido pizzas col-lg-12 col-md-12 col-sm-12$asp >
                <div class=$asp bloco$asp >
                    <img src=$asp _img1x/$sabor1.png$asp  class=$asp pizza$asp  alt=$asp $asp >
                </div>
            
                <div class=$asp bloco$asp >
                ");

                    if($sabor3 != null){
                        echo("<h2 class='sem_margin'>$sabor1 X $sabor2 X $sabor3</h2>");
                    }
                    else{
                        if($sabor2 != null){
                            echo("<h2 class='sem_margin'>$sabor1 X $sabor2</h2>");
                        } 
                        else{
                            echo("<h2 class='sem_margin'>$sabor1");
                        }
                    }
            
                    echo("<p class='sem_margin'>$borda</p>");
                    echo("<p class='sem_margin'>$tamanho</p>");
                    echo("<p class='vermelhor sem_margin'>$observacao</p>");

                    echo("</div></div>");
            
                    //Calcular total a pagar
                    $total_a_pagar = $pedir->calc_total($nome);
            
        }
        $bebidas = $pedir->mostrar_bebidas($nome);

        foreach($bebidas as $beb){
            $id_beb = $beb['id'];
            $nomebeb = $beb['bebida'];
                
            echo("
            <div class=$asp pedido pizzas col-lg-12 col-md-12 col-sm-12$asp >
                <div class=$asp bloco$asp >
                    <img src=$asp ../_img/_bebidas/$nomebeb.png$asp  class=$asp pizza$asp  alt=$asp $asp >
                </div>

                <div class=$asp bloco$asp >
                <h1 class='sem_margin'>$nomebeb</h1>
                </div>

            </div>

            
            ");

        }
        echo("
            <div class='total_cliente'>
            <input class=$asp bt$asp  type=$asp button$asp  value=$asp TOTAL: $total_a_pagar R$ $asp>
            <div>
        ");
    }
    else{
        echo("Não encontramos pedidos no seu nome.<br> Seria bom verificar.");
    }
    