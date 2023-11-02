class Usuario {
    constructor(id, nombre, apellido, clave, email, rol) {
        this.id = id;
        this.nombre = nombre;
        this.apellido = apellido;
        this.clave = clave;
        this.email = email;
        this.rol = rol;
    }
    toString() {
        return this.nombre;
    }
    getRol() {
        return this.rol;
    }
}
class ControlUsuario {
    constructor() {
        this.listaUsuario = [];
    }
    adicionar_Usuario(usuario) {
        this.listaUsuario.push(usuario);
    }
    verUsuarios() {
        console.log(this.listaUsuario);
    }
    obtenerListaUsuarios() {
        return this.listaUsuario;
    }
}
let controlUsuario = new ControlUsuario();
function rellenar_usuarios() {
    let usuarios = [
        [0, "Mauricio", "Flores Garzofino", "b805", "Mauricio@gmail.com", "admin"],
        [1, "Erick", "Vallejos", "b821", "Erick@gmail.com", "user"],
        [2, "Diana", "Vargas", "ca241", "Diana@gmail.com", "user"],
        [3, "Carlos", "Castro", "ve1232", "Carlos@gmail.com", "user"],
        [4, "Matias", "Misori", "m23s", "Matias@gmail.com", "user"],
        [5, "Daniela", "Montalvo", "dam23", "Daniela@gmail.com", "admin"],
        [6, "Esteban", "Alvarado", "es19a", "Esteban@gmail.com", "user"]
    ];
    console.log(usuarios);
    for (let i = 0; i < usuarios.length; i++) {
        let user = new Usuario(
            usuarios[i][0], //Va agregando la información columna por columna
            usuarios[i][1],
            usuarios[i][2],
            usuarios[i][3],
            usuarios[i][4],
            usuarios[i][5]
        );
        controlUsuario.adicionar_Usuario(user);
    }
}
rellenar_usuarios();