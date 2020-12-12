$(document).ready(function(){
  $('.select2modal').select2({
      dropdownParent: $('#detailReportModal')
  });
  $('.select2addmodal').select2({
      dropdownParent: $('#addReportModal')
  });
  getReport();
});

function detailReportForm(id) {
  $("#detailReportModal").modal('show');
  $.ajax({
    type: "POST",
    dataType : "JSON",
    data : {
       id : id,
    },
    url: "api/report/readDetail",
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
  getReport();
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

function getReport(){
  $('#example').DataTable( {
    "serverSide" : true,
    "order": [[ 0, "desc" ]],
    "dom": 'Bfrtip',
    "buttons": ['copy', 'csv', 'excel', 'pdf', 'print'] ,
    "ajax": {
      'url' : 'api/report/read/',
      'type' : 'post',
    },
    "columns": [
      { "data": "date",},
      { "data": "product" },
      { "data": "price" },
      { "data": "qty" },
      { "data": "total" }
    ]
  });

}



function uppercase(string){
  return string.charAt(0).toUpperCase() + string.slice(1);
}


function unauthorized() {
  notify('fas fa-user', 'Tidak diijinkan', 'Anda tidak memiliki hak akses untuk mengedit kolom ini', 'danger');
}
