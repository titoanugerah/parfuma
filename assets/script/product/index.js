
$(document).ready(function() {
  $('.select2basic').select2();
  $('#table1').DataTable();
  GetProduct();
});

$("#keyword").on('change', function() {
  notify('fas fa-user', 'Memproses', "Mencari data terkait", 'warning');
  GetProduct();
  notify('fas fa-user', 'Selesai', "Data berhasil dicari", 'success');
});

function GetDetailProduct(id) {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data: {id: id},
    url: "api/product/readDetail",
    success: function(result) {
      console.log(result);
      $("#detailProduct").modal('show');
      $('#editNameProduct').val(result.detail.name);
      $('#editPriceProduct').val(result.detail.price);
      $('#editIdProduct').val(result.detail.id);
      $('#editDescriptionProduct').val(result.detail.description);
      $('#editImageProduct').attr('src','assets/picture/'+result.detail.image);
      var html;
      // for(i=0; i<result.product.length; i++){
      //   html +=
      //   '<tr>'+
      //   '<td>'+result.product[i].Name+'</td>'+
      //   '</tr>';
      // }
      // $('#productTableList').html(html);
    },
    error: function(result) {
      notify('fas fa-times', 'Gagal', getErrorMsg(result.responseText), 'danger');
    }
  });
}


function UpdateProduct() {
  $("#detailProduct").modal('hide');
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
      id: $('#editIdProduct').val(),
      name: $('#editNameProduct').val(),
      description : $('#editDescriptionProduct').val(),
      price : $('#editPriceProduct').val(),
    },
    url: "api/product/update",
    success: function(result) {
      GetProduct();
      if($('#fileUpload1').val()!=''){
        UploadFile('1',$('#editIdProduct').val());
      }
      notify('fa fa-user', "Berhasil", result.content, "Success");
    },
    error: function(result) {
      console.log(result);
      notify('fas fa-times', 'Gagal', getErrorMsg(result.responseText), 'danger');
    }
  });
}

function UploadFile(type, id) {
  var fd = new FormData();
  var files = $('#fileUpload'+type)[0].files[0];
  fd.append('file',files);
  $.ajax({
    url: 'api/product/upload/'+id,
    type: 'post',
    data: fd,
    contentType: false,
    processData: false,
    success: function(response){
      console.log('success', response);
      GetProduct()
    },
    error: function(result){
      console.log('error', result);
      notify('fas fa-times', 'Gagal', getErrorMsg(result.responseText), 'danger');
    }
  });
}

function ProceedAddProduct() {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    url: "api/product/create",
    data : {
      name : $("#addNameProduct").val(),
      description : $("#addDescriptionProduct").val(),
      price : $("#addPriceProduct").val()
    },
    success: function(result) {
      UploadFile('',result.id);
      $("#addProduct").modal('hide');
      notify('fa fa-user', "Berhasil", result.content, "Success");
    },
    error: function(result) {
      console.log(result);
      notify('fas fa-times', 'Gagal', getErrorMsg(result.responseText), 'danger');
    }
  });
}

function ProceedDeleteProduct(){
  $("#detailProduct").modal('hide');
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
      id: $('#editIdProduct').val()
    },
    url: "api/product/delete",
    success: function(result) {
      GetProduct();
      notify('fa fa-user', "Berhasil", result.content, "success");
    },
    error: function(result) {
      console.log(result);
      notify('fas fa-times', 'Gagal', getErrorMsg(result.responseText), 'danger');
    }
  });
}


function ProceedRecoverProduct(){
  $("#addProduct").modal('hide');
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
      id: $('#idRecoverProduct').val()
    },
    url: "api/product/recover",
    success: function(result) {
      GetProduct();
      notify('fa fa-user', "Berhasil", result.content, "success");
    },
    error: function(result) {
      console.log(result);
      notify('fas fa-times', 'Gagal', getErrorMsg(result.responseText), 'danger');
    }
  });
}

function GetProduct() {
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
      keyword : $("#keyword").val(),
    },
    url: "api/product/read",
    success: function(result) {
      var html='';
      var html2 = '';
      for(i=0; i<result.product.length; i++){
        if (result.product[i].isExist==1) {
          html +=
          '<div class="col-sm-6 col-lg-3">' +
          '<div class="card">' +
          '<div class="p-2">' +
          '<img class="card-img-top rounded" src="assets/picture/'+result.product[i].image+'">' +
          '</div>' +
          '<div class="card-body pt-2">' +
          '<h4 class="mb-1 fw-bold">' +
          result.product[i].name +
          '</h4>' +
          '<br>' +
          '<center>' +
          '<button type="button" class="btn btn-secondary btn-round" onclick="GetDetailProduct('+result.product[i].id+')">Detail</button>'+
          '</center>' +
          '</div>' +
          '</div>' +
          '</div>';
        } else {
          html2 = html2 + '<option value="'+result.product[i].id+'">'+result.product[i].name+'</option>';
        }        
      }
      $('#idRecoverProduct').html(html2);
      $('#productList').html(html);
    },
    error: function(result) {
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