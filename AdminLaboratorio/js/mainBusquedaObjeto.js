$(buscarDatos());

function buscarDatos(consulta) {
  $.ajax({
      url: '../php/buscarObjeto.php',
      type: 'POST',
      dataType: 'html',
      data: {
        consulta: consulta
      },
    })
    .done(function(respuesta) {
      $('#datos').html(respuesta);
    })
}

$(document).on('keyup', '#caja_busqueda', function() {
  var valor = $(this).val();
  console.log(valor);
  if (valor != "") {
    buscarDatos(valor);
  } else {
    buscarDatos();
  }
})