<?php
	function __autoload($class_name) {
		include $class_name . '.php';
	}
	class Cell{
		private $value = false;	
		private $groups; 
		private $id;
		private $possible;
		/*
		 * returns $value, $value is either false if empty (default) or a natural number
		 */
		public function getValue(){
			return $this->value;
		}
		/*
		 * Sets $value. Should be false if empty, or a natural number
		 */
		public function setValue($val){
			$this->value=$val;
			foreach($groups as $group)
			{
				$group->fillCell($this);
			}
		}
		public function __construct($id, $val =false, $possible=array(1,2,3,4,5,6,7,8,9)){//array $groups, $id){
// 			$this->groups = $groups;		
			$this->id=$id;
			$this->value = $val;
			$this->possible=$possible;
		}
		public function addToGroup(Group $group){
			$this->groups[] = $group;
		}
		public function getGroups(){
			return $this->groups;
		}		
		public function setPossible(array $vals){
			if(count($vals)==1){
				setValue($vals[0]);
				return true;
			}
			else{
				$possible=$vals;
				return false;	
			}
		}
		public function getPossible(){
			return $possible;
		}
	}
?>