<div class="modal fade" id="modal-profil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable" role="document">
    <div class="modal-content"  style="background-color: rgb(128, 0, 128); color: white;">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <center>
              <div class="image">
                <img  width="150px" height="150px" src="<?=base_url()?>assets/image/avatar/<?=$this->session->userdata("avatar")?>" class="img-circle elevation-2" alt="User Image">
              </div>
            </center>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-12">
            <center>
              <h4><?=$this->session->userdata("nickname")?></h4>
            </center>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <center>
              <h4><?=$this->session->userdata("otori")?></h4>
            </center>
          </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
            <div class="row">
              <div class="col-md-12 text-center">
                <span style="font-size: 14px"><b>ID</b></span>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12 text-center">
                <h6><?=$this->session->userdata("id")?></h6>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-12 text-center">
                <span style="font-size: 14px"><b>Company Name</b></span>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12 text-center">
                <h6><?=$this->session->userdata("companyname")?></h6>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-12 text-center">
                <span style="font-size: 14px"><b>Expired</b></span>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12 text-center">
                <h6><?=$this->session->userdata("tglexpired")?></h6>
              </div>
            </div>
          </div>
        
        </div>
        <br>
        <br>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <a href="<?=base_url()?>Auth/Profile" class="btn bg-purple btn-kps-profile btn-blok form-control">
              View Profile
            </a>
          </div>
          <div class="col-md-2"></div>
          
        </div>
      </div>
    </div>
  </div>
</div>
 <footer class="main-footer">
    <strong>Copyright &copy; alfi chandra fajri<a href="#">2023</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> Beta
    </div>
  </footer>