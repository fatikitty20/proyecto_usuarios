<?php
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión en sí
session_destroy();

// Redirigir al inicio (o login)
header("Location: index.php");
return;
