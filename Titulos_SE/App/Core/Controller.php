<?php

namespace App\Core;

class Controller {

    public function view($route, $data = []) {
        // Destructurar el array de datos
        extract($data);

        // Construir la ruta absoluta al archivo de vista
        $basePath = realpath(__DIR__ . '/../../'); // Obtener la raíz del proyecto
        $viewPath = $basePath . "/$route.php";

        // Verificar si existe el archivo de vista
        if (file_exists($viewPath)) {
            ob_start();
            include $viewPath;
            $content = ob_get_clean();
            return $content;
        } else {
            return "El archivo de vista {$route}.php no existe";
        }
    }

    public function redirect($route) {
        header("Location: {$route}");
        exit(); // Asegúrate de detener la ejecución después de redirigir
    }
}
