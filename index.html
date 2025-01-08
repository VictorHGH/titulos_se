<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="utf-8">
		<meta name="viewport"
			content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>COSIES UAM-X, Entrega de Títulos</title>
		<link rel="icon" type="image/jpg" href="assets/img/faviconV2.png" />
		<link rel="stylesheet" href="css/main.css">
		<link src="assets/css/sweetalert2.min.css" />

		<script>
			function sf(ID) {
				document.getElementById(ID).focus();
			}
		</script>

	</head>

	<body onLoad="sf('matricula');">

		<nav class="full-box NavBar">

			<div class="full-box NavBar-logo">
				<figure class="full-box"> <a href="https://www.xoc.uam.mx/"><img src="assets/img/logoXoc.png" height=""
							class="img-responsive"></a>
				</figure>
			</div>

			<ul class="full-box list-unstyled text-right NavBar-navigation">
				<li>
					<a href="https://escolares.xoc.uam.mx/" class="text-condensed">Sistemas Escolares</a>
				</li>
			</ul>

			<span class="glyphicon glyphicon-option-vertical visible-xs btn-mobile-menu" aria-hidden="true"></span>

		</nav>

		<section class="full-box section">

			<div class="container">

				<div class="row">

					<div class="col-xs-12 text-center">

						<h1 class="h1">Conoce si tu título de licenciatura o posgrado<br>está disponible
							para su entrega</h1>

						<br>

						<p class="lead text-justify">El propósito principal de esta plataforma es brindarle la
							oportunidad de comprobar de manera rápida y sencilla si su título ya ha sido procesado y
							está listo para ser entregado.
							<br>
							<br>
							Una vez que su título esté disponible, podrá acudir personalmente a las Oficinas de Sistemas
							Escolares de la Unidad Xochimilco para completar el proceso de entrega.
							<br>
							<br>
						</p>

						<p class="lead text-center">Ingrese su matrícula y después oprima el botón consultar</p>

					</div>

				</div>

				<div class="row justify-content-center">

					<div class="text-center"> <!-- Ajuste aquí -->

						<form id="form1" name="form1" method="post">

							<p>
								<label for="matricula">Matrícula:&nbsp;&nbsp;</label>
								<input type="text" name="matricula" id="matricula" maxlength="10"
									onkeypress="return event.charCode >= 48 && event.charCode <= 57">
							</p>

							<p>
								<br>
								<button type="button" id="consultar" class="btn btn-primary  btn-lg">Consultar</button>
							</p>

						</form>

					</div>

				</div>

				<div class="row justify-content-center">

					<div class="text-center">
						<br>
						<div id="mensajeAlumno" class="text-center"></div>
					</div>

				</div>

			</div>

		</section>

		<footer class="full-box footer">

			<div class="container">

				<div class="row">

					<div class="col-xs-12">

						<ul class="list-unstyled text-center social-icons">

							<li>
								<a
									href="https://dse.uam.mx/index.php/egresados-y-titulacion/cedula-profesional-electronica">
									<i class="fa fa-question-circle" aria-hidden="true"
										style="background-color: #2B3990;"></i>&nbsp;&nbsp;Trámite de tu cédula
									profesional&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</a>
							</li>

							<li>
								<a href="https://www.facebook.com/CSEUAMX2016">
									<i class="fa fa-facebook" aria-hidden="true"
										style="background-color: #2B3990;"></i>&nbsp;&nbsp;Coordinación de Sistemas
									Escolares
								</a>
							</li>

						</ul>

					</div>

					<div class="col-xs-12">

						<p class="text-center text-condensed">
							<br>
							<br>
							Copyright &copy; Coordinación de Servicios de Cómputo | Diseño de Sistemas, 2024.
							</br>
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
			$(document).ready(function () {
				$('#consultar').click(function () {
					var matricula = $('#matricula').val();
					if (matricula > 0 || matricula.trim.length > 0) {
						$.ajax({
							url: 'procesar_matricula.php',
							type: 'POST',
							data: {matricula: matricula},
							success: function (response) {
								$('#mensajeAlumno').html(response);
							}
						});
						// Simulamos una respuesta después de 3 segundos
						setTimeout(function () {
							$('#matricula').val(''); // Limpiar campo de matrícula
							$('#mensajeAlumno').text(''); // Limpiar mensaje
						}, 10000); // 3000 milisegundos = 3 segundos
					}
					else {
						Swal.fire({
							title: "Atención",
							text: "Ingrese su número de matrícula antes de oprimir consultar.",
							icon: "warning"
						});

					}
				});
			});
		</script>

	</body>

</html>
