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
            <a class="navbar-brand" href="#pablo"><b>Kelola Kependudukan</b></a>
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
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Jumlah Data Kependudukan pada Sistem</p>
                  <h3 class="card-title"><?php echo $kependudukanCount[0]->count; ?>
                  <small>DATA</small>
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">date_range</i>
                  <a>Jumlah data Penduduk</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">content_copy</i>
                </div>
                <p class="card-category">Jumlah Data Kependudukan berdasarkan umur pada Sistem</p>
                <h3 class="card-title"><?php echo $kependudukan_umurCount[0]->count; ?>
                <small>DATA</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i>
                <a>Jumlah data Penduduk berdasarkan umur</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_copy</i>
              </div>
              <p class="card-category">Jumlah Data Mutasi Kependudukan pada Sistem</p>
              <h3 class="card-title"><?php echo $mutasiCount[0]->count; ?>
              <small>DATA</small>
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">date_range</i>
              <a>Jumlah data mutasi Kependudukanr</a>
            </div>
          </div>
        </div>

      </div>
    </div>


    <div class="collapse navbar-collapse justify-content-end">
    </div>
    <div class="card card-info">
      <div class="card-header">
        <a class="navbar-brand" href="#pablo"><b>Kelola Kependudukan</b></a>
        <div class="card-body">
          <div class="tab-content">
            <div class="row">
           <button type="button" data-toggle="modal" data-target="#tambah-data" class="btn btn-info" class="glyphicon glyphicon-repeat">Tambah Data Kependudukan</button>
           <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="<?php echo base_url('staf/laporan_kependudukan'); ?>" class="form-control btn btn-danger"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Cetak PDF</a>
          </div> 
        </div>
        <br>  
        <br>
            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr class="text-black">
                  <th style="text-align: center;">No.</th>
                  <th style="text-align: center;">Id Desa</th>
                  <th style="text-align: center;">Nama Desa</th>
                  <th style="text-align: center;">Laki - laki</th>
                  <th style="text-align: center;">Perempuan</th>
                  <th style="text-align: center;">Tahun</th>
                  <th style="text-align: center;">Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php 
                $no=1;
                foreach ($dataKependudukan as $dataKependudukan)
                  : ?>
                <tr>
                  <td style="text-align: center;"><?php echo $no++; ?></td>
                  <td style="text-align: center;"><?php echo $dataKependudukan -> id_desa; ?></td>
                  <td style="text-align: center;"><?php echo $dataKependudukan -> nama_desa; ?></td>
                  <td style="text-align: center;"><?php echo $dataKependudukan-> laki_laki; ?></td>
                  <td style="text-align: center;"><?php echo $dataKependudukan -> perempuan; ?></td>
                  <td style="text-align: center;"><?php echo $dataKependudukan -> tahun; ?></td>
                  <td style="text-align: center;">
                    <a class="btn btn-warning btn-sm" href="<?php echo base_url() ?>staf/penduduk/edit_kependudukan/<?php echo $dataKependudukan->id_desa ?>">Edit</a>
                      <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>staf/penduduk/hapus_kependudukan/<?php echo $dataKependudukan->id_desa ?>" onclick="return confirm('Yakin ingin menghapus?')" >Delete</a>
                      </td>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->

            <br>
            <a class="navbar-brand" href="#pablo"><b>Kelola Kependudukan berdasarkan umur</b></a>
            <div class="card-body">
              <div class="tab-content">
                <div class="row">
           <button type="button" data-toggle="modal" data-target="#tambah-data2" class="btn btn-info" class="glyphicon glyphicon-repeat">Tambah Data Tanah Bengkok</button>
           <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="<?php echo base_url('staf/laporan_kependudukan_umur'); ?>" class="form-control btn btn-danger"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Cetak PDF</a>
          </div> 
        </div>
        <br>
        <br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-black">
                      <th style="text-align: center;">No.</th>
                      <th style="text-align: center;">Id Desa</th>
                      <th style="text-align: center;">Nama Desa</th>
                      <th style="text-align: center;">Umur</th>
                      <th style="text-align: center;">Jenis Kelamin</th>
                      <th style="text-align: center;">Jumlah</th>
                      <th style="text-align: center;">Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php 
                    $no=1;
                    foreach ($dataKependudukan_umur as $dataKependudukan_umur)
                      : ?>
                    <tr>
                      <td style="text-align: center;"><?php echo $no++; ?></td>
                      <td style="text-align: center;"><?php echo $dataKependudukan_umur -> id_desa; ?></td>
                      <td style="text-align: center;"><?php echo $dataKependudukan_umur -> nama_desa; ?></td>
                      <td style="text-align: center;"><?php echo $dataKependudukan_umur-> umur; ?></td>
                      <td style="text-align: center;"><?php echo $dataKependudukan_umur -> jenis_kelamin; ?></td>
                      <td style="text-align: center;"><?php echo $dataKependudukan_umur -> jumlah; ?></td>
                      <td style="text-align: center;">
                        <a class="btn btn-warning btn-sm" href="<?php echo base_url() ?>staf/penduduk/edit_umur/<?php echo $dataKependudukan_umur->id_desa ?>">Edit</a>
                           <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>staf/penduduk/hapus_kep_umur/<?php echo $dataKependudukan_umur->id_desa ?>" onclick="return confirm('Yakin ingin menghapus?')" >Delete</a>
                          </td>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div><!-- /.card-body -->

                <br>
                <a class="navbar-brand" href="#pablo"><b>Kelola Mutasi Kependudukan</b></a>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="row">
           <button type="button" data-toggle="modal" data-target="#tambah-data3" class="btn btn-info" class="glyphicon glyphicon-repeat">Tambah Data Tanah Bengkok</button>
           <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="<?php echo base_url('staf/laporan_kependudukan_mutasi'); ?>" class="form-control btn btn-danger"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Cetak PDF</a>
          </div> 
        </div>
        <br>
        <br>
                    <table id="example3" class="table table-bordered table-striped">
                      <thead>
                        <tr class="text-black">
                          <th style="text-align: center;">No.</th>
                          <th style="text-align: center;">Id Desa</th>
                          <th style="text-align: center;">Nama Desa</th>
                          <th style="text-align: center;">Jenis Mutasi</th>
                          <th style="text-align: center;">Jenis Kelamin</th>
                          <th style="text-align: center;">Jumlah</th>
                          <th style="text-align: center;">Tahun</th>
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=1;
                        foreach ($dataMutasi as $dataMutasi)
                          : ?>
                        <tr>
                          <td style="text-align: center;"><?php echo $no++; ?></td>
                          <td style="text-align: center;"><?php echo $dataMutasi -> id_desa; ?></td>
                          <td style="text-align: center;"><?php echo $dataMutasi -> nama_desa; ?></td>
                          <td style="text-align: center;"><?php echo $dataMutasi-> jenis_mutasi; ?></td>
                          <td style="text-align: center;"><?php echo $dataMutasi -> jenis_kelamin; ?></td>
                          <td style="text-align: center;"><?php echo $dataMutasi -> jumlah; ?></td>
                          <td style="text-align: center;"><?php echo $dataMutasi -> tahun; ?></td>
                          <td style="text-align: center;">
                            <a class="btn btn-warning btn-sm" href="<?php echo base_url() ?>staf/penduduk/edit_mutasi/<?php echo $dataMutasi->id_desa ?>">Edit</a>
                              <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>staf/penduduk/hapus_mutasi/<?php echo $dataMutasi->id_desa ?>" onclick="return confirm('Yakin ingin menghapus?')" >Delete</a>
                              </td>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

          <!-- Modal Tambah 1-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Kelola Kependudukan</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url('staf/penduduk/tambah_aksi')?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">


          <div class="form-group">
            <label class="col-lg-6 col-sm-2 control-label" for="privilege" style="color: #0f3975">Desa</label>
            <div class="col-lg-12">
             <select class="form-control" name="id_desa" placeholder="Masukan Privilege" required>
              <option value="1">Glintang</option>
              <option value="2">Jatisari</option>
              <option value="3">Canden</option>
              <option value="4">Senting</option>
              <option value="5">Tempursari</option>
              <option value="6">Sandi</option>
              <option value="7">Demangan</option>
              <option value="8">Kepoh</option>
              <option value="9">Jagoan</option>
              <option value="10">Babadan</option>
              <option value="11">Tawengan</option>
              <option value="12">Catur</option>
              <option value="13">Taglik</option>
              <option value="14">Troboso</option>
              <option value="15">Cermo</option>
              <option value="16">Nglembu</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-6 col-sm-2 control-label" for="username" style="color: #0f3975">Jumlah Laki - Laki</label>
          <div class="col-lg-12">
            <input type="number" class="form-control" name="laki_laki" placeholder="Masukan Jumlah Laki - Laki" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-6 col-sm-2 control-label" for="username" style="color: #0f3975">Jumlah Perempuan</label>
          <div class="col-lg-12">
            <input type="number" class="form-control" name="perempuan" placeholder="Masukan Jumlah Perempuan" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 col-sm-2 control-label" for="username" style="color: #0f3975">Tahun</label>
          <div class="col-lg-12">
            <input type="number" class="form-control" name="tahun" placeholder="Masukan Tahun" required>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
        </div>
      </div>
    </div>

  </form>
</div>
</div>
</div>
</div>
<!-- END Modal Tambah -->

  <!-- Modal Tambah 2-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data2" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Kependudukan Berdasarkan Umur</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url('staf/penduduk/tambah_aksi_umur')?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">


          <div class="form-group">
            <label class="col-lg-6 col-sm-2 control-label" for="privilege" style="color: #0f3975">Desa</label>
            <div class="col-lg-12">
             <select class="form-control" name="id_desa" placeholder="Masukan Privilege" required>
              <option value="1">Glintang</option>
              <option value="2">Jatisari</option>
              <option value="3">Canden</option>
              <option value="4">Senting</option>
              <option value="5">Tempursari</option>
              <option value="6">Sandi</option>
              <option value="7">Demangan</option>
              <option value="8">Kepoh</option>
              <option value="9">Jagoan</option>
              <option value="10">Babadan</option>
              <option value="11">Tawengan</option>
              <option value="12">Catur</option>
              <option value="13">Taglik</option>
              <option value="14">Troboso</option>
              <option value="15">Cermo</option>
              <option value="16">Nglembu</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-6 col-sm-2 control-label" for="username" style="color: #0f3975">Umur</label>
          <div class="col-lg-12">
            <input type="text" class="form-control" name="umur" placeholder="Masukan umur" required>
          </div>
        </div>
        <div class="form-group">
            <label class="col-lg-6 col-sm-2 control-label" for="privilege" style="color: #0f3975">Jenis Kelamin</label>
            <div class="col-lg-12">
             <select class="form-control" name="jenis_kelamin" placeholder="Masukan Jenis Mutasi" required>
              <option value="L">Laki - laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
        <div class="form-group">
          <label class="col-lg-2 col-sm-2 control-label" for="username" style="color: #0f3975">Jumlah</label>
          <div class="col-lg-12">
            <input type="number" class="form-control" name="jumlah" placeholder="Masukan Jumlah" required>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
        </div>
      </div>
    </div>

  </form>
</div>
</div>
</div>
</div>
<!-- END Modal Tambah -->


  <!-- Modal Tambah 3-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data3" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Mutasi Kependudukan</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url('staf/penduduk/tambah_aksi_mutasi')?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">


          <div class="form-group">
            <label class="col-lg-6 col-sm-2 control-label" for="privilege" style="color: #0f3975">Desa</label>
            <div class="col-lg-12">
             <select class="form-control" name="id_desa" placeholder="Masukan Privilege" required>
              <option value="1">Glintang</option>
              <option value="2">Jatisari</option>
              <option value="3">Canden</option>
              <option value="4">Senting</option>
              <option value="5">Tempursari</option>
              <option value="6">Sandi</option>
              <option value="7">Demangan</option>
              <option value="8">Kepoh</option>
              <option value="9">Jagoan</option>
              <option value="10">Babadan</option>
              <option value="11">Tawengan</option>
              <option value="12">Catur</option>
              <option value="13">Taglik</option>
              <option value="14">Troboso</option>
              <option value="15">Cermo</option>
              <option value="16">Nglembu</option>
            </select>
          </div>
        
        <div class="form-group">
            <label class="col-lg-6 col-sm-2 control-label" for="privilege" style="color: #0f3975">Jenis Mutasi</label>
            <div class="col-lg-12">
             <select class="form-control" name="jenis_mutasi" placeholder="Masukan Jenis Mutasi" required>
              <option value="kematian">Kematian</option>
              <option value="kelahiran">Kelahiran</option>
              <option value="datang">Datang</option>
              <option value="pergi">Pergi</option>
            </select>
          </div>
        <div class="form-group">
            <label class="col-lg-6 col-sm-2 control-label" for="privilege" style="color: #0f3975">Jenis Kelamin</label>
            <div class="col-lg-12">
             <select class="form-control" name="jenis_kelamin" placeholder="Masukan Jenis Mutasi" required>
              <option value="L">Laki - laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
        <div class="form-group">
          <label class="col-lg-2 col-sm-2 control-label" for="username" style="color: #0f3975">Jumlah</label>
          <div class="col-lg-12">
            <input type="number" class="form-control" name="jumlah" placeholder="Masukan Jumlah" required>
          </div>
        </div>
         <div class="form-group">
          <label class="col-lg-2 col-sm-2 control-label" for="username" style="color: #0f3975">Tahun</label>
          <div class="col-lg-12">
            <input type="number" class="form-control" name="tahun" placeholder="Masukan Tahun" required>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
        </div>
      </div>
    </div>

  </form>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- END Modal Tambah -->