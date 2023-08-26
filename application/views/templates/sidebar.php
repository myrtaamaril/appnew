<aside class="main-sidebar sidebar-light-purple elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:void(0);"  class="brand-link bg-info bg-purple">
      <img src="<?=base_url()?>assets/image/logo-company/<?=$this->session->userdata("logocompany")?>"  class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?=$this->session->userdata("namasistem")?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>assets/image/avatar/<?=$this->session->userdata("avatar")?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
           <a href="javascript:;" class="d-block btnUser"><?=$this->session->userdata("nickname")?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
     

      <!-- Sidebar Menu -->
       <?php if ($this->session->userdata("username")!= ''): ?>
       <nav class="mt-2 nav-collapse-hide-child">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item ">
            <a href="<?=base_url()?>dashboard" class="nav-link <?= $side == 'dashboard'?'active':''?>">
              <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item <?=$this->uri->segment("1")=='data_master'?'menu-open':''?>">
            <a href="javascript:void(0);" class="nav-link <?=substr($side, 0, 11) == 'data_master'?'active':''?>">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <?php if ($this->session->userdata("otori")== 'SUPER ADMIN'): ?>
             <ul class="nav nav-treeview ">
              <li class="nav-item list-menu-open">
                <a href="<?=base_url()?>data_master/user_login" class="nav-link <?=substr($side,12) == 'login'?'active':''?>">
                  <i class="nav-icon fa fa-users   <?=substr($side, 12) == 'login'?'text-dark':''?>" style="font-size: 16px;"></i>
                  <p>User Login</p>
                </a>
              </li>
            </ul>
                <?php endif ?>
            <ul class="nav nav-treeview ">
              <li class="nav-item list-menu-open">
                <a href="<?=base_url()?>data_master/kelompok" class="nav-link <?=substr($side,12) == 'kelompok'?'active':''?>">
                  <i class="nav-icon  fa fa-th-list     <?=substr($side, 12) == 'kelompok'?'text-dark':''?>" style="font-size: 16px;"></i>
                  <p>Kelompok</p>
                </a>
              </li>
            </ul>
               <ul class="nav nav-treeview ">
              <li class="nav-item list-menu-open">
                <a href="<?=base_url()?>data_master/anggota" class="nav-link <?=substr($side,12) == 'anggota'?'active':''?>">
                  <i class="nav-icon  fa fa-address-card     <?=substr($side, 12) == 'anggota'?'text-dark':''?>" style="font-size: 16px;"></i>
                  <p>Anggota</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
             <a href="<?=base_url()?>buku" class="nav-link <?=substr($side, 0, 4) == 'Buku'?'active':''?>">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Buku
             
              </p>
            </a>
          </li>
        </ul>
      </nav>
       <?php endif ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
