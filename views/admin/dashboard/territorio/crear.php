<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a href="/admin/dashboard/ciudad" class="dashboard__boton">
        <i class="fa-solid fa-rotate-left"></i>
        Volver
    </a>
</div>


<div class="dashboard__formulario">
    <?php include_once __DIR__ . '/../../../templates/alertas.php'; ?>

    <form method="POST" action="/admin/dashboard/ciudad/crear" class="formulario">

        <?php include_once __DIR__ . '/formulario.php'; ?>

        <input class="formulario__submit formulario__submit--registrar" type="submit" value="Registrar Ciudad">
    </form>
</div>