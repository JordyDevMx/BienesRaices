<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__enlace <?php echo pagina_actual('/dashboard') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-text">Inicio</span>
        </a>

        <a href="/admin/dashboard/ciudad" class="dashboard__enlace <?php echo pagina_actual('/ciudad') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-map-location-dot dashboard__icono"></i>
            <span class="dashboard__menu-text">Ciudades</span>
        </a>

        <a href="/admin/dashboard/compromiso" class="dashboard__enlace <?php echo pagina_actual('/compromiso') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-regular fa-handshake dashboard__icono"></i>
            <span class="dashboard__menu-text">Compromisos</span>
        </a>
    </nav>
</aside>