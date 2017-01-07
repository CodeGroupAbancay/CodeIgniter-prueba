<!DOCTYPE html>
<html>
<head>
	<title>Tarjeta</title>
</head>
<body>
	<h2><i>Formulario de Tarjeta</i></h2>
	<h4><?=$mensaje?></h4>
	<form  id="url_tarjeta" action="<?= base_url();?>tarjeta/registrar" method="post">
		<input id="codigo_tarjeta" name="codigo" type="text" value="<?=$codigo?>" placeholder="Codigo Tarjeta">
		<input id="code_alumno" name="alumno" type="text" value="<?=$alumno?>" placeholder="Codigo alumno">
		<select name="estado" id="estado">
			<option value="1">Habilitado</option>
			<option value="0">DesHabilitado</option>
		</select>
		<button id="sumit" name="id" type="sumit">Registrar</button>
	</form>
	<button id="cancelar">Cancelar</button>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
	<script src="<?=base_url()?>public/js/variables-globales.js" ></script>
	<script src="<?=base_url()?>public/js/eventos.js" ></script>
</body>
</html>