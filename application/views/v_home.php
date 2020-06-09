  <?php echo $this->load->view('lib/v_lib_header'); ?>
  <?php echo $this->load->view('lib/v_lib_menu'); ?>
  <!-- START CONTENT -->
  <div class="content">    
    <?php //echo $this->load->view('lib/v_lib_head'); ?>
    <?php echo $this->load->view($content); ?>
    <?php echo $this->load->view('lib/v_lib_footer'); ?>
  </div>
  <!-- End Content -->
  <?php echo $this->load->view('lib/v_lib_javascript'); ?>
