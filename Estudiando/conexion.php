<?php
function conectarReporte() {
    $host = 'localhost';      // Cambia esto si tu base de datos está en un servidor diferente
    $dbname = 'reporte';      // Nombre de la base de datos 'reporte'
    $user = 'root';           // Tu usuario de base de datos
    $pass = '';               // Tu contraseña de base de datos (deja vacío si no tienes una)
    
    // Crear conexión MySQLi
    $mysqliR = new mysqli($host, $user, $pass, $dbname);

    // Verificar conexión
    if ($mysqliR->connect_error) {
        die("Error al conectar a la base de datos 'reporte': " . $mysqliR->connect_error);
    }

    // Establecer el conjunto de caracteres a UTF-8
    $mysqliR->set_charset("utf8");

    return $mysqliR;
}

function conectarVacaciones() {
    $host = 'localhost';      // Cambia esto si tu base de datos está en un servidor diferente
    $dbname = 'vacaciones1';  // Nombre de la base de datos 'vacaciones1'
    $user = 'root';           // Tu usuario de base de datos
    $pass = '';               // Tu contraseña de base de datos (deja vacío si no tienes una)
    
    // Crear conexión MySQLi
    $mysqliV = new mysqli($host, $user, $pass, $dbname);

    // Verificar conexión
    if ($mysqliV->connect_error) {
        die("Error al conectar a la base de datos 'vacaciones1': " . $mysqliV->connect_error);
    }

    // Establecer el conjunto de caracteres a UTF-8
    $mysqliV->set_charset("utf8");

    return $mysqliV;
}
?>
