<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo"><b>Kelola Desa</b></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav">
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">record_voice_over</i>
                  </div>
                  <p class="card-category">Jumlah Data Kelola Desa</p>
                 <h3 class="card-title"><?php echo $desaCount[0]->count; ?>
                    <small>Data</small>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Pegawai
                  </div>
                </div>
              </div>
            </div>
          </div>


    <div class="collapse navbar-collapse justify-content-end">
    </div>
        <div class="card card-info">
          <div class="card-header">
        <div class="card-body">
          <div class="tab-content">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr class="text-black">
                  <th style="text-align: center;">No.</th>
                  <th style="text-align: center;">ID Desa</th>
                  <th style="text-align: center;">Nama Desa</th>
                  <th style="text-align: center;">Dukuh</th>
                  <th style="text-align: center;">Dusun</th>
                  <th style="text-align: center;">RW</th>
                  <th style="text-align: center;">RT</th>
                  <th style="text-align: center;">Tahun</th>
                  <th style="text-align: center;">Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php 
                $no=1;
                foreach ($dataDesa as $dataDesa)
                  : ?>
                <tr>
                  <td style="text-align: center;"><?php echo $no++; ?></td>
                  <td style="text-align: center;"><?php echo $dataDesa-> id_desa; ?></td>
                  <td style="text-align: center;"><?php echo $dataDesa -> nama_desa; ?></td>
                  <td style="text-align: center;"><?php echo $dataDesa -> dukuh; ?></td>
                  <td style="text-align: center;"><?php echo $dataDesa -> dusun; ?></td>
                  <td style="text-align: center;"><?php echo $dataDesa -> rw; ?></td>
                  <td style="text-align: center;"><?php echo $dataDesa -> rt; ?></td>
                  <td style="text-align: center;"><?php echo $dataDesa -> tahun; ?></td>
                  <td style="text-align: center;">
                   <a class="btn btn-warning btn-sm" href="<?php echo base_url() ?>admin/desa/edit_desa/<?php echo $dataDesa->id_desa ?>">Edit</a>
                     <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>admin/desa/hapus_desa/<?php echo $dataDesa->id_desa ?>" onclick="return confirm('Yakin ingin menghapus?')" >Delete</a>
                      </td>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
