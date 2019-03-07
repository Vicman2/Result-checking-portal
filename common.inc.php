<?php

require_once("constants.php");
require_once("Student.class.php");
require_once("Ss2sci.class.php");


function displayPageHeader($pageTitle){
?>
<!DOCTYPE>
	<html>
		<head>
			<title><?php echo $pageTitle ?></title>
			<link type="text/css" rel="stylesheet" href="../common.css" />
			<style type="text/css">
				th{text-align: left; background-color : #bbb;}
				th, td {padding: 0.4em;}
				tr.alt td {background: #ddd;}
				.error{background: #d33; color: white; padding: o.2em;}
				form{margin: auto }
			</style>
		</head>
		
		<body>
			<h1 style="text-align: center;"> <?php echo $pageTitle ?> </h1>
<?php
}

function displayPageFooter(){
?>
	</body>
</html>
<?php
}


function validateField($fieldName, $missingFields){
	if(in_array($fieldName, $missingFields)){
		echo 'class="error"';
	}
}

function insertTo($table, $regNo, $pin){
	$dsn = "mysql:dbname=mydatabase";
	$username = "root";
	$password = "i am vicman";
	
		$conn = new PDO( $dsn, $username, $password );
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
		$sql = "UPDATE ". $table. " SET pinInUse = :pin WHERE regNo = :regNo ";

		try{
			$st = $conn->prepare($sql);
			$st->bindValue(":pin", $pin, PDO::PARAM_STR);
			$st->bindValue(":regNo", $regNo, PDO::PARAM_STR);
			$st->execute();
			$conn = "";
		}catch(PDOException $e){
			$conn = "";
			die("Query failed ". $e->getMessage());
		}
}

function deletePinFromUnUsed($table, $pin){
		$dsn = "mysql:dbname=mydatabase";
		$username = "root";
		$password = "i am vicman";
	
		$conn = new PDO( $dsn, $username, $password );
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
		$sql = "DELETE FROM ". $table. " WHERE unusedpin = :pin";

		try{
			$st = $conn->prepare($sql);
			$st->bindValue(":pin", $pin, PDO::PARAM_STR);
			$st->execute();
			$conn = "";
		}catch(PDOException $e){
			$conn = "";
			die("Query failed ". $e->getMessage());
		}
}

function insertToUsed($table, $pin, $regNo){
		$dsn = "mysql:dbname=mydatabase";
		$username = "root";
		$password = "i am vicman";
	
		$conn = new PDO( $dsn, $username, $password );
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
		$sql = "INSERT INTO ". $table. "(usedPin, regNo, noOfUse) VALUES(:pin, :regNo, 1)";

		try{
			$st = $conn->prepare($sql);
			$st->bindValue(":pin", $pin, PDO::PARAM_STR);
			$st->bindValue("regNo", $regNo, PDO::PARAM_STR);
			$st->execute();
			$conn = "";
		}catch(PDOException $e){
			$conn = "";
			die("Query failed ". $e->getMessage());
		}
}

function updateNoOfUse($table, $pin){
		$dsn = "mysql:dbname=mydatabase";
		$username = "root";
		$password = "i am vicman";
	
		$conn = new PDO( $dsn, $username, $password );
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
		$sql = "UPDATE ". $table." SET noOfUse = noOfUse + 1 WHERE usedPin = :pin";

		try{
			$st = $conn->prepare($sql);
			$st->bindValue(":pin", $pin, PDO::PARAM_STR);
			$st->execute();
			$conn = "";
		}catch(PDOException $e){
			$conn = "";
			die("Query failed ". $e->getMessage());
		}
}
?>