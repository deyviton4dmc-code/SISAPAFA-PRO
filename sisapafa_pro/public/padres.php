<?php

require_once "../config/database.php";
verificarSesion();

require_once "../app/Core/Auth.php";
require_once "../app/Models/Padre.php";

$padre = new Padre($pdo);
$lista = $padre->listar();

include "../includes/header.php";
include "../includes/sidebar.php";
include "../includes/navbar.php";
?>

<div class="content">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Padres de Familia</h2>

        <button type="button"
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#modalPadre">
            <i class="fa fa-plus"></i> Nuevo Padre
        </button>
    </div>

    <table class="table table-bordered table-hover">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>DNI</th>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

        <?php foreach($lista as $row){ ?>

            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['dni'] ?></td>
                <td><?= $row['apellidos'] ?></td>
                <td><?= $row['nombres'] ?></td>
                <td><?= $row['telefono'] ?></td>
                <td>
                    <button class="btn btn-warning btn-sm">Editar</button>
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </td>
            </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

<!-- MODAL -->

<div class="modal fade" id="modalPadre" tabindex="-1">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-header">
    <h5 class="modal-title">Nuevo Padre</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

<form id="frmPadre" method="POST">

<div class="mb-3">
<label>DNI</label>
<input type="text" name="dni" class="form-control" maxlength="8" required>
</div>

<div class="mb-3">
<label>Nombres</label>
<input type="text" name="nombres" class="form-control" required>
</div>

<div class="mb-3">
<label>Apellidos</label>
<input type="text" name="apellidos" class="form-control" required>
</div>

<div class="mb-3">
<label>Dirección</label>
<input type="text" name="direccion" class="form-control">
</div>

<div class="mb-3">
<label>Teléfono</label>
<input type="text" name="telefono" class="form-control">
</div>

<div class="mb-3">
<label>Correo</label>
<input type="email" name="correo" class="form-control">
</div>

</form>

</div>

<div class="modal-footer">

<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Cancelar
</button>

<button type="button" class="btn btn-primary" id="btnGuardar">
    Guardar
</button>

</div>

</div>

</div>

</div>
<script>

document.getElementById("btnGuardar").addEventListener("click", function () {

    let formulario = document.getElementById("frmPadre");
    let datos = new FormData(formulario);

    fetch("guardar_padre.php",{
        method:"POST",
        body:datos
    })
    .then(res=>res.text())
    .then(res=>{

        res=res.trim();

        if(res=="OK"){

            Swal.fire({
                icon:'success',
                title:'Registro exitoso',
                text:'El padre de familia fue registrado correctamente.',
                confirmButtonText:'Aceptar'
            }).then(()=>{

                location.reload();

            });

        }else if(res=="EXISTE"){

            Swal.fire({
                icon:'warning',
                title:'DNI duplicado',
                text:'Ya existe un padre registrado con ese DNI.'
            });

        }else{

            Swal.fire({
                icon:'error',
                title:'Error',
                html:res
            });

        }

    });

});

</script>

<?php include "../includes/footer.php"; ?>