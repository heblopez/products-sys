<?php
require_once 'db-connection.php';

header('Content-Type: application/json');

try {
    $sql = 'SELECT id, nombre FROM monedas ORDER BY id';
    $stmt = $conn->query($sql);
    $currencies = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($currencies);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
