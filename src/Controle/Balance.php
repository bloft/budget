<?php

class Controle_Balance extends Controle_Base {

	public function _index() {
		$csv = array_map('str_getcsv', file('data/data.csv'));
		$data = array();
		$indbetaling = 0;
		$total = array("name" => "Total");
		foreach($csv as $row) {
			list($name, $month, $aYear, $amount) = $row;
			$res[$name]=array();
			$interval = 12 / $aYear;
			$res = array("name" => $name);
			$indbetaling += ($amount / $interval);
			for($i = 1; $i <= 12; $i++) {
				$t = ( 12 + $i - $month ) % $interval;
				$res[$i] = round($t * ($amount / $interval), 2);
				$total[$i] = $total[$i] + $res[$i]; 
			}
			$data[] = $res;
		}
		$data[] = $total;
		$min = min($total[1], $total[2], $total[3], $total[4], $total[5], $total[6], $total[7], $total[8], $total[9], $total[10], $total[11], $total[12]);
		$minTotal = array("name" => "Minimum Balance");
		for($i = 1; $i <= 12; $i++) {
			$minTotal[$i] = $total[$i] - $min;
		}
		$data[] = $minTotal;
		$this->assign('data', $data);
		$this->assign('indbetaling', round($indbetaling, 2));
	}
}

?>
