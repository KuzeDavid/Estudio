<?php
// Incluir el archivo de conexiones
include 'conexion.php';

// Inicializar mensajes para mostrar resultados de cada formulario
$messageReporte = "";
$messageVacaciones = "";
$messageVacaciones2 = "";
$messageVacaciones3 = "";

// Procesar el formulario para la base de datos 'reporte'
if (isset($_POST['submit_reporte'])) {
    $rusuario = htmlspecialchars($_POST['rusuario']);
    $rcontraseña = htmlspecialchars($_POST['rcontraseña']);
    $rnombre = htmlspecialchars($_POST['rnombre']);
    $rcorreo = htmlspecialchars($_POST['rcorreo']);
    // Conectar a la base de datos 'reporte'
    $mysqliR = conectarReporte();
    // Construir la consulta SQL directamente
    $sqlR = "INSERT INTO rempleados (rusuario, rcontraseña, rnombre, rcorreo) 
             VALUES ('$rusuario', '$rcontraseña', '$rnombre', '$rcorreo')";
    // Ejecutar la consulta y manejar errores
    if ($mysqliR->query($sqlR) === TRUE) {
        $messageReporte = "Nombre insertado en la base de datos 'reporte'.";
        header("Location: ../Estudiando");
    } else {
        $messageReporte = "Error al insertar el nombre en 'reporte': " . $mysqliR->error;
    }
    // Cerrar la conexión
    $mysqliR->close();
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Nombre en Dos Bases de Datos</title>
</head>
<body>
    <h2>Insertar en rempleados de 'reporte'</h2>
    
    <!-- Mostrar mensaje de éxito o error para 'reporte' -->
    <?php if (!empty($messageReporte)): ?>
        <p><?php echo $messageReporte; ?></p>
    <?php endif; ?>

    <!-- Formulario para insertar nombre en 'reporte' -->
    <form action="insertar.php" method="post">
        <label for="rusuario">Usuario:</label>
        <input type="text" id="rusuario" name="rusuario" required>

        <label for="rcontraseña">Contraseña:</label>
        <input type="password" id="rcontraseña" name="rcontraseña" required>

        <label for="rnombre">Nombre:</label>
        <input type="text" id="rnombre" name="rnombre" required>

        <label for="rcorreo">Correo:</label>
        <input type="email" id="rcorreo" name="rcorreo" required>

        <button type="submit" name="submit_reporte">Insertar en 'reporte'</button>
    </form>


    <?php 
        // Procesar el formulario para la base de datos 'vacaciones1'
        if (isset($_POST['submit_vusuarios_vacaciones1'])) {
            $vusuario = htmlspecialchars($_POST['vusuario']);
            $vcontraseña = htmlspecialchars($_POST['vcontraseña']);
            $vnombre = htmlspecialchars($_POST['vnombre']);
            $vcorreo = htmlspecialchars($_POST['vcorreo']);
            $id_carea = intval($_POST['id_carea']); 
           
            $diasAsig = intval($_POST['diasAsig']); 
            $diasDispo = intval($_POST['diasDispo']); 
            $diasTotal = intval($_POST['diasTotal']); 
            // Conectar a la base de datos 'vacaciones1'
            $mysqliV = conectarVacaciones();

            $sqlVD = "INSERT INTO vdias (diasAsig, diasDispo, diasTotal) VALUES ('$diasAsig', '$diasDispo', '$diasTotal')";
            // Ejecutar la consulta y manejar errores
            if ($mysqliV->query($sqlVD) === TRUE) {
                $id_vacas = $mysqliV->insert_id;
            } else {
                $messageVacaciones = "Error al insertar el nombre en 'vacaciones1': " . $mysqliV->error;
            }

            // Construir la consulta SQL directamente
            $sqlV = "INSERT INTO vusuarios (vusuario, vcontraseña, vnombre, vcorreo, id_carea, id_vacas) 
                    VALUES ('$vusuario', '$vcontraseña', '$vnombre', '$vcorreo', '$id_carea', '$id_vacas')";
            // Ejecutar la consulta y manejar errores
            if ($mysqliV->query($sqlV) === TRUE) {
                $messageVacaciones = "DATOS INSERTADOS 'vacaciones1'.";
                header("Location: ../Estudiando");
            } else {
                $messageVacaciones = "Error al insertar el nombre en 'vacaciones1': " . $mysqliV->error;
            }
            // Cerrar la conexión
            $mysqliV->close();
        }
    ?>

    <h2>Insertar en vusuarios de vacaciones1</h2>
    
    <!-- Mostrar mensaje de éxito o error para 'vacaciones1' -->
    <?php if (!empty($messageVacaciones)): ?>
        <p><?php echo $messageVacaciones; ?></p>
    <?php endif; ?>

    
    <form action="insertar.php" method="post">
        <label for="vusuario">Usuario:</label><br>
        <input type="text" id="vusuario" name="vusuario" required><br>
        
        <label for="vcontraseña">Contraseña:</label><br>
        <input type="password" id="vcontraseña" name="vcontraseña" required><br>

        <label for="vnombre">Nombre:</label><br>
        <input type="text" id="vnombre" name="vnombre" required><br>

        <label for="vcorreo">Correo:</label><br>
        <input type="email" id="vcorreo" name="vcorreo" required><br>

        <label for="id_carea">Área:</label><br>
        <select id="id_carea" name="id_carea" required>
            <option value="">Selecciona un área</option>
            <?php
            $areas = [];
            $mysqliV = conectarVacaciones();
            $sqlAreas = "SELECT id_carea, cnombre FROM vareas";
            $resultAreas = $mysqliV->query($sqlAreas);
            
            if ($resultAreas->num_rows > 0) {
                while ($row = $resultAreas->fetch_assoc()) {
                    $areas[] = $row;
                }
            }
            
            foreach ($areas as $area): ?>
                <option value="<?php echo $area['id_carea']; ?>"><?php echo $area['cnombre']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="diasAsig">Dias asignados:</label><br>
        <input type="text" id="diasAsig" name="diasAsig" required><br>

        <label for="diasDispo">Dias disponibles:</label><br>
        <input type="text" id="diasDispo" name="diasDispo" required><br>

        <label for="diasTotal">Total dias de vacaciones</label><br>
        <input type="text" id="diasTotal" name="diasTotal" required><br>


        <button type="submit" name="submit_vusuarios_vacaciones1">Insertar</button>
    </form>

    <?php 
        // Procesar el formulario para la base de datos 'vacaciones1'
        if (isset($_POST['submit_vareas_vacaciones1'])) {
            $cnombre = htmlspecialchars($_POST['cnombre']);
            // Conectar a la base de datos 'vacaciones1'
            $mysqliV = conectarVacaciones();
            // Construir la consulta SQL directamente
            $sqlV = "INSERT INTO vareas (cnombre) VALUES ('$cnombre')";
            // Ejecutar la consulta y manejar errores
            if ($mysqliV->query($sqlV) === TRUE) {
                $messageVacaciones = "Nombre insertado en la base de datos 'vacaciones1'.";
                header("Location: ../Estudiando");
            } else {
                $messageVacaciones = "Error al insertar el nombre en 'vacaciones1': " . $mysqliV->error;
            }
            // Cerrar la conexión
            $mysqliV->close();
        }
    ?>

    <h2>Insertar en vareas</h2>
    <!-- Mostrar mensaje de éxito o error para 'vacaciones1' -->
    <?php if (!empty($messageVacaciones2)): ?>
        <p><?php echo $messageVacaciones2; ?></p>
    <?php endif; ?>
    <!-- Formulario para insertar nombre en 'vacaciones1' -->
    <form action="insertar.php" method="post">
        <label for="cnombre">Nombre:</label>
        <input type="text" id="cnombre" name="cnombre" required>

        <button type="submit" name="submit_vareas_vacaciones1">Insertar en 'vacaciones1'</button>
    </form>



</body>
</html>
