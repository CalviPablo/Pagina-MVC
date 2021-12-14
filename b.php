<?php
require_once('vista/header.php');
require_once('modelo/Usuario.php');
require_once('modelo/Rutina.php');

$hashed = password_hash('123', PASSWORD_DEFAULT);
$user = new Usuario('user', '123', 'nombre', 'apellido');
$rutina = new Rutina('iduser', 'idejercicio', 'dia', 'series', 'repeticiones', 'descanso');

$ejercicios = $rutina->listaRutinaPorIdUsuario();
?>

<script>

</script>

<body>
    <div class="container">
        <div class="filtro">
            <form action="" name="Form1" class="form-filtro">
                <label for="exampleInputEmail1" class="form-label">Filtrar </label>
                <select name='dia' class='form-select form-select-sm' aria-label='.form-select-sm example'>
                    <option value="0">Todos los dias</option>
                    <option value="lunes">Lunes</option>
                    <option value="martes">Martes</option>
                    <option value="miercoles">Miercoles</option>
                    <option value="jueves">Jueves</option>
                    <option value="viernes">Viernes</option>
                    <option value="sabado">Sabado</option>
                    <option value="domingo">Domingo</option>
                </select>
                <button type='submit' class='btn-filtro btn btn-secondary'>Buscar</button>
            </form>
        </div>
    </div>
    <table class="table" id="tablarutina">
        <thead>
            <tr>
                <th>Dia</th>
                <th>Musculo</th>
                <th>Ejercicio</th>
                <th>Series</th>
                <th>Repeticiones</th>
                <th>Descanso (seg)</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ejercicios as $ejercicio) { ?>
                <tr>
                    <td><?php echo $ejercicio->dia ?></td>
                    <td><?php echo $ejercicio->musculo ?></td>
                    <td><?php echo $ejercicio->nombre ?></td>
                    <td><?php echo $ejercicio->series ?></td>
                    <td><?php echo $ejercicio->repeticiones ?></td>
                    <td><?php echo $ejercicio->descanso ?></td>
                    <td><a href="index.php?controlador=rutina&accion=modificarejercicio&ejercicio=<?php echo $ejercicio->idejercicio ?>">Editar</a></td>
                    <td><a href="index.php?controlador=rutina&accion=borrarejercicio&ejercicio=<?php echo $ejercicio->idejercicio ?>" onclick="return confirm('Confirmar');">Borrar</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</body>

<?php
require_once('vista/footer.php');
