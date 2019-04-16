<?php  
require_once "dbConnection.php";

class Member{
	private static $database;
	private $ID;
	private $Username;
  private $Email;	
	private $Password;	

	function __construct($ID = null,$Username,$Email, $Password)
	{
		$this->ID = $ID;
		$this->Username = $Username;
		$this->Email = $Email;
		$this->Password = $Password;
  }
  
  private static function CreateConnection(){
		if( !isset(self::$database)){
			self::$database = new Database_Pdo();
		}
  }

	public function Create(){
		self::CreateConnection();
    $connection = self::$database->GetConnection();	
    $hashedPassword = password_hash($this->Password, PASSWORD_DEFAULT);
		$query = "INSERT INTO Member(Username, Email, Password) VALUES(?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(1, $this->Username );
    $stmt->bindParam(2, $this->Email );
    $stmt->bindParam(3, $hashedPassword );
    $stmt->execute(); 	
    $id = $connection-> lastInsertId();
    return $id;
  }
  
	public static function Login($password, $email){		
		self::CreateConnection();
		$connection = self::$database->GetConnection();
		$query = "SELECT Member_id, Username, Email, Password FROM Member Where Email = ?";
		$stmt = $connection->prepare($query);
    $stmt->bindParam(1, $email);
		$stmt->execute();
		$rows = $stmt->fetchAll();
		foreach($rows as $key => $value){
				if(password_verify($password,$value["Password"])){
					return $value["Member_id"];
				}else{
					return null;
				}
		}
	
	}
	
		public static function UserExist($username,$email){		
		self::CreateConnection();
		$connection = self::$database->GetConnection();
		$query = "SELECT * FROM Member Where Username = ? OR Email = ?";
		$stmt = $connection->prepare($query);
    $stmt->bindParam(1, $username );
    $stmt->bindParam(2, $email );
    $stmt->execute(); 	

		if($stmt->rowCount() > 0)
			{		
        return true;
      }
      else{
        return false;
      }

	}
	
	/*ublic function ChangePassword ($newPassword)
	{
		$this->Password = crypt($newPassword,$this->Salt);
		$this->Save();
	}	*/
	
	/*public static function DeleteUser($username,$password){	
		self::CreateConnection();
		$connection = self::$database->GetConnection();
	
    if(self::Login($password,$username))
    {
      $query = "DELETE FROM USER WHERE username = '$username'";
      $result = $connection->query($query);
      if($result) echo "user Successfully deleted";
    }
      else echo "Prob";
	}*/
	
	
}
	
?>