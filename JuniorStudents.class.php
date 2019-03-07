<?php
class JunStud{
	// Declearing the Score variables and their corresponding Grades.
	public $Eng;
	public $EngGrade;
	public $Maths;
	public $MathsGrade;
	public $HomeEcons;
	public $HomeEconsGrade;
	public $PHE;
	public $PHEGrade;
	public $SocStud;
	public $SocStudGrade;
	public $FineArts;
	public $FineArtsGrade;
	public $BasicSci;
	public $BasicSciGrade;
	public $BasicTech;
	public $BasicTechGrade;
	public $Agric;
	public $AgricGrade;
	public $Igbo;
	public $IgboGrade;
	public $French;
	public $FrenchGrade;
	public $Crs;
	public $CrsGrade;
	
	// This Function calculates the avegrage;
	public function studAverage(){
		$average = ($this->Eng + $this->Maths + $this->HomeEcons + $this->PHE + $this->SocStud + $this->FineArts + $this->BasicSci + $this->BasicTech + $this->Agric + $this->Igbo + $this->French + $this->Crs)/12 ;
		return $average;
	}
	
	// This function assigns grade to the individual subjects.
	public function EngGrade(){
		if($this->Eng >= 70){
			$this->EngGrade = "A";
		}elseif($this->Eng >= 60 ){
			$this->EngGrade = "B";
		}elseif($this->Eng >= 50){
			$this->EngGrade = "C";
		}elseif($this->Eng >= 40){
			$this->EngGrade = "P";
		}else{
			$this->EngGrade = "F";
		}
	}
	
	public function MathsGrade(){
		if($this->Maths >= 70){
			$this->MathsGrade = "A";
		}elseif($this->Maths >= 60 ){
			$this->MathsGrade = "B";
		}elseif($this->Maths >= 50){
			$this->MathsGrade = "C";
		}elseif($this->Maths >= 40){
			$this->MathsGrade = "P";
		}else{
			$this->MathsGrade = "F";
		}
	}
	
	public function HomeEconsGrade(){
		if($this->HomeEcons >= 70){
			$this->HomeEconsGrade = "A";
		}elseif($this->Eng >= 60 ){
			$this->HomeEconsGrade = "B";
		}elseif($this->HomeEcons >= 50){
			$this->HomeEconsGrade = "C";
		}elseif($this->HomeEcons >= 40){
			$this->HomeEconsGrade = "P";
		}else{
			$this->HomeEconsGrade = "F";
		}
	}
	
	public function PHEGrade(){
		if($this->PHE >= 70){
			$this->PHEGrade = "A";
		}elseif($this->PHE >= 60 ){
			$this->PHEGrade = "B";
		}elseif($this->PHE >= 50){
			$this->PHEGrade = "C";
		}elseif($this->PHE >= 40){
			$this->PHEGrade = "P";
		}else{
			$this->PHEGrade = "F";
		}
	}
	
	public function SocStudGrade(){
		if($this->SocStud >= 70){
			$this->SocStudGrade = "A";
		}elseif($this->SocStud >= 60 ){
			$this->SocStudGrade = "B";
		}elseif($this->SocStud >= 50){
			$this->SocStudGrade = "C";
		}elseif($this->SocStud >= 40){
			$this->SocStudGrade = "P";
		}else{
			$this->SocStudGrade = "F";
		}
	}
	
	public function AgricGrade(){
		if($this->Agric >= 70){
			$this->AgricGrade = "A";
		}elseif($this->Agric >= 60 ){
			$this->AgricGrade = "B";
		}elseif($this->Agric >= 50){
			$this->AgricGrade = "C";
		}elseif($this->Agric >= 40){
			$this->AgricGrade = "P";
		}else{
			$this->AgricGrade = "F";
		}
	}
	
	public function FineArtsGrade(){
		if($this->FineArts >= 70){
			$this->FineArtsGrade = "A";
		}elseif($this->FineArts >= 60 ){
			$this->FineArtsGrade = "B";
		}elseif($this->FineArts >= 50){
			$this->FineArtsGrade = "C";
		}elseif($this->FineArts >= 40){
			$this->FineArtsGrade = "P";
		}else{
			$this->FineArtsGrade = "F";
		}
	}
	
	public function BasicSciGrade(){
		if($this->BasicSci >= 70){
			$this->BasicSciGrade = "A";
		}elseif($this->BasicSci >= 60 ){
			$this->BasicSciGrade = "B";
		}elseif($this->BasicSci >= 50){
			$this->BasicSciGrade = "C";
		}elseif($this->BasicSci >= 40){
			$this->BasicSciGrade = "P";
		}else{
			$this->BasicSciGrade = "F";
		}
	}
	
	public function BasicTechGrade(){
		if($this->BasicTech >= 70){
			$this->BasicTechGrade = "A";
		}elseif($this->BasicTech >= 60 ){
			$this-> BasicTech = "B";
		}elseif($this->BasicTech >= 50){
			$this->BasicTechGrade = "C";
		}elseif($this->BasicTech >= 40){
			$this->BasicTechGrade = "P";
		}else{
			$this->BasicTechGrade = "F";
		}
	}
	
	public function IgboGrade(){
		if($this->Igbo >= 70){
			$this->IgboGrade = "A";
		}elseif($this->IgboStud >= 60 ){
			$this->IgboGrade = "B";
		}elseif($this->Igbo >= 50){
			$this->IgboGrade = "C";
		}elseif($this->Igbo >= 40){
			$this->Igbo = "P";
		}else{
			$this->IgboGrade = "F";
		}
	}
	
	public function FrenchGrade(){
		if($this->French >= 70){
			$this->FrenchGrade = "A";
		}elseif($this->French >= 60 ){
			$this->FrenchGrade = "B";
		}elseif($this->French >= 50){
			$this->FrenchGrade = "C";
		}elseif($this->French >= 40){
			$this->FrenchGrade = "P";
		}else{
			$this->FrenchGrade = "F";
		}
	}
	
	public function CrsGrade(){
		if($this->Crs >= 70){
			$this->CrsGrade = "A";
		}elseif($this->Crs >= 60 ){
			$this->CrsGrade = "B";
		}elseif($this->Crs >= 50){
			$this->CrsGrade = "C";
		}elseif($this->Crs >= 40){
			$this->CrsGrade = "P";
		}else{
			$this->CrsGrade = "F";
		}
	}
}
?>