 <?php
    $nama_lengkap   = $this->session->userdata('nama_user');
    $level          = $this->session->userdata('level');
  ?>

 <!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>Sistem Informasi Manajemen Logistik - Zalfa Miracle Skincare Bandung </title>
<!-- Standard Favicon -->
  <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>assets/favicon.ico" />
  <!-- ========== Css Files ========== -->
  
  <link href="<?php echo base_url();?>assets/css/root.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
  
  </head>                  

  <script type="text/javascript">
        //set timezone
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    //buat object date berdasarkan waktu di server
    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
    //buat object date berdasarkan waktu di client
    var clientTime = new Date();
    //hitung selisih
    var Diff = serverTime.getTime() - clientTime.getTime();    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayServerTime(){
        //buat object date berdasarkan waktu di client
        var clientTime = new Date();
        //buat object date dengan menghitung selisih waktu client dan server
        var time = new Date(clientTime.getTime() + Diff);
        //ambil nilai jam
        var sh = time.getHours().toString();
        //ambil nilai menit
        var sm = time.getMinutes().toString();
        //ambil nilai detik
        var ss = time.getSeconds().toString();
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
    </script>

    <script>
            var i = 1;
            function additem(y) {
//                menentukan target append
                var itemlist = document.getElementById('itemlist'+y);
                
//                membuat element
                var row = document.createElement('tr');
                var jenis = document.createElement('td');
                var jumlah = document.createElement('td');
                var aksi = document.createElement('td');
 
//                meng append element
                itemlist.appendChild(row);
                row.appendChild(jenis);
                row.appendChild(jumlah);
                row.appendChild(aksi);
 
//                membuat element input
                
                var myDiv = document.getElementById("myDiv"+y);

                //Create array of options to be added

                var array = ["Paket Lightening","Paket Acne","Paket Flawless", "Day Cream White","Night Cream White","Day Cream Acne","Night Cream Acne","Day Cream Flawless","Night Cream Flawless","Serum Lightening","Facial Wash White",  "Facial Wash Acne","Facial Wash Flawless","Toner","Milk Cleanser","Brightening Gel","Eye Cream","Hand and Body","Acne Gel","Masker Whitening","Masker Acne","Masker Gold","Madu Alshifa Kecil", "Serum KAKADU","Spray Vit C", "Day Cream Lightening", "Night Cream Lightening", "Lipmatte Fall in Mauve", "Lipmatte Pinky Winky", "Lipmatte Nudetella", "Lipmatte Peachfull", "Lipmatte Macared", "Serum Anti Aging", "Madu Alshifa Besar", "Savana Purple", "Elegant Craft Khaki", "Body Serum"];

                //Create and append select list
                var selectList = document.createElement("select");
                selectList.setAttribute('name', 'jenis_input[' + i + ']');
                selectList.setAttribute('class', 'form-control selectpicker');
                selectList.setAttribute('data-style', 'btn-primary');

                selectList.id = "mySelect";
                myDiv.appendChild(selectList);

                //Create and append the options
                for (var a = 0; a < array.length; a++) {
                    var option = document.createElement("option");
                    option.value = a+1;
                    option.text = array[a];
                    selectList.appendChild(option);
                }

                var jumlah_input = document.createElement('input');
                jumlah_input.setAttribute('name', 'jumlah_input[' + i + ']');
                jumlah_input.setAttribute('class', 'input-block-level');
 
                var hapus = document.createElement('span');
 
//                meng append element input
                jenis.appendChild(selectList);
                jumlah.appendChild(jumlah_input);
                aksi.appendChild(hapus);
 
                hapus.innerHTML = '<button class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>';
//                membuat aksi delete element
                hapus.onclick = function () {
                    row.parentNode.removeChild(row);
                };
 
                i++;
            }
        </script>

  <body onload="setInterval('displayServerTime()', 1000);">
  <!-- Start Page Loading -->
  <div class="loading"><img src="<?php echo base_url();?>assets/img/loading.gif" alt="loading-img"></div>
  <!-- End Page Loading -->
 <!-- START TOP -->
  <div id="top" class="clearfix">

    <!-- Start App Logo -->
    <div class="applogo">
      <a href="<?php echo base_url();?>index.php/c_home" class="logo"><?php echo strtoupper($level); ?></a>
    </div>
    <!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-windows"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-windows"></i></a>
     <!--End Sidebar Show Hide Button -->

    <!-- Start Sidepanel Show-Hide Button 
    <a href="#sidepanel" class="sidepanel-open-button"><i class="fa fa-outdent"></i></a>
     End Sidepanel Show-Hide Button -->

    <!-- Start Top Right -->
    
    <ul class="top-right">
    <li class="dropdown link">
      <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox">
        <!--<img src="<?php echo base_url();?>assets/img/profileimg.png" alt="img">-->
        <i class="fa fa-user"></i>&nbsp;&nbsp;<b><?php echo $nama_lengkap; ?></b><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
          <!--<li role="presentation" class="dropdown-header">Profile</li>
          <li><a href="#"><i class="fa falist fa-inbox"></i>Inbox<span class="badge label-danger">4</span></a></li>-->
          <li><a href="#"><i class="fa falist fa-file-o"></i>Profil</a></li>
          <!--<li><a href="#"><i class="fa falist fa-wrench"></i>Settings</a></li>-->
          <li class="divider"></li>
          <!--<li><a href="#"><i class="fa falist fa-lock"></i> Lockscreen</a></li>-->
          <li><a href="<?php echo base_url();?>index.php/c_home/logout"><i class="fa falist fa-power-off"></i>Keluar</a></li>
        </ul>
    </li>

    </ul>
    <!-- End Top Right -->

  </div>
  <!-- END TOP -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
