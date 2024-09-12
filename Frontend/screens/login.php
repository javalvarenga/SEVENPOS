<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SevenPOS - Inicio de Sesión</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>
    <div class="login-container">
        <img src="../public/img/logoSevenPOS.png" alt="logo">
        <h1>SevenPOS</h1>
        <form action="login.php" method="POST" id="loginForm">
            <div class="form-group">
                <label for="username">Nombre de usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-button">Iniciar sesión</button>
            <!-- Aquí puedes agregar un mensaje de error si es necesario -->
            <!-- <div class="error-message">Nombre de usuario o contraseña incorrectos.</div> -->
        </form>
        <script type="module" src="../js/login.js"></script>
    </div>
</html>