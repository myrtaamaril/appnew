
<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="stylesheet" href="<?= base_url() ?>assets/lte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <?php $data['judul'] ='Dashboard';
  $this->load->view("templates/header",$data)?>
</head>


<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse layout-navbar-fixed layout-footer-fixed">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?=base_url()?>assets/image/logo-company/<?=$this->session->userdata("logocompany")?>"  alt="AdminLTELogo" height="60" width="60">
  </div>
<div class="wrapper">
   <?php $this->load->view('templates/navbar');?>
<?php $this->load->view('templates/sidebar');?>

    <div class="content-wrapper">
<?php $this->load->view('templates/content-header');?>

<?php echo $contents; ?>


</div>
<?php $this->load->view('templates/footer');?>
</div>
<?php $this->load->view('templates/js');?>
<script src="<?= base_url()?>assets/lte/plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
   

       $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
     });
 </script>
</body>
</html>