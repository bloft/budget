<?php

Util_Define::defineDefault("SMARTY_DIR", "/usr/share/php/smarty3/");
Util_Define::defineDefault("SMARTY_PATH", getcwd());
Util_Define::defineDefault("TMP_DIR", sys_get_temp_dir());
require_once(SMARTY_DIR . 'Smarty.class.php');

class Controle_Base {
	private $title;
	private $smarty;
	private $template;

	public function __construct($title) {
		$this->title = $title;
		$this->template = str_replace("Controle_", "", get_class($this)).".tpl";
		$this->smarty = new Smarty();
		$this->smarty->setTemplateDir(SMARTY_PATH . '/View/');

		$this->smarty->setCompileDir(TMP_DIR . '/templates_c/');
		$this->smarty->setConfigDir(TMP_DIR . '/configs/');
		$this->smarty->setCacheDir(TMP_DIR . '/cache/');
	}

	protected function assign($key, $value) {
		$this->smarty->assign($key, $value);
	}

	public function display() {
		$this->assign('title', $this->title);
		$this->assign('includePage', $this->template);
		$this->smarty->display("Base.tpl");
	}
}

?>
