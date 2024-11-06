<?php
// models/usuariosM.php

require_once 'database.php';

// Crear una conexión y realizar operaciones de base de datos
try {
    $db = Database::connect();
    // $db->query("SELECT * FROM usuarios; 
} catch (\PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
}
?>