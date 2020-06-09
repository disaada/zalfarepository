<!-- Modal -->

<div class="modal fade" id="tambah_user" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title">Tambah <?php echo $sub_judul   ?></h4>

      </div>

      <div class="modal-body">

        <form method="post" class="form-horizontal" action="<?php echo base_url();?>index.php/stok/c_stok/tambah_data">

          <div class="form-group">                        

              <label for="Group User" class="control-label col-lg-3">Tipe Stok</label>

                <div class="col-lg-9">

                    <select style="width:397px" name="tipe_stok" data-placeholder="Pilih Tipe Stok ..." 

                            class="form-control selectpicker" 

                            data-style="btn-primary"

                            tabindex="2" required>

                       <option value="">Pilih Tipe Stok</option>

                       <option value="Mengalir">Mengalir</option>

                       <option value="Tetap">Tetap</option>

                </select>

                </div>

          </div>

          <div class="form-group">                        

              <label for="Group User" class="control-label col-lg-3">Produk</label>

                <div class="col-lg-9">

                    <select style="width:397px" name="id_produk" data-placeholder="Pilih Produk ..." 

                            class="form-control selectpicker" 

                            data-style="btn-primary"

                            tabindex="2" required>

                       <option value="">Pilih Produk</option>

                         <?php

                              foreach ($dataproduk->result() as $row){

                                   echo "<option value= $row->id> $row->nama_produk</option>";

                              }

                          ?>

                </select>

                </div>

          </div> 

          <div class="form-group">                        

             <label for="Username" class="control-label col-lg-3">Jumlah</label>

                <div class="col-lg-9">

                  <input  type="text" id="username" name="jumlah"  class="form-control"

                          minlength=6

                          autofocus required  > 

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