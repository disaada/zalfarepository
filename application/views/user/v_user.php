

<div class="page-header">

    <h1 class="title"><i class="fa fa-user"></i>&nbsp;<?php echo $judul; ?></h1>

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url();?>index.php/c_home">Dashboard</a></li>

        <li><a href="<?php echo base_url();?>index.php/<?php echo $base_link ?>"><?php echo $judul; ?></a></li>

        <li class="active"><?php echo $sub_judul; ?></li>

      </ol>

    <div class="right">

      <div class="btn-group" role="group" aria-label="...">

        <!--<a href="<?php echo base_url();?>index.php/c_home" class="btn btn-light"><i class="fa fa-home"></i>Dashboard</a>

        <a href="<?php echo base_url();?>index.php/<?php echo $back_link ?>" 

           type="button" class="btn btn-light" title="kembali"><i class="fa fa-arrow-left"></i> Kembali</a> -->     

        <a href="#" class="btn btn-light" data-toggle="modal" data-target="#tambah_user"><i class="fa fa-plus"></i>Tambah Data</a>

        <a href="<?php echo base_url();?>index.php/<?php echo $base_link ?>" 

           class="btn btn-light"><i class="fa fa-refresh"></i>Reload</a>

      </div>

    </div>

  </div>

<?php 

    $info = $this->session->flashdata('info');

    if(!empty($info)){

      switch($info) {

        case 'tambah' :

          echo '<div class="notif" style="display:none" >

                  <div class="kode-alert kode-alert-icon kode-alert-click alert3">

                    <h4><i class="fa fa-check"></i>Data berhasil ditambahkan</h4>

                  </div> 

                </div>  ';        

        break;

        case 'edit' :

          echo '<div class="notif" style="display:none" >

                  <div class="kode-alert kode-alert-icon kode-alert-click alert1">

                    <h4><i class="fa fa-info"></i>Data berhasil diubah</h4>

                  </div> 

                </div>';           

        break;

        case 'hapus' :

          echo '<div class="notif" style="display:none" >

                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">

                    <h4><i class="fa fa-trash-o"></i>Data berhasil dihapus</h4>

                  </div> 

                </div>';           

        break;

      } 

    }

?> 

<div class="container-default">

  <div class="row">

    <div class="col-md-12">

      <div class="panel panel-default">

        <div class="panel-title">

          <?php echo $sub_judul; ?>

          <ul class="panel-tools">

            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>

            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>

            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>

          </ul>

        </div>

              <table id="example0" class="table display">

                    <thead>

                        <tr>

                           <th>No</th>  

                           <th>Nama User</th>                 

                           <th>username</th>

                           <th>level pengguna</th>

                           <th>Status</th>

                           <th style='text-align: center'>Aksi</th>

                        </tr>

                    </thead>                 

                    <tfoot>

                        <tr>

                           <th>No</th>

                           <th>Nama User</th>

                           <th>username</th>

                           <th>level</th>                           

                           <th>Status</th>

                           <th style='text-align: center'>Aksi</th>

                        </tr>

                    </tfoot>

                 

                    <tbody>

                        <?php

                        $no = 1;

                        foreach ($data->result() as $row){

                          $status = $row->status;

                          if($status=='aktif'){

                            $stat       = 'Aktif';

                            $stat_color = 'success';

                            $stat_lain  = 'Blokir';

                            $stat_input = 'blokir';

                          }else{

                            $stat       = 'Blokir';

                            $stat_color = 'danger';

                            $stat_lain  = 'Aktif';

                            $stat_input = 'blokir';

                          }

                        ?>  

                        <tr>

                            <td><?php echo $no++ ?></td>       

                            <td><?php echo $row->nama_user; ?></td>    

                            <td><?php echo $row->username; ?></td>                                                        

                            <td><?php echo $row->level ?></td>  

                            <?php if($row->id_group == '1'){

                                echo "<td>&nbsp;</td>";

                              } else

                              { ?>

                                                 

                            <td>

                              <div class="dropdown">

                                <button class="btn btn-<?php echo $stat_color; ?>  btn-xs dropdown-toggle" type="button" id="

                                  dropdownMenu2" data-toggle="dropdown" aria-expanded="true">

                                  <?php echo $stat ?>

                                  <span class="caret"></span>

                                </button>

                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">

                                  <li role="presentation">

                                    <a role="menuitem" tabindex="-1" 

                                       href="<?php echo base_url();?>index.php/settings/c_user/stat_data/<?php echo $stat_lain ?>/<?php echo $row->id ?>">

                                        <?php echo $stat_lain ?>

                                    </a>

                                  </li>

                                </ul>

                              </div>                              

                            </td>

                             <?php } ?>

                            <td align='center'>

                                <a id="<?php echo $row->id ?>"  href="#edit_user<?php echo $row->id; ?>" data-toggle="modal"  

                                   class='btn btn-sm btn-light' title='Edit'><i class='fa fa-pencil'></i></a>

                                <!-- Modal -->

                                <div class="modal fade" id="edit_user<?php echo $row->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">

                                  <div class="modal-dialog">

                                    <div class="modal-content">

                                      <div class="modal-header">

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                        <h4 class="modal-title">Edit <?php echo $sub_judul   ?></h4>

                                      </div>

                                      <div class="modal-body">

                                        <form method="post" class="form-horizontal" action="<?php echo base_url();?>index.php/settings/c_user/edit_data">

                                          <input type="hidden" name="id" value="<?php echo $row->id; ?>">  

                                          <div class="form-group">                        

                                             <label for="Username" class="control-label col-lg-3">Nama Lengkap</label>

                                                <div class="col-lg-9">

                                                  <input  type="text" id="username" name="nama_user"  class="form-control"

                                                          placeholder="Nama User"

                                                          autofocus required

                                                          oninput="setCustomValidity('')"

                                                          value="<?php echo $row->nama_user; ?>"> 

                                                </div>

                                          </div> 

                                          <div class="form-group">                        

                                             <label for="Username" class="control-label col-lg-3">Username</label>

                                                <div class="col-lg-9">

                                                  <input  type="text" id="username" name="username"  class="form-control"

                                                          placeholder="username"

                                                          autofocus required

                                                          value="<?php echo $row->username; ?>"> 

                                                </div>

                                          </div>

                                          <div class="form-group">                        

                                          <label for="Password" class="control-label col-lg-3">Password</label>

                                              <div class="col-lg-9">

                                                <input  class="form-control" type="password" id="password" name="password" 

                                                placeholder="Password"  

                                                        minlength=6

                                                        autofocus required

                                                        oninvalid="this.setCustomValidity('Password Minimal 6 digit')"

                                                        oninput="setCustomValidity('')" 

                                                        value="<?php echo $row->password; ?>"> 

                                              </div>

                                          </div> 

                                          <div class="form-group">                        

                                            <label for="Group User" class="control-label col-lg-3">Group User</label>

                                              <div class="col-lg-9">

                                                  <select style="width:397px" name="id_group" 

                                                          class="form-control selectpicker" 

                                                          data-style="btn-primary"

                                                          tabindex="2" required>

                                                     <option value="<?php echo $row->id_group?>"><?php echo $row->level ?></option>

                                                       <?php

                                                            foreach ($data_user->result() as $row_edit){

                                                              if ($row->id_group==$row_edit->id)

                                                              {

                                                                continue;

                                                              }

                                                                 echo "<option value= $row_edit->id_group> $row_edit->level</option>";

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

                                <a id="<?php echo $row->id ?>"  href="#hapus_user<?php echo $row->id; ?>" data-toggle="modal"  

                                   class='btn btn-sm btn-light' title='Hapus'><i class='fa fa-trash'></i></a>

                                <!-- Modal -->

                                <div class="modal fade" id="hapus_user<?php echo $row->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">

                                  <div class="modal-dialog modal-sm">

                                    <div class="modal-content">

                                      <div class="modal-header">

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                        <h4 class="modal-title">Hapus <?php echo $sub_judul   ?></h4>

                                      </div>

                                      <div class="modal-body">                                        

                                          Apakah anda yakin ingin menghapus data ini ?

                                      </div>

                                      <div class="modal-footer">

                                        <button type="button" class="btn btn-danger" data-dismiss="modal">

                                            <i class="fa fa-times-circle" title='kembali'></i>&nbsp;Tutup</button>

                                        <a class="btn-success btn" href="<?php echo base_url();?>index.php/settings/c_user/hapus_data/<?php echo $row->id; ?>">

                                            <i class='fa fa-trash-o'></i>&nbsp;Hapus

                                        </a>

                                      </div>

                                    </div>

                                  </div>

                                </div>

                            </td>

                        </tr>      

                        <?php 

                            }

                        ?>              

                    </tbody>

                </table>               

            <?php echo $this->load->view('user/v_modal_tambah_user'); ?>

            

        </div>

      </div>

    </div>

  </div>



