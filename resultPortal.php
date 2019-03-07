<?php
require_once("common.inc.php");

if(isset($_POST["checkResult"]) and $_POST["checkResult"] == "Login"){
	checkResult();
}else{
	displayLoginForm(array(), array(), new Student(array()));
}

function displayLoginForm($errorMessages, $missingFields, $student){
	displayPageHeader(" VIC-TECH GLOBAL SECONDARY SCHOOL");
	if($errorMessages){
		foreach($errorMessages as $errorMessage){
			echo $errorMessage;
		}
	}else{
	?>
	<p style="text-align:center;"> Input your Registration number and from the scratch card you bought in order to access your result </p>
	<?php  } ?>
		<form action="resultPortal.php" method="post" style="margin: auto; background:grey; padding:auto">
			<div>
				<input type="hidden" name="checkResult" value="Login" />
				
				<label for="regNo"<?php validateField("regNo", $missingFields) ?>>Registration Number</label>
				<input type="text" name="regNo" id="regNo" value="<?php echo $student->getValueEncoded("regNo") ?>" />
				
				<label for="pin"<?php validateField("pin", $missingFields)  ?>>Pin Code</label>
				<input type="text" name="pin" id="pin" value="<?php echo $student->getValueEncoded("pin") ?>" />
				
				<div style="clear:both;">
					<input type="submit" name="submitButton" id="submitButton" value="Login" />
				</div>
			</div>
		</form>
	<?php
	displayPageFooter();
	}
	
	
	function checkResult(){
		$requiredFields = array("regNo", "pin");
		$missingFields = array();
		$errorMessages = array();
		
		$student = new Student(array(
		"regNo" => isset($_POST["regNo"]) ? preg_replace( "/[^\'\-0-9]/", "", $_POST["regNo"]) : "",
		"pin" => isset($_POST["pin"]) ? preg_replace( "/[^\'\-0-9]/", "", $_POST["pin"]) : ""
	 ));
		// remember to create a class and a constructor having array as the argument
		
		
		foreach($requiredFields as $requiredField){
			if(!$student->getValue($requiredField)){
				$missingFields[] = $requiredField;
			}
		}
		
		if($missingFields){
			$errorMessages[] = '<p class="error"> There are some missing fields on the form you submitted. Please complete the highlighted fields</p>';
		}
		
		if($student->getValue("regNo") != ""){
			if(strlen($student->getValue("regNo")) != 9){
				$errorMessages[] = '<p class="error"> Input a valid registration number. Registration number must be a 9 digit number. </p>';
			}
		}
		
		if($student->getValue("regNo") != ""){
			if(!Student::verifyStudent($student->getValue("regNo"))){
				$errorMessages[] = '<p class="error"> The registration number you inputted does not exist in the database of your class. Input a valid registration number</p>';
			}
		}
		
		if($student->getValue("pin") != ""){
			if(strlen($student->getValue("pin")) != 10){
				$errorMessages[] = '<p class="error"> Input a valid pin. Pin number must be a 10 digit number. </p>';
			}
		}
		
		if($student->getValue("pin") != ""){
			if(!Student::verifyPin($student->getValue("pin"), $student->getValue("regNo"))){
				$errorMessages[] = '<p class="error"> The pin you inputed does not exist or have been used by you 10 times before now.</p>';
			}
		}
		
		if($errorMessages){
			displayLoginForm($errorMessages, $missingFields, $student);
		}elseif($student->checkIfPinIsNew($student->getValue("pin"))){
			$student->processStudentWithUnusedPin($student->getValue("regNo"), $student->getValue("pin"));
		}else{
			$student->processStudentWithUsedPin($student->getValue("regNo"), $student->getValue("pin"));
		}
	}
	
	
	?>