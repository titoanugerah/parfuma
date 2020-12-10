$(document).ready(function(){
  $('.select2modal').select2({
      dropdownParent: $('#detailStockModal')
  });
  $('.select2addmodal').select2({
      dropdownParent: $('#addStockModal')
  });
  getStock();
});

function detailStockForm(id) {
  $("#detailStockModal").modal('show');
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
       id : id,
    },
    url: "api/stock/readDetail",
    success: function(result) {
      console.log(result);
      var html = '';
      result.detail.forEach(function(data){
      html = 
      '<li class="'+data.position+'">' +
        '<div class="timeline-badge '+data.color+'"><i class="flaticon-'+data.icon+'"></i></div>' +
        '<div class="timeline-panel">' + 
          '<div class="timeline-heading">' +
            '<h4 class="timeline-title">'+data.content+' '+data.qty+'</h4>' +
            '<p><small class="text-muted">'+data.date+'</small></p>' +
          '</div>' +
          '<div class="timeline-body">' +
            '<p> '+data.name+'</p>' +
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
  getStock();
  $("#keyword").val();
})

function addNewStockForm() {
  $('#keyword').val("");
  getProduct();
  $("#addStockModal").modal('show');
}

function addStock() {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
       name : $("#addName").val(),
    },
    url: "api/stock/create",
    success: function(result) {
      $("#addStockModal").modal('hide');
      notify('fas fa-check', 'Berhasil', result.content, 'success');
      getStock();
    },
    error: function(result) {
      console.log(result);
      notify('fas fa-times', 'Gagal', getErrorMsg(result.responseText), 'danger');
    }
  });
}

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

function getStock(){
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
       keyword : $("#keyword").val(),
    },
    url: "api/stock/read",
    success: function(result) {
      var html = "";
      var color = "";
      result.stock.forEach(stock => {
        if(stock.isExist == 1){
          
          if(stock.qty>=5){
            color = 'info';
          } else if(stock.qty>1 && stock.qty<5){
            color = 'warning';
          } else {
            color = 'danger';
          }

          html = html +
          '<div class="col-sm-6 col-md-4" onclick="detailStockForm('+stock.id+')">' +
            '<div class="card card-stats card-'+color+' card-round">' +
                '<div class="card-body">' +
                  '<div class="row">' +
                    '<div class="col-3">' +
                      '<div class="icon-big text-center">' +
                        stock.qty +
                      '</div>' +
                    '</div>' +
                    '<div class="col-7 col-stats">' +
                      '<div class="numbers">' +
                        '<p class="card-category">Stok</p>' +
                        '<h4 class="card-title">' + uppercase(stock.name) +'</h4>' +
                      '</div>' +
                    '</div>' +
                  '</div>' +
                '</div>' +
              '</div>' +
            '</div>';             
        } 
      });

      $('#stockList').html(html);
    },
    error: function(result) {
      console.log(result);
      notify('fas fa-times', 'Gagal', getErrorMsg(result.responseText), 'danger');
    }
  });

}

function getProduct(){
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
//       keyword : $("#keyword").val(),
    },
    url: "api/product/read",
    success: function(result) {
      var html = "";
      var color = "";
      result.stock.forEach(stock => {          
          html = html +
          '<div class="col-sm-6 col-md-4" onclick="detailStockForm('+stock.id+')">' +
            '<div class="card card-stats card-'+color+' card-round">' +
                '<div class="card-body">' +
                  '<div class="row">' +
                    '<div class="col-3">' +
                      '<div class="icon-big text-center">' +
                        stock.qty +
                      '</div>' +
                    '</div>' +
                    '<div class="col-7 col-stats">' +
                      '<div class="numbers">' +
                        '<p class="card-category">Stok</p>' +
                        '<h4 class="card-title">' + uppercase(stock.name) +'</h4>' +
                      '</div>' +
                    '</div>' +
                  '</div>' +
                '</div>' +
              '</div>' +
            '</div>';             
        
      });

      $('#stockList').html(html);
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

function deleteStock() {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
       id : $("#editId").val(),
    },
    url: "api/stock/delete",
    success: function(result) {
      $("#detailStockModal").modal('hide');
      notify('fas fa-check', 'Berhasil', result.content, 'success');
      getStock();
    },
    error: function(result) {
      console.log(result);
       notify('fas fa-times', 'Gagal', getErrorMsg(result.responseText), 'danger');
    }
  });
}

function recoverStock() {
  if($('#recoverStockId').val()!=0)
  {
    $.ajax({
      type: "POST",
      dataType : "JSON",
      data : {
        id : $("#recoverStockId").val(),
      },
      url: "api/stock/recover",
      success: function(result) {
        $("#addStockModal").modal('hide');
        notify('fas fa-check', 'Berhasil', result.content, 'success');
        getStock();
      },
      error: function(result) {
        notify('fas fa-times', 'Gagal', getErrorMsg(result.responseText), 'danger');
      }
    });

  } else {
    notify('fas fa-bell', 'Gagal', 'Mohon pilih dengan benar', 'danger');
  }
}

function unauthorized() {
  notify('fas fa-user', 'Tidak diijinkan', 'Anda tidak memiliki hak akses untuk mengedit kolom ini', 'danger');
}
