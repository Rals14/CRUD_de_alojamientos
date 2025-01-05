<?php
session_start();

require_once 'controller/AuthController.php';

if (!isset($_SESSION['user_role'])) {
    $_SESSION['user_role'] = 'guest';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'logout') {
    $authController = new AuthController();
    $authController->logout();
    $page = 'login';
}else{
    $page = $_GET['page'] ?? 'login';
}

?>
    <?php include 'views/navbar.php'; ?>

    <div class="container mt-4">
        <?php
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

            default:
                require 'views/login.php';
                break;
        }
        ?>
    </div>

    <?php include 'views/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>