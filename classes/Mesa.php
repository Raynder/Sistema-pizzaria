<?php
    Class Mesa {
        private $conn;
        private $dia_mes;
        private $hora;

        public function __construct(){
            $this->conn = new Sql();
        }
        public function mostrar_pedidos($nome){
            $query = "SELECT * FROM pizzas WHERE nome = '$nome' AND situacao != 'pago'";
            return $this->conn->select($query);
        }
        public function mostrar_bebidas($nome){
            $query = "SELECT * FROM bebidas WHERE nome = '$nome' AND situacao != 'pago'";
            return $this->conn->select($query);
        }
        
        //FUNÇÕES QUE CAUCULAM TOTAIS
        public function total_pizzas($nome){
            $sql = new SQL();
            $query = "SELECT * FROM pizzas WHERE nome = '$nome' AND situacao != 'pago'";
            return Count($sql->select($query));
        }
        public function total_bebidas($nome){
            $sql = new SQL();
            $query = "SELECT * FROM bebidas WHERE nome = '$nome' AND situacao != 'pago'";
            return Count($sql->select($query));
        }
        public function calc_total($nome){
            $total_a_pagar = 0;
            $sql = new SQL();
            $query = "SELECT tamanho FROM pizzas WHERE nome = '$nome' AND situacao != 'pago'";
            $pizzas = $sql->select($query);
            $query = "SELECT bebida FROM bebidas WHERE nome = '$nome' AND situacao != 'pago'";
            $bebidas = $sql->select($query);

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