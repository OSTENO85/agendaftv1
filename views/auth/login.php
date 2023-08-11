<div class="contenedor login">
    <h1 class="agenda">AGENDA</h1>
    <p class="tagline">Administra tus fechas desde la Agenda</p>

    <div class="contenedor-sm">
    <p class="descripcion-pagina">Iniciar Sesión</p>
    <?php include_once __DIR__ .'/../templates/alertas.php'; ?>
    <form class="formulario" method="POST" action="/" novalidate>

        <div class="campo">
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="tu email" name="email">
        </div>

        <div class="campo">
            <label for="password">password</label>
            <input type="password" id="password" placeholder="tu password" name="password">
        </div>

        <input type="submit" class="boton" value="Iniciar Sesión">

    </form>

    </div>
</div>