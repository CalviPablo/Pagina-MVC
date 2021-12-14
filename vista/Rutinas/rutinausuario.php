<?php
$id = '';
if (isset($_GET['idusuario'])) {
    $id = $_GET['idusuario'];
} else if (isset($_SESSION['usuario'])) {
    $id = $_SESSION['usuario'];
}
if (isset($_GET['login'])) { ?>
    <script>
        $(document).ready(function() {
            var options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.options.timeOut = 1500;
            toastr.options.positionClass = 'toast-bottom-right';
            toastr.success('Usuario logeado!', options);
        });
    </script>
<?php } ?>
<div class='container'>
    <div class="filtro">
        <form action="index.php?controlador=rutina&accion=listaRutinaPorIdUsuarioYDia" name="Form1" class="form-filtro" method="post">
            <div class='col-auto my-1'>
                <label for="exampleInputEmail1" class="form-label">Filtrar por dia</label>
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
            </div>
            <button type='submit' class='btn-filtro btn btn-secondary'>Buscar</button>
        </form>
    </div>
    <div class='boton-agregar'>

        <a class="btn btn-secondary" href="index.php?controlador=rutina&accion=agregarEjercicioARutina"> Agregar ejercicio </a>

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
                <td><a href="index.php?controlador=rutina&accion=modificarejercicio&ejercicio=<?php echo $ejercicio->idejercicio ?>" class="btn btn-primary">Editar</a></td>
                <td><a href="index.php?controlador=rutina&accion=borrarejercicio&ejercicio=<?php echo $ejercicio->idejercicio ?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal">Borrar</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="container">
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Borrar
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="index.php?controlador=rutina&accion=borrarejercicio&ejercicio=<?php echo $ejercicio->idejercicio ?>" class="btn btn-primary">Borrar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class=" boton-volver">
            <button type="button" class="btn btn-secondary">
                    <a class="link" href='index.php?controlador=usuario&accion=listaUsuarios'>Volver</a>
            </button>
    </div> -->
</div>