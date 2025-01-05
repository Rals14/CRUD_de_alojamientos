<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Alojamientos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <?php if(isset($_SESSION['usuario_id'])): ?>
                <li class="nav-item">
                    <form method="POST" action="index.php" style="display:inline;">
                        <input type="hidden" name="action" value="logout">
                        <button type="submit" class="btn btn-link nav-link" style="display:inline; cursor:pointer;">Logout</button>
                    </form>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>