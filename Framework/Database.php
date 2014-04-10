<?php

    class Database {

        private static $instance;

        private $username = 'ggazzo';
        private $password = '321456';
        private $database = 'DSV_3';
        private $host     = 'widmore.mongohq.com:10000';
        private $connection;
        
        public static function getCollection($collection) {
            echo $collection;
            return self::getInstance()->getConnection()->$collection;
        }
        
        private static function getInstance() {
            if ( is_null( self::$instance ) ) {
                self::$instance = new self();
            }
            return self::$instance;
        }
        
        private function __construct() {
            $base = $this->database;
            $mongoClient = new MongoClient("mongodb://{$this->username}:{$this->password}@{$this->host}/{$this->database}");
            $this->connection = $mongoClient->$base;
        }
        
        public function getConnection(){
            return $this->connection;
        }

    }

?>