<?php 
require_once "dbConnection.php";

class City{
  private static $database;
  private $CityId;
  private $Name;
  private $Picture;

  function __construct($CityId=null,$Name,$Picture){
    $this->CityId = $CityId;
    $this->Name = $Name;
    $this->Picture = $Picture;
  }

  private static function CreateConnection(){
		if( !isset(self::$database)){
			self::$database = new Database_Pdo();
		}
  }
  
  public static function ReadCities(){
		//$CityArray = array();
		
		self::CreateConnection();
		$connection = self::$database->GetConnection();
    $query = "SELECT * FROM City";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $rows = $stmt->fetchAll();

		return $rows;
	}

}





?>