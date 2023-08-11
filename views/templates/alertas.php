<?php
    foreach($alertas as $key => $alerta)://key puede ser [error] o [exito]

        foreach($alerta as $mensaje):
?>
    <div class="alerta <?php echo $key; ?>"><?php echo $mensaje; ?></div>
<?php
        endforeach;
    endforeach;
?>

