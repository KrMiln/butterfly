<?php
header('Content-Type: application/json');
$host = 'localhost';
$dbname = 'butterfly_db';
$username = 'butterfly_u';
$password = 'TL8EHuw9ST1nQVA';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query("SELECT id, name, email, message FROM contacts ORDER BY id ASC");
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['success' => true, 'contacts' => $contacts]);
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
