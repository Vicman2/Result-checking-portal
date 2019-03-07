<?php
require_once "DataObject.class.php";
require_once  "Ss2sci.class.php";

class Student extends DataObject {
	protected $data = array(
	"id" => "",
	"regNo" => "",
	"pin" => "",
	"usedPin" => "",
	"unusedPin" => "",
	"name" => ""
	);
	
	public static function verifyStudent($regNo){
		if(substr($regNo, 0, 4) == 2018 and substr($regNo, 4, 3) == 101){
			$conn = parent::connect();
			$sql = "SELECT * FROM ". TBL_JSSIA . " WHERE regNo = :regNo";
			
			try{
			$st = $conn->prepare($sql);
			$st->bindValue(":regNo", $reg, PDO::PARAM_STR);
			$st->execute();
			$row = $st->fetch();
			parent::disconnect($conn);
			if($row) return new Student($row);
		}catch(PDOException $e){
			parent::disconnect($conn);
			die("Query failed: ". $e->getMessage());
		}
		
		
		}elseif(substr($regNo, 0, 4) == 2017 and substr($regNo, 4, 3) == 201){
			$conn = parent::connect();
			$sql = "SELECT * FROM ". TBL_JSS2A . " WHERE regNo = :regNo";
			
			try{
			$st = $conn->prepare($sql); // Remember to complete other classes in order to make it work
			$st->bindValue(":regNo", regNoid, PDO::PARAM_STR);
			$st->execute();
			$row = $st->fetch();
			parent::disconnect($conn);
			if($row) return new Student($row);
		}catch(PDOException $e){
			parent::disconnect($conn);
			die("Query failed: ". $e->getMessage());
		}
		
		
		}elseif(substr($regNo, 0, 4) == 2014 and substr($regNo, 4, 3) == 501){
			$conn = parent::connect();
			$sql = "SELECT * FROM ". TBL_SS2SCI . " WHERE regNo = :regNo";
			
			try{
			$st = $conn->prepare($sql);
			$st->bindValue(":regNo", $regNo, PDO::PARAM_STR);
			$st->execute();
			$row = $st->fetch();
			parent::disconnect($conn);
			if($row) return new Student($row);
			}catch(PDOException $e){
			parent::disconnect($conn);
			die("Query failed: ". $e->getMessage());
			}
		}else{
			return false;
		}
	}
	
	
	//verifying the pin the student inputted
	public static function verifyPin($pin, $regNo){
		$conn = parent::connect();
		$sql = "SELECT * FROM " . TBL_UNUSEDCARDS . " WHERE unusedpin = :unusedpin";
		$sql2 = "SELECT * FROM " . TBL_USEDCARDS . " WHERE usedpin = :usedpin AND regNo = :regNo AND noOfUse < 10 ";
		
		try{
			$st = $conn->prepare($sql);
			$st2 = $conn->prepare($sql2);
			$st->bindValue(":unusedpin", $pin, PDO::PARAM_STR);
			$st2->bindValue(":usedpin", $pin, PDO::PARAM_STR);
			$st2->bindValue(":regNo", $regNo, PDO::PARAM_STR);
			$st->execute();
			$st2->execute();
			$row1 = $st->fetch();
			$row2 = $st2->fetch();
			parent::disconnect($conn);
			if($row1){
				return new Student($row1);
			}elseif($row2){
				return new Student($row2);
			}
		}catch(PDOException $e){
			parent::disconnect($conn);
			die("Query failed ". $e->getMessage() );
		}
	}
	
	public function checkIfPinIsNew($pin){
		$conn = parent::connect();
		$sql = " SELECT * FROM ". TBL_UNUSEDCARDS . " WHERE unusedpin = :unusedpin";
		
		try{
			$st =$conn->prepare($sql);
			$st->bindValue(":unusedpin", $pin , PDO::PARAM_STR);
			$st->execute();
			$row = $st->fetch();
			parent::disconnect($conn);
			if($row) return new Student($row);
		}catch(PDOException $e){
			parent::disconnect($conn);
			die("Query failed ". $e->getMessage());
		}
	}
	
	
	
		public function processStudentWithUnusedPin($regNo, $pin){
			displayPageHeader("First Term Result");
			
			if(substr($regNo, 0, 4) == 2018 and substr($regNo, 4, 2) == 101){
				JSS1::Jss1Stud($regNo, $pin, $IsUsed = false );
			}elseif(substr($regNo, 0, 4) == 2017 and substr($regNo, 4, 3) == 201){
				JSS2::Jss2Stud($regNo, $pin, $IsUsed = false);
			}elseif(substr($regNo, 0, 4) == 2016 and substr($regNo, 4, 3) == 301){
				JSS3::Jss3Stud($regNo, $pin, $IsUsed = false);
			}elseif(substr($regNo, 0, 4) == 2015 and substr($regNo, 4, 3) == 401){
				SS1::Ss1Stud($regNo, $pin, $IsUsed = false);
			}elseif(substr($regNo, 0, 4) == 2014 and substr($regNo, 4, 3) == 501){
				SS2Sci::Ss2sciStud($regNo, $pin, $IsUsed = false);
			}elseif(substr($regNo, 0, 4) == 2014 and substr($regNo, 4, 3) == 502){
				SS2Art::Ss2ArtStud($regNo, $pin, $IsUsed = false);
			}elseif(substr($regNo, 0, 4) == 2013 and substr($regNo, 4, 3) == 601){
				SS3Sci::Ss3SciStud($regNo, $pin, $IsUsed = false);
			}elseif(substr($regNo, 0, 4) == 2013 and substr($regNo, 4, 3) == 602){
				SS3Art::Ss3ArtStud($regNo, $pin, $IsUsed = false);
			}else{
				echo '<p class="error">Sorry, you are not a student of this school. </p>';
			}
		}
		
		public function processStudentWithUsedPin($regNo, $pin){
			displayPageHeader("First Term Result");
			
			if(substr($regNo, 0, 4) == 2018 and substr($regNo, 4, 2) == 101){
				JSS1::Jss1Stud($regNo, $pin, $IsUsed = true );
			}elseif(substr($regNo, 0, 4) == 2017 and substr($regNo, 4, 3) == 201){
				JSS2::Jss2Stud($regNo, $pin, $IsUsed = true);
			}elseif(substr($regNo, 0, 4) == 2016 and substr($regNo, 4, 3) == 301){
				JSS3::Jss3Stud($regNo, $pin, $IsUsed = true);
			}elseif(substr($regNo, 0, 4) == 2015 and substr($regNo, 4, 3) == 401){
				SS1::Ss1Stud($regNo, $pin, $IsUsed = true);
			}elseif(substr($regNo, 0, 4) == 2014 and substr($regNo, 4, 3) == 501){
				SS2Sci::Ss2sciStud($regNo, $pin, $IsUsed = true);
			}elseif(substr($regNo, 0, 4) == 2014 and substr($regNo, 4, 3) == 502){
				SS2Art::Ss2ArtStud($regNo, $pin, $IsUsed = true);
			}elseif(substr($regNo, 0, 4) == 2013 and substr($regNo, 4, 3) == 601){
				SS3Sci::Ss3SciStud($regNo, $pin, $IsUsed = true);
			}elseif(substr($regNo, 0, 4) == 2013 and substr($regNo, 4, 3) == 602){
				SS3Art::Ss3ArtStud($regNo, $pin, $IsUsed = true);
			}else{
				echo '<p class="error">Sorry, you are not a student of this school. </p>';
			}
		}
}	
