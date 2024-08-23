<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/admin_dashboard.css">
    <title>Dashboard - El AbraExpress</title>
    <style>
        .user-menu {
            position: relative;
            display: inline-block;
        }

        .user-menu-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            width: 150px;
            border-radius: 5px;
            overflow: hidden;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease-in-out;
        }

        .user-menu:hover .user-menu-content {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .user-menu-content span, .user-menu-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .user-menu-content a {
            background-color: #f1f1f1;
        }

        .user-menu-content a:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <img src="images/logo.jpg" alt="Admin Icon">
        <ul>
            <li><a href="#">Ventas</a></li>
            <li><a href="index.php?controller=admin_products">Productos</a></li>
            <li><a href="index.php?controller=admin_users">Usuarios</a></li> 
            <!-- Agrega más ítems según sea necesario -->
        </ul>
    </div>

    <div class="main-content">
        <div class="top-bar">
            <div class="user-menu">
                <img src="images/user_icon.png" alt="User Icon" style="width: 30px; height: 30px; border-radius: 50%;">
                <div class="user-menu-content">
                    <span><?php echo $_SESSION['admin_username']; ?></span>
                    <a href="index.php?controller=admin_login&action=logout">Cerrar Sesión</a>
                </div>
            </div>
        </div>
        <h1>Bienvenido al Dashboard de Administración</h1>
        <!-- Aquí puedes colocar el contenido del Dashboard -->
    </div>
</body>
</html>
