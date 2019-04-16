<?php 
require_once "dbConnection.php";

class Table{
  
  private static $database;
  private $Table_Id;
  private $NumberOfPeople;
  private $Status;
  private $Restaurant_Id;

  function __construct($Table_Id=null,$NumberOfPeople,$Status,$Restaurant_Id){
    $this->Table_Id = $Table_Id;
    $this->NumberOfPeople = $NumberOfPeople;
    $this->Status = $Status;
    $this->Restaurant_Id = $Restaurant_Id;
  }

  private static function CreateConnection(){
		if( !isset(self::$database)){
			self::$database = new Database_Pdo();
		}
  }
  
  public static function ReadRestaurants(){		
		self::CreateConnection();
		$connection = self::$database->GetConnection();
    $query = "SELECT * FROM Restaurant";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $rows = $stmt->fetchAll();

		return $rows;
  }
  
  public static function GetRestaurantsTables($Restaurant_Id){
    self::CreateConnection();
		$connection = self::$database->GetConnection();
    $query = "SELECT * FROM tablerestaurant where restaurant_Id = $Restaurant_Id;";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $rows = $stmt->fetchAll();

		return $rows;
  }

}





?>