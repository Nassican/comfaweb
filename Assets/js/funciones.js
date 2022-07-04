// Editor de texto RichText

$(document).ready(function() {
    $('#editor').richText({
        // title
        heading: false,

        // fonts
        fonts: false,

        fontColor: false,
        fontSize: false,
        // uploads
        imageUpload: false,
        fileUpload: false,

        // media
        videoEmbed: false,

        // link
        urls: false,

        // tables
        table: false,

        // code
        removeStyles: false,
        code: false,

    });
});

// Fin editor de texto RichText

// Inicio formulario solicitud

function crearSolicitud(e) {
    e.preventDefault();
    const paciente = document.getElementById("paciente");
    const acudiente = document.getElementById("acudiente");
    const tipopqrsf = document.getElementById("tipopqrsf");
    const editor = document.getElementById("editor");
    if (paciente.value == "" || acudiente.value == "" || tipopqrsf.value == "" || editor.value == "") {
        Swal.fire({
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 3000
        })
    } else {
        const url = base_url + "Buzon/crearSolicitud";
        const frm = document.getElementById("frmSolicitud");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Solicitud enviada con exito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    document.querySelector('.richText-editor').innerHTML = "";
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            }
        }
    }
}

// Fin formulario solicitud