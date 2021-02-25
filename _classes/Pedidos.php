<?php

    Class Pedidos {
        private $conn;

        public function __construct(){
            $this->conn = new Sql();
        }

        public function add_pizza($array){
            $query = "INSERT INTO pedidosTemp(nome, sabor1, sabor2, sabor3, tamanho, borda, observacao) VALUES (:NOME, :S1, :S2, :S3, :TAM, :BOR, :OBS)";
            $this->conn->insere($array, $query);
        }
    }