<?php
Include_once("lib/init.php");

$page = "Index";
if(array_key_exists('page', $_GET)) {
	$page = $_GET['page'];
}

$method = "index";
$input = array_merge($_GET, $_POST);
if(array_key_exists('method', $input)) {
	$method = strtolower($input['method']);
}

$class = null;
foreach(glob("Controle/*.php") as $file) {
	$name = basename($file, ".php");
	if( strtolower($name) == strtolower($page) ) {
		$class = "Controle_" . $name;
	}
}
if(is_null($class) || $class == "Controle_Base") {
	echo "Page not found</br>";
	exit();
}

$classMethod = null;
foreach(get_class_methods($class) as $m) {
	if("_".$method == strtolower($m)) {
		$classMethod = $m;
	}
}

if(is_null($classMethod) || $classMethod == "__construct") {
	echo "Method: $classMethod</br>";
	exit();
}

$page = new $class($page);
$page->$classMethod();
$page->display();

?>
