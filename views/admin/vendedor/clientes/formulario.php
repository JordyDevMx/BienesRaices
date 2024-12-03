<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información General</legend>

    <div class="formulario__grid">
        <div class="formulario__campo">
            <label class="formulario__label" for="nombre">Nombre:</label>
            <input
                class="formulario__input" 
                type="text" 
                id="nombre" 
                name="nombre" 
                placeholder="Nombre Cliente" 
                value="<?php echo $cliente->nombre ?? '';?>"
                >
        </div>

        <div class="formulario__campo">
            <label class="formulario__label" for="apellido">Apellidos:</label>
            <input
                class="formulario__input" 
                type="text" 
                id="apellido" 
                name="apellido" 
                placeholder="Apellidos Cliente" 
                value="<?php echo $cliente->apellido ?? '';?>"
                >
        </div>

        <div class="formulario__campo">
            <label for="nacimiento" class="formulario__label">Fecha de Nacimiento</label>
            <input 
            type="date" 
            class="formulario__input"
            id="nacimiento"
            name="nacimiento"
            value="<?php echo $cliente->nacimiento; ?>"
            >
        </div>

        <div class="formulario__campo">
            <label class="formulario__label" for="email">Correo Electrónico:</label>
            <input
                class="formulario__input" 
                type="email" 
                id="email" 
                name="email" 
                value="<?php echo $cliente->email ?? '';?>"
                >
        </div>

        <div class="formulario__campo">
            <label class="formulario__label" for="telefono">Teléfono o Celular:</label>
            <input
                class="formulario__input" 
                type="tel" 
                id="telefono" 
                name="telefono" 
                value="<?php echo $cliente->telefono ?? '';?>"
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
                        <?php echo $cliente->estados_id === $estado->id ? 'selected' : ''; ?> 
                        value="<?php echo $estado->id; ?>"
                    ><?php echo $estado->estado; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="formulario__campo">
            <label class="formulario__label" for="ciudad_id">Ciudad:</label>

            <select 
                class="formulario__input" 
                name="ciudad_id" 
                id="ciudad_id"
            >
                <option disabled selected >-- Seleccione Ciudad --</option>
                <?php foreach($ciudades as $ciudad) { ?>
                    <option 
                        <?php echo $cliente->ciudad_id === $ciudad->id ? 'selected' : ''; ?> 
                        value="<?php echo $ciudad->id; ?>"
                    ><?php echo $ciudad->ciudad; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="formulario__campo">
            <label class="formulario__label" for="comentarios">Comentarios:</label>
            <textarea
                class="formulario__input"
                id="comentarios" 
                name="comentarios"><?php echo $cliente->comentarios ?? '';?></textarea
            >
        </div>
    </div>

</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información De la propiedad</legend>

    <div class="formulario__grid">
        <div class="formulario__campo">
            <label for="tramite" class="formulario__label">Fecha de Tramite</label>
            <input 
            type="date" 
            class="formulario__input"
            id="tramite"
            name="tramite"
            value="<?php echo $cliente->tramite; ?>"
            >
        </div>

        <div class="formulario__campo">
            <label class="formulario__label" for="propiedades_id">Propidedad:</label>

            <select 
                class="formulario__input" 
                name="propiedades_id" 
                id="propiedades_id"
            >
                <option disabled selected >-- Seleccione --</option>
                <?php foreach($propiedades as $propiedad) { ?>
                    <option 
                        <?php echo $cliente->propiedades_id === $propiedad->id ? 'Selected' : ''; ?> 
                        value="<?php echo $propiedad->id; ?>"
                    ><?php echo $propiedad->folio . " | " . $propiedad->titulo; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="formulario__campo">
            <label class="formulario__label" for="status">Estatus:</label>

            <select 
                class="formulario__input" 
                name="status" 
                id="status"
            >
                <option disabled selected >-Seleccione-</option>
                <option <?php echo $cliente->status === 'Tramite' ? 'selected' : ''; ?> value="Tramite">Tramite</option>
                <option <?php echo $cliente->status === 'Vendido' ? 'selected' : ''; ?> value="Vendido">Vendido</option>
            </select>
        </div>

</fieldset>