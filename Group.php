<?php
function __autoload($class_name) {
	include $class_name . '.php';
}
	class Group{
		private $cells;
		private $emptyCells;
		private $length;
		private $unusedInts;
		/*
		 * $cells- An array of Cell instances. 
		 */
		public function __construct(array $cells){
			$this->cells = $cells;
			$length = count($this->cells);
			for($x=1;$x<=$length;$x++)
			{
				$unusedInts[] = $x;
			}
			foreach($cells as $cell){
				$cell->addToGroup($this);
				$x=$cell->getValue();
				if(!$x)
					$emptyCells[] = $cell;
				else{ //remove value from unusedInts
					remove($unusedInts, $x);
// 					$y = array_search($x, $unusedInts);
// 					$unusedInts[$y]=$unusedInts[0];
// 					array_shift($unusedInts);
				} 	
			}
		}
		/*
		 * removes $val from array $vals
		 */
		private function remove(array $vals,  $val){
			$y = array_search($val, $vals);
			$vals[$y]=$vals[0];
			array_shift($vals);
		}
		/*
		 * return $cells
		 */
		public function getCells(){
			return $cells;
		}
		/*
		 * return int[] containing the used values of the cells in this group.
		 */
		public function getFilledVals(){
			$ints = array(); 
			foreach($cells as $cell)
			{
				$x = $cell->getValue();
				if($x){ //$value != false
					$ints[] = $x; 	
				}		
			}
			return $ints;
		}
		/*
		 * returns unusedInts
		 */
		public function getUnfilledVals(){
			return $this->unusedInts;
// 			$ints = array();
// 			foreach($emptyCells as $cell){
				
// 			}
		}
		/*
		 * returns the cells with no value
		 */
		public function getUnfilledCells(){
			return $this->emptyCells;
		}
		/*
		 * removes $cell from $emptyCells and its value from $unusedInts
		 */
		public function fillCell(Cell $cell){
			$val = $cell->getValue();
			remove($emptyCells,$cell);
			remove($unusedInts,$val);
		}
		
	}
?>