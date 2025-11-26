<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si no hay sesión
if (!isset($_SESSION["usuario"])) {
    $errorHtml = "Debes iniciar sesión para continuar.";
    require __DIR__ . "/../error.php";  // correcta ruta a /error.php
    exit;
}

$usuario = $_SESSION["usuario"];

// Si no es admin
if (intval($usuario["es_admin"]) !== 1) {
    $errorHtml = "No tienes permisos para acceder a esta sección.";
    require __DIR__ . "/../error.php";  // correcta ruta
    exit;
}
