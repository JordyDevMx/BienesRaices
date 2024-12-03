<main class="hogares">
    <h1 class="hogares__heading"><?php echo $titulo; ?></h1>

    <div class="hogares__grid">
        <?php foreach($propiedades as $propiedad) { ?>
            <div class="hogares__card">
                <picture>
                    <source srcset="img/propiedades/<?php echo $propiedad->imagen; ?>.webp" type="image/webp">
                    <img class="hogares__imagen" loading="lazy" width="200" height="300" src="img/propiedades/<?php echo $propiedad->imagen; ?>.jpg" alt="Imagen propiedades">
                </picture>

                <div class="hogares__info">
                    <h3 class="hogares__titulo"><?php echo $propiedad->titulo; ?></h3>
                    <p class="hogares__descripcion"><?php echo $propiedad->descripcion; ?></p>
                    <p class="hogares__precio">$ <span class="hogares__span-texto"><?php echo $propiedad->precio; ?></span></p>

                    <ul class="hogares__ul">
                        <li class="hogares__li">
                            <i class="fa-solid fa-toilet"></i>
                            <p class="hogares__numero"><?php echo $propiedad->wc; ?></p>
                        </li>
                        <li class="hogares__li">
                            <i class="fa-solid fa-car-side"></i>
                            <p class="hogares__numero"><?php echo $propiedad->estacionamiento; ?></p>
                        </li>
                        <li class="hogares__li">
                            <i class="fa-solid fa-couch"></i>
                            <p class="hogares__numero"><?php echo $propiedad->habitaciones; ?></p>
                        </li>
                    </ul>

                    <div class="hogares__boton">
                        <a href="/contacto" class="hogares__enlace">
                            Más Info
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</main>