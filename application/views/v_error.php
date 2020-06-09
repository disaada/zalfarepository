<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title><?php echo $judul;?></title>

  <!-- ========== Css Files ========== -->
  <link href="<?php echo base_url();?>assets/css/root.css" rel="stylesheet">
  <style type="text/css">
    body{background: #F5F5F5;}
  </style>
  </head>
  <body>

    <div class="error-pages">

        <img src="<?php echo base_url();?>assets/img/404.png" alt="404" class="icon" width="400" height="260">
        <h1>Halaman yang dicari tidak ada</h1>
        <h4>Ada kesalahan akses atau halaman yang dicari telah dihapys</h4>
        <form>
          <input type="text" class="form-control" placeholder="Search for Page">
          <i class="fa fa-search"></i>
        </form>

        <div class="bottom-links">
          <a href="<?php echo base_url();?>index.php/<?php echo $back_link ?>" class="btn btn-light">Kembali Ke Dashboard</a>
        </div>

    </div>
</body>
</html>