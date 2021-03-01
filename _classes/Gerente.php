<?php

    Class Gerente {
        private $conn;

        public function __construct(){
            $this->conn = new Sql();
        }

        public function mostrar_agurdando(){
            $query = "SELECT * FROM pizzas WHERE situacao = 'aguardando' GROUP BY nome";
            return $this->conn->select($query);
        }
        public function total_pizzas($nome){
            $query = "SELECT * FROM pizzas WHERE nome = '$nome'";
            return Count($this->conn->select($query));
        }
    }