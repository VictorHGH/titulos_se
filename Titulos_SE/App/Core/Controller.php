<?php

namespace App\Core;

class Controller {

    public function view($route, $data = []) {
        // Destructurar el array de datos
        extract($data);

        // Construir la ruta absoluta al archivo de vista
        $viewPath = __DIR__ . "/../../$route.php";

        // Saber si existe el archivo de vista
        if (file_exists($viewPath)) {
            ob_start();
            include $viewPath;
            $content = ob_get_clean();
            return $content;
        } else {
			echo __DIR__;
			echo "<br>";
            return "El archivo de vista {$route}.php no existe";
        }
    }

    public function redirect($route) {
        header("Location: {$route}");
        exit(); // Asegúrate de detener la ejecución después de redirigir
    }
}
