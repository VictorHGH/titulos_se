<?php
//echo $_SERVER['REMOTE_ADDR'];exit();
if($_SERVER['REMOTE_ADDR']=='148.206.100.92' || $_SERVER['REMOTE_ADDR']=='127.0.0.1' ){
	session_start();
	if(!isset($_SESSION['truncate'])){
		$_SESSION['truncate']=0;
		}	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>COSIES UAM-X, Entrega de Títulos</title>
	<link rel="icon" type="image/jpg" href="assets/img/faviconV2.png"/>
	<link rel="stylesheet" href="css/main.css">
	<link src="assets/css/sweetalert2.min.css"/>
</head>
<body>

<nav class="full-box NavBar">
		<div class="full-box NavBar-logo">
			<figure class="full-box"> <a href="https://www.xoc.uam.mx/"><img src="assets/img/logoXoc.png" height="82" class="img-responsive"></a>
			</figure>	
		</div>
	<ul class="full-box list-unstyled text-right NavBar-navigation">
		<li>
			<a href="index.html" class="text-condensed">Inicio</a>
	    </li>
		<li>
			<a href="admin.php" class="text-condensed">Administración</a>
	    </li>
		<li>
			<a href="https://escolares.xoc.uam.mx/" class="text-condensed">Sistemas Escolares</a>
	    </li>
<!--
			<li>
				<a href="contactenos.html" class="text-condensed">CONTÁCTENOS</a>
			</li>
-->
    </ul>
	<span class="glyphicon glyphicon-option-vertical visible-xs btn-mobile-menu" aria-hidden="true"></span>

  </nav>

	<section class="full-box section">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="text-center text-titles">Completar datos de títulos entregados</h1>
			  </div>
			</div>
			<br><br>
			<div class="row text-center table-bordered">

	<form name="formulario" id="formulario" novalidate action="obten_datos_completar.php" method="post" onsubmit="return validarForm();" enctype="multipart/form-data">
	  <p>Realice la búsqueda por matrícula del título que ya fue entregado:<br>
	    <br>
			<p>
				<label for="matricula">Matrícula:&nbsp;&nbsp;</label>
				<input type="text" name="matricula" id="matricula" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
			</p>
			
			<input type="radio" name="nivel" id="nivel" value="LIC."> LICENCIATURA&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="nivel" id="nivel" value="MAE."> MAESTRÍA&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="nivel" id="nivel" value="DOC."> DOCTORADO
        <br>
        <br>
		<button type="submit" class="btn btn-primary">Buscar</button>
	  </p>
	</form>
			</div>
		</div>
	</section>
	
	<footer class="full-box footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<ul class="list-unstyled text-center social-icons">
						<li>
							<a href="https://www.facebook.com/CSEUAMX2016">
								<i class="fa fa-facebook" aria-hidden="true" style="background-color: #2B3990;"></i>&nbsp;&nbsp;Coordinación de Sistemas Escolares
							</a>
						</li>
				<!--
						<li>
							<a href="#!">
								<i class="fa fa-twitter" aria-hidden="true" style="background-color: #26A9E0;"></i>
							</a>
						</li>
						<li>
							<a href="#!">
								<i class="fa fa-youtube" aria-hidden="true" style="background-color: #EC1B23"></i>
							</a>
						</li>
						<li>
							<a href="#!">
								<i class="fa fa-instagram" aria-hidden="true" style="background-color: #32689C"></i>
							</a>
						</li>
						<li>
							<a href="#!" aria-hidden="true" style="background-color: #BE1D2C"></i>
							</a>
						</li>
				-->
					</ul>
				</div>
				<div class="col-xs-12">
					<p class="text-center text-condensed"><br>
					  <br>

						Copyright &copy; Coordinación de Servicios de Cómputo | Diseño de Sistemas, 2024.
					</p>
				</div>
			</div>
		</div>
	</footer>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/sweetalert2.all.min.js"></script>
<script>

  function validarForm() {
      var archivo = document.getElementById("archivo");
      var fechaIniciaEntrega = document.getElementById("fecha_inicia_entrega").value;
      
      // Validar que se haya seleccionado un archivo
      if (archivo.value === "") {
		Swal.fire({
			title: "Atención",
			text: "Por favor, seleccione un archivo.",
			icon: "warning"
		});
        return false;
      }
      
      // Obtener la extensión del archivo seleccionado
      var extension = archivo.value.split('.').pop().toLowerCase();
      
      // Validar que la extensión sea TXT
      if (extension !== "txt") {
		Swal.fire({
			title: "Atención",
			text: "Por favor, seleccione un archivo de tipo TXT.",
			icon: "warning"
		});		  
        return false;
      }
      
      // Validar que se haya seleccionado una fecha de inicio de entrega
      if (fechaIniciaEntrega === "") {
		Swal.fire({
			title: "Atención",
			text: "Por favor, seleccione la fecha de inicio de entrega.",
			icon: "warning"
		});		  		  
        return false;
      }
      
      // Si todo está bien, enviar el formulario
      return true;
    }
</script>

<?php 
}
else{
	
	echo "Acceso restringido, No puede ingresar a este sitio...";
	$nuevaURL='https://escolares.xoc.uam.mx/';
	header('Location: '.$nuevaURL);
}

?>
</body>
</html>

