<div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $jml_produk ?></h3>

                <p>Produk</p>
              </div>
              <div class="icon">
                <i class="fas fa-boxes"></i>
              </div>
              <a href="<?= base_url('Produk')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $jml_kategori ?><sup style="font-size: 20px">%</sup></h3>

                <p>Kategori</p>
              </div>
              <div class="icon">
                <i class="fas fa-th-list"></i>
              </div>
              <a href="<?= base_url('Kategori')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $jml_satuan ?></h3>

                <p>Satuan</p>
              </div>
              <div class="icon">
                <i class="fas fa-list"></i>
              </div>
              <a href="<?= base_url('Satuan')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?= $jml_user ?></h3>

                <p>User</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="<?= base_url('User')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-primary">
              <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pendapatan Hari Ini</span>
                <span class="info-box-number">Rp <?= $p_hari_ini['total_harga'] ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
      </div>

      <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-indigo">
              <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pendapatan Bulan Ini</span>
                <span class="info-box-number">Rp<?= $p_bulan_ini['total_harga'] ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
      </div>

      <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pendapatan Tahun Ini</span>
                <span class="info-box-number"> Rp <?= $p_hari_ini['total_harga'] ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
      </div>


      <div class="col-md-12">
        <canvas id="myChart" width="100%" height="35px"></canvas>
</div>

<?php

if ($grafik == null){
  $tgl[] = 0;
  $total[] = 0;
  $untung[]= 0;
}else{
  foreach ($grafik as $key => $value){
    $tgl[] = $value['tgl_jual'];
    $total[] = $value['total_harga'];
    $untung[] = $value['untung'];
  } 
}


<script>
const ctx = document.getElementById('myChart');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= json_encode($tgl)?>,
        datasets: [{
            label: 'Grafik  Pendapatan Penjualan Bulan <?= date('M Y')?>',
            data:<?= json_encode($total)?>,
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 5
        },
        {
            label: 'Grafik  Keuntungan Penjualan Bulan <?= date('M Y')?>',
            data:<?= json_encode($untung)?>,
            backgroundColor: [
                'rgba(153 102, 255, 0.2)',
            ],
            borderColor: [
              'rgba(153 102, 255, 1)',
            ],
            borderWidth: 5
        }
      ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
