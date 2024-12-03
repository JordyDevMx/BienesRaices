<header class="dashboard__header">
    <div class="dashboard__header--grid">
        <a class="dashboard__logo" href="/">
            bienes<span class="dashboard__span">Raices</span>
        </a>

        <nav class="dashboard__nav">
            <p class="dashboard__vendedor">Vendedor: <span class="dashboard__span-texto"><?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido']; ?></span></p>
            <form method="POST" action="/logout" class="dashboard__form">
                <input type="submit" value="Cerrar Sesión" class="dashboard__submit--logout">
            </form>
        </nav>
    </div>
</header>