<section class="opinion">
    <h1 class="opinion__heading">¿Qué opinan <span class="opinion__span">nuestros clientes</span>?</h1>

    <div class="opinion__grid slider swiper">
        <div class="swiper-wrapper">
            <?php foreach($clientes as $cliente) { ?>
                <div class="opinion-card swiper-slide">
                    <p class="opinion-card__descripcion">“<?php echo $cliente->comentarios; ?>”</p>

                    <div class="opinion-card__cliente">
                        <p class="opinion-card__nombre"><?php echo $cliente->nombre . " " . $cliente->apellido; ?></p>
                    </div>
                </div>            
            <?php } ?>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>