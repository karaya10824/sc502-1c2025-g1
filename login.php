<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha384-17j2N7YAXjGLOs58KwFzKTtR9jGd7T65DQ+XUv4+JBHWeNnF/7H3QyG2e/hS2wB7" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Inicio de Sesión</h2>
        <form action="login.php" method="POST">
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-gray-900">Recuérdame</label>
                </div>
                <a href="#" class="text-blue-600 hover:underline">¿Olvidaste tu contraseña?</a>
            </div>
            <button type="submit" class="w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition duration-300">Iniciar Sesión</button>
        </form>
        <p class="mt-6 text-center text-gray-700">¿No tienes una cuenta? <a href="register.php" class="text-blue-600 hover:underline">Regístrate</a></p>
    </div>
</body>
</html>