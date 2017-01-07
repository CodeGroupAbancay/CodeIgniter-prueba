<!DOCTYPE html>
<html>
<head>
	<title>Insertar Nueno Beneficon</title>
</head>
<body>
	<h1>FORMULARIO DE BENIFICIOS</h1>
	<span><?=$mensaje?></span>
	<div class="grupo">
		<table>
			<thead>
				<th>nombre</th>
				<th>precio</th>
				<th>estado</th>
				<th>opcion</th>
			</thead>
			<tbody>
			<?php foreach ($beneficios as $key => $item): ?>
				<tr>
					<td><?=$item->nombre?></td>
					<td><?=$item->precio?></td>
					<td><?=$item->estado?></td>
					<td data-id="<?=$item->id?>" class="editar_benificio">editar</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<h4><i>formulario de actividad</i></h4>
	<form id="url_benificio" action="<?= base_url();?>beneficios/registrar" method="post">
		<input id="nombre" name="nombre" type="text"  placeholder="Nombre Benificios">
		<input id="precio" name="precio" type="text"  placeholder="Costo de Benificio">
		<select name="estado" id="estado">
			<option value="1">Habilitado</option>
			<option value="0">DesHabilitado</option>
		</select>
		<!-- <input id="estado" name="estado" type="text"  placeholder="estado de Benificios"> -->
		<button id="sumit" name="id" type="sumit">Registrar</button>
	</form>
	<button id="cancelar">Cancelar</button>

	<script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
	<script src="<?=base_url()?>public/js/variables-globales.js" ></script>
	<script src="<?=base_url()?>public/js/eventos.js" ></script>

</body>
</html>