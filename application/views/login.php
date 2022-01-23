<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI-Kalem | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo base_url()?>assets/favicon.ico" type="image/ico">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2-9/package/dist/sweetalert2.css">
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page bg-grey">
  <div class="login-box">
    <div class="login-logo">
      <img src="<?= base_url('assets') ?>/dist/img/dikbud.png" class="img-fluid mx-auto" width="80" height="80"></i><br>
      <a href="<?= site_url() ?>">SI-<b class="text-navy">Kalem</b>
        <p class="text-md">Sistem Informasi Keuangan Kelembagaan</p>
      </a>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan Login</p>
        <form>
          <div class="input-group mb-3">
            <input id="username" type="text" name="username" class="form-control" placeholder="Nama Pengguna" required autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="password" type="password" name="password" class="form-control" placeholder="Kata Sandi" required autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
              <div class="input-group-mb-3">
                <input type="checkbox" onclick="myFunction()"> Lihat Kata Sandi
              </div>    
        </form>
        <div class="row">
          
          <div class="col-12">
            <button type="submit" class="btn btn-warning float-right" id="submit"><i class="fa fa-sign-in-alt"></i> Masuk</button>
          </div>
        </div>
      </div>
    </div>

<!-- jQuery -->
<script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>
<script src="<?=base_url('assets')?>/plugins/sweetalert2-9/package/dist/sweetalert2.all.js"></script>

<script>
              function myFunction() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                  x.type = "text";
                } else {
                  x.type = "password";
                }
              }
</script> 
<script type="text/javascript">
var inputuser = document.getElementById("username");
var inputpass = document.getElementById("password");
inputuser.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("submit").click();
  }
});
inputpass.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("submit").click();
  }
});

$('#submit').on('click',function(e){
  var username = $('#username').val();
  var password = $('#password').val();
  if(username == '' && password==''){
    Swal.fire({
    title : 'Maaf..',
    text  : 'Nama Pengguna dan Kata Sandi tidak boleh kosong',
    icon  : 'warning',
    });
  } else if(username == ''){
    Swal.fire({
    title : 'Maaf..',
    text  : 'Nama Pengguna tidak boleh kosong',
    icon  : 'warning',
    });
  } else if (password == ''){
    Swal.fire({
    title : 'Maaf..',
    text  : 'Kata Sandi tidak boleh kosong',
    icon  : 'warning',
    });
  } else {
    $.ajax({
      type:"POST",
      url : '<?=site_url('auth/process')?>',
      data:{
        password : password,
        username : username
      },
      success : function(data){
        var oObj = JSON.parse(data);
        if(oObj.is_true == 1){
          swal.fire({
          title :  oObj.title,
          text  :  oObj.msg,
          icon  :  oObj.icon,
          showConfirmButton:false,
          timer : 2000
        });
          setTimeout(function(){
            window.location.href ='<?=site_url('dashboard')?>'
          },1000);
        } else {
          swal.fire({
          title :  oObj.title,
          text  :  oObj.msg,
          icon  :  oObj.icon,
          showConfirmButton:true,
        });
          setTimeout(function(){
            window.location.reload
          },1000);
        }
      },
    })
  }
})
</script> 

</body>

</html>