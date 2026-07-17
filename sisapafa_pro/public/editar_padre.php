<?php

require_once "../config/database.php";
require_once "../app/Core/Auth.php";
require_once "../app/Models/Padre.php";

verificarSesion();

$padre = new Padre($pdo);

$id = intval($_GET['id'] ?? 0);

$datos = $padre->obtener($id);

if(!$datos){
    exit("NO EXISTE");
}

?>

<form id="frmEditarPadre">

<input type="hidden" name="id" value="<?= $datos['id'] ?>">

<div class="mb-3">
    <label>DNI</label>
    <input type="text"
           class="form-control"
           name="dni"
           maxlength="8"
           value="<?= htmlspecialchars($datos['dni']) ?>"
           required>
</div>

<div class="mb-3">
    <label>Nombres</label>
    <input type="text"
           class="form-control"
           name="nombres"
           value="<?= htmlspecialchars($datos['nombres']) ?>"
           required>
</div>

<div class="mb-3">
    <label>Apellidos</label>
    <input type="text"
           class="form-control"
           name="apellidos"
           value="<?= htmlspecialchars($datos['apellidos']) ?>"
           required>
</div>

<div class="mb-3">
    <label>Dirección</label>
    <input type="text"
           class="form-control"
           name="direccion"
           value="<?= htmlspecialchars($datos['direccion']) ?>">
</div>

<div class="mb-3">
    <label>Teléfono</label>
    <input type="text"
           class="form-control"
           name="telefono"
           value="<?= htmlspecialchars($datos['telefono']) ?>">
</div>

<div class="mb-3">
    <label>Correo</label>
    <input type="email"
           class="form-control"
           name="correo"
           value="<?= htmlspecialchars($datos['correo']) ?>">
</div>

<div class="text-end">

    <button
        type="button"
        class="btn btn-secondary"
        data-bs-dismiss="modal">
        Cancelar
    </button>

    <button
        type="button"
        class="btn btn-success"
        id="btnActualizar">
        Actualizar
    </button>

</div>

</form>

<script>

document.getElementById("btnActualizar").addEventListener("click",function(){

    let datos=new FormData(document.getElementById("frmEditarPadre"));

    fetch("actualizar_padre.php",{
        method:"POST",
        body:datos
    })
    .then(r=>r.text())
    .then(r=>{

        r=r.trim();

        if(r=="OK"){

            Swal.fire({
                icon:"success",
                title:"Actualizado",
                text:"Los datos del padre fueron actualizados."
            }).then(()=>{

                location.reload();

            });

        }else{

            Swal.fire({
                icon:"error",
                title:"Error",
                html:r
            });

        }

    });

});

</script>