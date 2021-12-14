<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <label class="logo">Logo</label>
    <ul>
        <!-- <li><a href="a.php">Pruebas</a></li> -->
        <!-- <li><a href="index.php">Inicio</a></li> -->
        <?php if (isset($_SESSION['usuario'])) { ?>
            <li><a href="index.php?controlador=rutina&accion=listaRutinaPorIdUsuario">Rutina</a></li>
        <?php } ?>
        <?php if (!isset($_SESSION['usuario'])) { ?>
            <li><a href="index.php?controlador=usuario&accion=mostrarlogin">Login</a></li>
            <li><a href="index.php?controlador=usuario&accion=mostrarregistro">Registrar</a></li>
        <?php } else { ?>
            <li><a href="index.php?controlador=usuario&accion=cerrarsesion">Cerrar Sesion</a></li>
        <?php } ?>
    </ul>

</nav>
<script>
</script>