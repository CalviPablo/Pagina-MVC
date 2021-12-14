<?php
if (isset($_GET['login']) && $_GET['login'] == 0) { ?>
    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 1500;
            toastr.options.positionClass = 'toast-center-center';
            toastr.error('Error al iniciar sesion!');
        });
    </script>
<?php } ?>

<div class="login-form container">
    <div id="login-form">
        <h3>Login</h3>
        <form action="index.php?controlador=usuario&accion=login" method="post">
            <input class='login-input' type="text" name="username" placeholder="Usuario" />
            <br>
            <input class='login-input' type="password" name="password" placeholder="Password" autocomplete="on" />
            <br>
            <input class='login-input' type="submit" id="login" value="Login">
        </form>
    </div>
</div>