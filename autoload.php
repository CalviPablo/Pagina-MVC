<?php
function autoload($clase) {
    require_once('controlador/' . $clase . '.php');
}

spl_autoload_register('autoload');
