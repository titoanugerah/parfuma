$(document).ready(function(){
    $('.select2modal').select2({
        dropdownParent: $('#detailOrderModal')
    });
    $('.select2addmodal').select2({
        dropdownParent: $('#addOrderModal')
    });
    getOrder();
    getStock();
    getReportChart();
    $.fn.dataTable.ext.errMode = 'none';
    
  });
  
  $("#keyword").on('change', function() {
    notify('fas fa-user', 'Memproses', "Mencari data terkait", 'warning');
    getStock();
    getOrder();
    $('#example').data.reload();
    $('#example1').data.reload();
    notify('fas fa-user', 'Selesai', "Data berhasil dicari", 'success');
  });
  


function getStock(){
  $('#example').DataTable( {
    "serverSide" : true,
    "dom": 'Bfrtip',
    "searching": false,

    "buttons": ['copy', 'csv', 'excel', 'pdf', 'print'] ,

    "ajax": {
    'url' : 'api/stock/read',
      'type' : 'post',
    },
    "columns": [
      { "data": "id",},
      { "data": "name",},
      { "data": "qty" },
    ]
  });
}


function getOrder(){
  $('#example1').DataTable( {
    "serverSide" : true,
    "dom": 'Bfrtip',
    "searching": false,
    "buttons": ['copy', 'csv', 'excel', 'pdf', 'print'] ,

    "ajax": {
    'url' : 'api/report/read',
      'type' : 'post',
    },
    "columns": [
      { "data": "date",},
      { "data": "product",},
      { "data": "qty" }
    ]
  });
}


function getReportChart() {
  $("#detailProduct").modal('hide');
  $.ajax({
    type: "POST",
    dataType : "JSON",
    url: "api/report/chart",
    success: function(result) {
      console.log(result);
      var dataChart= [];
      var chart;
      var dataChart1= [];
      var chart1;
      result.stock.forEach(function(data){
        chart = {
          name:data.name,
          y: parseInt(data.y)
        }
          dataChart.push(chart); 
      });
      console.log(dataChart);
      result.order.forEach(function(data){
        chart1 = {
          name:data.name,
          y: parseInt(data.y)
        }
          dataChart1.push(chart1); 
      });
      console.log(dataChart1);

      Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Penjualan Produk'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Produk',
            colorByPoint: true,
            data : dataChart
         }]
      });


        //
        Highcharts.chart('container1', {
          chart: {
              type: 'column'
          },
          title: {
              text: 'Grafik penjualan per hari'
          },
          xAxis: {
              type: 'category',
              labels: {
                  rotation: -45,
                  style: {
                      fontSize: '13px',
                      fontFamily: 'Verdana, sans-serif'
                  }
              }
          },
          yAxis: {
              min: 0,
              title: {
                  text: 'Keuntungan (Rp.)'
              }
          },
          legend: {
              enabled: false
          },
          tooltip: {
              pointFormat: 'Keuntungan <b>Rp.{point.y:.1f} </b>'
          },
          series: [{
              name: 'Population',
              data: dataChart1,
              dataLabels: {
                  enabled: true,
                  rotation: -90,
                  color: '#FFFFFF',
                  align: 'right',
                  format: '{point.y:.1f}', // one decimal
                  y: 10, // 10 pixels down from the top
                  style: {
                      fontSize: '13px',
                      fontFamily: 'Verdana, sans-serif'
                  }
              }
          }]
      });

    },
    error: function(result) {
      console.log(result);
      notify('fas fa-times', 'Gagal', getErrorMsg(result.responseText), 'danger');
    }
  });
}
