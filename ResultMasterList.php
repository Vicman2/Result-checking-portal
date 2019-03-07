<?php
require_once("SeniorStudents.class.php");
require_once("JuniorStudents.class.php");
require_once("Ss2sci.class.php");


if(isset($_POST["create"]) and isset($_POST["studClass"])){
	if($_POST["studClass"] == "Jss1A"){
		Jss1A();
	}elseif($_POST["studClass"] == "Jss1B"){
		Jss1B();
	}elseif($_POST["studClass"] == "Jss1C"){
		Jss1C();
	}elseif($_POST["studClass"] == "Jss2A"){
		Jss2A();
	}elseif($_POST["studClass"] == "Jss2B"){
		Jss2B();
	}elseif($_POST["studClass"] == "Jss2C"){
		Jss2C();
	}elseif($_POST["studClass"] == "Jss3A"){
		Jss3A();
	}elseif($_POST["studClass"] == "Jss3B"){
		Jss3B();
	}elseif($_POST["studClass"] == "Jss3C"){
		Jss3C();
	}elseif($_POST["studClass"] == "Ss1A"){
		Ss1AC();
	}elseif($_POST["studClass"] == "Ss1B"){
		Ss1B();
	}elseif($_POST["studClass"] == "Ss1C"){
		Ss1C();
	}elseif($_POST["studClass"] == "SS1A"){
		Ss1AC();
	}elseif($_POST["studClass"] == "Ss2Sci"){
		Ss2Sci();
	}elseif($_POST["studClass"] == "Ss2Art"){
		Ss2Art();
	}elseif($_POST["studClass"] == "Ss3Sci"){
		Ss3Sci();
	}elseif($_POST["studClass"] == "Ss3Art"){
		Ss3Art();
	}else{
		displayFormPage("Sorry Your have to choose a class for a master list");
	}
}else{
	displayFormPage($message="");
}
 // This classes 

// This is the Senior Students Class 




function displayFormPage($message){
	disPlayHeader();
?>
		
<p <?php if($message){ echo 'class="error"' ?>> <?php echo $message; }else{ echo "Choose a class to  get their master list "; ?></p>
<?php } ?>
	<form action="ResultMasterList.php" method="post">
		<div style="width:30em;">
			<label for="Class"> Choose a Class  </label>
			<select name="studClass" id="Class" size="1" >
				<option value="none" selected="selected"> Choose Class </option>
				<option value="Jss1A"> Jss1A </option>
				<option value="Jss1B"> Jss1B </option>
				<option value="Jss1C"> Jss1C </option>
				<option value="Jss2A"> Jss2A </option>
				<option value="Jss2B"> Jss2B </option>
				<option value="Jss2C"> Jss2C </option>
				<option value="Jss3A"> Jss3A </option>
				<option value="Jss3B" > Jss3B </option>
				<option value="Jss3C" > Jss3C </options>
				<option value="Ss1A" > Ss1A </options>
				<option value="Ss1B" > Ss1B </options>
				<option value="Ss1C" > Ss1C </options>
				<option value="Ss2Art" > Ss2Art </option>
				<option value="Ss2Sci" > Ss2Sci </option>
				<option value="Ss3Sci" > Ss3Sci</option>
				<option value="Ss3Art" > Ss3Art </option>
			</select>
			<div style="clear:both;">
					<input type="submit" name="create" value="Create" />
			</div>
		</div>
	</form>
<?php 
}


function disPlayHeader(){ ?>
	<!DOCTYPE>
	<html>
		<head>
			<title> Result Master List</title>
			<link type="text/css" rel="stylesheet" href="common.css" />
			<style type="text/css">
				.error{
					background: #d33;
					color:white;
					padding: 0.2em;
				}
			</style>
		</head>
		<body>
		<h1>  Result Master List Checker </h1>
<?php }

// The ss2Sci Function
function Ss2Sci(){
	$StudentsRecord= array(); // This is the array that will have the row of all the students in the class.
	// Opening the Score file...
	$handle1 = fopen("Qmss/Ss2/Ss2Sci/English.csv", "r");
	$handle2 = fopen("Qmss/Ss2/Ss2Sci/Maths.csv", "r");
	$handle3 = fopen("Qmss/Ss2/Ss2Sci/Biology.csv", "r");
	$handle4 = fopen("Qmss/Ss2/Ss2Sci/Chemistry.csv", "r");
	$handle5 = fopen("Qmss/Ss2/Ss2Sci/Physics.csv", "r");
	$handle6 = fopen("Qmss/Ss2/Ss2Sci/GeoGraphy.csv", "r");
	$handle7 = fopen("Qmss/Ss2/Ss2Sci/Economics.csv", "r");
	$handle8 = fopen("Qmss/Ss2/Ss2Sci/Igbo.csv", "r");
	$handle9 = fopen("Qmss/Ss2/Ss2Sci/AnimHus.csv", "r");
	
	// Assigning initial value to the variables wich will be the initial array index for each and every one of the subject array;
	$arrayNo1 = 0;
	$arrayNo2 = 0;
	$arrayNo3 = 0;
	$arrayNo4 = 0;
	$arrayNo5 = 0;
	$arrayNo6 = 0;
	$arrayNo7 = 0;
	$arrayNo8 = 0;
	$arrayNo9 = 0;
	
	// puting the subject scores in an array
	while($line1 = fgetcsv($handle1)){
		$StudentsRecord[$arrayNo1]["name"] = $line1[0];
		$StudentsRecord[$arrayNo1]["EngScore"]= $line1[1];
		$arrayNo1++;
	}
	
	while ($line2 = fgetcsv($handle2)){
		$StudentsRecord[$arrayNo2]["MathsScore"] = $line2[1];
		$arrayNo2++;
	}
	while($line3 = fgetcsv($handle3)){
		$StudentsRecord[$arrayNo3]["BioScore"] = $line3[1];
		$arrayNo3++;
	}
	while($line4 = fgetcsv($handle4)){
		$StudentsRecord[$arrayNo4]["ChemScore"] = $line4[1];
		$arrayNo4++;
	}
	while($line5 = fgetcsv($handle5)){
		$StudentsRecord[$arrayNo5]["PhyScore"] = $line5[1];
		$arrayNo5++;
	}
	while($line6 = fgetcsv($handle6)){
		$StudentsRecord[$arrayNo6]["GeoScore"] = $line6[1];
		$arrayNo6++;
	}
	while($line7 = fgetcsv($handle7)){
		$StudentsRecord[$arrayNo7]["EcoScore"] = $line7[1];
		$arrayNo7++;
	}
	while($line8 = fgetcsv($handle8)){
		$StudentsRecord[$arrayNo8]["IgboScore"] = $line8[1];
		$arrayNo8++;
	}
	while($line9 = fgetcsv($handle9)){
		$StudentsRecord[$arrayNo9]["AnimScore"] = $line9[1];
		$arrayNo9++;
	}
	$arrayNo10=0;
	$StudentsRecord1 = array();
	foreach($StudentsRecord as $student){
		$studObject = str_replace(" ", "_", $student["name"]); // replace the space in the name with "_" and assign it to $studObject;
		$studObject = new SS2Sci(); // asign the modified name to be a new object of the class.
		
		// Assigning Properties to this object
		$studObject->Name = $student["name"];
		$studObject->Eng = $student["EngScore"];
		$studObject->Maths = $student["MathsScore"];
		$studObject->Bio = $student["BioScore"];
		$studObject->Chem = $student["ChemScore"];
		$studObject->Phy = $student["PhyScore"];
		$studObject->Geo = $student["GeoScore"];
		$studObject->Eco = $student["EcoScore"];
		$studObject->Igbo = $student["IgboScore"];
		$studObject->AnimHus = $student["AnimScore"];
		
		// Reading in this values in an array that will contain the records of each student
		$StudentsRecord1[$arrayNo10]["Average"] = $studObject->studAverage();
		$StudentsRecord1[$arrayNo10]["name"]= $studObject->Name;
		$StudentsRecord1[$arrayNo10]["EngScore"]= $studObject->Eng;
		$StudentsRecord1[$arrayNo10]["MathsScore"]= $studObject->Maths;
		$StudentsRecord1[$arrayNo10]["BioScore"]= $studObject->Bio;
		$StudentsRecord1[$arrayNo10]["ChemScore"]= $studObject->Chem;
		$StudentsRecord1[$arrayNo10]["PhyScore"]= $studObject->Phy;
		$StudentsRecord1[$arrayNo10]["GeoScore"]= $studObject->Geo;
		$StudentsRecord1[$arrayNo10]["EcoScore"] = $studObject->Eco;
		$StudentsRecord1[$arrayNo10]["IgboScore"]= $studObject->Igbo;
		$StudentsRecord1[$arrayNo10]["AnimScore"] = $studObject->AnimHus;
		$StudentsRecord1[$arrayNo10]["EngGrade"] = $studObject->EngGrade();
		$StudentsRecord1[$arrayNo10]["MathsGrade"] = $studObject->MathsGrade();
		$StudentsRecord1[$arrayNo10]["BioGrade"] = $studObject->BioGrade();
		$StudentsRecord1[$arrayNo10]["ChemGrade"] = $studObject->ChemGrade();
		$StudentsRecord1[$arrayNo10]["PhyGrade"] = $studObject->PhyGrade();
		$StudentsRecord1[$arrayNo10]["GeoGrade"] = $studObject->GeoGrade();
		$StudentsRecord1[$arrayNo10]["EcoGrade"] = $studObject->EcoGrade();
		$StudentsRecord1[$arrayNo10]["AnimHusGrade"] = $studObject->AnimHusGrade();
		$arrayNo10++;
	}
	
	
	array_multisort($StudentsRecord1); // This sorts the array based on the average.
	$noOfStudents = count($StudentsRecord1); // Get the No of students in the array
	$StudentsRecord2 = array();
	$noOfStudents1 = 0;
	
	// Sort the students in asending order of their average;
	foreach($StudentsRecord1 as $student2){
		$StudentsRecord2[$noOfStudents-$noOfStudents1] = $student2;
		$noOfStudents1++;
	}
	arsort($StudentsRecord2);
	$position = 1;
	foreach($StudentsRecord2 as &$student3){
		$student3["Position"] = $position;
		$position++;
	}
	
	?>
	<h2> SS2Sci Result Master List </h2>
	<div class="master">
		<table>
			<tr>
				<th style="width:200">Name</th>
				<th style="width:50px;  border: 20px solid green">Eng</th>
				<th style="width:50px;  border: 20px solid green">Maths</th>
				<th style="width:50px;  border: 20px solid green">Bio</th>
				<th style="width:50px;  border: 20px solid green">Chem</th>
				<th style="width:50px;  border: 20px solid green">Phy</th>
				<th style="width:50px;  border: 20px solid green">Eco</th>
				<th style="width:50px;  border: 20px solid green">Geo</th>
				<th style="width:50px;  border: 20px solid green">Igbo</th>
				<th style="width:50px;  border: 20px solid green">AnimHus</th>
				<th style="width:50px;  border: 20px solid green">Average</th>
				<th style="width:50px;  border: 20px solid green">Position</th>
			</tr>
	<?php foreach ($StudentsRecord2 as &$student3){ ?>
		<tr> 
			<td style="padding: 10px;"> <?php echo strtoupper($student3["name"]) ?></td>
			<td style="padding: 10px;"> <?php echo $student3["EngScore"] ?></td>
			<td style="padding: 10px;"> <?php echo $student3["MathsScore"] ?></td>
			<td style="padding: 10px;"> <?php echo $student3["BioScore"] ?></td>
			<td style="padding: 10px;"> <?php echo $student3["ChemScore"] ?></td>
			<td style="padding: 10px;"> <?php echo $student3["PhyScore"] ?></td>
			<td style="padding: 10px;"> <?php echo $student3["EcoScore"] ?></td>
			<td style="padding: 10px;"> <?php echo $student3["GeoScore"] ?></td>
			<td style="padding: 10px;"> <?php echo $student3["IgboScore"] ?></td>
			<td style="padding: 10px;"> <?php echo $student3["AnimScore"] ?></td>
			<td style="padding: 10px;"> <?php echo $student3["Average"] ?></td>
			<td style="padding: 10px;"> <?php echo $student3["Position"] ?></td>
			</tr>
	<?php } ?>
	</table>
	</div>
	
	<h3> What do you think about VIC-TECH GLOBAL Company ?
</body>
</html>
	
	<?php
	}
	?>