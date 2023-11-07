<?php if (isset($mensaje)): ?>

	<div class="elementoFormulario">

		<label>Usuario:</label> 
		<span><?php echo $mensaje->usuario; ?></span>
		<?php if($mensaje->tipoUsuario == "pago"): echo "★" ?>
		<?php endif; ?>
		<span class="align-right"><?php echo $mensaje->fecha->format("d/M/y H:m:s"); ?></span>

	</div>

	<div class="elementoFormulario">

		<label>Usuario normal / de pago:</label> 
		<span><?php echo $mensaje->tipoUsuario; ?></span>

	</div>
	<div class="elementoFormulario"><label>Texto del mensaje: </label><?php echo $mensaje->mensaje; ?></div>


<?php endif; ?>