<?php
function __autoload($class_name) {
	include $class_name . '.php';
}
function solve(Board $board)
{
	do{ //keep filling out possible based on other cells
		$flag = false;
		foreach($board->getCells() as $cell){
			if(!$cell->getValue() && setPossibleByCell($cell))
				$flag = true;
		}
	}while($flag);
	
	do{ //keep filling out possible based on other groups
		$flag = false;
		foreach($board->getGroups() as $group){
			if(!(count($group->getUnfilledCells())) && setPossibleByGroup($group)) //if change made to cells
				$flag = true;
		}
	}while($flag);

	
		
	
}

function setPossibleByCell(Cell $cell){
	$ret = pop($cell->getGroups());
	$loopGroups = $cell->getGroups();
	array_shift($loopGroups);
	foreach($loopGroups as $group){
		$ret = leastCommonDenom($ret, $group);
	}
	return $cell->setPossible($ret);
}
/*
 * Could be more efficient
 */
function leastCommonDenom(array $a, array $b){
	$c = array();
	foreach($a as $temp){
		if(!array_search($temp, $b))
			$c[] = $temp;
	}
}
function setPossibleByGroup(Group $group){
	$out = false;
	foreach($group->getUnfilledVals() as $val){
		$cells = array();
		$unfilledCells= $group->getUnfilledCells();
		foreach($unfilledCells as $uc){
			if(array_search($val, $uc->getPossible()))
				$cells[] = $uc;
		}
		if(count($cells)==1){
			$cells[0]->setValue($val);
			$out = true;
		}
	}
	return $out;
}



?>