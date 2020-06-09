<?php 

    $check = $this->m_users->GetAccessUsers($this->session->userdata('username'));

    $pimpinan = array('1');

    $admin = array('2');

    $all = array('1', '2');

    ?>

<!-- START SIDEBAR -->

<div class="sidebar sidebar-colorful clearfix">

<ul class="sidebar-panel nav">

  <li class="sidetitle">MENU</li>

  <li><a href="#"><span class="icon color1"><i class="fa fa-book fa-fw"></i></span>Halaman Awal<span class="caret"></span></a>

    <ul>

      <li><a href="<?php echo base_url();?>index.php/c_home"><i class="fa fa-caret-right"></i>&nbsp;Laporan Penjualan Mitra</a></li>

      <li><a href="<?php echo base_url();?>index.php/c_home/penjualanproduk"><i class="fa fa-caret-right"></i>&nbsp;Laporan Penjualan Produk</a></li>

    </ul>

  </li>

  <?php if(in_array($check->id_group, $pimpinan)){ ?>

  <li><a href="<?php echo base_url();?>index.php/settings/c_user"><span class="icon color2"><i class="fa fa-wrench fa-fw"></i></span>Data Karyawan</a></li>

  <?php } ?>

</ul>

<!-- ---------------------------------------------------------------------------------------- -->

<?php if(in_array($check->id_group, $admin)){ ?> 

</ul>

  <ul class="sidebar-panel nav">

  <li class="sidetitle">DATA PESANAN</li>

  <li><a href="#"><span class="icon color9"><i class="fa fa-book fa-fw"></i></span>Pesanan<span class="caret"></span></a>

    <ul>

      <li><a href="<?php echo base_url();?>index.php/pesanan/c_pesan"><i class="fa fa-caret-right"></i>&nbsp;Pesanan Customer Biasa</a></li>

      <li><a href="<?php echo base_url();?>index.php/pesanan/c_pesan/mitra"><i class="fa fa-caret-right"></i>&nbsp;Pesanan Mitra</a></li>

    </ul>

  </li> 

  <li><a href="<?php echo base_url();?>index.php/pesanan/c_distributor"><span class="icon color9"><i class="fa fa-book"></i></span>Data Mitra</a></li>

  <li><a href="<?php echo base_url();?>index.php/pesanan/c_pelanggan"><span class="icon color9"><i class="fa fa-book"></i></span>Data Pelanggan</a></li>

</ul>

<ul class="sidebar-panel nav">

  <li class="sidetitle">STOK MENGALIR & TETAP</li>

  <li><a href="<?php echo base_url();?>index.php/stok/c_stok"><span class="icon color2"><i class="fa fa-suitcase fa-fw"></i></span>Stok</a>

  <li><a href="<?php echo base_url();?>index.php/stok/c_stok/laporan"><span class="icon color2"><i class="fa fa-suitcase fa-fw"></i></span>Laporan Stok</a>

</ul>

<?php }?>

<!-- ---------------------------------------------------------------------------------------- -->

<?php if(in_array($check->id_group, $all)){ ?> 

<ul class="sidebar-panel nav">

    <li><a href="<?php echo base_url();?>index.php/c_home/logout"><span class="icon color6"><i class="fa fa-power-off"></i></span>Logout</a></li>

</ul>

<?php }?>

</div>



<!-- END SIDEBAR -->