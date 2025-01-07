<?php
session_start();
ob_start() ;

date_default_timezone_set('America/Mexico_city');

$status = "";
$fecha_inicia_entrega=$_POST['fecha_inicia_entrega'];

// Conexión a la base de datos (asumiendo que ya tienes una conexión establecida)
$servername = "localhost";
$username = "titulos";
$password = "titulos";
$dbname = "titulos_se";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_FILES["archivo"]['name'] != "") {
    // obtenemos los datos del archivo
    $tamano = $_FILES["archivo"]['size'];
    $tipo = $_FILES["archivo"]['type'];
    $archivo = $_FILES['archivo']['tmp_name'];
    $prefijo = substr(md5(uniqid(rand())),0,6);
	$nivel=$_POST["action"];
	

		$nombre_fichero =  $archivo;
		$fichero = fopen($nombre_fichero,'rb');
		$i=0;
		while ( ($linea = fgets($fichero)) !== false) {
			if($i>2){	
				//echo $linea."<br>";
        		// Dividir la línea en campos usando el tabulador como separador
				$campos = explode("\t", $linea);

				$matricula=$campos[2];
				$nombre=$campos[3];
				$genero=$campos[4];
				$mail=$campos[5];
				$grado=$campos[6];
				$carrera=$campos[7];
				$fecha_elaboracion=$campos[8];
				$fecha_entrega=NULL;
				$observaciones='';
			
				$fecha_upload= date("Y-m-d H:i:s");

				$query_insert="INSERT INTO `titulos_se`.`historico_entrega_titulos`(`matricula`, `nombre`, `genero`, `mail`, `grado`, `carrera`, `fecha_elaboracion`, `fecha_inicia_entrega`, `fecha_upload`, `fecha_entrega`, `observaciones`) VALUES ('$matricula', '$nombre', '$genero', '$mail', '$grado', '$carrera', '$fecha_elaboracion', '$fecha_inicia_entrega', '$fecha_upload', '$fecha_entrega', '$observaciones')";
				//echo '<br>'.$query_insert;
				$regreso=$conn->query($query_insert);
				var_dump($regreso);
				if ($regreso === TRUE) {
				  //$url = "Location: subir_datos_titulos.php";
					//	header($url);
				} else {
				  echo "Error al insertar datos, intentelo nuevamente: ";// . $conn->error;<br>
				}
			}
			$i=$i+1;
		}
		fclose($fichero);
}
else {
	$status = "Error al subir archivo";
	echo $status;
   }
$conn->close();
$url = "Location: subir_datos_titulos.php";
header($url);

?>
