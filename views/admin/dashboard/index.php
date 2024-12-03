<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor">
    <?php if(!empty($vendedores)) { ?>

        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Correo</th>
                    <th scope="col" class="table__th">Fecha de ingreso</th>
                    <th scope="col" class="table__th">Fecha de nacimiento</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($vendedores as $vendedor) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $vendedor->nombre . " " . $vendedor->apellido; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $vendedor->email; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $vendedor->ingreso; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $vendedor->nacimiento; ?>
                        </td>

                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/dashboard/info?id=<?php echo $vendedor->id; ?>">
                                <i class="fa-solid fa-info"></i>
                            </a>

                            <form method="POST" action="/admin/dashboard/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
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
        <p class="text-center">No hay Vendedores Aún</p>
    <?php } ?>
</div>

<?php
    echo $paginacion;
?>