<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a href="/admin/dashboard/ciudad/crear" class="dashboard__boton">
        <i class="fa-solid fa-map-pin"></i>
        Añadir Territorio
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if(!empty($ciudades)) { ?>

        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Ciudad</th>
                    <th scope="col" class="table__th">Direccion</th>
                    <th scope="col" class="table__th">Contacto</th>
                    <th scope="col" class="table__th">Mapa</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($ciudades as $ciudad) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $ciudad->ciudad; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $ciudad->direccion; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $ciudad->contacto; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $ciudad->maps; ?>
                        </td>

                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/dashboard/ciudad/editar?id=<?php echo $ciudad->id; ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <form method="POST" action="/admin/dashboard/ciudad/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $ciudad->id; ?>">
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
        <p class="text-center">No hay Territorio Aún</p>
    <?php } ?>
</div>

<?php
    echo $paginacion;
?>