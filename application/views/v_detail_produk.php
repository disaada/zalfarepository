

<div class="page-header">

    <h1 class="title"><i class="fa fa-user"></i>&nbsp;<?php echo $judul; ?></h1>

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url();?>index.php/c_home">Dashboard</a></li>

        <li><a href="<?php echo base_url();?>index.php/<?php echo $base_link ?>"><?php echo $judul; ?></a></li>

        <li class="active"><?php echo $sub_judul; ?></li>

      </ol>

    <div class="right">

      <div class="btn-group" role="group" aria-label="...">

        <?php

        echo '<a href="'.base_url().'/index.php/'.$back_link.'" 

           type="button" class="btn btn-light" title="kembali"><i class="fa fa-arrow-left"></i> Kembali</a>';

        ?>  

      </div>

    </div>

  </div>

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

                           <th>Nama Produk</th>

                           <th>Jumlah Order</th>

                        </tr>

                    </thead>                 

                    <tfoot>

                        <tr>

                           <th>No</th>  

                           <th>Nama Produk</th>

                           <th>Jumlah Order</th>

                        </tr>

                    </tfoot>

                 

                    <tbody>

                        <?php

                        $no = 1;

                        foreach ($data->result() as $row){
                          
                        ?>  

                        <tr>

                            <td><?php echo $no++ ?></td>       

                            <td><?php echo $row->nama_produk; ?></td>                  

                            <td><?php echo $row->jumlah_pesan; ?></td>  

                        </tr>      

                        <?php 

                            }

                        ?>              

                    </tbody>

                </table>                          

        </div>

      </div>

    </div>

  </div>



