<!-- Modal -->

<div class="modal fade" id="tambah_user" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title">Tambah <?php echo $sub_judul   ?></h4>

      </div>

      <div class="modal-body">

        <form method="post" class="form-horizontal" action="<?php echo base_url();?>index.php/settings/c_user/tambah_data">

          <!--<input type="hidden" name="id" value="">	-->

          <div class="form-group">                        

             <label for="Username" class="control-label col-lg-3">Nama Lengkap</label>

                <div class="col-lg-9">

                  <input  type="text" id="username" name="nama_user"  class="form-control"

                          placeholder="Nama User"

                          minlength=6

                          autofocus required

                          oninvalid="this.setCustomValidity('Username Minimal 6 digit')"

                          oninput="setCustomValidity('')"  > 

                </div>

          </div> 

          <div class="form-group">                        

             <label for="Username" class="control-label col-lg-3">Username</label>

                <div class="col-lg-9">

                  <input  type="text" id="username" name="username"  class="form-control"

                          placeholder="username"

                          minlength=6

                          autofocus required > 

                </div>

          </div> 

          <div class="form-group">                        

             <label for="Password" class="control-label col-lg-3">Password</label>

                <div class="col-lg-9">

                  <input  class="form-control" type="password" id="password" name="password" placeholder="Password"  

                          minlength=6

                          autofocus required

                          oninvalid="this.setCustomValidity('Password Minimal 6 digit')"

                          oninput="setCustomValidity('')" > 

                </div>

          </div>           

          <div class="form-group">                        

              <label for="Group User" class="control-label col-lg-3">Group User</label>

                <div class="col-lg-9">

                    <select style="width:397px" name="id_group" data-placeholder="Pilih Group User ..." 

                            class="form-control selectpicker" 

                            data-style="btn-primary"

                            tabindex="2" required>

                       <option value="">Pilih Group</option>

                         <?php

                              foreach ($data_user->result() as $row){

                                   echo "<option value= $row->id> $row->level</option>";

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