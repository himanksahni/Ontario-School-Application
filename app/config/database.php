<?php 

    /*
    
    This file is for setting up database(it's attributes and method that a model can use to communicate)
    
    */

    class Database
        
    {
        
        public $host = DB_HOST;
        public $username = DB_USERNAME;
        public $password = DB_PASSWORD;
        public $dbName = DB_DATABASE;
        public $connectionString;
        public $statement;
        public $pdo;
        public $errorMessage;
        
        

        public function __construct()
        
        {
            
            //String used in conncetion to the database. We are using PDO here.
            
            $this->connectionString = "mysql:host=".$this->host.";dbname=".$this->dbName;
            
            
            //this code is for errors
            
            $errors = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            
            try
            
            {
               $this->pdo = new PDO($this->connectionString, $this->username, $this->password, $errors);    
                
            }
            
            catch(PDOExceprtion $e)
            {
                $this->errorMessage = $e->getMessage();
                
                echo $this->errorMessage;
                
            }
            
            
            
        }
        
        
        public function prepareSQL($sql)
        
        {
            
            $this->statement = $this->pdo->prepare($sql);
        }
        
        public function executeSQL()
        
        {
            
            $this->statement->execute();
            
        }
        
        
        public function getNumberofRows()
        {
            
            $this->executeSQL();
            return $this->statement->rowCount();
        }
        
        
        public function resultSet()
        
        {
                $this->executeSQL();
                
                return $this->statement->fetchAll();
            }
        
        public function getSingleRecord()
        
        {
                 $this->executeSQL();
                
                return $this->statement->fetch();
            }
        
        
    }


?>