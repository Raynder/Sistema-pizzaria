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
    }