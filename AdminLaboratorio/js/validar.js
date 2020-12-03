function validar() {
  var nombre, codigo, genero, programa, cargo, tiempo, email, expresion, materia;
  nombre = document.getElementById('name').value;
  codigo = document.getElementById('codigo').value;
  genero = document.getElementById('genero').value;
  programa = document.getElementById('programa').value;
  cargo = document.getElementById('cargo').value;
  tiempo = document.getElementById('horas').value;
  email = document.getElementById('email').value;
  materia = document.getElementById('materia').value;
  expresion = /\w+@\w+\.+[a-z]/;

  if (nombre === "") {
    alert("El campo nombre está vacío");
    return false;
  } else if (codigo === "") {
    alert("El campo código está vacío");
    return false;
  } else if (email === "") {
    alert("El campo correo electronico está vacío");
    return false;
  } else if (genero === "---Género---") {
    alert("No ha escogido un género");
    return false;
  } else if (programa === "---Programa---") {
    alert("No ha escogido un programa");
    return false;
  } else if (cargo === "---Cargo---") {
    alert("No ha escogido un cargo");
    return false;
  } else if (tiempo === "---Tiempo de uso---") {
    alert("No ha escogido un tiempo de uso");
    return false;
  } else if (materia === "---Materia---") {
    alert("No ha escogido una materia");
    return false;
  } else if (isNaN(codigo)) {
    alert("No es un codigo valido");
    return false;
  } else if (!expresion.test(email)) {
    alert("No es un correo valido");
    return false;
  }
}

function validarCodigoAsistente() {
  var codigo = document.getElementById('codigo').value;
  if (codigo === "") {
    alert("No ha llenado el campo");
    return false;
  } else if (isNaN(codigo)) {
    alert("El campo código debe ser un número");
    return false;
  }
}

function validarAsistenciaSencilla() {
  var codigo, tiempo, materia;
  codigo = document.getElementById('codigo').value;
  tiempo = document.getElementById('horas').value;
  materia = document.getElementById('materia').value;
  if (codigo === "") {
    alert("El campo código está vacío");
    return false;
  } else if (tiempo === "---Tiempo de uso---") {
    alert("No ha escogido un tiempo de uso");
    return false;
  } else if (materia === "---Materia---") {
    alert("No ha escogido una materia");
    return false;
  }
}

function validarReserva() {

  var name, codigo, genero, programa, fecha, horaIn, horaFin, email, materia;
  name = document.getElementById('name').value;
  codigo = document.getElementById('codigo').value;
  genero = document.getElementById('genero').value;
  fecha = document.getElementById('fecha').value;
  horaIn = document.getElementById('horaIn').value;
  horaFin = document.getElementById('horaFin').value;
  email = document.getElementById('email').value;
  programa = document.getElementById('programa').value;
  materia = document.getElementById('materia').value;
  expresion = /\w+@\w+\.+[a-z]/;
  if (name === "") {
    alert("El campo nombre está vacío");
    return false;
  } else if (codigo === "") {
    alert("El campo código está vacío");
    return false;
  } else if (email === "") {
    alert("El campo correo electronico está vacío");
    return false;
  } else if (genero === "---Género---") {
    alert("No ha escogido un género");
    return false;
  } else if (programa === "---Programa---") {
    alert("No ha escogido un programa");
    return false;
  } else if (horaIn === "") {
    alert("No ha ingresado una hora de inicio");
    return false;
  } else if (horaFin === "") {
    alert("No ha ingresado una hora de fin");
    return false;
  } else if (materia === "---Materia---") {
    alert("No ha escogido una materia");
    return false;
  } else if (isNaN(codigo)) {
    alert("El campo debe ser un número");
    return false;
  } else if (!expresion.test(email)) {
    alert("No es un correo valido");
    return false;
  }
}

function validarReservaSencilla() {
  var codigo, fecha, horaIn, horaFin, materia;
  codigo = document.getElementById('codigo').value;
  fecha = document.getElementById('fecha').value;
  horaIn = document.getElementById('horaIn').value;
  horaFin = document.getElementById('horaFin').value;
  materia = document.getElementById('materia').value;
  if (codigo === "") {
    alert("El campo código está vacío");
    return false;
  } else if (horaIn === "") {
    alert("No ha ingresado una hora de inicio");
    return false;
  } else if (horaFin === "") {
    alert("No ha ingresado una hora de fin");
    return false;
  } else if (materia === "---Materia---") {
    alert("No ha escogido una materia");
    return false;
  } else if (isNaN(codigo)) {
    alert("El campo debe ser un número");
    return false;
  }
}

function validarComentario() {
  var tipo, texto;
  tipo = document.getElementById('tipo').value;
  texto = document.getElementById('texto').value;
  if (tipo === "Seleccione una opción") {
    alert("No ha seleccionado una opción");
    return false;
  } else if (texto === "") {
    alert("No ha escrito nada");
    return false;
  }

}

function validarLogin() {
  var codigo, pass;
  codigo = document.getElementById('codigo').value;
  pass = document.getElementById('pass').value;
  if (codigo === "") {
    alert("No ha puesto un código");
    return false;
  } else if (pass === "") {
    alert("No ha puesto una contraseña");
    return false;
  }
}

function validarIngresoObjeto() {
  var nombre = document.getElementById('nombre').value;
  if (nombre === "") {
    alert("Debe llenar el campo nombre");
    return false;
  }
}

function validarMateria() {
  var materia = document.getElementById('materia').value;
  if (materia === "") {
    alert("Debe llenar el campo materia");
    return false;
  }
}

function validarCargo() {
  var cargo = document.getElementById('cargo').value;
  if (cargo === "") {
    alert("Debe llenar el campo cargo");
    return false;
  }
}

function validarPrograma() {
  var programa = document.getElementById('programa').value;
  if (programa === "") {
    alert("Debe llenar el campo programa");
    return false;
  }
}

function validarGestor() {
  var codigo = document.getElementById('codigo').value;
  var nombre = document.getElementById('nombre').value;
  var contrasena = document.getElementById('contrasena').value;
  var vericontrasena = document.getElementById('vericontrasena').value;
  var telefono = document.getElementById('telefono').value;
  var cargo = document.getElementById('cargo').value;
  var email = document.getElementById('email').value;
  expresion = /\w+@\w+\.+[a-z]/;
  if (codigo === "") {
    alert("Debe digitar su codigo");
    return false;
  } else if (nombre === "") {
    alert("Debe digitar su nombre");
    return false;
  } else if (contrasena === "") {
    alert("Debe digitar la contraseña");
    return false;
  } else if (vericontrasena === "") {
    alert("Debe digitar la verificación de la contraseña");
    return false;
  } else if (telefono === "") {
    alert("Debe digitar su telefono");
    return false;
  } else if (cargo == "---Cargo---") {
    alert("Debe elegir un cargo");
    return false;
  } else if (contrasena != vericontrasena) {
    alert("Las contraseñas no son iguales, verifique esto");
    return false;
  } else if (!expresion.test(email)) {
    alert("No es un correo valido");
    return false;
  }
}

function validarHorasMonitor() {
  var codigo = document.getElementById('codigo').value;
  var horaInicio = document.getElementById('horaInicio').value;
  var horaFin = document.getElementById('horaFin').value;
  if (codigo === "") {
    alert("Debe insertar su código");
    return false;
  } else if (horaInicio === "") {
    alert("Debe insertar la hora de inicio");
    return false;
  } else if (horaFin === "") {
    alert("Debe insertar la hora de fin");
    return false;
  }
}