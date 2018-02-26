$(document).ready(function() {
  /* Change password validation*/
  $("#chgpwdtrigger").click(function(){

    var $oldpassword = $("#oldpassword").val();
    var $newpassword = $("#newpassword").val();
    var $confirmpassword = $("#confirmpassword").val();
    var $user = $("#userId").val();

    if($oldpassword == "" || $newpassword == "" || $confirmpassword == "") {
      Materialize.toast("Todos los campos son obligatorios",4000,"rounded red");
    }
    else if ($newpassword != $confirmpassword) {
      Materialize.toast("Las contraseñas deben coincidir",4000,"rounded red");
    }
    else
      $.ajax({
        type: 'GET',
        url: APP_URL + "/changePassword/" + $user + "/" + $oldpassword + "/" + $newpassword
      }).done(function($data){
        
        if($data=="ACK") {
          Materialize.toast("Se actualizó la contraseña satisfactoriamente",4000,"rounded green");
          $('#modal1').closeModal();
        }
        else
          Materialize.toast("Contraseña Anterior Inválida",4000,"red");
      });
  });

  $(".triggerButton").click(function(event){
    /*console.log(event);
    //sleep(50000);*/
    //console.log("adad");
    $(this).addClass("disabled");
    $("#statusBar").removeClass("hide");
    //$("#modalTriggeredByButton").openModal();
  });

  $(".clickable-row").click(function(e) {
         window.document.location = $(this).data("href");
    });

/************************ CARNE COMPRA***************/
/*guarda Formulario de Compra de Carne*/
  $("#formCarneCompra").submit(function(e){
    e.isDefaultPrevented();
    e.preventDefault();
    $.ajax({
      url: APP_URL + '/saveFormularioDetalle',
      type:'POST',
      data: $(this).serialize(),
      dataType: 'html'})
    .done(function(data){
      //console.log("hecho");
      $("#formCarneCompra").trigger('reset');
      var json = JSON.parse(data);
      Materialize.toast(json.message, 8000,"green lighten-1");
      $("#modal1").closeModal();
      //console.log(json.Fecha);
      //console.log(data['Fecha']);
      newRow='<tr class="optionableForm"  data-href="#" data-id="'+json.data.id+'"><td>' +json.data.Fecha+ '</td><td>' +json.data.NombreProveedor+ '</td><td>' +json.data.Charque+ '</td><td>' +json.data.CarnePrimera+ '</td><td>' +json.data.CarneSegunda+ '</td><td>' +json.data.TotalCarne+ '</td><td>' +json.data.Precio+ '</td><td>' +json.data.Documento+ '</td><td>' +json.data.Observaciones+ '</td>';
      newRow+='<td><a class="ajaxDeletable btn red" href="#" data-id="'+json.data.id+'"><i class="material-icons">delete</i></a> <a class="ajaxEditableCC btn blue" href="#" data-id="'+json.data.id+'"><i class="material-icons">mode_edit</i></a></td></tr>';
      //console.log(newRow);
      $('#tableCompraCarne > tbody:last').append(newRow).animate();
      
    })
    .fail(function(){
      console.log("no hecho");
    });
  });

/*Muestra para edicion formulario CompraCarne*/
$(".ajaxEditableCC").click(function(e){
  $.ajax({
    type : 'GET',
    url : APP_URL + '/formulariodetalle/' + $(this).data("id")
  })
    .done(function(data){
      //console.log(data.message);
      //var item = JSON.parse(data);
      $('#btnUpdateCC').removeClass('hide');
      $('#btnSaveCC').addClass('hide');
      
      $("#Fecha").val(data.data.Fecha);      
      $("#NombreProveedor").val(data.data.NombreProveedor);
      $("label[for='NombreProveedor']").addClass('active');

      $("#Charque").val(data.data.Charque); 
      $("label[for='Charque']").addClass('active');

      $("#CarnePrimera").val(data.data.CarnePrimera);      
      $("label[for='CarnePrimera']").addClass('active');
      
      $("#CarneSegunda").val(data.data.CarneSegunda);      
      $("label[for='CarneSegunda']").addClass('active');
      
      $("#Precio").val(data.data.Precio);      
      $("label[for='Precio']").addClass('active');
      
      $("#Documento").val(data.data.Documento);      
      $("label[for='Documento']").addClass('active');

      $("#Observaciones").val(data.data.Observaciones);      
      $("label[for='Observaciones']").addClass('active');
      
      $("#FormularioDetalle").val(data.data.id);      

      $("#modal1").openModal();
    })
    .fail(function(){
      alert("Error conectando con la aplicacion");
    });

  return false;
});
  /*envia para actualizacion*/
  $("#btnUpdateCC").click(function(e){
    $.ajax({
      url: APP_URL + '/updateFormularioDetalle/' +$("#FormularioDetalle").val(),
      type:'GET',
      data: $("#formCarneCompra").serialize(),
      dataType: 'html'})
    .done(function(json){
      $("#formCarneCompra").trigger('reset');
      var json = JSON.parse(json);
      Materialize.toast(json.message, 8000,"green lighten-1");
      $("#modal1").closeModal();
      $("#tr" + json.data.id).empty()
        .append('<td>' +json.data.Fecha+ '</td>')
        .append('<td>' +json.data.NombreProveedor+ '</td>')
        .append('<td>' +json.data.Charque+ '</td>')
        .append('<td>' +json.data.CarnePrimera+ '</td>')
        .append('<td>' +json.data.CarneSegunda+ '</td>')
        .append('<td>' +json.data.TotalCarne+ '</td>')
        .append('<td>' +json.data.Precio+ '</td>')
        .append('<td>' +json.data.Documento+ '</td>')
        .append('<td>' +json.data.Observaciones+ '</td>')
        .append('<td class="hide"><a class="ajaxDeletable btn red" href="#" data-id="'+json.data.id+'"><i class="material-icons">delete</i></a> <a class="ajaxEditableCC btn blue" href="#" data-id="'+json.data.id+'"><i class="material-icons">mode_edit</i></a></td></tr>');
    })
    .fail(function(){
      console.log("no hecho");
    });
  });

/********************FORMULARIO CARNE VENTA *********************/
$("#formCarneVenta").submit(function(e){
    e.isDefaultPrevented();
    e.preventDefault();
    $.ajax({
      url: APP_URL + '/saveFormularioDetalle',
      type:'POST',
      data: $(this).serialize(),
      dataType: 'html'})
    .done(function(data){
      //console.log("hecho");
      $("#formCarneVenta").trigger('reset');
      var json = JSON.parse(data);
      Materialize.toast(json.message, 8000,"green lighten-1");
      $("#modal1").closeModal();
      newRow='<tr class="optionableForm"  data-href="#" data-id="'+json.data.id+'">';
      newRow+='<td>' +json.data.Fecha+ '</td>';
      newRow+='<td>' +json.data.TipoPlato+ '</td>';
      newRow+='<td>' +json.data.CantidadPlatos+ '</td>';
      newRow+='<td>' +json.data.Charque+ '</td>';
      newRow+='<td>' +json.data.CarnePrimera+ '</td>';
      newRow+='<td>' +json.data.CarneSegunda+ '</td>';
      newRow+='<td>' +json.data.Documento+ '</td>';
      newRow+='<td>' +json.data.Observaciones+ '</td>';
      newRow+='<td class="hide"><a class="ajaxDeletable btn red" href="#" data-id="'+json.data.id+'"><i class="material-icons">delete</i></a>';
      newRow+='<a class="ajaxEditableCV btn blue" href="#" data-id="'+json.data.id+'"><i class="material-icons">mode_edit</i></a></td>';
      newRow+='</tr>';
      $('#tableData > tbody:last').append(newRow).animate();
      
    })
    .fail(function(data){
      Materialize.toast("Error al contactar con servidor", 8000,"red lighten-1");
    });
  });

/*Muestra para edicion formulario CompraCarne*/
$(".ajaxEditableCV").click(function(e){
  $.ajax({
    type : 'GET',
    url : APP_URL + '/formulariodetalle/' + $(this).data("id")
  })
    .done(function(data){
      $('#btnUpdateCV').removeClass('hide');
      $('#btnSaveCV').addClass('hide');
      
      $("#Fecha").val(data.data.Fecha);   

      $("#TipoPlato").val(data.data.TipoPlato);
      $("label[for='TipoPlato']").addClass('active');

      $("#CantidadPlatos").val(data.data.CantidadPlatos); 
      $("label[for='CantidadPlatos']").addClass('active');

      $("#Charque").val(data.data.Charque); 
      $("label[for='Charque']").addClass('active');

      $("#CarnePrimera").val(data.data.CarnePrimera);      
      $("label[for='CarnePrimera']").addClass('active');
      
      $("#CarneSegunda").val(data.data.CarneSegunda);      
      $("label[for='CarneSegunda']").addClass('active');
      
      $("#Documento").val(data.data.Documento);      
      $("label[for='Documento']").addClass('active');

      $("#Observaciones").val(data.data.Observaciones);      
      $("label[for='Observaciones']").addClass('active');
      
      $("#FormularioDetalle").val(data.data.id);      

      $("#modal1").openModal();
    })
    .fail(function(){
      Materialize.toast("Error al contactar con servidor", 8000,"red lighten-1");
    });

  return false;
});

  /*envia para actualizacion*/
  $("#btnUpdateCV").click(function(e){
    $.ajax({
      url: APP_URL + '/updateFormularioDetalle/' +$("#FormularioDetalle").val(),
      type:'GET',
      data: $("#formCarneVenta").serialize(),
      dataType: 'html'})
    .done(function(json){
      $("#formCarneVenta").trigger('reset');
      var json = JSON.parse(json);
      Materialize.toast(json.message, 8000,"green lighten-1");
      $("#modal1").closeModal();
      $("#tr" + json.data.id).empty()
        .append('<td>' +json.data.Fecha+ '</td>')
        .append('<td>' +json.data.TipoPlato+ '</td>')
        .append('<td>' +json.data.CantidadPlatos+ '</td>')
        .append('<td>' +json.data.Charque+ '</td>')
        .append('<td>' +json.data.CarnePrimera+ '</td>')
        .append('<td>' +json.data.CarneSegunda+ '</td>')
        .append('<td>' +json.data.Documento+ '</td>')
        .append('<td>' +json.data.Observaciones+ '</td>')
        .append('<td class="hide"><a class="ajaxDeletable btn red" href="#" data-id="'+json.data.id+'"><i class="material-icons">delete</i></a> <a class="ajaxEditableCV btn blue" href="#" data-id="'+json.data.id+'"><i class="material-icons">mode_edit</i></a></td></tr>');
    })
    .fail(function(){
      console.log("no hecho");
    });
  });

/****************************PRODUCTOS COMPRA VENTA*****************/

$("#formProductoVenta").submit(function(e){
    e.isDefaultPrevented();
    e.preventDefault();
    $.ajax({
      url: APP_URL + '/saveFormularioDetalle',
      type:'POST',
      data: $(this).serialize(),
      dataType: 'html'})
    .done(function(data){
      //console.log("hecho");
      $("#formProductoVenta").trigger('reset');
      var json = JSON.parse(data);
      Materialize.toast(json.message, 8000,"green lighten-1");
      $("#modal1").closeModal();
      /*newRow='<tr class="optionableForm"  data-href="#" data-id="'+json.data.id+'">;<td>' +json.data.Fecha+ '</td>';
      newRow+='<td>' +json.data.NombreProveedor+ '</td>';
      newRow+='<td>' +json.data.Producto+ '</td>';
      newRow+='<td>' +json.data.CantidadProducto+ '</td>';
      newRow+='<td>' +json.data.Precio+ '</td>';
      newRow+='<td>' +json.data.Documento+ '</td>';
      newRow+='<td>' +json.data.Observaciones+ '</td>';
      newRow+='<td class="hide"><a class="ajaxDeletable btn red" href="#" data-id="'+json.data.id+'"><i class="material-icons">delete</i></a>';
      newRow+='<a class="ajaxEditablePV btn blue" href="#" data-id="'+json.data.id+'"><i class="material-icons">mode_edit</i></a></td>';
      newRow+='</tr>';*/

      newRow='<tr class="optionableForm"  data-href="#" data-id="'+json.data.id+'">;<td>' +json.data.Fecha+ '</td><td>' +json.data.NombreProveedor+ '</td><td>' +json.data.Producto+ '</td><td>' +json.data.CantidadProducto+ '</td><td>' +json.data.Precio+ '</td><td>' +json.data.Documento+ '</td><td>' +json.data.Observaciones+ '</td>';
      newRow+='<td class="hide"><a class="ajaxDeletable btn red" href="#" data-id="'+json.data.id+'"><i class="material-icons">delete</i></a><a class="ajaxEditablePV btn blue" href="#" data-id="'+json.data.id+'"><i class="material-icons">mode_edit</i></a></td></tr>';
      $('#tableData > tbody:last').append(newRow).animate();
      
    })
    .fail(function(data){
      Materialize.toast("Error al contactar con servidor", 8000,"red lighten-1");
    });
  });

      

/*Muestra para edicion formulario CompraCarne*/
$(".ajaxEditablePV").click(function(e){
  $.ajax({
    type : 'GET',
    url : APP_URL + '/formulariodetalle/' + $(this).data("id")
  })
    .done(function(data){
      $('#btnUpdatePV').removeClass('hide');
      $('#btnSavePV').addClass('hide');
      
      $("#Fecha").val(data.data.Fecha);   

      $("#NombreProveedor").val(data.data.NombreProveedor);
      $("label[for='NombreProveedor']").addClass('active');

      $("#TipoProducto").val(data.data.TipoProducto); 
      $("label[for='TipoProducto']").addClass('active');

      $("#CantidadProducto").val(data.data.CantidadProducto); 
      $("label[for='CantidadProducto']").addClass('active');

      $("#UnidadMedida").val(data.data.UnidadMedida); 
      $("label[for='UnidadMedida']").addClass('active');

      $("#Precio").val(data.data.Precio);      
      $("label[for='Precio']").addClass('active');
      
      $("#Documento").val(data.data.Documento);      
      $("label[for='Documento']").addClass('active');

      $("#Observaciones").val(data.data.Observaciones);      
      $("label[for='Observaciones']").addClass('active');
      
      $("#FormularioDetalle").val(data.data.id);      

      $("#modal1").openModal();
    })
    .fail(function(){
      Materialize.toast("Error al contactar con servidor", 8000,"red lighten-1");
    });

  return false;
});

  /*envia para actualizacion*/
  $("#btnUpdatePV").click(function(e){
    $.ajax({
      url: APP_URL + '/updateFormularioDetalle/' +$("#FormularioDetalle").val(),
      type:'GET',
      data: $("#formProductoVenta").serialize(),
      dataType: 'html'})
    .done(function(json){
      $("#formCarneVenta").trigger('reset');
      var json = JSON.parse(json);
      //console.log(json.data[0].es_unidad_medida.UnidadMedida);
      Materialize.toast(json.message, 8000,"green lighten-1");
      $("#modal1").closeModal();
      $("#tr" + json.data[0].id).empty()
        .append('<td>' +json.data[0].Fecha+ '</td>')
        .append('<td>' +json.data[0].NombreProveedor+ '</td>')
        .append('<td>' +json.data[0].es_tipo_producto.TipoProducto+ '</td>')
        .append('<td>' +json.data[0].CantidadProducto+ '</td>')
        .append('<td>' +json.data[0].es_unidad_medida.UnidadMedida + '</td>')
        .append('<td>' +json.data[0].Precio+ '</td>')
        .append('<td>' +json.data[0].Documento+ '</td>')
        .append('<td>' +json.data[0].Observaciones+ '</td>')
        .append('<td class="hide"><a class="ajaxDeletable btn red" href="#" data-id="'+json.data.id+'"><i class="material-icons">delete</i></a> <a class="ajaxEditablePV btn blue" href="#" data-id="'+json.data.id+'"><i class="material-icons">mode_edit</i></a></td></tr>');
    })
    .fail(function(){
      console.log("no hecho");
    });
  });




/*muestra boton de editar y eliminar*/
  $(".optionableForm").mouseenter(function(e){
      $(this).children('td').last().removeClass('hide');
  }).mouseleave(function(e){
      $(this).children('td').last().addClass('hide');
  });

  $(".ajaxDeletable").click(function(e) {
        $(this).parent().parent().fadeOut(1500);
        $.ajax({
          type : 'GET',
          url: APP_URL + '/deleteFormularioDetalle/' + $(this).data("id")
        })
        .done(function(data){
          //var json = JSON.parse(data);
          //Materialize.toast(json.message, 8000,"red lighten-1");
          Materialize.toast("Registro eliminado", 8000,"red lighten-1");
        })
        .fail(function(){
          console.log("Fallo");
          });
        return false;
    });

/*cambia estado*/
  $("#formCambiaEstado").submit(function(e){
    e.isDefaultPrevented();
    e.preventDefault();
    $.ajax({
      url: APP_URL + '/cambiaEstadoFormulario',
      type:'POST',
      data: $(this).serialize(),
      dataType: 'html'})
    .done(function(data){
      //console.log("hecho");
      var json = JSON.parse(data);
      if(json.status=='ACK'){
        Materialize.toast(json.message, 8000,"green lighten-1");
        $("#modal1").closeModal();
      }
      else
        Materialize.toast(json.message, 8000,"red lighten-1");
      
      //console.log(newRow);
    })
    .fail(function(){
      console.log("no hecho");
    });
  });
});
