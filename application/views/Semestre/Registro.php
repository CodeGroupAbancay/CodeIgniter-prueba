<!DOCTYPE html>
<html>
<head>
	<title>Semestre</title>
</head>
<body>
	<div class="caja">
		<label for="">Lista de Semestres</label>
		<select name="semestre" id="select_periodo">
			<?php foreach ($periodos as $key => $item): ?>
				<option value="<?=$item->id?>"><?=$item->periodo?></option>
			<?php endforeach ?>
		</select>
	</div>
	<h2><i>formulario de actividad</i></h2>
	<h4><?=$mensaje?></h4>
	<form id="url_semestre" action="<?= base_url();?>semestre/registrar" method="post">
		<input id="periodo" name="periodo" type="text" value="<?=$periodo?>" placeholder="Nombre del periodo">
		<input id="fechainicio" name="fechainicio" type="date" value="<?=$fechainicio?>" placeholder="Fecha Inicio">
		<input id="fechafin" name="fechafin" type="date" value="<?=$fechafin?>" placeholder="Fecha  de Finalizacion">
		<button id="sumit" name="id" type="sumit">Registrar</button>
	</form>
	<button id="cancelar">Cancelar</button>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
	<script src="<?=base_url()?>public/js/variables-globales.js" ></script>
	<script src="<?=base_url()?>public/js/eventos.js" ></script>
</body>
</html>