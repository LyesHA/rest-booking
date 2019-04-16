<?php 
require_once "dbConnection.php";

class Category{
  private static $database;
  private $CategoryId;
  private $Name;
  private $Picture;

  function __construct($CategoryId=null,$Name,$Picture){
    $this->CategoryId = $CategoryId;
    $this->Name = $Name;
    $this->Picture = $Picture;
  }

  private static function CreateConnection(){
		if( !isset(self::$database)){
			self::$database = new Database_Pdo();
		}
  }

  public static function ReadCategoriesLIMIT(){
		
		self::CreateConnection();
		$connection = self::$database->GetConnection();
    $query = "SELECT CATEGORIE_ID AS Id, NAME AS Name, PICTURE AS Picture FROM Categorie LIMIT 4";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $rows = $stmt->fetchAll();

		return $rows;
  }

  public static function ReadCategories(){
		
		self::CreateConnection();
		$connection = self::$database->GetConnection();
    $query = "SELECT CATEGORIE_ID AS Id, NAME AS Name, PICTURE AS Picture FROM Categorie";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $rows = $stmt->fetchAll();

		return $rows;
  }
  public static function ReadCategoriesById($id){
		
		self::CreateConnection();
		$connection = self::$database->GetConnection();
    //$query = "SELECT * FROM Categorie where Categorie_Id=?;";

    $query = "SELECT DISTINCT C.CATEGORIE_ID AS Id, C.NAME AS Name, C.PICTURE AS Picture
    FROM CATEGORIE C, CITY CI, RESTAURANTCITY RC, restaurantcategories CR
    WHERE C.CATEGORIE_ID=CR.CATEGORIE_ID
    AND CI.CITY_ID = RC.CITY_ID
    AND RC.RESTAURANT_ID = CR.RESTAURANT_ID
    AND CI.CITY_ID =?;";
    $stmt = $connection->prepare($query);
    $stmt->bindParam( 1, $id );
    $stmt->execute();
    $rows = $stmt->fetchAll();

		return $rows;
  }
  
  public static function GetCategoriesByName($name){
		
		self::CreateConnection();
		$connection = self::$database->GetConnection();
    $query = "SELECT CATEGORIE_ID AS Id, NAME AS Name, PICTURE AS Picture FROM CATEGORIE Where Name LIKE '%$name%';";
    $stmt = $connection->prepare($query);
   // $stmt->bindParam( 1, $name );
    $stmt->execute();
    $rows = $stmt->fetchAll();

		return $rows;
	}

}





?>