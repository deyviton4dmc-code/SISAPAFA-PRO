<?php

require_once "../config/database.php";

verificarSesion();

require_once "../app/Core/Auth.php";
require_once "../app/Models/Padre.php";

$padre = new Padre($pdo);

$totalPadres = $padre->total();

?>

<?php include '../includes/header.php';?>

<?php include '../includes/sidebar.php';?>

<?php include '../includes/navbar.php';?>

<div class="content">

<h2>Bienvenido <?= Auth::user(); ?></h2>

<div class="cards">

<div class="card-dashboard">

<h5>Padres</h5>

<h2><?= $totalPadres ?></h2>

</div>

<div class="card-dashboard">

<h5>Estudiantes</h5>

<h2>0</h2>

</div>

<div class="card-dashboard">

<h5>Aportes</h5>

<h2>S/ 0.00</h2>

</div>

<div class="card-dashboard">

<h5>Caja</h5>

<h2>S/ 0.00</h2>

</div>

</div>

</div>

<?php include '../includes/footer.php';?>