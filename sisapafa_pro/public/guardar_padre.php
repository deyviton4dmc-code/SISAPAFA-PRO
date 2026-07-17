<?php

require_once "../config/database.php";
require_once "../app/Models/Padre.php";

verificarSesion();

$padre = new Padre($pdo);

$dni = limpiar($_POST['dni']);

if($padre->buscarDni($dni))
{
    die("EXISTE");
}

$padre->guardar($_POST);

echo "OK";