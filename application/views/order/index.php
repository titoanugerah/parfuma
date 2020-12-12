<div class="panel-header bg-primary-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold" >Penjualan</h2>
      </div>
      <div class="ml-md-auto py-2 py-md-0">
        <a href="#" class="btn btn-white btn-border btn-round mr-2" hidden>Manage</a>
      </div>
    </div>
  </div>
</div>

<div class="page-inner mt--5" >
  <div class="row mt--2" id="orderList">

  </div>
</div>


<div class="modal fade" id="detailOrderModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Detail Stok</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" style="overflow-y: scroll;height:300px;">        
        <input type="text" class="form-control" id="id" hidden>
        <input type="text" class="form-control" id="statusId" hidden>
        <ul class="wizard-menu nav nav-pills nav-primary">
          <li class="step" style="width: 33%;">
            <a class="nav-link active" href="#detail" data-toggle="tab" aria-expanded="true"><i class="fa fa-list mr-0"></i>Detail</a>
          </li>
          <li class="step" style="width: 33%;">
            <a class="nav-link" href="#shop" data-toggle="tab"><i class="fas fa-shopping-cart mr-2"></i> Belanjaan </a>
          </li>
          <li class="step" style="width: 33%;">
            <a class="nav-link" href="#log" data-toggle="tab"><i class="fas fa-history mr-2"></i> Log</a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active " id="detail">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Pelanggan</label>
                  <input type="text" class="form-control" id="name" >
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="text" class="form-control" id="date">
                </div>
                <div class="form-group">
                  <label>Subtotal</label>
                  <input type="text" class="form-control" id="subtotal">
                </div>
                <div class="form-group">
                  <label>Nomor Resi</label>
                  <input type="text" class="form-control" id="awb">
                </div>

              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Foto Pelanggan</label>
                  <img class="card-img-top rounded" src="" style="max-height:200px;" id="image">
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <textarea type="text" class="form-control" id="address"></textarea>
                </div>
              </div>    
            </div>    
          </div>
          <div class="tab-pane" id="shop">
            <table id="example" class="display" style="width:100%">
              <thead>
                <tr>
                  <th>product</th>
                  <th>price</th>
                  <th>qty</th>
                  <th>total</th>
                </tr>
              </thead>              
            </table>
          </div>        
          <div class="tab-pane" id="log">
            <ul class="timeline" id='timelineList'>

            </ul>
          </div>        
          
        </div>        

      </div>        
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="confirmPaymentBtn" onclick="confirm()" >Konfirmasi </button>
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Kembali</button>
      </div>
    </div>
  </div>
</div>
