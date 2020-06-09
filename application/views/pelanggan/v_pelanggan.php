

<div class="page-header">

    <h1 class="title"><i class="fa fa-user"></i>&nbsp;<?php echo $judul; ?></h1>

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url();?>index.php/c_home">Dashboard</a></li>

        <li><a href="<?php echo base_url();?>index.php/<?php echo $base_link; ?>"><?php echo $judul; ?></a></li>

        <li class="active"><?php echo $sub_judul; ?></li>

      </ol>

    <div class="right">

      <div class="btn-group" role="group" aria-label="...">

        <!--<a href="<?php echo base_url();?>index.php/c_home" class="btn btn-light"><i class="fa fa-home"></i>Dashboard</a>

        <a href="<?php echo base_url();?>index.php/<?php echo $back_link ?>" 

           type="button" class="btn btn-light" title="kembali"><i class="fa fa-arrow-left"></i> Kembali</a> -->     

        <a href="#" class="btn btn-light" data-toggle="modal" data-target="#tambah_pelanggan"><i class="fa fa-plus"></i>Tambah Data</a>

        <a href="<?php echo base_url();?>index.php/<?php echo $base_link; ?>" 

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

                           <th>Nama</th>                 

                           <th>No. Hp</th>

                           <th>Alamat</th>

                           <th style='text-align: center'>Aksi</th>

                        </tr>

                    </thead>                 

                    <tfoot>

                        <tr>

                           <th>No</th>  

                           <th>Nama</th>                 

                           <th>No. Hp</th>

                           <th>Alamat</th>

                           <th style='text-align: center'>Aksi</th>

                        </tr>

                    </tfoot>

                 

                    <tbody>

                        <?php

                        $no = 1;

                        foreach ($data->result() as $row){

                        ?>  

                        <tr>

                            <td><?php echo $no++; ?></td>       

                            <td><?php echo $row->nama; ?></td>    

                            <td><?php echo $row->no_hp; ?></td>                        

                            <td><?php echo $row->alamat; ?></td>  

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

                                        <form method="post" class="form-horizontal" action="<?php echo base_url();?>index.php/pesanan/c_pelanggan/edit_data">

                                          <input type="hidden" name="id" value="<?php echo $row->id; ?>">  

                                          <div class="form-group">                        

                                             <label for="Username" class="control-label col-lg-3">Nama Lengkap</label>

                                                <div class="col-lg-9">

                                                  <input  type="text" id="username" name="nama"  class="form-control"

                                                          placeholder="Nama"

                                                          autofocus required

                                                          oninput="setCustomValidity('')"

                                                          value="<?php echo $row->nama; ?>"> 

                                                </div>

                                          </div> 

                                          <div class="form-group">                        

                                             <label for="Username" class="control-label col-lg-3">No. Hp</label>

                                                <div class="col-lg-9">

                                                  <input  type="text" id="username" name="no_hp"  class="form-control"

                                                          placeholder="No. Hp"

                                                          autofocus required

                                                          oninput="setCustomValidity('')"

                                                          value="<?php echo $row->no_hp; ?>"> 

                                                </div>

                                          </div>

                                          <div class="form-group">                        

                                             <label for="Username" class="control-label col-lg-3">Alamat Lengkap</label>

                                                <div class="col-lg-9">

                                                  <textarea id="username" name="alamat"  class="form-control">

                                                  <?php echo $row->alamat; ?>

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

                                          <b>ANDA AKAN MENGHAPUS DATA PELANGGAN INI BESERTA CATATAN-CATATAN PEMESANANNYA</b> <br><br> Apakah anda yakin ingin menghapus data ini ?

                                      </div>

                                      <div class="modal-footer">

                                        <button type="button" class="btn btn-danger" data-dismiss="modal">

                                            <i class="fa fa-times-circle" title='kembali'></i>&nbsp;Tutup</button>

                                        <a class="btn-success btn" href="<?php echo base_url();?>index.php/pesanan/c_pelanggan/hapus_data/<?php echo $row->id; ?>">

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

            <?php echo $this->load->view('pelanggan/v_modal_tambah_pelanggan'); ?>

            

        </div>

      </div>

    </div>

  </div>



