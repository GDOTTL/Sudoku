<?php
function __autoload($class_name) {
	include $class_name . '.php';
}
class Board{
	private $cells;
	private $groups;
	public function __construct(array $vals){
		$id =0;
		foreach($vals  as $val){

			$cells[] = new Cell(++$id, $val);
		}
		for($j =0; $j<9;$j++){ //create vertical groups
			$cellArray = array();
			for($i = 0; $i<81; $i+=9){
				$cellArray[]=$this->cells[$i+$j];
			}
			$groups[] = new Group($cellArray);
		}
		for($j=0; j<80; $j+=9){ //create horizontal groups
			$cellArray = array();
			for($i=0; $i<9;$i++){
				$cellArray[]=$this->cells[$i+$j];
			}
			$groups[] = new Group($cellArray);
		}
		$cellArray = array(); //Create block groups
		for($i = 0; $i < 81; $i++){				
			$cellArray=$this->cells[$i%3+floor(floor(($i%9)/3)/9)+floor(floor(i/9)/3)];
			if($i%9==8){
				$groups[] = new Group($cellArray);
				$cellArray=array();
			}
		}
	}
	
	public function getGroups(){
		return $groups;
	}
	public function getCells(){
		return $cells;
	}
}
?>