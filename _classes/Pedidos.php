<?php

    Class Pedidos {
        private $conn;

        public function __construct(){
            $this->conn = new Sql();
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

            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
            $hora = date('H:i:s');
            $dia_sem = strftime('%A');
            $dia_mes = strftime('%d');
            $mes = strftime('%B');
            $ano = strftime('%Y');  

            $query = "UPDATE pedidosTemp SET bebida = '$hrbebida', dia_sem = '$dia_sem', dia_mes = '$dia_mes', hora = '$hora', situacao = 'aguardando' WHERE nome = '$nome'";
            $this->conn->insere($query);
            $query = "INSERT INTO pizzas (nome, sabor1, sabor2, sabor3, tamanho, borda, observacao, dia_sem, dia_mes, bebida, hora, situacao) SELECT nome, sabor1, sabor2, sabor3, tamanho, borda, observacao, dia_sem, dia_mes, bebida, hora, situacao FROM pedidosTemp WHERE nome = '$nome'";
            $this->conn->insere($query);
            $query = "DELETE FROM pedidosTemp WHERE nome = '$nome'";
            $this->conn->insere($query);
        }
    }