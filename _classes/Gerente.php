<?php

    Class Gerente {
        private $conn;
        private $dia_mes;
        private $hora;

        public function __construct(){
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
            
            $this->hora = date('H:i:s');
            $this->dia_mes = strftime('%d');
        }

        public function mostrar_agurdando(){
            $sql = new SQL();
            $query = "SELECT * FROM pizzas WHERE situacao = 'aguardando' GROUP BY nome";
            return $sql->select($query);
        }
        public function mostrar_bebidas(){
            $sql = new SQL();
            $query = "SELECT * FROM bebidas WHERE situacao = 'aguardando' GROUP BY nome";
            return $sql->select($query);
        }

        public function mostrar_preparando(){
            $sql = new SQL();
            $query = "SELECT * FROM pizzas WHERE situacao = 'preparando' GROUP BY nome";
            return $sql->select($query);
        }
        public function mostrar_bebidas_preparando(){
            $sql = new SQL();
            $query = "SELECT * FROM bebidas WHERE situacao = 'preparando' GROUP BY nome";
            return $sql->select($query);
        }

        public function mostrar_pronto(){
            $sql = new SQL();
            $query = "SELECT * FROM pizzas WHERE situacao = 'pronto' GROUP BY nome";
            return $sql->select($query);
        }
        public function mostrar_bebidas_pronto(){
            $sql = new SQL();
            $query = "SELECT * FROM bebidas WHERE situacao = 'pronto' GROUP BY nome";
            return $sql->select($query);
        }


        public function total_pizzas($nome){
            $sql = new SQL();
            $query = "SELECT * FROM pizzas WHERE nome = '$nome'";
            return Count($sql->select($query));
        }
        public function total_bebidas($nome){
            $sql = new SQL();
            $query = "SELECT * FROM bebidas WHERE nome = '$nome'";
            return Count($sql->select($query));
        }

        public function preparar($nome){
            $sql = new SQL();
            $query = "UPDATE pizzas SET situacao = 'preparando' WHERE nome = '$nome' AND dia_mes = '$this->dia_mes'";
            $sql->insere($query);
            $query = "UPDATE bebidas SET situacao = 'preparando' WHERE nome = '$nome' AND dia_mes = '$this->dia_mes'";
            $sql->insere($query);
        }
        public function terminar($nome){
            $sql = new SQL();
            $query = "UPDATE pizzas SET situacao = 'pronto' WHERE nome = '$nome' AND dia_mes = '$this->dia_mes'";
            $sql->insere($query);
            $query = "UPDATE bebidas SET situacao = 'pronto' WHERE nome = '$nome' AND dia_mes = '$this->dia_mes'";
            $sql->insere($query);
        }
        public function finalizar($nome){
            $sql = new SQL();
            $query = "UPDATE pizzas SET situacao = 'aguardando' WHERE nome = '$nome' AND dia_mes = '$this->dia_mes'";
            $sql->insere($query);
            $query = "UPDATE bebidas SET situacao = 'aguardando' WHERE nome = '$nome' AND dia_mes = '$this->dia_mes'";
            $sql->insere($query);
        }


        public function criar_db(){
            $host = 'localhost';
            $usuario = 'root';
            $senha = '';

            $mysqli = new mysqli($host, $usuario, $senha);

            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
            $meses = ['janeiro', 'fevereiro','marco', 'abriu','maio', 'junho','julho', 'agosto','setembro', 'outubro','novembro', 'dezembro'];
            $mes = strftime('%m');
            $ano = strftime('%Y');

            $valor = $mes - 1;
             
            $db = $meses[$valor].$ano;

            $query = "CREATE DATABASE IF NOT EXISTS $db";
            $query2 = "CREATE TABLE IF NOT EXISTS pedidosTemp (
            id INT NOT NULL AUTO_INCREMENT , PRIMARY KEY (id),
            nome VARCHAR(32),
            sabor1 VARCHAR(15),
            sabor2 VARCHAR(15),
            sabor3 VARCHAR(15),
            tamanho CHAR(1),
            borda VARCHAR(15),
            observacao VARCHAR(256),
            dia_sem VARCHAR(10),
            dia_mes INT(2),
            bebida VARCHAR(5),
            hora VARCHAR(15),
            situacao VARCHAR(15)
            )";
            $query3 = "CREATE TABLE IF NOT EXISTS pizzas (
            id INT NOT NULL AUTO_INCREMENT , PRIMARY KEY (id),
            nome VARCHAR(32),
            sabor1 VARCHAR(15),
            sabor2 VARCHAR(15),
            sabor3 VARCHAR(15),
            tamanho CHAR(1),
            borda VARCHAR(15),
            observacao VARCHAR(256),
            dia_sem VARCHAR(10),
            dia_mes INT(2),
            bebida VARCHAR(5),
            hora VARCHAR(15),
            situacao VARCHAR(15)
            )";
            $query4 = "CREATE TABLE IF NOT EXISTS bebidasTemp (
            id INT NOT NULL AUTO_INCREMENT , PRIMARY KEY (id),
            nome VARCHAR(32),
            bebida VARCHAR(15),
            dia_sem VARCHAR(10),
            dia_mes INT(2),
            hora VARCHAR(15),
            situacao VARCHAR(15)
            )";
            $query5 = "CREATE TABLE IF NOT EXISTS bebidas (
            id INT NOT NULL AUTO_INCREMENT , PRIMARY KEY (id),
            nome VARCHAR(32),
            bebida VARCHAR(15),
            dia_sem VARCHAR(10),
            dia_mes INT(2),
            hora VARCHAR(15),
            situacao VARCHAR(15)
            )";
            $mysqli->query($query) or die ($mysqli->error);
            $mysqli = new mysqli($host, $usuario, $senha, $db);
            $mysqli->query($query2) or die ($mysqli->error);
            $mysqli->query($query3) or die ($mysqli->error);
            $mysqli->query($query4) or die ($mysqli->error);
            $mysqli->query($query5) or die ($mysqli->error);

        }
    }