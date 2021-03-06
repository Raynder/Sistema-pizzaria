<?php

    Class Pedidos {
        private $conn;
        private $dia_sem;
        private $dia_mes;
        private $mes;
        private $ano;
        private $hora;

        public function __construct(){
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
            $this->hora = date('H:i:s');
            $this->dia_sem = strftime('%A');
            $this->dia_mes = strftime('%d');
            $this->mes = strftime('%B');
            $this->ano = strftime('%Y');  
            $this->conn = new Sql();
        }

        public function nomes($cliente_cadastrado){
            $query = "SELECT * FROM pizzas WHERE nome = '$cliente_cadastrado'";
            return $this->conn->select($query);
        }

        public function add_pizza($array){
            $query = "INSERT INTO pedidosTemp(nome, sabor1, sabor2, sabor3, tamanho, borda, observacao) VALUES (:NOME, :S1, :S2, :S3, :TAM, :BOR, :OBS)";
            $this->conn->insere($query, $array);
        }
        public function mostrar_pedidos($nome){
            $query = "SELECT * FROM pedidosTemp WHERE nome = '$nome'";
            return $this->conn->select($query);
        }
        public function contar_pedidos(){
            $query = "SELECT * FROM pizzas WHERE situacao = 'aguardando'";
            return Count($this->conn->select($query));
        }
        public function mostrar_bebidas($nome){
            $query = "SELECT * FROM bebidasTemp WHERE nome = '$nome'";
            return $this->conn->select($query);
        }

        public function remover_pizza($id_apagar){
            $query = "DELETE FROM pedidosTemp WHERE id = '$id_apagar'";
            $this->conn->insere($query);
        }
        public function remover_bebida($id_apagar){
            $query = "DELETE FROM bebidasTemp WHERE id = '$id_apagar'";
            $this->conn->insere($query);
        }
        public function att_pizza($array, $id_editar){
            $query = "UPDATE pedidosTemp SET tamanho = :TAM, borda = :BOR, observacao = :OBS WHERE id = '$id_editar'";
            $this->conn->insere($query, $array);
        }
        public function add_bebida($nome, $bebida){
            $query = "INSERT INTO bebidasTemp(nome, bebida) VALUES ('$nome','$bebida')";
            $this->conn->insere($query);
        }
        public function enviar_pedido($nome, $hrbebida){
            $query = "UPDATE pedidosTemp SET bebida = '$hrbebida', dia_sem = '$this->dia_sem', dia_mes = '$this->dia_mes', hora = '$this->hora', situacao = 'aguardando' WHERE nome = '$nome'";
            $this->conn->insere($query);
            $query = "UPDATE bebidasTemp SET dia_sem = '$this->dia_sem', dia_mes = '$this->dia_mes', hora = '$hora', situacao = 'aguardando' WHERE nome = '$nome'";
            $this->conn->insere($query);
            $query = "INSERT INTO pizzas (nome, sabor1, sabor2, sabor3, tamanho, borda, observacao, dia_sem, dia_mes, bebida, hora, situacao) SELECT nome, sabor1, sabor2, sabor3, tamanho, borda, observacao, dia_sem, dia_mes, bebida, hora, situacao FROM pedidosTemp WHERE nome = '$nome'";
            $this->conn->insere($query);
            $query = "INSERT INTO bebidas (nome, bebida, dia_sem, dia_mes, hora, situacao) SELECT nome, bebida, dia_sem, dia_mes, hora, situacao FROM bebidasTemp WHERE nome = '$nome'";
            $this->conn->insere($query);
            $query = "DELETE FROM pedidosTemp WHERE nome = '$nome'";
            $this->conn->insere($query);
            $query = "DELETE FROM bebidasTemp WHERE nome = '$nome'";
            $this->conn->insere($query);
        }

        public function voltar_pizza($nome){
            $query = "INSERT INTO pedidosTemp (nome, sabor1, sabor2, sabor3, tamanho, borda, observacao, dia_sem, dia_mes, bebida, hora, situacao) SELECT nome, sabor1, sabor2, sabor3, tamanho, borda, observacao, dia_sem, dia_mes, bebida, hora, situacao FROM pizzas WHERE nome = '$nome' AND dia_mes = '$this->dia_mes'";
            $this->conn->insere($query);
            $query = "DELETE FROM pizzas WHERE nome = '$nome' AND dia_mes = '$this->dia_mes'";
            $this->conn->insere($query);
               
            $query = "INSERT INTO bebidasTemp (nome, bebida, dia_sem, dia_mes, hora, situacao) SELECT nome, bebida, dia_sem, dia_mes, hora, situacao FROM bebidas WHERE nome = '$nome'";
            $this->conn->insere($query);
            $query = "DELETE FROM bebidas WHERE nome = '$nome' AND dia_mes = '$this->dia_mes'";
            $this->conn->insere($query);
        }

        public function calc_total($nome){
            $total_a_pagar = 0;
            $query = "SELECT tamanho FROM pedidosTemp WHERE nome = '$nome'";
            $pizzas = $this->conn->select($query);
            $query = "SELECT bebida FROM bebidasTemp WHERE nome = '$nome'";
            $bebidas = $this->conn->select($query);

            foreach ($pizzas as $pizza){
                //Calcular total a pagar
                if($pizza['tamanho'] == 'g'){
                    $total_a_pagar += 30;
                }
                else{
                    if($pizza['tamanho'] == "m"){
                        $total_a_pagar += 28;
                    }
                    else{
                        $total_a_pagar += 26;
                    }
                }
            }
            
            foreach ($bebidas as $bebida){
                //Calcular total a pagar
                $res = strpos($bebida['bebida'], '2');
                if($res === true){
                    $total_a_pagar += 8;
                }
                else{
                    $res = strpos($bebida['bebida'], '600');
                    if($res === false){
                        $total_a_pagar += 3;
                    }
                    else{
                        $total_a_pagar += 5;
                    }
                }
            }

            return $total_a_pagar;
            
        }
    }