<?php
// Inicializar variables
include 'conexion.php';

// Procesar datos del formulario si se envió
// Procesar datos del formulario si se envió
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanear los datos recibidos del formulario
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        
        // Conectar a la base de datos
        $mysqli = conectarReporte();

        // Consultar el usuario
        $sql = "SELECT * FROM rempleados WHERE rusuario = '$username' AND rcontraseña = '$password'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_empleado = $row['id_empleado'];
            header("Location: pagina2.php?id_empleado=$id_empleado");
            exit();
        } else {
            $message = "Nombre de usuario o contraseña incorrectos.";
        }
        
        // Cerrar la conexión
        $mysqli->close();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            width: 100%;
        }
        h2 {
            margin-top: 0;
        }
        .message {
            color: red;
            margin-bottom: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>

        <!-- Mostrar mensaje de error o éxito -->
        <?php if (!empty($message)): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>

        <!-- Formulario de Login -->
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Iniciar Sesión</button>
            </div>
        </form>
        <div class="form-group">
            <button onclick="window.location.href='./insertar.php'" class="btn">Insertar</button>
        </div>
    </div>
</body>
</html>
