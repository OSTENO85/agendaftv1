<?php include_once __DIR__ . '/header-dashboard.php'; ?>

<div class="contenedor-sm">
    <p class="descripcion-pagina">Agregar nueva fecha para la Agenda</p>

    <?php include_once __DIR__ .'/../templates/alertas.php'; ?>
    
    <form class="formulario resumen" method="POST" action="/agregar-fecha">

        <div class="campo">
            <label for="nombre">descripción</label>
            <input type="text" id="descripcion" placeholder="tu descripción" name="descripcion" value="<?php echo $usuario->descripcion; ?>">
        </div>

        <div class="campo">
            <label for="fecha">fecha</label>
            <input type="date" id="fecha" placeholder="tu fecha" name="fecha" value="<?php echo $usuario->fecha; ?>">
        </div>

        <div class="campo">
            <label for="hora">hora</label>
            <input type="time" id="hora" placeholder="tu hora" name="hora">
        </div>

        <div class="campo">
            <input type="hidden" id="estado" name="estado" value="0"> 
        </div>

        <div class="campo">
            <label for="tipo">tipo</label>
        <select name="tipo">
            <option value="0" selected>Personal</option>
            <option value="1">Familiar</option>
            <option value="2">Kinder</option>

        </select>
        </div>

        <div class="campo">
            <input type="hidden" id="url" name="url" value=""> 
        </div>

        <div class="campo">
            <input type="hidden" id="usuarioId" name="usuarioId" value="1"> 
        </div>

        

        <input type="submit" class="boton" value="Crear">

    </form>

    </div>

</div>


<?php include_once __DIR__ . '/footer-dashboard.php'; ?>