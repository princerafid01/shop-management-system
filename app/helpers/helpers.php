<?php
function view($view,$data=[])
{
	if (empty($view)) {
		return 'No view Selected';
	}
	require_once __DIR__ . '/../../admin/'.$view.'.php';
	return $data;
}

function redirect(string $location){
	return header("Location: ".$location);
}

function dd($object){
	echo "<pre>";
	print_r($object);
	die();
	echo "</pre>";
}

function session($key,$value)
{
	$_SESSION[$key] = $value;
	return $_SESSION[$key];
}

function get_session($key)
{
	return ($_SESSION[$key]) ?? NULL;
}
