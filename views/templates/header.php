<header class="header">
    <div class="header__contenedor">
        <div class="header__grid">
            <a data-aos="zoom-in" href="/">
                <img src="/build/img/logo.svg" alt="Logotipo">
            </a>

            <div id="bar" class="header__menu">
                <i class="fa-solid fa-bars header__bar"></i>
            </div>

            <nav id="nav" class="header__navegacion">
                <?php if(is_auth()) { ?>
                    <a href="<?php echo is_admin() ? '/admin/dashboard' : '/vendedor/propiedad'; ?>" class="header__enlace">Administrar</a>
                    <form method="POST" action="/logout" class="header__form">
                        <input type="submit" value="Cerrar Sesión" class="header__logout">
                    </form>
                <?php } else { ?>
                    <a href="/hogares" class="header__enlace">Hogares</a>
                    <a href="/contacto" class="header__enlace">Contacto</a>
                    <a href="/login" class="header__enlace">Iniciar Sesión</a>
                <?php } ?>
            </nav>
        </div>
    </div>
</header>