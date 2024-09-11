<?php
include __DIR__ . '/../config/db_connection.php';

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$codigo = $data['codigo'];
	$nombre = $data['nombre'];
	$bodega_id = $data['bodega_id'];
	$sucursal_id = $data['sucursal_id'];
	$moneda_id = $data['moneda_id'];
	$precio = $data['precio'];
	$materiales = $data['materiales'];
	$descripcion = $data['descripcion'];

	try {
		$materiales_pg = '{' . implode(',', $materiales) . '}';
		$sql = "SELECT * FROM registrar_producto(:codigo, :nombre, :bodega_id, :sucursal_id, :moneda_id, :precio, :materiales, :descripcion)";

		$stmt = $conn->prepare($sql);
		$stmt->execute([
			':codigo' => $codigo,
			':nombre' => $nombre,
			':bodega_id' => $bodega_id,
			':sucursal_id' => $sucursal_id,
			':moneda_id' => $moneda_id,
			':precio' => $precio,
			':materiales' => $materiales_pg,
			':descripcion' => $descripcion
		]);

		$producto = $stmt->fetch(PDO::FETCH_ASSOC);
		http_response_code(201);
		echo json_encode($producto);
	} catch (PDOException $e) {
		http_response_code(500);
		echo json_encode(['error' => 'Error al guardar el producto: ' . $e->getMessage()]);
	}
}
