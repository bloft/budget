<?php

class Controle_Csv extends Controle_Base {

  public function _index() {
    $csv = "";
    if (file_exists("data/data.csv")) {
      $csv = file_get_contents('data/data.csv');
    }
		$this->assign('csv', $csv);
	}

  public function _save() {
    mkdir("data/backup/", 0755);
    if (file_exists("data/data.csv")) {
      copy('data/data.csv', 'data/backup/' . time() . ".csv");
    }
    $fp = fopen('data/data.csv', 'w');
    fwrite($fp, $_POST["csv"]);
		fclose($fp);
		$this->_index();
	}
}

?>
