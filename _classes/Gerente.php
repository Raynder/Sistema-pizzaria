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

        //FUNÇÕES DOS SLIDS
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
        //FIM DAS FUNÇÕES DO SLIDE

        //FUNÇÕES QUE CAUCULAM TOTAIS
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

        public function calc_total($nome){
            $total_a_pagar = 0;
            $sql = new SQL();
            $query = "SELECT tamanho FROM pizzas WHERE nome = '$nome'";
            $pizzas = $sql->select($query);
            $query = "SELECT bebida FROM bebidas WHERE nome = '$nome'";
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
                        $total_a_pagar += 5;
                    }
                    else{
                        $total_a_pagar += 3;
                    }
                }
            }
            
            $query = "UPDATE pizzas SET total = '$total_a_pagar' WHERE nome = '$nome'";
            $sql->insere($query);
            $query = "SELECT * FROM pizzas WHERE nome = '$nome' GROUP BY nome";
            $valores = $sql->select($query);
            $valores = $valores[0];

            return $valores['total'] - $valores['dinheiro'] - $valores['cartao'];
        }
        //FIM DAS FUNÇÕES QUE CAUCULAM TOTAIS

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

        //PAGAMENTO
        public function pg_dinheiro($valor, $nome){
            $sql = new SQL();
            $query = "SELECT * FROM pizzas WHERE nome = '$nome' GROUP BY nome";
            $valores = $sql->select($query);
            $valores = $valores[0];
            $valor += $valores['dinheiro'];
            $query = "UPDATE pizzas SET dinheiro = '$valor' WHERE nome = '$nome'";
            $sql->insere($query);
            $query = "SELECT * FROM pizzas WHERE nome = '$nome' GROUP BY nome";
            $valores = $sql->select($query);
            $valores = $valores[0];
            $resul = $valores['total'] - $valores['dinheiro'] - $valores['cartao'];
            if($resul == 0){
                $query = "UPDATE pizzas SET situacao = 'pago' WHERE nome = '$nome'";
                $sql->insere($query);
            }
            return $resul;
        }
        public function pg_cartao($valor, $nome){
            $sql = new SQL();
            $query = "UPDATE pizzas SET cartao = '$valor' WHERE nome = '$nome'";
            $sql->insere($query);
            $query = "SELECT * FROM pizzas WHERE nome = '$nome' GROUP BY nome";
            $valores = $sql->select($query);
            $valores = $valores[0];
            $resul = $valores['total'] - $valores['dinheiro'] - $valores['cartao'];
            if($resul == 0){
                $query = "UPDATE pizzas SET situacao = 'pago' WHERE nome = '$nome'";
                $sql->insere($query);
            }
            return $resul;
        }
        //FIM DAS FUNÇÕES DE PAGAMENTOS


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