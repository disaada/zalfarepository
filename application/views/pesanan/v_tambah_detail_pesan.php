<!-- Modal -->

<div class="modal fade" id="tambah_detail_pesan<?php echo $row->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title">Tambah <?php echo $sub_judul   ?></h4>

      </div>

      <div class="modal-body">

        <form method="post" class="form-horizontal" action="<?php echo base_url();?>index.php/settings/c_pesan/tambah_data">

          <!--<input type="hidden" name="id" value="">  -->

          <div class="form-group">                        

             <label for="Username" class="control-label col-lg-3">Tanggal</label>

                <div class="col-lg-9">

                  <?php echo date('d F Y');?>

                  <input  type="hidden" id="username" name="tgl_pesan"  class="form-control"

                          minlength=6

                          autofocus required

                          value="<?php echo date('Y-m-d');?>"  >

                </div>

          </div> 

          <div class="form-group">                        

             <label for="Username" class="control-label col-lg-3">Nama Admin</label>

                <div class="col-lg-9">

                  <?php echo $this->session->userdata('nama_user'); ?> 

                  <input  type="hidden" id="username" name="nama_admin"  class="form-control"

                          minlength=6

                          autofocus required

                          value="<?php echo $this->session->userdata('id'); ?>"  >

                </div>

          </div>          

          <div class="form-group">                        

              <label for="Group User" class="control-label col-lg-3">Nama Pelanggan</label>

                <div class="col-lg-9">

                    <select style="width:397px" name="nama_pelanggan" data-placeholder="Pilih Pelanggan ..." 

                            class="form-control selectpicker" 

                            data-style="btn-primary"

                            tabindex="2" required>

                       <option value="">Pilih Pelanggan</option>

                         <?php

                              foreach ($datapelanggan->result() as $row){

                                   echo "<option value= $row->id> $row->nama</option>";

                              }

                          ?>

                </select>

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

<!-- Modal -->