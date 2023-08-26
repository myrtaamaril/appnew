
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile</title>
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2_ori/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/ladda-buttons/css/ladda-themeless.min.css">
  <?php $this->load->view("templates/header")?>
  <style type="text/css">
    .labelProfile{
      padding-top: 6px;
      font-size: 16px;
    }
    .lingkaran{
      width: 150px;
      height: 150px;
      border-radius: 100%;
      padding-top: 5px;
      padding-left: 5px;
      padding-bottom: 50px;
      padding-right: 50px;
    }
    .fotoLingkaran{
      width: 140px;
      height: 140px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse layout-navbar-fixed layout-footer-fixed">
<div class="preloader">
  <div class="loader">
      <div class="spinner"></div>
      <div class="spinner-2"></div>
  </div>
</div>
<div class="wrapper">
    <?php $this->load->view('templates/navbar');?>
    <?php $this->load->view('templates/sidebar');?>
    <div class="content-wrapper">
      <?php $this->load->view('templates/content-header');?>
      <div class="content">
        <div class="container-fluid">
        <?php foreach ($data as $key): ?>
          <div class="row">
            <div class="col-md-3">
              <div class="card shadow-lg">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <img  id="imagine" src="<?=base_url()?>assets/image/avatar/<?=$key->avatar?>" class="img-circle elevation-2" alt="User Image" width="150px" height="150px">
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12 text-center">
                       <form id="form-data">
                <input type="file" name="fileupload" id="fileupload" class="form-control" />
          </form><button type="button" name="upload" id="upload" value="Upload" class="btn bg-purple btn-purple mt-3"  />
          <i class="fa fa-upload"></i> Upload </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="card shadow-lg">
                <div class="card-header">
                  <div class="card-title">Pengaturan Profile</div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <label class="labelProfile">User Name</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" id="username" class="form-control" readonly value="<?=$key->username?>">
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-4">
                      <label class="labelProfile">Nick Name</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" id="inputNama" class="form-control" readonly value="<?=$key->nickname?>">
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-4">
                      <label class="labelProfile">CompanyName</label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" id="inputJabatan" class="form-control" readonly value="<?=$key->companyname?>">
                    </div>
                  </div>
                  <br>
               <div class="row">
                    <div class="col-md-4">
                      <label class="labelProfile">Password</label>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <input type="password" id="inputPassword" class="form-control" value="<?=$key->password?>">
                      </div>
                    </div>
                  </div>
                  <div class="row verifikasi">
                    <div class="col-md-4">
                      <label class="labelProfile">Verifikasi Password</label>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <input type="password" id="inputVerifikasi" class="form-control">
                      </div>
                    </div>
                  </div>
                  <br>
                  <br>
                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <button type="button" class="btn bg-purple btn-purple btn-block ladda-button" id="btnSavePassword" data-style="zoom-in">Save</button>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-editFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Ubah Avatar Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="inputAvatar">
            <div class="row">
              <div class="col-md-3"></div>
              <?php foreach ($avatar as $ava): ?>
                <?php if ($ava->ID == '1' || $ava->ID == '2'): ?>
                  <div class="col-md-3 text-center">
                    <div id="<?=$ava->ID?>" class="text-center lingkaran">
                      <a href="javascript:;" class="btnLingkaran" data="<?=$ava->ID?>" avatar="<?=$ava->AVATAR?>">
                        <img src="<?=base_url()?>assets/image/avatar/<?=$ava->FOTO?>" class="img-circle elevation-2 fotoLingkaran" alt="User Image">
                      </a>
                    </div>
                  </div>    
                <?php endif ?>
              <?php endforeach ?>
            </div>
            <br>
            <div class="row">
              <div class="col-md-3"></div>
              <?php foreach ($avatar as $ava): ?>
                <?php if ($ava->ID == '3' || $ava->ID == '4'): ?>
                  <div class="col-md-3 text-center">
                    <div id="<?=$ava->ID?>" class="text-center lingkaran">
                      <a href="javascript:;" class="btnLingkaran" data="<?=$ava->ID?>" avatar="<?=$ava->AVATAR?>">
                        <img src="<?=base_url()?>assets/image/avatar/<?=$ava->FOTO?>" class="img-circle elevation-2 fotoLingkaran" alt="User Image">
                      </a>
                    </div>
                  </div>    
                <?php endif ?>
              <?php endforeach ?>
            </div>
          </div>
          <div class="modal-footer getDataKaryawan">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn bg-purple ladda-button btnSaveAvatar" data-style="expand-right" id="btnSaveAvatar">Save</button>
          </div>
        </div>
      </div>
    </div>
    
    <?php $this->load->view('templates/footer');?>
</div>
<?php $this->load->view("templates/js");?>
<script src="<?= base_url()?>assets/plugins/select2/js/select2.full.min.js"></script>
<script src="<?= base_url()?>assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?= base_url()?>assets/plugins/sweetalert2_ori/dist/sweetalert2.min.js"></script>
<script src="<?= base_url()?>assets/plugins/ladda-buttons/js/spin.min.js"></script>
<script src="<?= base_url()?>assets/plugins/ladda-buttons/js/ladda.min.js"></script>
<script src="<?= base_url()?>assets/plugins/ladda-buttons/js/ladda.jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
 $("#upload").click(function(){
            const fileupload = $('#fileupload').prop('files')[0];
            var nama_file =$("#username").val();
        
        if(nama_file==''){
          
        alert('username harus diisi!');
        exit();
    
        }
  
            if (nama_file!="" && fileupload!="") {
                let formData = new FormData();
                formData.append('fileupload', fileupload);
                formData.append('nama_file', nama_file);
  
                $.ajax({
                    type: 'POST',
                    url:'tesup',
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (msg) {
                      
            

                      
            if(msg=='1'){
               $("#foto").val(nama_file+'.PNG');
                alert('Data Berhasil Diupload');
                document.getElementById("form-data").reset();
              changeImage(nama_file+'.PNG');
            }else if(msg=='3'){
              
                alert('Max Upload 5mb!!!');
            
            }else{
                alert("Data Gagal Diupload");
            }
                    },
                    error: function () {
                        alert("Data Gagal Diupload");
                    }
                });
            }
        });



    $('.select2').select2({
        'width': '100%',
    });
    $('.preloader').fadeOut('slow');
    $('.load-modal').fadeOut('slow');
    $('.ladda-button').ladda('bind', {timeout: 1000});
    
    // $('.ph-item').fadeOut('slow');
    // $('.test').fadeIn('slow').removeClass('d-none');
    
    // make_skeleton().fadeOut();

   $('#btnEditFoto').on('click', function(){
    $('#modal-editFoto').modal('show');
   });
   $('.btnLingkaran').on('click', function(){
    var id = $(this).attr("data");
    var avatar = $(this).attr("avatar");
    $('#inputAvatar').val(avatar);
    if (id=='1') {
      $('#1').addClass('bg-purple');
      $('#2').removeClass('bg-purple');
      $('#3').removeClass('bg-purple');
      $('#4').removeClass('bg-purple');
    }else if(id=='2'){
      $('#1').removeClass('bg-purple');
      $('#2').addClass('bg-purple');
      $('#3').removeClass('bg-purple');
      $('#4').removeClass('bg-purple');
    }else if(id=='3'){
      $('#1').removeClass('bg-purple');
      $('#2').removeClass('bg-purple');
      $('#3').addClass('bg-purple');
      $('#4').removeClass('bg-purple');
    }else{
      $('#1').removeClass('bg-purple');
      $('#2').removeClass('bg-purple');
      $('#3').removeClass('bg-purple');
      $('#4').addClass('bg-purple');
    }
   })

   var btnSaveAvatar = $('.btnSaveAvatar').ladda();
      btnSaveAvatar.click(function () {
      // Start loading
      btnSaveAvatar.ladda('start');
      // Timeout example
      // Do something in backend and then stop ladda
      setTimeout(function () {
          var inputAvatar = $('#inputAvatar').val();
          if (inputAvatar == '') {
            Swal.fire("Pilih Avatar Terlebih Dulu!","","warning")
          } else {
            $.ajax({
              type: 'post',
              dataType: 'json',
              data:{inputAvatar},
              url:'updateAvatar',
              cache:true,
              async: true,
              success: function(data){
                berhasil()
                $('#modal-editFoto').modal('hide');
              },
              error: function(){
                gagal();
              }
            })
          }
          btnSaveAvatar.ladda('stop');
          return false;
          
      }, 1000)
    });
    $('.verifikasi').addClass('d-none');
    $('#inputPassword').on('keyup', function(){
      $('.verifikasi').removeClass('d-none');
      cekPassword();
    });
    $('#inputVerifikasi').on('keyup', function(){
      cekPassword();
    })

    var btnSavePassword = $('#btnSavePassword').ladda();
      btnSavePassword.click(function () {
      // Start loading
      btnSavePassword.ladda('start');
      // Timeout example
      // Do something in backend and then stop ladda
      setTimeout(function () {
          var inputPassword = $('#inputPassword').val();
          if (inputPassword == '') {
            Swal.fire("Isi Passwordnya Terlebih Dahulu!","","warning")
          } else {
            $.ajax({
              type: 'post',
              dataType: 'json',
              data:{inputPassword},
              url:'updatePassword',
              cache:true,
              async: true,
              success: function(data){
                $('.verifikasi').addClass('d-none');
                $('#inputVerifikasi').val("");
                berhasil()
              },
              error: function(){
                gagal();
              }
            })
          }
          btnSavePassword.ladda('stop');
          return false;
          
      }, 1000)
    });


  })

  function changeImage(fotoname) {
      urlitem="<?php echo base_url();?>assets/image/avatar/";

      
      if(fotoname!=''){
      imagine.src = urlitem+fotoname;
      }else{
      imagine.src = "<?php echo base_url();?>assets/image/avatar/avatar5.PNG";  
      }

        console.log(imagine.src);
    }

  function berhasil() {
      Swal.fire({
        position: 'top-end',
        toast : true,
        icon: 'success',
        title: 'Berhasil Menyimpan Data!',
        showConfirmButton: false,
        timer: 3000
      })
    }

    function gagal() {
      Swal.fire({
        position: 'top-end',
        toast : true,
        icon: 'error',
        title: 'Gagal Menyimpan Data! Hubungi Staff IT',
        showConfirmButton: false,
        timer: 3000
      })
    }

    function cekPassword() {
      var password = $('#inputPassword').val();
      var verifikasi = $('#inputVerifikasi').val();
      if (password == '') {
        $('#inputVerifikasi').addClass("is-invalid");
        $('#inputPassword').addClass("is-invalid");
        $('#btnSavePassword').attr("disabled","disabled");
      }else{
        $('#inputPassword').removeClass("is-invalid");
        if (password != verifikasi) {
          $('#inputVerifikasi').addClass("is-invalid");
          $('#inputVerifikasi').removeClass("is-valid");
          $('#btnSavePassword').attr("disabled","disabled");
          
        } else {
          $('#inputVerifikasi').removeClass("is-invalid");
          $('#inputVerifikasi').addClass("is-valid");
          $('#btnSavePassword').removeAttr("disabled","disabled");
        }
      }
    }
  

</script>
<!-- FootJS -->
</body>
</html>
