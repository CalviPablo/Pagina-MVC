<?php
require_once('vista/header.php');
require_once('modelo/Usuario.php');
require_once('modelo/Rutina.php');

$user = new Usuario('ID', 'pw', 'nombre', 'password');
$rutina = new Rutina('iduser', 'idejercicio', 'dia', 'series', 'repeticiones', 'descanso');

// $obj = new Usuario;
// var_dump($obj->listaUsuarios());

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div>
                    Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
                </div>
                <div class="dropdown mt-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                        Dropdown button
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="prueba-loginmodal">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        <?php require_once('vista/Login/login.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="prueba-registromodal">
        <div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="registroModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-lable="Close"></button>
                    <div class="modal-body">
                        <?php require_once('vista/Registro/registro.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row row-cols-4">
            <div class="col">
                <div class="p-3 border bg-light">
                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Login
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">
                    <a href="" data-bs-toggle="modal" data-bs-target="#registroModal">
                        Registro
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">
                    <a href="#" id='linkButton'>Toast</a>
                </div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">
                    <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">Offcanvas</a>
                </div>
            </div>
        </div>
    </div>
    <div class="cambiar-color">
        <select onchange="document.body.style.backgroundColor=this.value" name="color" id="color">
            <option value="rgb(199 199 199)">1</option>
            <option value="#c5d9c6">2</option>
            <option value="rgb(187 172 172)">3</option>
        </select>
    </div>
    <br>
    <div class="container">
        <!-- Draggable DIV -->
        <div id="mydiv">
            <!-- Include a header DIV with the same name as the draggable DIV, followed by "header" -->
            <div id="mydivheader">

            </div>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Menu
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Login
                            </a>
                            <hr>
                            <a href="" data-bs-toggle="modal" data-bs-target="#registroModal">
                                Registro
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Button trigger modal -->
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal">a</a>
        <!-- Modal -->
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <a href="#" class="btn btn-primary">Borrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <button class="btn btn-secondary" id="click">Hide</button>
    <button class="btn btn-secondary" id="show">Show</button>
</body>

<script>
    $(document).ready(function() {
        $('#click').click(function() {
            console.log('click');
        })
    });

    // mover div
    dragElement(document.getElementById("mydiv"));

    function dragElement(elmnt) {
        var pos1 = 0,
            pos2 = 0,
            pos3 = 0,
            pos4 = 0;
        if (document.getElementById(elmnt.id + "header")) {
            // if present, the header is where you move the DIV from:
            document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
        } else {
            // otherwise, move the DIV from anywhere inside the DIV:
            elmnt.onmousedown = dragMouseDown;
        }

        function dragMouseDown(e) {
            e = e || window.event;
            e.preventDefault();
            // get the mouse cursor position at startup:
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            // call a function whenever the cursor moves:
            document.onmousemove = elementDrag;
        }

        function elementDrag(e) {
            e = e || window.event;
            e.preventDefault();
            // calculate the new cursor position:
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            // set the element's new position:
            elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
            elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
        }

        function closeDragElement() {
            // stop moving when mouse button is released:
            document.onmouseup = null;
            document.onmousemove = null;
        }
    }
</script>

</html>
<?php
require_once('vista/footer.php');
