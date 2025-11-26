<?php
function recuperaTexto(string $nombreCampo) : string {
    if (!isset($_REQUEST[$nombreCampo])) {
        throw new Error("La solicitud no contiene el campo $nombreCampo.");
    }
    $valor = trim((string) $_REQUEST[$nombreCampo]);
    if ($valor === '') {
        throw new Error("El campo $nombreCampo está vacío.");
    }
    return $valor;
}
