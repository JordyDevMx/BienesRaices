<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a href="/vendedor/propiedad/crear" class="dashboard__boton">
    <i class="fa-solid fa-house-circle-check"></i>
    Añadir Propiedad
    </a>
</div>

<?php include __DIR__ . '/excel.php'; ?>

<div class="dashboard__contenedor">
    <?php if(!empty($propiedades)) { ?>

        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Folio</th>
                    <th scope="col" class="table__th">Titulo</th>
                    <th scope="col" class="table__th">Precio</th>
                    <th scope="col" class="table__th">Estatus</th>
                    <th scope="col" class="table__th">Fecha de publicación</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($propiedades as $propiedad) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $propiedad->folio; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $propiedad->titulo; ?>
                        </td>

                        <td class="table__td">$
                            <?php echo $propiedad->precio; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $propiedad->status; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $propiedad->creado; ?>
                        </td>

                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/vendedor/propiedad/editar?id=<?php echo $propiedad->id; ?>">
                                <i class="fa-solid fa-house-circle-exclamation"></i>
                            </a>

                            <form method="POST" action="/vendedor/propiedad/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                                <button class="table__accion table__accion--eliminar">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    <?php } else { ?>
        <p class="text-center">No hay Propiedades Aún</p>
    <?php } ?>
</div>

<?php
    echo $paginacion;
?>