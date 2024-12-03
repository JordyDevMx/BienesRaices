<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/vendedor/propiedad" class="dashboard__enlace <?php echo pagina_actual('/propiedad') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-text">Propiedades</span>
        </a>

        <a href="/vendedor/cliente" class="dashboard__enlace <?php echo pagina_actual('/cliente') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-house-user dashboard__icono"></i>
            <span class="dashboard__menu-text">Clientes</span>
        </a>
    </nav>
</aside>