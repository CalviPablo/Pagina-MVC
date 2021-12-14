<script>
    function enviaform(valor) {
        document.getElementById("musc").value = valor;
        form1.submit();
    }
</script>

<div class="container">
    <div class="col-2">
        <div class="form">
            <h4>Elegir musculo</h4>
            <form name='Form1' action='' method='post'>
                <label class='sr-only' for='musculo'>Musculo</label>
                <select method='post' onchange='this.form.submit()' name='musculo' class='form-select form-select-sm' aria-label='.form-select-sm example'>
                    <option selected="selected" value=0>Elegir Musculo</option>
                    <?php foreach ($musculos as $musculo) { ?>
                        <option value="<?php echo $musculo->musculo; ?>"><?php echo $musculo->musculo; ?></option>
                    <?php } ?>
                </select>
            </form>
        </div>
        <?php
        // var_dump($_POST);
        ?>
        <br>
        <div class="form">
            <h5>Ejercicio a agregar</h5>
            <form action="" method="post">
                <div class="form-group">
                    <div class="col-auto my-1">
                        <input type="hidden" name="usuario" value="<?php echo $_SESSION['usuario']; ?>">
                    </div>
                    <div class="col-auto my-1">
                        <label for="idejercicio"> Ejercicio </label>
                        <select name="idejercicio" class="form-control" id="idejercicio">
                            <?php foreach ($ejercicios as $ejercicio) { ?>
                                <option value="<?php echo $ejercicio->idejercicios; ?>"><?php echo $ejercicio->nombre; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-auto my-1">
                        <label for="dia"> Dia </label>
                        <select name="dia" class="form-control" id="dia">
                            <option value="Lunes">Lunes</option>
                            <option value="Martes">Martes</option>
                            <option value="Miercoles">Miercoles</option>
                            <option value="Jueves">Jueves</option>
                            <option value="Viernes">Viernes</option>
                            <option value="Sabado">Sabado</option>
                            <option value="Domingo">Domingo</option>
                        </select>
                    </div>
                    <div class="col-auto my-1">
                        <label for="series"> Series </label>
                        <input class="form-control" type="number" name="series" required>
                    </div>
                    <div class="col-auto my-1">
                        <label for="repeticiones"> Repeticiones </label>
                        <input class="form-control" type="number" name="repeticiones" required>
                    </div>
                    <div class="col-auto my-1">
                        <label for="descanso"> Descanso </label>
                        <input class="form-control" type="number" name="descanso" required>
                    </div>
                </div>
                <button type='submit' class='btn-filtro btn btn-secondary'> Agregar </button>
            </form>
        </div>
        <br>
        <div class="boton-volver">
            <a class="btn btn-secondary" href='index.php?controlador=rutina&accion=listaRutinaPorIdUsuario'>Volver</a>
        </div>
    </div>
</div>