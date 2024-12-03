<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información General</legend>

    <div class="formulario__campo">
        <label class="formulario__label" for="ciudad">Ciudad:</label>
        <input
            class="formulario__input" 
            type="text" 
            id="ciudad" 
            name="ciudad" 
            placeholder="Ciudad" 
            value="<?php echo $ciudad->ciudad ?? '';?>"
            >
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="estados_id">Estado:</label>

        <select 
            class="formulario__input" 
            name="estados_id" 
            id="estados_id"
        >
            <option disabled selected >-- Seleccione Estado --</option>
            <?php foreach($estados as $estado) { ?>
                <option 
                    <?php echo $ciudad->estados_id === $estado->id ? 'selected' : ''; ?> 
                    value="<?php echo $estado->id; ?>"
                ><?php echo $estado->estado; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="contacto">Contacto:</label>
        <input
            class="formulario__input" 
            type="text" 
            id="contacto" 
            name="contacto" 
            placeholder="Contacto" 
            value="<?php echo $ciudad->contacto ?? '';?>"
            >
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="direccion">Dirección:</label>
        <textarea
            class="formulario__input"
            id="direccion" 
            name="direccion"><?php echo $ciudad->direccion ?? '';?></textarea
        >
    </div>

</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Link para ubicación</legend>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-solid fa-link"></i>
            </div>
            <input 
                type="text"
                id="maps"
                class="formulario__input--link"
                name="maps"
                placeholder="Link"
                value="<?php echo $ciudad->maps ?? ''; ?>"
            >
        </div>
    </div>
</fieldset>