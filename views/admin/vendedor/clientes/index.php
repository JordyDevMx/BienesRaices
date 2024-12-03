<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a href="/vendedor/cliente/crear" class="dashboard__boton">
        <i class="fa-solid fa-user-plus"></i>
        Añadir Cliente
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if(!empty($clientes)) { ?>

        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Folio</th>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Correo</th>
                    <th scope="col" class="table__th">Contacto</th>
                    <th scope="col" class="table__th">Fecha de tramite</th>
                    <th scope="col" class="table__th">Estatus</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($clientes as $cliente) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $cliente->folio; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $cliente->nombre . " " . $cliente->apellido; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $cliente->email; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $cliente->telefono; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $cliente->tramite; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $cliente->status; ?>
                        </td>

                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/vendedor/cliente/editar?id=<?php echo $cliente->id; ?>">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    <?php } else { ?>
        <p class="text-center">No hay Clientes Aún</p>
    <?php } ?>
</div>

<?php
    echo $paginacion;
?>