<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a href="/admin/dashboard/compromiso/crear" class="dashboard__boton">
        <i class="fa-solid fa-plus"></i>
        Añadir Compromiso
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if(!empty($compromisos)) { ?>

        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Titulo</th>
                    <th scope="col" class="table__th">Descripción</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($compromisos as $compromiso) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $compromiso->titulo; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $compromiso->descripcion; ?>
                        </td>

                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/dashboard/compromiso/editar?id=<?php echo $compromiso->id; ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <form method="POST" action="/admin/dashboard/compromiso/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $compromiso->id; ?>">
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
        <p class="text-center">No hay Compromisos Aún</p>
    <?php } ?>
</div>