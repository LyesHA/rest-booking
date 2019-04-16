<?php  
require_once "dbConnection.php";

class Reservation{
	private static $database;
	private $ReservationId;
	private $ClientName;
  private $ReservationTime;	
	private $NumberOfPeople;	
  private $TableId;
  private $MemberId;

	function __construct($ReservationId = null,$ClientName,$ReservationTime, $NumberOfPeople,$TableId,$MemberId)
	{
		$this->ReservationId = $ReservationId;
		$this->ClientName = $ClientName;
		$this->ReservationTime = $ReservationTime;
    $this->NumberOfPeople = $NumberOfPeople;
    $this->TableId = $TableId;
    $this->MemberId = $MemberId;

  }
  
  private static function CreateConnection(){
		if( !isset(self::$database)){
			self::$database = new Database_Pdo();
		}
  }

	public function Create(){
		self::CreateConnection();
    $connection = self::$database->GetConnection();	
		$query = "INSERT INTO reservation(Reservation_Id, ClientName, ReservationTime, NumberOfPeople, TableId, Member_id)
     VALUES(?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(1, $this->ReservationId );
    $stmt->bindParam(2, $this->ClientName );
    $stmt->bindParam(3, $this->ReservationTime );
    $stmt->bindParam(4, $this->NumberOfPeople );
    $stmt->bindParam(5, $this->TableId );
    $stmt->bindParam(6, $this->MemberId );

    $stmt->execute(); 	
    $id = $connection-> lastInsertId();
    return $id;
  }
  

	
	

	
}
	
?>