<?php
$idejercicio = $_GET['ejercicio'];
?>
<h4>Modificar rutina</h4>
<div class="container">
    <div class="col-2">
        <div class="form">
            <h5>NO FUNCIONA!!</h5>
            <form name="Form1" action="index.php?controlador=rutina&accion=modificarejercicio" method="post">
                <!-- <div class="col-auto my-1">
                    <input type="hidden" name="ejercicio" value="">
                </div> -->
                <?php foreach ($ejercicios as $ejercicio) { ?>
                    <div class="col-auto my-1">
                        <input type="hidden" name="idejercicio" class="form-control" value="<?php echo $idejercicio; ?>">
                    </div>
                    <div class="col-auto my-1">
                        <label for="series"> Series </label>
                        <input class="form-control" type="number" name="series" value="<?php echo $ejercicio->series; ?>">
                    </div>
                    <div class="col-auto my-1">
                        <label for="repeticiones"> Repeticiones </label>
                        <input class="form-control" type="number" name="repeticiones" value="<?php echo $ejercicio->repeticiones; ?>">
                    </div>
                    <div class="col-auto my-1">
                        <label for="descanso"> Descanso </label>
                        <input class="form-control" type="number" name="descanso" value="<?php echo $ejercicio->descanso; ?>">
                    </div>
                    <button type='submit' class='btn-filtro btn btn-secondary'> Modificar </button>
                <?php } ?>
            </form>
            <br>
        </div>
    </div>
    <a class="btn btn-secondary" href='index.php?controlador=rutina&accion=listaRutinaPorIdUsuario'>Volver</a>
</div>