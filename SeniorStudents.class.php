<?php
class SenStud{
	public $Name;
	public $Eng;
	public $EngGrade;
	public $Maths;
	public $MathsGrade;
	public $Phy;
	public $PhyGrade;
	public $Chem;
	public $ChemGrade;
	public $Bio;
	public $BioGrade;
	public $Geo;
	public $GeoGrade;
	public $Eco;
	public $EcoGrade;
	public $Igbo;
	public $IgboGrade;
	public $AnimHus;
	public $AnimHusGrade;
	public $Crs;
	public $CrsGrade;
	public $Gov;
	public $GovGrade;
	public $LitInEng;
	public $LitInEngGrade;
	public $Acc;
	public $AccGrade;
	public $Agric;
	public $AgricGrade;
	
	// This function calculate the Average of the student in this class.
	public function studAverage(){
		$average = ($this->Eng + $this->Maths + $this->Phy + $this->Chem + $this->Bio + $this->Geo + $this->Eco + $this->Igbo + $this->AnimHus + $this->Crs + $this->Gov + $this->LitInEng + $this->Acc + $this->Agric)/14 ;
		return $average ;
	}
	
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
		return $this->EngGrade;
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
		return $this->MathsGrade;
	}
	
	public function PhyGrade(){
		if($this->Eng >= 70){
			$this->PhyGrade = "A";
		}elseif($this->Phy >= 60 ){
			$this->PhyGrade = "B";
		}elseif($this->Phy >= 50){
			$this->PhyGrade = "C";
		}elseif($this->Phy >= 40){
			$this->PhyGrade = "P";
		}else{
			$this->PhyGrade = "F";
		}
		return $this->PhyGrade;
	}
	
	public function ChemGrade(){
		if($this->Chem >= 70){
			$this->ChemGrade = "A";
		}elseif($this->Chem >= 60 ){
			$this->ChemGrade = "B";
		}elseif($this->Chem >= 50){
			$this->ChemGrade = "C";
		}elseif($this->Chem >= 40){
			$this->ChemGrade = "P";
		}else{
			$this->ChemGrade = "F";
		}
		return $this->ChemGrade;
	}
	
	public function BioGrade(){
		if($this->Bio >= 70){
			$this->BioGrade = "A";
		}elseif($this->Bio >= 60 ){
			$this->BioGrade = "B";
		}elseif($this->Bio >= 50){
			$this->BioGrade = "C";
		}elseif($this->Bio >= 40){
			$this->BioGrade = "P";
		}else{
			$this->BioGrade = "F";
		}
		return $this->BioGrade;
	}
	
	public function GeoGrade(){
		if($this->Geo >= 70){
			$this->GeoGrade = "A";
		}elseif($this->Geo >= 60 ){
			$this->GeoGrade = "B";
		}elseif($this->Geo >= 50){
			$this->GeoGrade = "C";
		}elseif($this->Geo >= 40){
			$this->GeoGrade = "P";
		}else{
			$this->GeoGrade = "F";
		}
		return $this->GeoGrade;
	}
	
	public function EcoGrade(){
		if($this->Eco >= 70){
			$this->EcoGrade = "A";
		}elseif($this->Eco >= 60 ){
			$this->EcoGrade = "B";
		}elseif($this->Eco >= 50){
			$this->EcoGrade = "C";
		}elseif($this->Eco >= 40){
			$this->EcoGrade = "P";
		}else{
			$this->EcoGrade = "F";
		}
		return $this->EcoGrade;
	}
	
	public function IgboGrade(){
		if($this->Igbo >= 70){
			$this->IgboGrade = "A";
		}elseif($this->Igbo >= 60 ){
			$this->IgboGrade = "B";
		}elseif($this->Igbo >= 50){
			$this->IgboGrade = "C";
		}elseif($this->Igbo >= 40){
			$this->IgboGrade = "P";
		}else{
			$this->IgboGrade = "F";
		}
		return $this->IgboGrade;
	}
	
	public function AnimHusGrade(){
		if($this->AnimHus >= 70){
			$this->AnimHusGrade = "A";
		}elseif($this->AnimHus >= 60 ){
			$this->AnimHusGrade = "B";
		}elseif($this->AnimHus >= 50){
			$this->AnimHusGrade = "C";
		}elseif($this->AnimHus >= 40){
			$this->AnimHusGrade = "P";
		}else{
			$this->AnimHusGrade = "F";
		}
		return $this->AnimHusGrade;
	}
	
	public function CrsGrade(){
		if($this->Crs >= 70){
			$this->CrsGrade = "A";
		}elseif($this->Crs >= 60 ){
			$this->CrsGrade = "B";
		}elseif($this-> Crs >= 50){
			$this->CrsGrade = "C";
		}elseif($this->Crs >= 40){
			$this->CrsGrade = "P";
		}else{
			$this->CrsGrade = "F";
		}
	}
	
	public function GovGrade(){
		if($this->Gov >= 70){
			$this->GovGrade = "A";
		}elseif($this->Gov >= 60 ){
			$this->GovGrade = "B";
		}elseif($this->Gov >= 50){
			$this->GovGrade = "C";
		}elseif($this->Gov >= 40){
			$this->GovGrade = "P";
		}else{
			$this->GovGrade = "F";
		}
	}
	
	public function LitInEngGrade(){
		if($this->LitInEng >= 70){
			$this->LitInEngGrade = "A";
		}elseif($this->Eng >= 60 ){
			$this->LitInEngGrade = "B";
		}elseif($this->Eng >= 50){
			$this->LitInEngGrade = "C";
		}elseif($this->LitInEng >= 40){
			$this->LitInEngGrade = "P";
		}else{
			$this->LitInEngGrade = "F";
		}
	}
	
	public function AccGrade(){
		if($this->Acc >= 70){
			$this->AccGrade = "A";
		}elseif($this->Acc >= 60 ){
			$this->AccGrade = "B";
		}elseif($this->Acc >= 50){
			$this->AccGrade = "C";
		}elseif($this->Acc >= 40){
			$this->AccGrade = "P";
		}else{
			$this->AccGrade = "F";
		}
	}
	
	public function AgricGrade(){
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
	
	protected static function connect(){
		try{
			$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
			$conn->setAttribute(PDO::ATTR_PERSISTENT, true);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			die("Connection failed: " . $e->getMessage());
		}
		return $conn;
	}
	
	protected static function disconnect($conn){
		$conn = "";
	}
	
	
}
?>