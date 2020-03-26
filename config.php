<?php


spl_autoload_register(function($class_name){

//"class".DIRECTORY_SEPARATOR: INFORMA QUE O ARQUIVO AQL.PHP, ESTÁ NA PASTA CLASS.

	$file_name = "class".DIRECTORY_SEPARATOR.$class_name. ".php";

	if(file_exists(($file_name))){

		require_once($file_name);

	}

});






?>