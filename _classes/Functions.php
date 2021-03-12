<?php

    Class Functions {
        function editar($id){
            $id = $_POST['editar'];
            pedir_pizza($id);
        }
        
        function pedir_pizza($id = NULL){
            $array = array();
            $array[":NOME"] = $_SESSION['cliente'];
            $cont = 0;
            //Se não passar nenhum ID, vamos adicionar um novo pedido
            if($id == NULL){
                $nomes = array(":S1", ":S2", ":S3", ":TAM", ":BOR", ":OBS");
                    
                foreach($_POST as $key => $value){
                    if($cont < 6){
                        $array[$nomes[$cont]] = $value;
                    }
                    $cont++;
                }
                
                $pedir = new Pedidos();
                $pedir->add_pizza($array);
            }
            //Se passar um ID, vamos editar um pedido ja feito anteriormente
            else{
                $array = array(
                    ":TAM" => $_POST['tamanho'],
                    ":BOR" => $_POST['nbor'],
                    ":OBS" => $_POST['obs']
                );
                $pedir = new Pedidos();
                $pedir->att_pizza($array, $id);
            }
        }
        
        function apagar($id){
            $pedir = new Pedidos();
            $pedir->remover_pizza($id);
        }
        
        function apagarbeb($id){ 
            $pedir = new Pedidos();
            $pedir->remover_bebida($id);
        }
        
        function addbebida($bebida){
            //$bebida = $_POST['bebida'];
            $pedir = new Pedidos();
            $pedir->add_bebida($_SESSION['cliente'], $bebida);
        }
        
        function voltar($nome){
            $_SESSION['user'] = 'admin';
            $_SESSION['cliente'] = $nome;
            $pedir = new Pedidos();
            $pedir->voltar_pizza($nome);
        }
        
        function enviar($hrbebida){
            $pedir = new Pedidos();
            $pedir->enviar_pedido($_SESSION['cliente'], $hrbebida);
            if($_SESSION['user'] != 'admin'){
                session_destroy();
                header("location:index.php?resultado=concluido");
            }
            $_SESSION['resultado'] = 'concluido';
            header("location:../Gerenciar/index.php");
        }
    }