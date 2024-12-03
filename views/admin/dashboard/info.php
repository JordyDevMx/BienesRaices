<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a href="/admin/dashboard" class="dashboard__boton">
        <i class="fa-solid fa-rotate-left"></i>
        Volver
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if(!empty($propiedades)) { ?>

        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Titulo</th>
                    <th scope="col" class="table__th">Precio</th>
                    <th scope="col" class="table__th">Fecha de publicación</th>
                    <th scope="col" class="table__th">Status</th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($propiedades as $propiedad) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $propiedad->titulo; ?>
                        </td>

                        <td class="table__td">$
                            <?php echo $propiedad->precio; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $propiedad->creado; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $propiedad->status; ?>
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