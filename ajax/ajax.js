function cargarContenido(abrir) {
    var contenedor = document.getElementById('dashboard');

    const ajax = new XMLHttpRequest();

    ajax.open('GET', abrir, true);
    
    ajax.onreadystatechange = function (){ 
        if (ajax.readyState == 4 && ajax.status == 200) {
            contenedor.innerHTML = ajax.responseText;
            console.log(ajax.responseText)
        }
    }
    ajax.setRequestHeader("Content-Type", "text/html; charset=utf8"); 

    ajax.send();
}

function registrarUsuario() {
    var formulario = document.getElementById('formUsuario');
    var datos = new FormData(formulario);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', './config/crearUsuario.php', true);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            alert(ajax.responseText); // Puedes modificar esta parte para manejar la respuesta como desees
            cargarContenido('usuariosRead.php')
        }
    }

    ajax.send(datos);
}

function editarAlumno(id)
{
    cargarContenido('form_update_alumnos.php?id='+id)
}
function update()
{
    var contenedor = document.getElementById('container');
    var formulario = document.getElementById("form-alumno");
    var parametros = new FormData(formulario);

    var ajax = new XMLHttpRequest() //crea el objetov ajax 
    ajax.open("post", 'update.php' , true);

    ajax.onreadystatechange = function ( ) {
        if (ajax.readyState == 4) {
            contenedor.innerHTML = ajax.responseText;
            cargarContenido('read.php')
        }
    }

    ajax.send(parametros );    
}

function deleteAlumno(id)
{
    cargarContenido('delete.php?id='+id)
}
