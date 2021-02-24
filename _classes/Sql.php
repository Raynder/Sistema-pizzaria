<?php

    Class Sql{

        private $conn;

        public function __construct(){
            $host = "localhost";
            $db = "dados";
            $user = "root";
            $pass = "";

            $this->conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        }

        public function insere($array = array(), $query){
            $sql = $this->conn->prepare($query);
            $this->setParams($array, $sql);
            $sql->execute();
        }

        public function setParams($array = array(), $sql){

            foreach($array as $key => $value){
                $this->setParam($key, $value, $sql);
            }
        }

        public function setParam($key, $value, $sql){
            $sql->bindParam($key, $value);
        }
    }