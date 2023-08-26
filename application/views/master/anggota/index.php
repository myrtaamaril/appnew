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
  
  <?php $data['judul'] ='Anggota';
  $this->load->view("templates/header",$data)?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse layout-navbar-fixed layout-footer-fixed">
 <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?=base_url()?>assets/image/logo-company/<?=$this->session->userdata("logocompany")?>"  alt="AdminLTELogo" height="60" width="60">
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
                        <button type="button" class="btn bg-purple btn-block btn-sm" id="btnkelompok" data-toggle="modal" onclick="javascript:kosong();">
                          <i class="fas fa-user-plus"></i>
                          &nbsp;&nbsp;Tambah Anggota
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
     <div class="modal fade" id="modal-anggota">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Anggota</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
              <div class="col-md-4"></div>
          <div class="input-group mb-3">
            <input id="id_anggota" type="text" hidden>
          <input id="noanggota" type="text" class="form-control" placeholder="noanggota" disabled>
          </div>

          <div class="input-group mb-3">
          <input id="Nama" type="text" class="form-control" placeholder="Nama">
          </div>
              <div class="col-md-6"> 
         <label>Tanggal Daftar</label>                           
               <input type="date" id="tgldaftar" class="form-control">             
         </div> 
          <div  class="col-md-6">
           <label>Tanggal Lahir</label>  
            <input type="date" id="tgllahir" class="form-control">
         </div>
          <label>&nbsp;</label> 
          <div class="input-group mb-3">
          <textarea id="alamat" type="text" class="form-control" placeholder="Alamat"></textarea>
          </div>
          <div class="input-group mb-3">
          <textarea id="keterangan" type="text" class="form-control" placeholder="Keterangan"></textarea>
          </div>
           <div class="input-group mb-3">
          <select class="form-control" id="Status">
             <option value="" >Status</option>
              <option value="AKTIF" >AKTIF</option>
              <option value="TIDAK AKTIF">TIDAK AKTIF</option>
               </select>
        </div>
     

           
       </div>
     
            <div class="modal-footer right-content-between">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn bg-purple ladda-button saveAkun" data-style="expand-right" onclick="javascript:save();">
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
  $('.ladda-button').ladda('bind', {timeout: 1000});

    getTabel();
    $('#search').submit(function(e){
      e.preventDefault();
      getTabel();
    })


  })
  

    function ubahdata(id_anggota,noanggota,Nama,tgldaftar,tgllahir,alamat,status,keterangan){

$('#id_anggota').val(id_anggota);
$('#noanggota').val(noanggota);
$('#Nama').val(Nama);
$('#tgldaftar').val(tgldaftar);
$('#tgllahir').val(tgllahir);
$('#alamat').val(alamat);
$('#keterangan').val(keterangan);
$('#modal-anggota').modal("show");
$('#Status').val(status); 
  }

  function save(){
var id_anggota =$('#id_anggota').val();
var noanggota=$('#noanggota').val();
var Nama=$('#Nama').val();
var tgldaftar=$('#tgldaftar').val();
var tgllahir=$('#tgllahir').val();
var alamat=$('#alamat').val();
var keterangan =$('#keterangan').val();
var status =$('#Status').val(); 

          if (noanggota == ''|| Nama=='') {
              Swal.fire("Isi Terlebih Dahulu!","Data Tidak Bisa di Save Saat semua Belum Diisi","warning")
              saveAkun.ladda('stop');
            }else{
              $.ajax({
                type:"POST",
                data:{id_anggota,noanggota,Nama,tgldaftar,tgllahir,alamat,keterangan,status},
                url: 'tambahanggota',
                dataType: "JSON",
                cache: false,
                async: false,
                success: function(data){
                
                  Swal.fire("Berhasil","Data anggota tersimpan","success")
                  $('#modal-anggota').modal('hide');
               getTabel();//  $('#datatableid').DataTable().ajax.reload();
                },
                error: function(data){
                  Swal.fire("Gagal Menyimpan Data!",'Hubungi Staff IT!','error');
                
                }
              }) 
            }

}
function kosong(){
$('#id_anggota').val('');
$('#noanggota').val('');
$('#Nama').val('');
$('#tgldaftar').val('');
$('#tgllahir').val('');
$('#alamat').val('');
$('#keterangan').val('');
$('#Status').val('');
ambil_nomor();
$('#modal-anggota').modal("show");

}

function ambil_nomor(){



 $.ajax({
                type:"POST",
                url: 'ambilnoanggota',
                dataType: "JSON",
                cache: false,
                async: false,
                success: function(data){
                
               $('#noanggota').val(data.nomor);
              
          
     
                },
                error: function(data){
                  Swal.fire("Gagal Hapus Data!",'Hubungi Staff IT!','error');
                
                }
              }) 

}

     function hapus(id_anggota,kelompok){
Swal.fire({
  title: 'Apa anda yakin menghapus No.Anggota '+kelompok+' ?',
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
                data:{id_anggota},
                url: 'hapusanggota',
                dataType: "JSON",
                cache: false,
                async: false,
                success: function(data){
                
                  Swal.fire("Berhasil","Kelompok Terhapus","success")
               //   $('#modal-anggota').modal('hide');
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
      url: 'getTabelanggota',
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
