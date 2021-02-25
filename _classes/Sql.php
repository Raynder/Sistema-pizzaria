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

        public function insere($query, $array = array()){
            $sql = $this->conn->prepare($query);
            $this->setParams($array, $sql);
            $sql->execute();
        }

        public function select($query){
            $sql = $this->conn->prepare($query);
            $sql->execute();
            $res = $sql->fetchALL(PDO::FETCH_ASSOC);
            return $res;
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