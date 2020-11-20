<?php 
    abstract class Connexion {
        private static $connection;

        public function __construct(){
            $this->dbConnection();
        }

        public function dbConnection()
        {
            if(self::$connection !== null)
            {
                return self::$connection;
            }

            self::$connection = new PDO("mysql:host=localhost;dbname=jolly_seed;charset=utf8", 'root', '');
            return self::$connection;
        }

        protected function execute($query, $params = array())
        {
            $stmt = self::$connection->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();
        }


    }
?>