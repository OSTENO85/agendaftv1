<?php include_once __DIR__ . '/header-dashboard.php'; ?>


<p class="descripcion-pagina">Resumen de la fecha creada</p>                  

   <div class="contenedor-sm resume">

    <?php include_once __DIR__ .'/../templates/alertas.php'; ?>
    
    <form class="formulario" method="POST" action="/modificar">

        <div class="campo">
            <label for="descripcion">Descripcion:</label>
            <p id="descripcion"><?php echo $reservas->descripcion; ?></p>
        </div>

        <div class="campo">
            <label for="fecha">Fecha:</label>
            <p id="fecha"><?php echo $reservas->fecha; ?></p>
        </div>

        <div class="campo">
            <label for="hora">Hora:</label>
            <p id="hora"><?php echo $reservas->hora; ?></p>
        </div>

        <div class="campo">
            <label for="estado">Estado:</label>
            <p id="estado"> <?php
          if ($reservas->estado == 0) {
                    echo '<span style="background-color: white; color: gray; border-radius: 5px; padding: 10px  ">Pendiente</span>';
                }

                if ($reservas->estado == 1) {
                    echo '<span style="background-color: gray; color: white; border-radius: 5px; padding: 10px ">Completo</span>';
                } ?></p>
        </div>
      
        <div class="campo">
        <label for="estado">Tipo:</label>
    <p id="tipo"><?php  if ($reservas->tipo == 0) {
                echo 'Personal';
                }
    
                 if ($reservas->tipo == 1) {
                echo 'Familiar';
                }
    
                if ($reservas->tipo == 2) {
                    echo 'kinder';
                    } ?></p>

      </div>
 
      <a class="enlaceModificar" href="/modificar?id=<?php echo $reservas->url; ?>">
                    Ir a modificar..
        </a>
        
        <a class="enlaceModificar" href="/agregar-fecha">
                   Nueva Fecha
        </a> 

        
     
  
    </form>
    </div>
    </div>


     
<?php include_once __DIR__ . '/footer-dashboard.php'; ?>


    <?php 

    
    ?>