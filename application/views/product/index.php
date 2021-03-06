<div class="panel-header bg-primary-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Produk</h2>
        <h5 class="text-white op-7 mb-2"> Halaman panel pengelolaan Produk</h5>
      </div>
      <div class="ml-md-auto py-2 py-md-0">
        <input type="number" id="order" value="0" hidden>
        <button type="button" data-toggle="modal" data-target="#addProduct" class="btn btn-round btn-primary btn-border" >Tambah Produk</button>

      </div>

    </div>
  </div>
</div>

<div class="card-body row" id="productList">

</div>


<div class="modal fade" id="detailProduct" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4>Detail Produk</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post">
        <div class="modal-body">
          <!-- <ul class="wizard-menu nav nav-pills nav-primary">
            <li class="step" style="width: 50%;">
              <a class="nav-link active" href="#aboutProduct" data-toggle="tab" aria-expanded="true"><i class="fa fa-user mr-0"></i> Detail</a>
            </li>
            <li class="step" style="width: 50%;">
              <a class="nav-link" href="#productList" data-toggle="tab"><i class="fa fa-archive mr-2"></i>Produk</a>
            </li>
             <li class="step" style="width: 33%;">
              <a class="nav-link" href="#deleteProduct" data-toggle="tab"><i class="fas fa-trash mr-2"></i> Hapus</a>
            </li> 
          </ul> -->
          <div class="tab-content">
            <div class="tab-pane active" id="aboutProduct">
              <div class="row">
                <div class="form-group col-6 col-md-8">
                  <label>Nama Produk</label>
                  <input type="text" class="form-control" id="editNameProduct"  >
                  <input type="text" class="form-control" id="editIdProduct" hidden>
                </div>
                <div class="form-group col-6 col-md-4">
                  <label>Harga</label>
                  <input type="number" class="form-control" id="editPriceProduct"  >
                </div>
                <div class="form-group col-md-7" >
                  <label>Keterangan</label>
                  <textarea id="editDescriptionProduct" rows="9" cols="80" class="form-control"></textarea>
                </div>
                <div class="form-group col-md-5">
                  <div class="input-file input-file-image">
                    <label>Gambar</label>
                    <img class="img-upload-preview" width="150" src="http://placehold.it/150x150" alt="preview" id="editImageProduct">
                    <input type="file" class="form-control form-control-file" id="fileUpload1" name="fileUpload1" accept="image/*" required="">
                    <label for="fileUpload1" class="  label-input-file btn btn-success">
                      <span class="btn-label">
                        <i class="fa fa-file-image"></i>
                      </span>
                      Upload Foto
                    </label>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="UpdateProduct()">Simpan</button>
                <button type="button" class="btn btn-danger" onclick="ProceedDeleteProduct()">Delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              </div>
            </div>
            <div class="tab-pane" id="productList">
              <table id="table1" class="display">
                <thead>
                  <tr>
                    <th>Nama Produk</th>
                  </tr>
                </thead>
                <tbody id="productTableList">

                </tbody>
              </table>
            </div>
           
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addProduct" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <h4>Tambah Produk</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <ul class="wizard-menu nav nav-pills nav-primary">
            <li class="step" style="width: 50%;">
              <a class="nav-link active" href="#addNewProduct" data-toggle="tab" aria-expanded="true"><i class="fas fa-plus-circle mr-0"></i> Tambah Baru</a>
            </li>
            <li class="step" style="width: 50%;">
              <a class="nav-link" href="#recoverProduct" data-toggle="tab"><i class="fa fa-history mr-2"></i>Pulihkan Produk</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="addNewProduct">
              <div class="row">

                <div class="form-group col-6 col-md-8">
                  <label>Nama Produk</label>
                  <input type="text" class="form-control" id="addNameProduct"  >
                </div>
                <div class="form-group col-6 col-md-4">
                  <label>Harga</label>
                  <input type="number" class="form-control" id="addPriceProduct"  >
                </div>
                <div class="form-group col-md-7" >
                  <label>Keterangan</label>
                  <textarea id="addDescriptionProduct" rows="9" cols="80" class="form-control"></textarea>
                </div>
                <div class="form-group col-md-5">
                  <div class="input-file input-file-image">
                    <label>Gambar</label>
                    <img class="img-upload-preview" width="150" src="http://placehold.it/150x150" alt="preview">
                    <input type="file" class="form-control form-control-file" id="fileUpload" name="fileUpload" accept="image/*" required="">
                    <label for="fileUpload" class="  label-input-file btn btn-success">
													<span class="btn-label">
														<i class="fa fa-file-image"></i>
													</span>
													Upload Foto
												</label>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="ProceedAddProduct()">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              </div>
            </div>
            <div class="tab-pane" id="recoverProduct">
              <div class="form-group">
                <label>Pilih Produk Terhapus</label>
                &nbsp;&nbsp;&nbsp;
                <select class="select2basic" id="idRecoverProduct" style="width:250px;">

                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="ProceedRecoverProduct()">Pulihkan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              </div>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
