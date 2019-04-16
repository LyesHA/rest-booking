<?php 
require_once "dbConnection.php";

class Restaurant{
  private static $database;
  private $RestaurantId;
  private $Name;
  private $Address;
  private $OpenningHours;
  private $Picture;

  function __construct($RestaurantId=null,$Name,$Address,$OpenningHours,$Picture){
    $this->RestaurantId = $RestaurantId;
    $this->Name = $Name;
    $this->Address = $Address;
    $this->OpenningHours = $OpenningHours;
    $this->Picture = $Picture;
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

  public static function ReadRestaurantsLIMIT(){		
		self::CreateConnection();
		$connection = self::$database->GetConnection();
    $query = "SELECT * FROM Restaurant LIMIT 4";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $rows = $stmt->fetchAll();

		return $rows;
  }

  public static function GetRestaurantbyName($name){
    self::CreateConnection();
		$connection = self::$database->GetConnection();
    $query = "SELECT * FROM Restaurant where name LIKE '%$name%';";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $rows = $stmt->fetchAll();

		return $rows;
  }

  public static function ReadRestaurantByCategorie($id){
    self::CreateConnection();
		$connection = self::$database->GetConnection();
    $query = "SELECT R.RESTAURANT_ID AS Restaurant_Id, R.NAME AS Name, R.ADDRESS AS Address,
              R.OPENNINGHOURS AS OpenningHours, R.PICTURE AS Picture
              FROM RESTAURANT R, RESTAURANTCATEGORIES RC
              WHERE R.RESTAURANT_ID = RC.RESTAURANT_ID
              AND RC.CATEGORIE_ID = ?;";
    $stmt = $connection->prepare($query);
    $stmt->bindParam( 1, $id );
    $stmt->execute();
    $rows = $stmt->fetchAll();

		return $rows;
  }
  public static function GetRestaurantById($id){
    self::CreateConnection();
		$connection = self::$database->GetConnection();
    $query = "SELECT * FROM Restaurant where restaurant_id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bindParam( 1, $id );
    $stmt->execute();
    $rows = $stmt->fetch();

		return $rows;
  }

}





?>