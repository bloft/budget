<?php

class Controle_Index extends Controle_Base {

	public function _index() {
		$data = array_map('str_getcsv', file('data/data.csv'));
		$data[] = array("", "", "", "");
		$this->assign('data', $data);
		$months = array();
		for($i = 1; $i <= 12; $i++) {
			$months[$i] = date('F', mktime(0, 0, 0, $i, 10));
		}
		$this->assign("months", $months);
		$this->assign("aYear", array(1,2,3,4,6,11,12));
	}

  public function _save() {
    mkdir("data/backup/", 0755);
		copy('data/data.csv', 'data/backup/' . time() . ".csv");
		$fp = fopen('data/data.csv', 'w');
		for($i = 0; $i< 1000; $i++) {
			if(!isset($_POST[$i . "_name"])) break;
			if($_POST[$i . "_name"] != "") {
				fputcsv($fp, array($_POST[$i . "_name"], $_POST[$i . "_month"], $_POST[$i . "_interval"], $_POST[$i . "_amount"]));
			}
		}
		fclose($fp);
		$this->_index();
	}
}

?>
