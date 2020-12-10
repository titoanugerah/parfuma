<div class="panel-header bg-primary-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold" >Stok </h2>
      </div>
      <div class="ml-md-auto py-2 py-md-0">
        <a href="#" class="btn btn-white btn-border btn-round mr-2" hidden>Manage</a>
        <button type="button" class="btn btn-white btn-border btn-round mr-2" onclick="addNewStockForm()">Tambah Stok Baru</button>
      </div>
    </div>
  </div>
</div>

<div class="page-inner mt--5" >
  <div class="row mt--2" id="stockList">

  </div>
</div>

<div class="modal fade" id="addStockModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Tambah Stok</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="tab-content">
          <div class="tab-pane active" id="addNewTab">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Produk</label>

                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" onclick="addStock()">Simpan</button>
              <button type="button" data-dismiss="modal" class="btn btn-secondary">Kembali</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="detailStockModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Detail Stok</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" style="overflow-y: scroll;height:300px;">        
        <input type="text" class="form-control" id="editId" hidden>
        <ul class="timeline" id='timelineList'>

        </ul>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn btn-secondary">Kembali</button>
        </div>
      </div>        
    </div>
  </div>
</div>
