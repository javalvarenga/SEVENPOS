<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SevenPOS - Inicio de Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            padding: 3rem 1.3rem;
            width: 100%;
        }
        .login-container img {
        object-fit: contain;
        height: 250px;
        }
        .login-container h1 {
            margin-top: 0;
            margin-bottom: 20px;
            color: goldenrod;
            transform: translateY(-10px);
        }



        .form-group {
            width: 100%;
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 1rem 1.3rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }
        .login-button {
            width: 100%;
            padding: 10px;
            background-color: goldenrod;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .login-button:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: #d9534f;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="../public/img/logoSevenPOS.png" alt="logo">
        <h1>SevenPOS</h1>
        <form action="login.php" method="POST">
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
    </div>
</body>
</html>