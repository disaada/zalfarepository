
<div class="page-header">

    <h1 class="title"><i class="fa fa-user"></i>&nbsp;<?php echo $judul; ?></h1>

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url();?>index.<?php   ?>/c_home">Dashboard</a></li>

        <li><a href="<?php echo base_url();?>index.php/<?php echo $base_link ?>"><?php echo $judul; ?></a></li>

        <li class="active"><?php echo $sub_judul; ?></li>

      </ol>

    <div class="right">

      <div class="btn-group" role="group" aria-label="...">  

        <a href="#" class="btn btn-light" data-toggle="modal" data-target="#tambah_pesan"><i class="fa fa-plus"></i>Tambah Orderan Baru</a>

        <a href="#" class="btn btn-light" data-toggle="modal" data-target="#tambah_pelanggan"><i class="fa fa-plus"></i>Tambah Pelanggan Baru</a>

         <a href="#" class="btn btn-light" data-toggle="modal" data-target="#tambah_distributor"><i class="fa fa-plus"></i>Tambah Mitra Baru</a>

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

        case 'alert' :

          echo '<div class="notif" style="display:none" >

                  <div class="kode-alert kode-alert-icon kode-alert-click alert6">

                    <h4><i class="fa fa-ban"></i>Mitra hanya boleh memesan lewat DISTRO ZALFA saja.</h4>

                  </div> 

                </div>  ';        

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

                           <th>Tanggal</th>                 

                           <th>Kode</th>

                           <th>Pengirim</th>

                           <th>Pemesan</th>

                           <th>Ekspedisi</th>

                           <th style='text-align: center'>Aksi</th>

                        </tr>

                    </thead>                 

                    <tfoot>

                        <tr>

                           <th>No</th>  

                           <th>Tanggal</th>                 

                           <th>Kode</th>

                           <th>Pengirim</th>

                           <th>Pemesan</th>

                           <th>Ekspedisi</th>

                           <th style='text-align: center'>Aksi</th>

                        </tr>

                    </tfoot>

                 

                    <tbody>

                        <?php

                        $no = 1;

                        foreach ($data->result() as $row){
                          
                        ?>  

                        <tr>

                            <td><?php echo $no++ ?></td>       

                            <td><?php echo date('d-m-Y', strtotime($row->tgl_pesan)); ?></td>    

                            <td><?php echo $row->kode_pesan; ?></td>                                                              
                            <td><?php 

                                if($row->jenis == "-"){

                                  echo $row->pengirim;}

                                else{

                                  echo "[".$row->jenis."] ".$row->pengirim;} ?>
                                    
                            </td>  

                            <td><?php echo $row->pemesan; ?></td>

                            <td><?php 

                                if($row->ekspedisi == "OJOL"){

                                  echo "Go-Jek/Grab";}

                                else{

                                  echo $row->ekspedisi;} ?>
                                    
                            </td> 

                            <td align='center'>

                                <a id="<?php echo $row->id ?>"  href="#tambah_detail_pesan<?php echo $row->id; ?>" class="btn 

                                  btn-light" data-toggle="modal" data-target="" title='Tambah List Produk'><i class="fa fa-plus"></i></a>

                                <!-- Modal -->

                                <div class="modal fade" id="tambah_detail_pesan<?php echo $row->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">

                                  <div class="modal-dialog">

                                    <div class="modal-content">

                                      <div class="modal-header">

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                        <h4 class="modal-title">Tambah List Order</h4>

                                      </div>

                                      <div class="modal-body">

                                        <form method="post" class="form-horizontal" action="<?php echo base_url();?>index.php/pesanan/c_pesan/tambah_detail_data">

                                         <table class="table table-condensed">

                                            <thead>

                                                <tr>

                                                    <th width="300px">Produk</th>

                                                    <th width="100px">Jumlah</th>

                                                    <th width="80px"></th>

                                                </tr>

                                            </thead>

                                            <!--elemet sebagai target append-->

                                            <tbody id="itemlist<?php echo $row->id; ?>">

                                                <tr>

                                                    <td id="myDiv<?php echo $row->id; ?>">

                                                      <select style="width:397px" name="jenis_input[0]"

                                                                class="form-control selectpicker" 

                                                                data-style="btn-primary"

                                                                tabindex="2" required>

                                                          <?php

                                                               foreach ($dataproduk->result() as $row_edit){

                                                                  echo "<option value= $row_edit->id> $row_edit->nama_produk</option>";

                                                               }

                                                          ?>

                                                      </select>

                                                    </td>

                                                    <td><input name="jumlah_input[0]" class="input-block-level" /></td>

                                                    <td></td>

                                                </tr>

                                            </tbody>

                                            <tfoot>

                                                <tr>

                                                    <td></td>

                                                    <td></td>

                                                    <td>

                                                        <button class="btn btn-small btn-default" onclick="additem(<?php echo $row->id; ?>); return false">

                                                          <i class="fa fa-plus"></i>&nbsp;Tambah</button>

                                                    </td>

                                                </tr>

                                            </tfoot>

                                        </table>

                                          <input type="hidden" name="id_pesan" value="<?php echo $row->id; ?>">       

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

                                <a href="<?php echo base_url();?>index.php/pesanan/c_pesan/viewdetailpesan/<?php echo $row->id; ?>" 

                                   class='btn btn-sm btn-light' title='Lihat Detail Pemesanan'><i class='fa fa-eye'></i></a>


                                <!-- Modal -->

                                <a href="<?php echo base_url();?>index.php/pesanan/c_pesan/strukPesan/<?php echo $row->id;?>/<?php echo $row->jenis;?>" 

                                   class='btn btn-sm btn-light' title='Print'><i class='fa fa-print'></i></a>                                

                                <!-- Modal -->

                                <div class="modal fade" id="edit_user<?php echo $row->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">                                  

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

                                        <a class="btn-success btn" href="<?php echo base_url();?>index.php/pesanan/c_pesan/hapus_data/<?php echo $row->id; ?>">

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

              

              <?php echo $this->load->view('pesanan/v_tambah_pesan'); ?>  

              <?php echo $this->load->view('pelanggan/v_modal_tambah_pelanggan'); ?>

              <?php echo $this->load->view('distributor/v_modal_tambah_distributor'); ?>             



        </div>

      </div>

    </div>

  </div>



