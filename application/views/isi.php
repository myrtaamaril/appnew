  <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">TOP 10 Jumlah Buku Terbanyak</h3>
               <!-- <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div> -->
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>

                  <tr>
                    <th>Kelompok</th>
                    <th>Qty</th>
                    </tr>
                  </thead>
                  <tbody>
                          <?php  foreach ($rekapkelompok as $key): ?>
                  <tr>
                    <td>
                     <?=$key->kelompok?>
                    </td>
                    <td><?=$key->qty?></td>
                   </tr>
                <?php  endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">TOP 10 Jumlah Buku Terendah</h3>
               <!-- <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div> -->
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>

                  <tr>
                    <th>Kelompok</th>
                    <th>Qty</th>
                    </tr>
                  </thead>
                  <tbody>
                          <?php  foreach ($rekapkelompok2 as $key2): ?>
                  <tr>
                    <td>
                     <?=$key2->kelompok?>
                    </td>
                    <td><?=$key2->qty?></td>
                   </tr>
                <?php  endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <!-- row -->

            <!-- PIE CHART 
            <div class="col-lg-12">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Pie Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              
            </div>
          </div>-->

        </div>
      </div>
    </div>