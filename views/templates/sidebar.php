<aside class="sidebar">
    <div class="contenedor-sidebar">
            <a href="/dashboard">
                <h2>Agenda</h2>
            </a>    
            
            <div class="cerrar-menu1">
                <img id="cerrar-menu" src="build/img/cerrar.svg" alt="imagen cerrar menu">
            </div>

    </div>



    <nav class="sidebar-nav">
        <a class="<?php echo ($titulo === 'Agregar Fecha') ? 'activo' : ''; ?>" href="/agregar-fecha">Agregar Fechas</a>
        <a class="<?php echo ($titulo === 'Ver mis fechas') ? 'activo' : '';  ?>" href="/ver-misfechas">Ver mis fechas</a>
        <a class="<?php echo ($titulo === 'Ver fechas grupales') ? 'activo' : '';  ?>" href="/ver-todasfechas">Ver fechas grupales</a>
        <a class="<?php echo ($titulo === 'Menú') ? 'activo' : '';  ?>" href="/menu">Menú comidas</a>
        <?php if (isset($_SESSION['admin'])) : ?>
        <a class="<?php echo ($titulo === 'Crear Cuenta') ? 'activo' : ''; ?>" href="/crear">Crear Cuenta</a>
    <?php endif; ?>
        


    </nav>

    <div class="cerrar-sesion-mobile">
        <a href="/logout" class="cerrar-sesion">Cerrar Sesión</a>
    </div>
</aside>