<div class="card" style="width: 18rem;">
    <h4>Detalles del usuario</h4>
    <hr>
    <?php foreach ($usuarios as $usuario) { ?>
        <div class="card-body">
            <p class="card-text">Nombre: <?php echo $usuario->nombre; ?></p>
            <p class="card-text">Apellido: <?php echo $usuario->apellido; ?></p>
        </div>
    <?php } ?>
    <p class='link-volver'><a href='index.php?controlador=usuario&accion=listaUsuarios'>Volver</a></p>
</div>