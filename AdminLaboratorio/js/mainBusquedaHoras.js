$(buscarDatos());

function buscarDatos(consulta) {
  $.ajax({
      url: '../php/buscarHoras.php',
      type: 'POST',
      dataType: 'html',
      data: {
        consulta: consulta
      },
    })
    .done(function(respuesta) {
      $('#datos_horas').html(respuesta);
    })
}

$(document).on('keyup', '#caja_busqueda_horas', function() {
  var valor = $(this).val();
  console.log(valor);
  if (valor != "") {
    buscarDatos(valor);
  } else {
    buscarDatos();
  }
})