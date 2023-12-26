<?php include_once "../mensajes_clase.php" ?>
<?php include_once "servicioMensajes.php" ?>

<html lang="es">

	<head>

		<title>Mensajes</title>
		<link rel="stylesheet" type="text/css" href="../CSS/styles1.css">

	</head>
	

	<body>
		

		<div class="panelInteractivo">

		<?php include_once "menu_profesor_y_direccion.html" ?>

			<div class="panel">

			<?php 

				$mensaje = Mensajes::fromBody();

				$mensajes = ServiciosMensajes::obtenerMensajes();

			?>

				<div class="formulario">

					

					
					
					<form action="comprobacion.php" method="POST">

						<div class="elementoFormularioMensajes"><label for="usuario">Nombre del usuario</label>
						<input type="text" name="usuario" value="<?php echo $mensaje->usuario; ?>"></div>

						<div class="elementoFormularioMensajes"><label for="mensaje">Texto del mensaje</label>
						<input type="text" name="mensaje" value="<?php echo $mensaje->mensaje; ?>"></div>

						<div class="elementoFormularioMensajes"><button>Mandar mensaje</button></div>

					</form>

				</div>

			</div>

		</div>

		<div>

			<h3>Listado de mensajes</h3>
			
			<?php 

					foreach($mensajes as $mensaje)
					{
						include "verMensajes.php";
					}
				

				

			?>

		</div>

	</body>

</html>