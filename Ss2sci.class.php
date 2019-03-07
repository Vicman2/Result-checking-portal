<?php
require_once("SeniorStudents.class.php");
require_once("common.inc.php");

class SS2Sci extends SenStud{
	public function studAverage(){
		$average = ($this->Eng + $this->Maths + $this->Phy + $this->Chem + $this->Bio + $this->Geo + $this->Eco + $this->Igbo + $this->AnimHus)/9 ;
		return number_format($average, 2, ".", "");
	}
	
	
	 public static function Ss2SciStud($regNo, $pin, $isUsed){
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
		foreach($StudentsRecord as $student1){
			$studObject = str_replace(" ", "_", $student1["name"]); // replace the space in the name with "_" and assign it to $studObject;
			$studObject = new SS2Sci(); // assign the modified name to be a new object of the class.
			// Assigning Properties to this object
			$studObject->Name = $student1["name"];
			$studObject->Eng = $student1["EngScore"];
			$studObject->Maths = $student1["MathsScore"];
			$studObject->Bio = $student1["BioScore"];
			$studObject->Chem = $student1["ChemScore"];
			$studObject->Phy = $student1["PhyScore"];
			$studObject->Geo = $student1["GeoScore"];
			$studObject->Eco = $student1["EcoScore"];
			$studObject->Igbo = $student1["IgboScore"];
			$studObject->AnimHus = $student1["AnimScore"];
			
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
			$StudentsRecord1[$arrayNo10]["IgboGrade"] = $studObject->IgboGrade();
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
			
			// Trying to make connections to mysql
				$conn = parent::connect();
				$sql = "SELECT name FROM " . TBL_SS2SCI . " WHERE regNo = :regNo";
				
				try{
					$st =$conn->prepare($sql);
					$st->bindValue(":regNo", $regNo , PDO::PARAM_STR);
					$st->execute();
					$row = $st->fetch();
					parent::disconnect($conn);
					$studentName = $row["name"];
				}catch(PDOException $e){
					parent::disconnect($conn);
					die("Query failed ". $e->getMessage());
				}
				
			foreach($StudentsRecord2 as &$student3){
				if($student3["name"] == $studentName) {
					$studentDetails = $student3;
				}
			}
			?>
			<bold><strong><h2 style="text-align:center"> 	VIC-TECH GLOBAL SECONDARY SCHOOL </h2></strong></bold>
			<h3 style="text-align:center"> TERMLY REPORT </h3>
			<p> NAME OF STUDENT:          <strong><?php echo  strtoupper($studentDetails["name"]) ?></strong></p>
			<p>CLASS: 					SS2 SCIENCE</p>
			
			<table>
				<tr>
					<th> SUBJECTS </th>
					<th> Total Score </th>
					<th> Grade </th>
				<tr/>
				
				<tr>
					<td>English Language</td>
					<td><?php echo $studentDetails["EngScore"] ?></td>
					<td><?php echo $studentDetails["EngGrade"] ?></td>
				<tr>
				
				<tr>
					<td>Mathematics</td>
					<td><?php echo $studentDetails["MathsScore"] ?></td>
					<td><?php echo $studentDetails["MathsGrade"] ?></td>
				<tr>
				
				<tr>
					<td>Biology</td>
					<td><?php echo $studentDetails["BioScore"] ?></td>
					<td><?php echo $studentDetails["BioGrade"] ?></td>
				<tr>
				
				<tr>
					<td>Chemistry</td>
					<td><?php echo $studentDetails["ChemScore"] ?></td>
					<td><?php echo $studentDetails["ChemGrade"] ?></td>
				<tr>
				
				<tr>
					<td>Physics</td>
					<td><?php echo $studentDetails["PhyScore"] ?></td>
					<td><?php echo $studentDetails["PhyGrade"] ?></td>
				<tr>
				
				<tr>
					<td>GeoGraphy</td>
					<td><?php echo $studentDetails["GeoScore"] ?></td>
					<td><?php echo $studentDetails["GeoGrade"] ?></td>
				<tr>
				
				<tr>
					<td>Economics</td>
					<td><?php echo $studentDetails["EcoScore"] ?></td>
					<td><?php echo $studentDetails["EcoGrade"] ?></td>
				<tr>
				
				<tr>
					<td>Igbo Language</td>
					<td><?php echo $studentDetails["IgboScore"] ?></td>
					<td><?php echo $studentDetails["IgboGrade"] ?></td>
				<tr>
				
				<tr>
					<td>Animal Husbandry</td>
					<td><?php echo $studentDetails["AnimScore"] ?></td>
					<td><?php echo $studentDetails["AnimHusGrade"] ?></td>
				<tr>
			</table>
			
		<h2> <bold>AVERAGE: <bold> <?php echo $studentDetails["Average"] ?> </h2>
		<h2> <bold>POSITION: </bold> <?php echo $studentDetails["Position"] ?></h2>
		
		
		<?php
		if($isUsed == false){
			insertTo(TBL_SS2SCI, $regNo, $pin);
			deletePinFromUnUsed(TBL_UNUSEDCARDS, $pin);
			insertToUsed(TBL_USEDCARDS, $pin, $regNo);
		}else{
			updateNoOfUse(TBL_USEDCARDS, $pin);
		}
		
		displayPageFooter();
		
	 }
}
?>