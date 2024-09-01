<?php

include 'conexion.php';
// Obtener el id_empleado de la URL
$id_empleado = isset($_GET['id_empleado']) ? htmlspecialchars($_GET['id_empleado']) : '';

// Aquí puedes usar el id_empleado
// Por ejemplo, mostrar el id_empleado:
echo "<p>ID Empleado: $id_empleado</p>";

$mysqliR = conectarReporte();
$cons = "SELECT * FROM rempleados where id_empleado = $id_empleado ";
$result = $mysqliR->query($cons);


if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Nombre: ". $row['rnombre'] ."<br>" ."Corre: ". $correoR = $row['rcorreo']. "" ;
    }
}else{
    echo "0 resultados";
}


//consultar los dias de vacaciones con el correo
$mysqliV = conectarVacaciones();
$consv = "SELECT u.vusuario, d.diasAsig, d.diasDispo, d.diasTotal 
    FROM vusuarios u 
    INNER JOIN vdias d ON u.id_vacas = d.id_vacas 
    WHERE u.vcorreo = '$correoR'";
$result = $mysqliV->query($consv);

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<br><br>Nombre de usuario: " ."<br>". $row['vusuario'] . "<br>Días Asignados: " . $row['diasAsig'] . "<br>Días Disponibles: " . $row['diasDispo'] . "<br>Total Días: " . $row['diasTotal'];
    }
}else{
    echo "0 resultados";
}

// YA SOLAMENTE HACEMOS LA UNION DE EL ID DE VACAS CON DIASV

?>
