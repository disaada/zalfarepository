<!-- Modal -->

<div class="modal fade" id="tambah_pelanggan" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title">Tambah Pelanggan</h4>

      </div>

      <div class="modal-body">

        <form method="post" class="form-horizontal" action="<?php echo base_url();?>index.php/pesanan/c_pelanggan/tambah_data">

          <!--<input type="hidden" name="id" value="">	-->

          <div class="form-group">                        

             <label for="Username" class="control-label col-lg-3">Nama Lengkap</label>

                <div class="col-lg-9">

                  <input  type="text" id="username" name="nama"  class="form-control"

                          placeholder="Nama User"

                          minlength=6

                          autofocus required

                          oninput="setCustomValidity('')"  > 

                </div>

          </div> 

          <div class="form-group">                        

             <label for="Username" class="control-label col-lg-3">No HP</label>

                <div class="col-lg-9">

                  <input  type="text" id="username" name="no_hp"  class="form-control"

                          placeholder="No. HP"

                          minlength=6

                          autofocus required

                          oninvalid="this.setCustomValidity('Username Minimal 6 digit')"

                          oninput="setCustomValidity('')"  > 

                </div>

          </div>

          <div class="form-group">                        

             <label for="Username" class="control-label col-lg-3">Alamat Lengkap</label>

                <div class="col-lg-9">

                  <textarea id="username" name="alamat"  class="form-control"

                          placeholder="username"

                          autofocus required

                          oninvalid="this.setCustomValidity('Username Minimal 6 digit')"

                          oninput="setCustomValidity('')"  >

                  </textarea> 

                </div>

          </div>          

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-danger" data-dismiss="modal">

          <i class="fa fa-times-circle" title='kembali'></i>&nbsp;Tutup</button>

        <button type="submit" class="btn-success btn">

          <i class="fa fa-save" title='kembali'></i>&nbsp;Simpan</button>

      </div>

      </form>

    </div>

  </div>

</div>