$(document).ready(function(){
  $('.select2modal').select2({
      dropdownParent: $('#detailOrderModal')
  });
  $('.select2addmodal').select2({
      dropdownParent: $('#addOrderModal')
  });
  getOrder();
  $.fn.dataTable.ext.errMode = 'none';
  
});



function confirm(){
  var url;
  var id = $('#id').val();
  if($('#statusId').val()==2){
    url="api/order/confirmPayment";
  } else if ($('#statusId').val()==3 && $('#awb').val()!= "" ){
    url="api/order/confirmDelivery";
  } else if ($('#statusId').val()==3 && $('#awb').val()== "" ){
    notify('fas fa-times', 'Gagal', "Mohon isi nomor resi terlebih dahulu", 'danger');
    return;
  } else {
    notify('fas fa-times', 'Gagal', "Tidak ada yang perlu dikonfirmasi", 'danger');    
    return;
  }
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
       id : id,
    },
    url: url,
    success: function(result) {
      $("#detailOrderModal").modal('hide');
      getOrder();      
    },
    error: function(result) {
      console.log(result);
      notify('fas fa-times', 'Gagal', getErrorMsg(result.responseText), 'danger');
    }
  });
}

function detailOrderForm(id) {
  $("#detailOrderModal").modal('show');
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
       id : id,
    },
    url: "api/order/readDetail",
    success: function(result) {
      console.log(result);
      var html = '';
      var position ;
      $('#example').DataTable( {
        "serverSide" : true,
        "ajax": {
          'url' : 'api/order/readDetail/'+id,
          'type' : 'post',
        },
        "columns": [
          { "data": "product",},
          { "data": "price" },
          { "data": "qty" },
          { "data": "total" }
        ]
      });
      $('#id').val(result.order.id);
      $('#awb').val(result.order.awb);
      $('#address').val(result.order.address);
      $('#name').val(result.order.name);
      $('#date').val(result.order.date);
      $('#statusId').val(result.order.statusId);
      $('#image').attr('src',result.order.image);
      $('#subtotal').val(result.order.subtotal);
      result.log.forEach(log => {
        if(log.roleId != 1){
          position = 'timeline-inverted';
        } else {
          postition = 'timeline';
        }
        html = 
        '<li class="'+position+'">' +
          '<div class="timeline-badge primary"><i class="flaticon-plus"></i></div>' +
          '<div class="timeline-panel">' + 
            '<div class="timeline-heading">' +
              '<h4 class="timeline-title">'+log.status+'</h4>' +
//              '<p><small class="text-muted">'+log.description+'</small></p>' +
            '</div>' +
            '<div class="timeline-body">' +
              '<p> '+log.description+'</p>' +
            '</div>' +
          '</div>' + 
        '</li>' + 
        html;
      });
      $('#timelineList').html(html);

     
    },
    error: function(result) {
      console.log(result);
      notify('fas fa-times', 'Gagal', getErrorMsg(result.responseText), 'danger');
    }
  });
}

$("#keyword").on('change', function(){
  getOrder();
  $("#keyword").val();
})


function getErrorMsg(result){
  var responseInArray = result.split('\n');
  for(var i=0; i < responseInArray.length; i++) {
    responseInArray[i] = responseInArray[i].replace(/ +(?= )/g,'');
    responseInArray[i] = responseInArray[i].replace('\t','');
    responseInArray[i] = responseInArray[i].replace('\t','');
    responseInArray[i] = responseInArray[i].replace('<h1>','');
    responseInArray[i] = responseInArray[i].replace('</h1>','');
    responseInArray[i] = responseInArray[i].replace('<div>','');
    responseInArray[i] = responseInArray[i].replace('</div>','');
    responseInArray[i] = responseInArray[i].replace('<p>','');
    responseInArray[i] = responseInArray[i].replace('</p>','');
    responseInArray[i] = responseInArray[i].replace('<p>','');
    responseInArray[i] = responseInArray[i].replace('</p>','');
    responseInArray[i] = responseInArray[i].replace('<p>','');
    responseInArray[i] = responseInArray[i].replace('</p>','');
    responseInArray[i] = responseInArray[i].replace('<p>','');
    responseInArray[i] = responseInArray[i].replace('</p>','');
    responseInArray[i] = responseInArray[i].replace('<p>','');
    responseInArray[i] = responseInArray[i].replace('</p>','');
   }

   var error = responseInArray.filter(x => (x.includes("Message")));
   if(error.length == 0){
     error = responseInArray.filter(x => (x.includes("Error ")));
   }
  return error.toString();  
}

function getOrder(){
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
       keyword : $("#keyword").val(),
    },
    url: "api/order/read",
    success: function(result) {
      console.log(result);
      var html = "";
      var color = "";
      result.order.forEach(order => {
          
          if(order.statusId==1){
            color = 'grey';
          } else if(order.statusId==2){
            color = 'danger';
          } else if(order.statusId==3){
            color = 'warning';
          } else if(order.statusId==4){
            color = 'success';
          }

          html = html +
          '<div class="col-sm-6 col-md-3" onclick="detailOrderForm('+order.id+')">' +
            '<div class="card card-stats card-'+color+' card-round">' +
                '<div class="card-body">' +
                  '<div class="row">' +
                    '<div class="col-12 col-stats">' +
                      '<div class="numbers">' +
                        '<p class="card-category">'+order.status+'</p>' +
                        '<p class="card-category">'+order.date+'</p>' +
                        '<h4 class="card-title">' + uppercase(order.name) +'</h4>' +
                      '</div>' +
                    '</div>' +
                  '</div>' +
                '</div>' +
              '</div>' +
            '</div>';             
      });

      $('#orderList').html(html);
    },
    error: function(result) {
      console.log(result);
      notify('fas fa-times', 'Gagal', getErrorMsg(result.responseText), 'danger');
    }
  });

}

function uppercase(string){
  return string.charAt(0).toUpperCase() + string.slice(1);
}


function unauthorized() {
  notify('fas fa-user', 'Tidak diijinkan', 'Anda tidak memiliki hak akses untuk mengedit kolom ini', 'danger');
}
