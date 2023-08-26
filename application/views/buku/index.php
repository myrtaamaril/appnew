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
  
  <?php $data['judul'] = 'Data Buku';
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
                        <button type="button" class="btn bg-purple btn-block btn-sm" id="btnTambahAkun" onclick="javascript:kosong();">
                          <i class="fas fa-user-plus"></i>
                          &nbsp;&nbsp;Tambah Data Buku
                        </button>
                      </div>
                    </div>
                    
                  </div>
                  <br>
                  <div class="row">
                          <div class="col-12">
        <div class="table-responsive">
          <table id="datatableid" class="table table-horvered table-striped table-bordered" width="100%">
            <thead class="text-center bg-gray">
              <tr>
          
                <th>Id.Buku</th>
                <th>Kode</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Kelompok</th>
                <th>Jumlah Buku</th>
                <th>Sub Judul</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!-- List Data Menggunakan DataTable -->              
            </tbody>
          </table>
        </div>
      </div>
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
     <div class="modal fade" id="modal-tambahbuku">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Data Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
              <div class="col-md-4"></div>
        <div class="input-group mb-3">
           <input id="id_buku" type="text" hidden>
          <input id="kode" type="text" class="form-control" placeholder="Kode">
        
        </div>
        <div class="input-group mb-3">
          <input id="judul" type="text" class="form-control" placeholder="Judul">
         
        </div>
        <div class="input-group mb-3">
          <input id="penulis" type="text" class="form-control" placeholder="Penulis">
         </div>
                 <div class="input-group mb-3">
          <input id="subjudul" type="text" class="form-control" placeholder="Sub Judul">
         </div>
        <div class="col-md-8"> 
         <label>Kelompok</label>                           
            <select class="select2 form-control select2-purle" data-dropdown-css-class="select2-purle" id="kelompok" style="width: 100%">
             <option value="">Kelompok</option>
           </select>              
         </div>                
         <div  class="col-md-4">
           <label>Jumlah Buku:</label>  
            <input type="number" id="qty" class="form-control">
         </div>
          </div>
            <div class="modal-footer right-content-between">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn bg-purple ladda-button saveAkun" data-style="expand-right" id="btnSaveAkun" onclick="javascript:save()">
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
   
       $('#datatableid').DataTable({
              "processing": true,
              "serverSide": true,
              "ajax":{
                       "url": "buku/ambil_buku",
                       "dataType": "json",
                       "type": "POST"
                     },
            columnDefs: [
        
                { orderable: false, targets: 7 },
            ],
              "columns": [
                 
                  { "data": "id_buku" },
                  { "data": "kode" },
                  { "data": "Judul_Buku" },
                  { "data": "penulis" },
                  { "data": "kelompok" },
                  { "data": "jumlah_buku" },
                  { "data": "sub_judul" },
                  { "data": "aksi" },
              ]  

    

          });

       $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });


    $("#kelompok").select2({
      ajax: { 
        url: 'buku/getkelompok',
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




});

function save(){
var kelompok= $("#kelompok").select2('val');
var id_buku= $('#id_buku').val();
var kode= $('#kode').val();
var judul= $('#judul').val();
var penulis= $('#penulis').val();
var qty= $('#qty').val();
var subjudul= $('#subjudul').val();

          if (judul == ''||penulis==''||qty=='') {
              Swal.fire("Isi Terlebih Dahulu!","Data Tidak Bisa di Save Saat semua Belum Diisi","warning")
              saveAkun.ladda('stop');
            }else{
              $.ajax({
                type:"POST",
                data:{id_buku,kelompok,kode,judul,penulis,qty,subjudul},
                url: 'buku/tambahdatabuku',
                dataType: "JSON",
                cache: false,
                async: false,
                success: function(data){
                
                  Swal.fire("Berhasil","Data buku tersimpan","success")
                  $('#modal-tambahbuku').modal('hide');
                 $('#datatableid').DataTable().ajax.reload();
                },
                error: function(data){
                  Swal.fire("Gagal Menyimpan Data!",'Hubungi Staff IT!','error');
                
                }
              }) 
            }

}

  function kosong(){
   $('#id_buku').val('');
   $('#kode').val('');
   $('#judul').val('');
   $('#penulis').val('');
   $('#qty').val('');
   $('#subjudul').val('');
   $('#kelompok').val(null).trigger('change');
  $('#modal-tambahbuku').modal("show");
  }

   function hapus(id_buku,judul){
Swal.fire({
  title: 'Apa anda yakin menghapus buku '+judul+' ?',
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
                data:{id_buku},
                url: 'buku/hapusbuku',
                dataType: "JSON",
                cache: false,
                async: false,
                success: function(data){
                
                  Swal.fire("Berhasil","Data buku terhapus","success")
               //   $('#modal-tambahbuku').modal('hide');
                 $('#datatableid').DataTable().ajax.reload();
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
   

  function ubahdata(id_buku,kode,Judul_Buku,penulis,id_kelompok,jumlah_buku,sub_judul,kelompok){

   $('#id_buku').val(id_buku);
   $('#kode').val(kode);
   $('#judul').val(Judul_Buku);
   $('#penulis').val(penulis);
   $('#qty').val(jumlah_buku);
   $('#subjudul').val(sub_judul);

// Set the value, creating a new option if necessary
if ($('#kelompok').find("option[value='" +id_kelompok + "']").length) {
    $('#kelompok').val(id_kelompok).trigger('change');
} else { 
    // Create a DOM Option and pre-select by default
    var newOption = new Option(kelompok,id_kelompok, true, true);
    // Append it to the select
    $('#kelompok').append(newOption).trigger('change');
} 
   $('#modal-tambahbuku').modal("show");

  }
 
   


   
  

</script>
<!-- FootJS -->
</body>
</html>
