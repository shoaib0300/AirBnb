<?php
    class Database{
        private $username = 'root';
        private $password = '';
        private $database = 'aibbnb';
        private $server = 'localhost';
        private $connection;
        public static $instance;
        private function __construct(){
            $this->connection = new PDO("mysql:host=$this->server; dbname=$this->database", $this->username, $this->password);
            $this->connection->setAttributes(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        public static function getInstance(){
            if(!self::$instance){
                self::$instance = new self();
            }
            return self::$instance;
        }
        public function getConnection(){
            return $this->connection;
        }
    }
?>