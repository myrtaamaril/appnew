<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Select2 -->

  <link rel="stylesheet" href="<?= base_url() ?>assets/lte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2_ori/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/ladda-buttons/css/ladda-themeless.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  
  <?php $data['judul'] ='User Login';
  $this->load->view("templates/header",$data)?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse layout-navbar-fixed layout-footer-fixed">
 <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?=base_url()?>assets/image/logo-company/<?=$this->session->userdata("logocompany")?>"   height="60" width="60">
  </div>
<div class="wrapper">
    <?php $this->load->view('templates/navbar');?>
    <?php $this->load->view('templates/sidebar');?>
    <div class="content-wrapper">
      <?php $this->load->view('templates/content-header');?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>&nbsp;</label>
                        <button type="button" class="btn bg-purple btn-block btn-sm" id="btnTambahAkun" data-toggle="modal" onclick="javascript:kosong();">
                          <i class="fas fa-user-plus"></i>
                          &nbsp;&nbsp;Tambah Akun
                        </button>
                      </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-6">
                      <form id="search">
                        <div class="form-group">
                          <label>&nbsp;</label>
                         
                          <input type="search" class="form-control form-control-search" id="filSearch" placeholder="Cari">
                        </div>
                      </form>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <div id="getTabel"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     <!-- Modal -->
     <div class="modal fade" id="modal-tambahAkun">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Akun</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
              <div class="col-md-4"></div>
        <div class="input-group mb-3">
          <input id="nickname" type="text" class="form-control" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="username" type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="pass" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-control" id="otoritas">
             <option value="" >Otoritas</option>
              <option value="SUPER ADMIN" >SUPER ADMIN</option>
              <option value="ADMIN">ADMIN</option>
               <option value="PENGGUNA">PENGGUNA</option>
               </select>
        </div>
        <div class="col-md-6"> 
         <label>Company Name</label>                           
            <select placeholder="Company Name" class="select2 form-control select2-purle" data-dropdown-css-class="select2-purle" id="customer" style="width: 100%">
             <option value="">Company Name</option>
           </select>              
         </div>                
         <div  class="col-md-6">
           <label>Expired Date:</label>  
            <input type="date" id="tglexpired" class="form-control">
         </div>
          </div>
            <div class="modal-footer right-content-between">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn bg-purple ladda-button saveAkun" data-style="expand-right" id="btnSaveAkun">
              <i class="fa fa-save"></i>&nbsp;Save</button>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </div>
      <!-- /.modal -->


           <!-- Modal -->
     <div class="modal fade" id="modal-editakun">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">EDIT AKUN</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
              <div class="col-md-4"></div>
        <div class="input-group mb-3">           
          <input id="username2" type="text" class="form-control" disabled>
        </div>
        <div class="input-group mb-3">           
          <input id="nickname2" type="text" class="form-control">
        </div>
           <div class="input-group mb-3">
          <select class="form-control" id="otoritas2">
             <option value="" >Otoritas</option>
              <option value="SUPER ADMIN" >SUPER ADMIN</option>
              <option value="ADMIN">ADMIN</option>
               <option value="PENGGUNA">PENGGUNA</option>
               </select>
        </div>
         <div class="col-md-6"> 
         <label>Company Name</label>                           
            <select placeholder="Company Name" class="select2 form-control select2-purle" data-dropdown-css-class="select2-purle" id="customer2" style="width: 100%">
             <option value="">Company Name</option>
           </select>              
         </div> 
          <div  class="col-md-6">
           <label>Expired Date:</label>  
            <input type="date" id="tglexpired2" class="form-control">
         </div>
       </div>
            <div class="modal-footer right-content-between">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn bg-purple" data-style="expand-right" onclick="javascript:saveedit();">
              <i class="fa fa-save"></i>&nbsp;Save</button>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </div>
      <!-- /.modal -->
    <?php $this->load->view('templates/footer');?>
  </div>
<?php $this->load->view("templates/js");?>
<!-- Select2 -->
<script src="<?= base_url()?>assets/plugins/select2/js/select2.full.min.js"></script>
<script src="<?= base_url()?>assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?= base_url()?>assets/plugins/sweetalert2_ori/dist/sweetalert2.min.js"></script>
<script src="<?= base_url()?>assets/plugins/ladda-buttons/js/spin.min.js"></script>
<script src="<?= base_url()?>assets/plugins/ladda-buttons/js/ladda.min.js"></script>
<script src="<?= base_url()?>assets/plugins/ladda-buttons/js/ladda.jquery.min.js"></script>
<script src="<?= base_url()?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(function () {
      bsCustomFileInput.init();
    });
</script>
<script type="text/javascript">
  $(document).ready(function(){
   

       $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });


    $('.ladda-button').ladda('bind', {timeout: 1000});

    getTabel();
    $('#search').submit(function(e){
      e.preventDefault();
      getTabel();
    })
    $("#customer").select2({
      ajax: { 
        url: 'getcompanyname',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
              cari: params.term // search term
            };
        },
        processResults: function (response) {
            return {
               results: response
            };
            console.log(response)

        },
        cache: true
      }
    });

       $("#customer2").select2({
      ajax: { 
        url: 'getcompanyname',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
              cari: params.term // search term
            };
        },
        processResults: function (response) {
            return {
               results: response
            };
            console.log(response)

        },
        cache: true
      }
    });

    var saveAkun = $('.saveAkun').ladda();

    saveAkun.click(function () {
        // Start loading
        saveAkun.ladda('start');

        // Timeout example
        // Do something in backend and then stop ladda
        setTimeout(function () {
            var nickname = $('#nickname').val();
            var username = $('#username').val();
            var pass = $('#pass').val();
            var customer =$("#customer").select2('val');
            var tglexpired = $('#tglexpired').val();
             var otoritas = $('#otoritas').val();
            
          if (username == ''||customer==''||tglexpired==''||otoritas=='') {
              Swal.fire("Isi Terlebih Dahulu!","Data Tidak Bisa di Save Saat semua Belum Diisi","warning")
              saveAkun.ladda('stop');
            }else{
              $.ajax({
                type:"POST",
                data:{nickname,username,pass,customer,tglexpired,otoritas},
                url: 'tambahAkun',
                dataType: "JSON",
                cache: false,
                async: false,
                success: function(data){
                  saveAkun.ladda('stop');
                  Swal.fire("Berhasil Menambah Akun","Jangan Lupa Ganti Password","success")
                  $('#modal-tambahAkun').modal('hide');
                  getTabel();
                },
                error: function(data){
                  Swal.fire("Gagal Menyimpan Data!",'Hubungi Staff IT!','error');
                  saveAkun.ladda('stop');
                }
              }) 
            }
            
            return false;
            // 
        }, 1000)
    });

    

    $('#getTabel').on('change', '#editLevel', function(){
      var nik = $(this).attr('nik');
      var level = $(this).val();
      $.ajax({
        type:"POST",
        data:{nik,level},
        dataType:'JSON',
        url:"ubahLevelAkun",
        cache: false,
        async: true,
        success: function(){
          Swal.fire({
            position: 'top-end',
            toast : true,
            icon: 'success',
            title: 'Level Berhasil Diubah',
            showConfirmButton: false,
            timer: 1500
          })
        },
        error: function(){
          Swal.fire({
            position: 'top-end',
            toast : true,
            icon: 'error',
            title: 'Level Gagal Diubah! Hubungi Staff IT',
            showConfirmButton: false,
            timer: 1500
          })
        }
      })
    });
 
  })
  
       function hapus(username){
Swal.fire({
  title: 'Apa anda yakin menghapus username '+username+' ?',
  text: "data yang sudah dihapus tidak bisa d kembalikan!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
 $.ajax({
                type:"POST",
                data:{username},
                url: 'hapususer',
                dataType: "JSON",
                cache: false,
                async: false,
                success: function(data){
                
                  Swal.fire("Berhasil","User Terhapus","success")
                  //$('#modal-kelompok').modal('hide');
                // $('#datatableid').DataTable().ajax.reload();
                getTabel();
                },
                error: function(data){
                  Swal.fire("Gagal Hapus Data!",'Hubungi Staff IT!','error');
                
                }
              }) 
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
 }
})
  }


    function kosong(){
      $('#customer').val(null).trigger('change');
      $('#nickname').val('');
      $('#username').val('');
      $('#pass').val('');
      $('#tglexpired').val('');
      $('#otoritas').val('');
        $('#modal-tambahAkun').modal('show');
    }

function saveedit(){
var nickname2=$('#nickname2').val();
var username2= $('#username2').val();
var tglexpired2=$('#tglexpired2').val();
var otoritas2= $('#otoritas2').val();
var customer2 =$("#customer2").select2('val');

     if (username2 == '') {
              Swal.fire("Isi Terlebih Dahulu!","Data Tidak Bisa di Save Saat semua Belum Diisi","warning")
              saveAkun.ladda('stop');
            }else{
              $.ajax({
                type:"POST",
                data:{nickname2,username2,tglexpired2,otoritas2,customer2},
                url: 'editdataakun',
                dataType: "JSON",
                cache: false,
                async: false,
                success: function(data){                
                  Swal.fire("Berhasil","Data akun terupdate","success")
                  $('#modal-editakun').modal('hide');
               getTabel()
                },
                error: function(data){
                  Swal.fire("Gagal Menyimpan Data!",'Hubungi Staff IT!','error');
                
                }
              }) 
            }

}




    function ubahdata(username,nickname,tglexpired,otoritas,companyname,id_customer){
$('#nickname2').val(nickname);
$('#username2').val(username);
$('#tglexpired2').val(tglexpired);
$('#otoritas2').val(otoritas);

// Set the value, creating a new option if necessary
if ($('#customer2').find("option[value='" +id_customer + "']").length) {
    $('#customer2').val(id_customer).trigger('change');
} else { 
    // Create a DOM Option and pre-select by default
    var newOption = new Option(companyname,id_customer, true, true);
    // Append it to the select
    $('#customer2').append(newOption).trigger('change');
} 


$('#modal-editakun').modal('show');

    }


  function ubahstatus(username,id){

      var status = $('#'+id).val();
      $.ajax({
        type:"POST",
        data:{username,status},
        dataType:'JSON',
        url:"ubahStatusAkun",
        cache: false,
        async: true,
        success: function(){
          Swal.fire({
            position: 'top-end',
            toast : true,
            icon: 'success',
            title: 'Status Berhasil Diubah',
            showConfirmButton: false,
            timer: 1500
          })
        },
        error: function(){
          Swal.fire({
            position: 'top-end',
            toast : true,
            icon: 'error',
            title: 'Status Gagal Diubah! Hubungi Staff IT',
            showConfirmButton: false,
            timer: 1500
          })
        }
      })
   // });
  }

  function getTabel() {
    var gagal = '<div class="alert alert-danger alert-dismissible">';
        gagal +='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        gagal +='<h5><i class="icon fas fa-ban"></i>Gagal Meload Data!</h5>';
        gagal +='Lakukan Refresh pada Halaman Ini! Jika Masih Error Mohon Untuk Hubungi Staff IT!';
        gagal +='</div>';
    var filSearch = $('#filSearch').val();
    $.ajax({
      type:'post',
      data: {filSearch},
      url: 'getTabelUserLogin',
      cache: false,
      async: true,
      beforeSend: function(data){
        $('.preloader').show();
      },
      success: function(data){
        $('#getTabel').html(data);
      },
      complete: function(data){
        $('.preloader').fadeOut("slow");
      },
      error: function(data){
        $('#getTabel').html(gagal);
      }
    });
  }
  

</script>
<!-- FootJS -->
</body>
</html>
