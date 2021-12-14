<div class="login-form container">
    <div id="login-form">
        <h3>Registro</h3>
        <form action="index.php?controlador=usuario&accion=registro" method="post">
            <input class='login-input' type="nombre" name="nombre" placeholder="Nombre" />
            <br>
            <input class='login-input' type="apellido" name="apellido" placeholder="Apellido" />
            <br>
            <input class='login-input' type="text" name="usuario" placeholder="Usuario" />
            <br>
            <input class='login-input' type="password" name="password" placeholder="Password" autocomplete="on" />
            <br>
            <input class='login-input' type="submit" id="registro" value="Registro">
        </form>
    </div>
</div>