$(document).ready(function(){
  $("#logout").click(function(){
    swal({
        title: "Logout?", 
        text: "Anda yakin ingin keluar dari aplikasi?", 
        type: "warning", 
        showCancelButton: true, 
        confirmButtonColor: "#DD6B55", 
        confirmButtonText: "Ya, Keluar sekarang!", 
        closeOnConfirm: true 
      },
      function(){
          $.ajax({
                type: "POST",
                url: "index.php?halaman=logout",
                success: function(result) {
                  location.reload();
                },
                async:false
              });
      });
  });

  $("#logout2").click(function(){
    swal({
        title: "Logout?", 
        text: "Anda yakin ingin keluar dari aplikasi?", 
        type: "warning", 
        showCancelButton: true, 
        confirmButtonColor: "#DD6B55", 
        confirmButtonText: "Ya, Keluar sekarang!", 
        closeOnConfirm: true 
      },
      function(){
          $.ajax({
                type: "POST",
                url: "index.php?halaman=logout",
                success: function(result) {
                  location.reload();
                },
                async:false
              });
      });
  });
 
});
