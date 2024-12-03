<section class="territorio">
    <h1 class="territorio__heading">Territorio <span class="territorio__span-logo">BIENESRAICES</span></h1>
    <p class="territorio__descripcion">Nuestra red de ubicaciones, con presencia en <span class="territorio__span-texto"><?php echo $total; ?> ciudades de la República Mexicana</span> , te brindará la flexibilidad y la diversidad que necesitas para encontrar el espacio que mejor se adapte a tus deseos.</p>

    <div class="territorio__grid slider swiper">
        <div class="swiper-wrapper">
            <?php foreach($ciudades as $ciudad) { ?>
                <div class="territorio-card swiper-slide">
                    <div class="territorio-card__titulo">
                        <h3 class="territorio-card__ciudad"><?php echo $ciudad->ciudad; ?></h3>
                    </div>
                    
                    <div class="territorio-card__info">
                        <p class="territorio-card__tel">Tel: <span class="territorio-card__span"><?php echo $ciudad->contacto; ?></span></p>
                        <a target="_blank" href="<?php echo $ciudad->maps; ?>" class="territorio-card__direccion"><?php echo $ciudad->direccion; ?></a>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>