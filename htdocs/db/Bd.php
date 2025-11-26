<?php
$host = "sql100.infinityfree.com";
$usuario = "if0_40509783";
$contrasena = "EEJpJRqoBLFw";
$base = "if0_40509783_usuarios";

$conexion = mysqli_connect($host, $usuario, $contrasena, $base);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

class Bd
{
    private static ?PDO $pdo = null;

    static function pdo(): PDO
    {
        if (self::$pdo === null) {

            self::$pdo = new PDO(
                "sqlite:" . __DIR__ . "/usuarios.db",
                null,
                null,
                [
                    PDO::ATTR_PERSISTENT => false,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]
            );

            // ================================
            // 1. CREAR TABLA SI NO EXISTE
            // ================================
            self::$pdo->exec(
                "CREATE TABLE IF NOT EXISTS usuarios (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    nombre TEXT NOT NULL,
                    email TEXT NOT NULL UNIQUE,
                    password TEXT NOT NULL,
                    es_admin INTEGER NOT NULL DEFAULT 0
                )"
            );

            // ======================================
            // 2. VERIFICAR SI LA COLUMNA ES_ADMIN YA EXISTE
            // ======================================
            $cols = self::$pdo->query("PRAGMA table_info(usuarios)")
                              ->fetchAll(PDO::FETCH_ASSOC);

            $existe = false;

            foreach ($cols as $col) {
                if ($col['name'] === 'es_admin') {
                    $existe = true;
                    break;
                }
            }

            // ======================================
            // 3. SI NO EXISTE, AGREGARLA
            // ======================================
            if (!$existe) {
                self::$pdo->exec(
                    "ALTER TABLE usuarios ADD COLUMN es_admin INTEGER NOT NULL DEFAULT 0"
                );
            }
        }

        return self::$pdo;
    }
}
