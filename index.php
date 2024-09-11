<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sistema de Registro de Productos</title>
	<link rel="stylesheet" href="assets/style.css">
</head>

<body>
	<form id="productForm">
		<h1>Formulario de Producto</h1>

		<div class="inputs-wrapper">
			<div class="form-group">
				<label for="codigo">Código</label>
				<input type="text" id="codigo" name="codigo">
			</div>

			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" id="nombre" name="nombre">
			</div>

			<div class="form-group">
				<label for="bodega">Bodega</label>
				<select id="bodegas" name="bodega">
					<option value="">Seleccionar bodega</option>
				</select>
			</div>

			<div class="form-group">
				<label for="sucursal">Sucursal</label>
				<select id="sucursales" name="sucursal">
					<option value="">Seleccionar sucursal</option>
				</select>
			</div>

			<div class="form-group">
				<label for="moneda">Moneda</label>
				<select id="monedas" name="moneda">
					<option value="">Seleccionar moneda</option>
				</select>
			</div>

			<div class="form-group">
				<label for="precio">Precio</label>
				<input type="text" id="precio" name="precio">
			</div>

			<div class="form-group grid-cols-full">
				<label>Material del Producto</label>
				<div class="material-wrapper">
					<div class="checkbox-group">
						<input type="checkbox" id="plastico" name="materiales" value="1">
						<label for="plastico">Plástico</label>
					</div>
					<div class="checkbox-group">
						<input type="checkbox" id="metal" name="materiales" value="2">
						<label for="metal">Metal</label>
					</div>
					<div class="checkbox-group">
						<input type="checkbox" id="madera" name="materiales" value="3">
						<label for="madera">Madera</label>
					</div>
					<div class="checkbox-group">
						<input type="checkbox" id="vidrio" name="materiales" value="4">
						<label for="vidrio">Vidrio</label>
					</div>
					<div class="checkbox-group">
						<input type="checkbox" id="textil" name="materiales" value="5">
						<label for="textil">Textil</label>
					</div>
				</div>
			</div>

			<div class="form-group grid-cols-full">
				<label for="descripcion">Descripción</label>
				<textarea id="descripcion" name="descripcion" rows="4"></textarea>
			</div>
		</div>

		<button type="submit">Guardar Producto</button>
	</form>

	<script src="assets/script.js"></script>
</body>
</html>
