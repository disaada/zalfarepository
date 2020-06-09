<?php

    $nama_lengkap   = $this->session->userdata('nama_user');

    $level          = $this->session->userdata('level');



    $check      = $this->m_users->GetAccessUsers($this->session->userdata('username'));

    $pimpinan = array('1');

    $admin = array('1', '2');

    $staf = array('1', '3');

    $all = array('1', '2', '3');

    ?>

<div class="page-header">

    <h1 class="title"><i class="fa fa-home"></i>&nbsp;Halaman Awal</h1>

      <ol class="breadcrumb">

        

      </ol>

    <div class="left">

      <div class="btn-group" role="group" aria-label="...">

        <a href="<?php echo base_url();?>index.php/c_home/penjualanproduk" class="btn btn-default"><i class="fa fa-refresh"></i></a>

        <button disabled class="btn btn-warning" >

           <i class="fa fa-user"></i><span ><strong><?php echo $level; ?></strong></span>

        </button>

      </div>

    </div>  

    <div class="right">

      <div class="btn-group" role="group" aria-label="...">

        <!--<a href="<?php echo base_url();?>index.php/c_home" class="btn btn-primary">

          <i class="fa fa-home"></i>Dashboard</a>-->

        <button disabled class="btn btn-success" >

           <i class="fa fa-calendar"></i><span ><strong><?php echo $hari.", "; print date('d F Y'); ?></strong></span>

        </button>

        <button disabled class="btn btn-danger" >

          <i class="fa fa-clock-o"></i><span id="clock"><strong><?php print date('H:i:s'); ?></strong></span>

        </button>        

      </div>

    </div>     

  </div>

  

  <div class="container-default">


 <div class="row">

    <div class="col-md-12">

      <h4>JUMLAH PENJUALAN PRODUK BULANAN</h4>

      <form method="post" class="form-horizontal" action="<?php echo base_url();?>index.php/c_home/lap_penjualan_produk">

      Ubah waktu penjualan : 

      <select name="tahun">
        
        <?php

              echo "<option selected='selected' value='".date('Y')."'> ".date('Y')." </option>";

          for ($i = 2019; $i < date('Y') ; $i++) {

              echo "<option value='".$i."'>".$i."</option>";

          }

        ?>

      </select>

      <select name="bulan">

      <?php

      $bln=array(1=>"Januari","Februari","Maret","April","Mei","Juni","July","Agustus"

        ,"September","Oktober","November","Desember");

      echo "<option selected='selected' value='".date('m')."'> ".$bln[date('n')]." </option>";
      
      for($bulan=1; $bulan<=12; $bulan++){

        if($bulan<=9) { echo "<option value='0$bulan'>$bln[$bulan]</option>"; }
        
        else { echo "<option value='$bulan'>$bln[$bulan]</option>"; }
      
      }
      
      ?>

      </select>

      <button type="submit" class="btn-success btn">

          <i class="fa fa-search" title='kembali'></i>&nbsp;Cari</button>

      </form>

      <br>

      <table id="example1" class="table display">

                    <thead>

                        <tr>

                           <th>No</th>  

                           <th>Nama Produk</th>

                           <th>Jumlah Penjualan</th>

                        </tr>

                    </thead>                 

                    <tfoot>

                        <tr>

                           <th>No</th>  

                           <th>Nama Produk</th>

                           <th>Jumlah Penjualan</th>

                        </tr>

                    </tfoot>

                 

                    <tbody>

                        <?php

                        $no = 1;

                        foreach ($penjualan_produk->result() as $row){
                          
                        ?>  

                        <tr>

                            <td><?php echo $no++ ?></td> 

                            <td><?php echo $row->nama_produk; ?></td>  

                            <td><?php echo $row->jumlah; ?></td>

                        </tr>      

                        <?php 

                            }

                        ?>              

                    </tbody>

                </table>

      <?php
        foreach($grafik as $data){
            $produk[] = $data->nama_produk;
            $jumlah[] = $data->jumlah;
        }
      ?>

      <!--Load chart js-->
    <script>
 
            var lineChartData = {
                labels : <?php echo json_encode($produk);?>,
                datasets : [
                     
                    {
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(152,235,239,1)",
                        data : <?php echo json_encode($jumlah);?>
                    }
 
                ]
                 
            }
 
        var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
         
    </script>

    </div>    

  </div> 

   <!-- ________________________________________________keuangan_______________________________________________________ -->
  

  <br><br><br><br><br><br><br>





