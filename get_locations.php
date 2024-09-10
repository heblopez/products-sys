<?php
require_once 'db-connection.php';

header('Content-Type: application/json');

try {
    $sql = 'SELECT id, nombre FROM sucursales ORDER BY id';
    $stmt = $conn->query($sql);
    $locations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($locations);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
