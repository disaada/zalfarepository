<!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title"><?php echo $judul; ?></h1>
       
      <ol class="breadcrumb">
        <li class="active"><?php echo $sub_judul; ?></li>
    </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="<?php echo base_url();?>index.php/<?php echo $base_link ?>" class="btn btn-light"><?php echo $judul; ?></a>
        <a href="<?php echo base_url();?>index.php/<?php echo $base_link ?>" class="btn btn-light"><i class="fa fa-refresh"></i></a>
        <!--<a href="#" class="btn btn-light"><i class="fa fa-search"></i></a>
        <a href="#" class="btn btn-light" id="topstats"><i class="fa fa-line-chart"></i></a>-->
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->
