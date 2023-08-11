<div class="dashboard">
    <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

<div class="principal">
    <?php include_once __DIR__ . '/../templates/barra.php'; ?>

    <div class="contenido">
        <h2 class="nombre-pagina"><?php echo $titulo; ?></h2>
    </div>



    <div class="contenedor-sm">
    <p class="descripcion-pagina">Crear un nuevo usuario para la Agenda</p>

    <?php include_once __DIR__ .'/../templates/alertas.php'; ?>
    
    <form class="formulario" method="POST" action="/crear">

        <div class="campo">
            <label for="nombre">nombre</label>
            <input type="text" id="nombre" placeholder="Nombre" name="nombre" value="<?php echo $usuario->nombre; ?>">
        </div>

        <div class="campo">
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Email" name="email" value="<?php echo $usuario->email; ?>">
        </div>

        <div class="campo">
            <label for="password">password</label>
            <input type="password" id="password" placeholder="Password" name="password">
        </div>

        <div class="campo">
            <label for="password2">Repetir Password</label>
            <input type="password" id="password2" placeholder="Password2" name="password2">
        </div>

        <div class="campo">
            <label for="perfil">Perfil</label>
        <select name="perfil">
            <option value="0" selected>Cliente</option>
            <option value="1">Administrador</option>

        </select>
</div>

        

        <input type="submit" class="boton" value="Crear">

    </form>

    </div>

</div>

