
<?php if (count($reservas) === 0 ){ ?>
    <p class="no-proyectos">No tienes nada Agendado</p>
    
    <?php }else{ ?>

        <form class="formFiltro" method="get" action="">
    <label class="labelFiltro" for="estado">Filtrar por estado:</label>
    <select name="estado" id="estado" class="fondoFiltro">
        <option value="todos" <?php echo $_GET['estado'] === 'todos' ? 'selected' : ''; ?>>Todos</option>
        <option value="pendiente" <?php echo $_GET['estado'] === 'pendiente' ? 'selected' : ''; ?>>Pendiente</option>
        <option value="completo" <?php echo $_GET['estado'] === 'completo' ? 'selected' : ''; ?>>Completo</option>
    </select>
    <button type="submit" class="botonFiltro">Filtrar</button>
</form>
        <ul class="listado-misfechas">

        

        <?php foreach ($reservas as $reserva) {
            $estadoFiltrar = $_GET['estado'] ?? 'todos'; // Obtén el estado seleccionado del filtro

            // Filtrar por estado
            if ($estadoFiltrar === 'todos' || ($estadoFiltrar === 'pendiente' && $reserva->estado == 0) || ($estadoFiltrar === 'completo' && $reserva->estado == 1)) {
        ?>
                    <div class="caja">
                <li class="descripcion-reserva">
                <a href="/modificar?id=<?php echo $reserva->url; ?>">
                <?php echo $reserva->descripcion ?>
                </a>
             </li>

            <li class="dia-semana">
                    <?php echo date("l", strtotime($reserva->fecha)); ?>
                </li>

            <li class="fecha-reserva">
            <?php
                    $fechaFormateada = date("d-M-Y", strtotime($reserva->fecha));
                    echo $fechaFormateada;
                    ?>

            </li>

            <li class="hora-reserva">
            <?php echo substr($reserva->hora, 0, 5); ?>
            </li>

            <li class="estado-reserva" >
                <?php 
                if ($reserva->estado == 0) {
                    echo '<span style="background-color: white; color: gray; border-radius: 5px; padding: 5px">Pendiente</span>';
                }

                if ($reserva->estado == 1) {
                    echo '<span style="background-color: grey; color: white; border-radius: 5px; padding: 5px">Completo</span>';
                }
                ?>
            </li>

            <li class="tipo-reserva" >
                <?php
             if ($reserva->tipo == 0) {
                echo '<span style="background-color: #FF6D60; color: white; border-radius: 5px; padding: 5px">Personal</span>';
                }
    
                 if ($reserva->tipo == 1) {
                echo '<span style="background-color: #F7D060; color: white; border-radius: 5px; padding: 5px">Familiar</span>';
                }
    
                if ($reserva->tipo == 2) {
                    echo '<span style="background-color: #98D8AA; color:white; border-radius: 5px; padding: 5px">kinder</span>';
                    }
                    ?>
            </li>

             <li class="usuarios_nombre">
            creado por : <?php echo $reserva->nombre; ?>
            </li>

            </div>
        <?php
            } ?>
            

    

        <?php } ?>
        </ul>
        <?php } ?>