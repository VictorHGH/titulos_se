<?php
/* session_start(); */
/* ob_start(); */

date_default_timezone_set('America/Mexico_city');

$status = "";
$fecha_inicia_entrega = $_POST['fecha_inicia_entrega'];

// Conexión a la base de datos (asumiendo que ya tienes una conexión establecida)
require_once "./conexion_db.php";

// Verificar la conexión
if ($conn->connect_error) {
	die("Conexión fallida: " . $conn->connect_error);
}

if ($_FILES["archivo"]['name'] != "") {
	$nombre_fichero =  $_FILES["archivo"]['tmp_name'];
	$lineas = file($nombre_fichero);
	$numero_de_lineas = sizeof($lineas);

	for ($i = 2; $i < $numero_de_lineas; $i++) {
		$campos = explode("\t", $lineas[$i]);

		$matricula = $campos[2];
		$nombre = $campos[3];
		$genero = $campos[4];
		$mail = $campos[5];
		$grado = $campos[6];
		$carrera = $campos[7];
		echo $campos[8];
		echo "<br>";
		$fecha_elaboracion = $campos[8];
		$fecha_entrega = NULL;
		$observaciones = '';
		$fecha_upload = date("Y-m-d H:i:s");

		// consulta
		$query_insert = "INSERT INTO `titulos_se`.`historico_entrega_titulos`(`matricula`, `nombre`, `genero`, `mail`, `grado`, `carrera`, `fecha_elaboracion`, `fecha_inicia_entrega`, `fecha_upload`, `fecha_entrega`, `observaciones`) VALUES ('$matricula', '$nombre', '$genero', '$mail', '$grado', '$carrera', '$fecha_elaboracion', '$fecha_inicia_entrega', '$fecha_upload', '$fecha_entrega', '$observaciones')";

		$regreso = $conn->query($query_insert);
		var_dump($regreso);
		if ($regreso === TRUE) {
			//$url = "Location: subir_datos_titulos.php";
			//	header($url);
		} else {
			echo "Error al insertar datos, intentelo nuevamente: "; // . $conn->error;<br>
		}
	}
} else {
	echo "No hay archivo seleccionado";
}

$conn->close();
