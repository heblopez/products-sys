<?php
require_once 'db_connection.php';

header('Content-Type: application/json');

try {
    $sql = 'SELECT id, codigo, nombre, bodega_id, sucursal_id, moneda_id, precio, materiales, descripcion FROM productos ORDER BY id';
    $stmt = $conn->query($sql);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($products);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
