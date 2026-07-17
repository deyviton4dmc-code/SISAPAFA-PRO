<?php

require_once "../config/database.php";

if(isset($_SESSION['usuario'])){
    header("Location: dashboard.php");
    exit;
}

$error="";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $usuario=$_POST["usuario"];
    $password=$_POST["password"];

    $sql=$pdo->prepare("SELECT * FROM usuarios WHERE usuario=? AND estado=1 LIMIT 1");
    $sql->execute([$usuario]);

    if($sql->rowCount()){

        $u=$sql->fetch(PDO::FETCH_ASSOC);

        if(password_verify($password,$u["password"])){

            $_SESSION["usuario"]=$u["usuario"];
            $_SESSION["nombre"]=$u["nombres"];
            $_SESSION["rol"]=$u["rol_id"];

            header("Location: dashboard.php");
            exit;

        }else{

            $error="Contraseña incorrecta.";

        }

    }else{

        $error="Usuario no encontrado.";

    }

}

?>

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>SISAPAFA PRO</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-4">

<div class="card shadow">

<div class="card-header text-center">

<h3>SISAPAFA PRO</h3>

</div>

<div class="card-body">

<?php if($error!=""){ ?>

<div class="alert alert-danger">

<?= $error ?>

</div>

<?php } ?>

<form method="POST">

<div class="mb-3">

<label>Usuario</label>

<input
type="text"
name="usuario"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Contraseña</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<button
class="btn btn-primary w-100">

Ingresar

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>

</html>