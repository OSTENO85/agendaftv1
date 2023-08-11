<div class="barra-mobile">
    <h1>Agenda</h1>
    <div class="menu1">
            <img id="mobile-menu" src="build/img/menu.svg" alt="imagen menu">
    </div>
</div>






<div class="barra">
    <p>Hola: <span><?php echo $_SESSION['nombre']; ?></span></p>

    <p class="fecha-actual">
    <?php
    date_default_timezone_set('America/Costa_Rica');
    $fecha_actual = date('d-M-Y');
    $dia_semana = date('l'); // 'l' devuelve el nombre completo del día de la semana
    echo "<p>$dia_semana $fecha_actual</p>";
    ?>
    </p>

    <a href="/logout" class="cerrar-sesion">Cerrar Sesión</a>
</div>