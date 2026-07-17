<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    if(document.querySelector(".table")){
        document.addEventListener("DOMContentLoaded", function () {

    if(document.querySelector(".table")){

        new DataTable(".table",{

            language:{

                decimal:"",
                emptyTable:"No hay registros disponibles",
                info:"Mostrando _START_ a _END_ de _TOTAL_ registros",
                infoEmpty:"Mostrando 0 registros",
                infoFiltered:"(filtrado de _MAX_ registros)",
                lengthMenu:"Mostrar _MENU_ registros",
                loadingRecords:"Cargando...",
                processing:"Procesando...",
                search:"Buscar:",
                zeroRecords:"No se encontraron resultados",
                paginate:{
                    first:"Primero",
                    last:"Último",
                    next:"Siguiente",
                    previous:"Anterior"
                }

            }

        });

    }

});
    }

});
</script>
</body>
</html>