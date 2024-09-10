<?php
require_once 'db-connection.php';

header('Content-Type: application/json');

try {
    $sql = 'SELECT id, nombre FROM bodegas ORDER BY id';
    $stmt = $conn->query($sql);
    $warehouses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($warehouses);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
