<?php 
  include '_header.php';
  include '_nav.php';
  include '_sidebar.php'; 
?>
<?php  
  if ( $levelLogin === "kasir") {
    echo "
      <script>
        document.location.href = 'bo';
      </script>
    ";
  }
    
?>
<?php  
// ambil data di URL
$id = abs((int)$_GET['id']);


// query data mahasiswa berdasarkan id
$ekspedisi = query("SELECT * FROM ekspedisi WHERE ekspedisi_id = $id ")[0];

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ){
  // var_dump($_POST);

  // cek apakah data berhasil di tambahkan atau tidak
  if( editEkspedisi($_POST) > 0 ) {
    echo "
      <script>
        document.location.href = 'ekspedisi';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('data gagal ditambahkan');
      </script>
    ";
  }
  
}
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Ekspedisi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="bo">Home</a></li>
              <li class="breadcrumb-item active">Data Ekspedisi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ekspedisi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="" method="post">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                          <input type="hidden" name="ekspedisi_id" value="<?= $ekspedisi['ekspedisi_id']; ?>">
                          <label for="ekspedisi_nama">Nama Ekspedisi</label>
                          <input type="text" name="ekspedisi_nama" class="form-control" id="ekspedisi_nama" value="<?= $ekspedisi['ekspedisi_nama']; ?>" required>
                        </div>
                        <div class="form-group ">
                            <label for="ekspedisi_status">Status</label>
                            <div class="">
                              <?php  
                                if ( $ekspedisi['ekspedisi_status'] === '1' ) {
                                  $status = "Active";
                                } else {
                                  $status = " Not Active";
                                }
                              ?>
                                <select name="ekspedisi_status" required="" class="form-control ">
                                  <option value="<?= $ekspedisi['ekspedisi_status']; ?>"><?= $status; ?></option>
                                  <?php  
                                    if ( $ekspedisi['ekspedisi_status'] === '1' ) {
                                      echo '
                                        <option value="0">Not Active</option>
                                      ';
                                    } else {
                                      echo '
                                        <option value="1">Active</option>
                                      ';
                                    }
                                  ?>
                                </select>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>


  </div>


<?php include '_footer.php'; ?>