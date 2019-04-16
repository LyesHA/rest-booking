<?php

//Constants
Define ('USERNAME', 'root');
Define ('PASSWORD' , '');
Define ('HOST' , 'localhost');
//Global Variable 
$DB_NAME = 'restaurant_db';

class Database_Pdo{
	
	private $connection;
	
	function __construct(){
		$this->OpenConnection();
	}
	function __destruct(){
		$this->CloseConnection();
	}	
	
	public function OpenConnection(){
		global $DB_NAME;
    try {
      $this->connection = new PDO("mysql:host=".HOST.";dbname=".$DB_NAME, USERNAME, PASSWORD);
       // set the PDO error mode to exception
       $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       //echo "Connected successfully";
      }
      catch(PDOException $e){
       echo "Connection failed: " . $e->getMessage();
      }
	}
	
	private function CloseConnection(){
		$this->connection=null;
	}
	
	public function GetConnection(){
		return $this->connection;
	}
}

?>