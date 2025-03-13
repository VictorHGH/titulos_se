<?php

spl_autoload_register(function($clase){

	$ruta = '../' . str_replace("\\", "/",$clase) . '.php';

	if (file_exists($ruta)){
		require_once $ruta;
	} else {
		throw new Exception("No se pudo cargar la clase $clase. Archivo no encontrado: $ruta.");
	}

});

