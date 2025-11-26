<?php
function recuperaIdEntero(string $nombreCampo) : int {
    if (!isset($_REQUEST[$nombreCampo])) {
        throw new Error("La solicitud no contiene el campo $nombreCampo.");
    }
    $raw = $_REQUEST[$nombreCampo];
    if (!is_numeric($raw) || intval($raw) != $raw) {
        throw new Error("El campo $nombreCampo debe ser un entero.");
    }
    $id = intval($raw);
    if ($id <= 0) {
        throw new Error("El campo $nombreCampo debe ser un entero positivo.");
    }
    return $id;
}
