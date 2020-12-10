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
        <ul class="timeline">
          <li>
            <div class="timeline-badge"><i class="flaticon-message"></i></div>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                <p><small class="text-muted"><i class="flaticon-message"></i> 11 hours ago via Twitter</small></p>
              </div>
              <div class="timeline-body">
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              </div>
            </div>
          </li>
          <li>
            <div class="timeline-badge danger"><i class="flaticon-error"></i></div>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4 class="timeline-title">Mussum ipsum cacilds</h4>
              </div>
              <div class="timeline-body">
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              </div>
            </div>
          </li>
          <li class="timeline-inverted">
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4 class="timeline-title">Mussum ipsum cacilds</h4>
              </div>
              <div class="timeline-body">
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              </div>
            </div>
          </li>
          <li>
            <div class="timeline-badge info"><i class="flaticon-price-tag"></i></div>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4 class="timeline-title">Mussum ipsum cacilds</h4>
              </div>
              <div class="timeline-body">
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <hr>
                <div class="btn-group dropdown">
                  <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                    <span class="btn-label">
                      <i class="fa fa-cog"></i>
                    </span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4 class="timeline-title">Mussum ipsum cacilds</h4>
              </div>
              <div class="timeline-body">
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              </div>
            </div>
          </li>
          <li class="timeline-inverted">
            <div class="timeline-badge success"><i class="flaticon-credit-card-1"></i></div>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4 class="timeline-title">Mussum ipsum cacilds</h4>
              </div>
              <div class="timeline-body">
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              </div>
            </div>
          </li>
        </ul>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn btn-secondary">Kembali</button>
        </div>
      </div>        
    </div>
  </div>
</div>
