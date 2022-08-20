<?php include "Views/Templates/header.php"; ?>

    <h3 class="mt-5 mb-3 text-center">Solicitudes sin responder</h3>

    <div class="table-responsive">
        <table class="table" id="tblSolicitudesAdmin">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Tipo</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <!-- Modal - agregar archivos -->

    <div>
        <div id="modal-aggArchivos" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar pruebas</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="frmArchivos">
                            <style>
                                .file-pruebas {
                                    margin-bottom: 20px;
                                }

                                .file-pruebas input {
                                    display: none;
                                }

                                .file-pruebas label {
                                    text-align: center;
                                    display: block;
                                    padding: 10px 5px;
                                    border: 1px solid black;
                                    border-radius: 6px;
                                    background-color: #eee;
                                    cursor: pointer;
                                }

                                .file-pruebas label:hover {
                                    background-color: #e4e4e4;
                                }

                                #elementos-pruebas {
                                    margin-top: 10px;
                                    text-align: center;
                                    border: 1px solid black;
                                    padding: 5px;
                                    border-radius: 6px;
                                }
                            </style>
                            <div id="num-soli">
                                <!-- No. Solicitud -->
                            </div>
                            <div class="file-pruebas" id="container-archivos">
                                <span>Solo se permiten archivos de tipo pdf</span>
                                <label for="archivos-pruebas"><i class="fas fa-paperclip"></i> Adjuntar pruebas</label>
                                <input type="file" id="archivos-pruebas" name="archivos[]" multiple>
                            </div>
                            <div id="elementos-pruebas">
                                <!-- Elementos cargados -->
                            </div>
                            <div id="pprueba">
                                <!-- Elementos cargados -->
                            </div>
                            <script>
                                var archivo = document.getElementById("archivos-pruebas");
                                archivo.addEventListener('change', () => {
                                    let files = archivo.files;
                                    // Imprimir el nombre a mostrar en pantalla
                                    let html = '';
                                    let pdf = 0;
                                    for(var i = 0; i < files.length && pdf == 0; i++){
                                        if (files[i].type == 'application/pdf') {
                                            if (files[i].name.length > 15) {
                                                var name = files[i].name.substring(0, 9);
                                                name = name + '...pdf'
                                            } else {
                                                var name = files[i].name
                                            }
                                            pdf = 0;
                                            html += `<a><i class="fas fa-file-pdf"></i> ${name}</a><br>`;
                                        } else {
                                            pdf = 1;
                                            document.getElementById("frmArchivos").reset();
                                            html = '<div class="text-center">Ningun elemento cargado</div>';
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Solo se permiten archivos pdf',
                                                showConfirmButton: false,
                                                timer: 3000
                                            })
                                        }
                                    }
                                    document.getElementById("elementos-pruebas").innerHTML = html;
                                });
                            </script>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            <div id="btn-gdrArchivos">
                                <!-- button guardar archivos - Codigo con javaScript -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Fin Modal - agregar archivos -->

<?php include "Views/Templates/footer.php"; ?>