<?php

session_start();


if (!isset($_SESSION['user_role'])) {
    $_SESSION['user_role'] = 'guest';
}


$page = $_GET['page'] ?? 'login';

switch ($page) {
    case 'usuario':
        if ($_SESSION['user_role'] === 'usuario') {
            require 'views/user.php';
        } else {
            echo "Acceso denegado. Rol no autorizado.";
        }
        break;

    case 'administrador':
        if ($_SESSION['user_role'] === 'administrador') {
            require 'views/admin.php';
        } else {
            echo "Acceso denegado. Rol no autorizado.";
        }
        break;

    case 'register':
        require 'views/registro.php';
        break;

    case 'login':
    default:
        require 'views/login.php';
        break;
}



?>