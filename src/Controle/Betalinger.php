<?php

class Controle_Betalinger extends Controle_Base {

	public function _index() {
		$csv = array_map('str_getcsv', file('data/data.csv'));
		$data = array();
		$total = array("name" => "Total");
		$min = 999999999999;
		foreach($csv as $row) {
			list($name, $month, $aYear, $amount) = $row;
			$res[$name]=array();
			$interval = 12 / $aYear;
			$res = array("name" => $name);
			for($i = 1; $i <= 12; $i++) {
				$t = ( 12 + $i - $month ) % $interval;
				$res[$i] = round(($t == 0 ? $amount : 0), 2);
				$total[$i] = $total[$i] + $res[$i]; 
			}
			$data[] = $res;
		}
		$data[] = $total;
		$minTotal = array("name" => "Minimum Total");
		
		$this->assign('data', $data);
	}
}

?>
