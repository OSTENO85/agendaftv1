<?php include_once __DIR__ . '/header-dashboard.php'; ?>

<div class="contenedor-sm">
    <p class="descripcion-pagina">Modificar Datos</p>

    <?php include_once __DIR__ .'/../templates/alertas.php'; ?>
    
    <form class="formulario resumen" method="POST" action="/modificar">

    <div class="campo">
            <input type="hidden" id="id" name="id" value="<?php echo$reservas->id;?>"> 
        </div>


        <div class="campo">
            <label for="nombre">descripción</label>
            <input type="text" id="descripcion" placeholder="tu descripción" name="descripcion" value="<?php echo $reservas->descripcion; ?>">
        </div>

        <div class="campo">
            <label for="fecha">fecha</label>
            <input type="date" id="fecha" placeholder="tu fecha" name="fecha" value="<?php echo $reservas->fecha; ?>">
        </div>

        <div class="campo">
            <label for="hora">hora</label>
            <input type="time" id="hora" placeholder="tu hora" name="hora" value="<?php echo$reservas->hora;?>">
        </div>

        <div class="campo">
    <label for="estado">Estado</label>
    <select id="estado" name="estado">
        <option value="0" <?php echo $reservas->estado === '0' ? 'selected' : ''; ?>>Pendiente</option>
        <option value="1" <?php echo $reservas->estado === '1' ? 'selected' : ''; ?>>Completo</option>
    </select>
</div>

<div class="campo">
    <label for="tipo">Tipo</label>
    <select name="tipo">
        <option value="0" <?php echo $reservas->tipo === '0' ? 'selected' : ''; ?>>Personal</option>
        <option value="1" <?php echo $reservas->tipo === '1' ? 'selected' : ''; ?>>Familiar</option>
        <option value="2" <?php echo $reservas->tipo === '2' ? 'selected' : ''; ?>>Kinder</option>
    </select>
</div>
        </div>

        <div class="campo">
            <input type="hidden" id="url" name="url" value="<?php echo$reservas->url;?>"> 
        </div>

        <div class="campo">
            <input type="hidden" id="usuarioId" name="usuarioId" value="<?php echo$reservas->usuarioId;?>"> 
        </div>

        

        <input type="submit" class="boton" value="Modificar">

    </form>

    </div>

</div>


<?php include_once __DIR__ . '/footer-dashboard.php'; ?>