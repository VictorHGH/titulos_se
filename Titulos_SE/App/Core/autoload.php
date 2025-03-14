<?php

spl_autoload_register(function ($clase) {
    // Define el prefijo base del namespace
    $baseNamespace = 'App\\';

    // Verifica si la clase pertenece al namespace base
    $baseDir = __DIR__ . '/../'; // Carpeta 'app'
    $len = strlen($baseNamespace);
    if (strncmp($baseNamespace, $clase, $len) !== 0) {
        return; // No pertenece a este autoload
    }

    // Obtiene el nombre relativo de la clase
    $relativeClass = substr($clase, $len);

    // Convierte el namespace en una ruta de archivo
    $ruta = $baseDir . str_replace("\\", "/", $relativeClass) . '.php';

    // Incluye el archivo si existe
    if (file_exists($ruta)) {
        require_once $ruta;
    } else {
        throw new Exception("No se pudo cargar la clase $clase. Archivo no encontrado: $ruta.");
    }
});
