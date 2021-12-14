<h4>Lista de usuarios</h4>
<div class='container'>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Rutina</th>
        </tr>
        <?php foreach ($usuarios as $usuario) {
            $idusuario = $usuario->idusuario;
            $link = "index.php?controlador=usuario&accion=listaUsuarioPorId&idusuario=" . urlencode(base64_encode($idusuario));
        ?>
            <tr>
                <td><a href='<?php echo $link; ?>'><?php echo $usuario->idusuario ?></a></td>
                <td><?php echo $usuario->nombre ?></td>
                <td><?php echo $usuario->apellido ?></td>
                <td><a href='index.php?controlador=rutina&accion=listaRutinaPorIdUsuario&idusuario=<?php echo urlencode(base64_encode($usuario->idusuario)); ?>'>Ver</a></td>
            </tr>
        <?php } ?>
    </table>
</div>