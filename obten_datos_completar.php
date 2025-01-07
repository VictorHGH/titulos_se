<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	<?php
	$matricula = $_POST['matricula'];
	
	// Conexión a la base de datos (asumiendo que ya tienes una conexión establecida)
	$servername = "localhost";
	$username = "titulos";
	$password = "titulos";
	$dbname = "titulos_se";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Conexión fallida: " . $conn->connect_error);	
	}
	else{
		$query= "SELECT
				historico_entrega_titulos.matricula,
				historico_entrega_titulos.nombre,
				historico_entrega_titulos.genero,
				historico_entrega_titulos.mail,
				historico_entrega_titulos.grado,
				historico_entrega_titulos.carrera,
				historico_entrega_titulos.fecha_inicia_entrega,
				historico_entrega_titulos.fecha_entrega,
				historico_entrega_titulos.titulo_entregado,
				historico_entrega_titulos.observaciones
				FROM
				historico_entrega_titulos
				WHERE
				historico_entrega_titulos.matricula = $matricula";

		$resulta_query=mysqli_query($conn,$query);
		// var_dump($resulta_query);
		
		// Verificar si se ejecutó la consulta correctamente
		if (!$resulta_query) {
			die('Error en la consulta: ' . mysqli_error($conn));
		}

		// Contar el número de filas
		$numero_lineas = mysqli_num_rows($resulta_query);
		$fecha_entregado='';
		// Verificar si se encontraron resultados
		if ($numero_lineas > 0) {
			// Procesar los resultados
			$i=0;
			$Dato= '';
			
			if($row = mysqli_fetch_array($resulta_query, MYSQLI_NUM)) {

				//$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
				$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

				if($row[7]!=NULL || $row[7]!=''){
					$row_fecha=explode('-',$row[7]);
					var_dump($row_fecha);
					$fecha_entregado= $row_fecha[2]." de ".$meses[($row_fecha[1]-1)]. " del ".$row_fecha[0] ;
				}
				else{
					$fecha_entregado='';
				}
				
//var_dump($row);
				//Salida: Miercoles 05 de Septiembre del 2016
				
				if($row[4]==='LIC.'){$row[4]='LICENCIATURA';}
				if($row[4]==='MAE.'){$row[4]='MAESTRÍA';}
				if($row[4]==='DOC.'){$row[4]='DOCTORADO';}
				if($row[4]==='ESP.'){$row[4]='ESPECIALIDAD';}
				
				
				if($row[8]==0){
					$Dato.= '<table class="table table-striped" border="1" style="width:70% !important; margin:auto !important;">
								<tr>
									<th scope="row">Matrícula</th>
									<th scope="row">Nombre</th>
									<th scope="row">Grado</th>
									<th scope="row">Carrera</th>
									<th scope="row">Entrega a partir del</th>
									<th scope="row">Fecha Entregado</th>
								</tr>
								<tr>
								  	<td>'.$row[0].'</td>
								  	<td>'.$row[1].'</td>
								  	<td>'.$row[4].'</td>
								  	<td>'.$row[5].'</td>
								  	<td>'.$row[6].'</td>
								  	<td>'.$row[7].'</td>
								</tr>
							</table><br><br>';

				}
				else{
					$Dato.= '<table class="table table-striped" style="width:70% !important; margin:auto !important;">
							<tbody>
								<tr>
								<th scope="row" style="text-align: right;">Matrícula</th>
								<td></td>
								<td>'.$matricula.'</td>
								</tr>
								<tr>
								<th scope="row" style="text-align: right;">Nombre</th>
								<td></td>
								<td>'.$row[1].'</td>
								</tr>
								<tr>
								<th scope="row" style="text-align: right;">Grado</th>
								<td></td>
								<td>'.$row[4].'</td>
								</tr>
								<tr>
								<th scope="row" style="text-align: right;">Carrera</th>
								<td></td>
								<td>'.$row[5].'</td>
								</tr>
								<tr>
								<th colspan="3" style="color: blue; text-align: center;">Tu título fue entregado el el dia '.$fecha_entregado.'</th>
								</tr>
							</tbody>
							</table><br><br>';
				}
			}

			// Cerrar la etiqueta de la tabla después de procesar todas las filas
			//$Dato .= '</table>';

		} 
		else {
			// No se encontraron resultados
			$Dato = '<span  style="color: red;"><b>No se encontraron resultados para la matrícula proporcionada...</b><span>';
		}	
		echo $Dato;
	}
	?>
</body>
</html>
