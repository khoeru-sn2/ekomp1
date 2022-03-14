<?php 
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4." />
    <meta name="author" content="Creative Tim" />
    <title>Register</title>
   <!--bootstrap js-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" />
    <!-- Icons -->
    <link rel="stylesheet" href="../ekomp1/a/assets/vendor/nucleo/css/nucleo.css" type="text/css" />
    <link rel="stylesheet" href="../ekomp1/a/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css" />
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../ekomp1/a/assets/css/argon.css?v=1.2.0" type="text/css" />
  </head>

  <body class="bg-default">
  <!-- navbar -->
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
         
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a href="index.php" class="nav-link">
                <span class="nav-link-inner--text">Home</span>
              </a>
            </li>
           


            <!--script php-->
            <?php  if(isset($_SESSION["pelanggan"])): ?>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <span class="nav-link-inner--text">Logout</span>
              </a>
            </li>
            <?php else: ?>
                <li class="nav-item">
              <a href="login.php" class="nav-link">
                <span class="nav-link-inner--text">Login</span>
              </a>
            </li>
            <?php endif ?>
            <!--script php-->

             <li class="nav-item">
              <a href="daftar.php" class="nav-link">
                <span class="nav-link-inner--text">Daftar</span>
              </a>
            </li>


          
          </ul>
        </div>
      </div>
    </nav>
    <!--akhir navbar-->
    
    <!-- Main content -->
    <div class="main-content">
      <!-- Header -->
      <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="container">
          <div class="header-body text-center mb-2">
            <div class="row justify-content-center">
                <h1 class="text-white">Buat Akun !</h1>
            </div>
          </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </div>
      <!-- Page content -->
      <div class="container mt--7 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-8">
            <div class="card bg-secondary border-0">
              <div class="card-header bg-transparent pb-5">
                <div class="text-muted text-center mt-2 "><small>Daftar pelanggan</small></div>
                <div class="text-center">
              </div>
              <div class="card-body px-lg-5 py-lg-5">
                <form method="post">
                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                      <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                      <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                      <input type="text" class="form-control" name="password" placeholder="Password" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                      <textarea class="form-control" name="alamat" placeholder="Alamat" required></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                       <input type="text" class="form-control" name="telepon" placeholder="No.Telp" required>
                    </div>
                  </div>
                  
                  <div class="text-center">
                    <button class="btn btn-primary" mt-4 name="daftar">Buat Akun</button>
                  </div>
                </form>
                <?php 
                  //jika tombol daftar di tekan 
                  if (isset ($_POST["daftar"]))
                  {
                      //mengambil isian nama, email, password, alamat, telepon
                      
                      $nama = $_POST["nama"];
                      $email = $_POST["email"];
                      $password = $_POST["password"];
                      $alamat = $_POST["alamat"];
                      $telepon = $_POST["telepon"];

                      //cek email apakah sudah digunakan 
                      $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
                      $yangcocok = $ambil->num_rows;
                      if ($yangcocok==1)
                      {
                          echo "<script>alert('pendaftaran gagal, email sudah digunakan'); </script>";
                          echo "<script>location='daftar.php'</script>";
                      }
                      else
                      {
                          //query insert ketabel pelanggan
                          $koneksi->query("INSERT INTO pelanggan
                          (email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_pelanggan)
                          VALUES('$email','$password','$nama','$telepon','$alamat')");

                        echo "<script>alert('pendaftaran sukses, silahkan login'); </script>";
                        echo "<script>location='login.php'</script>";

                      }

                  }
                  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="../ekomp1/a/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../ekomp1/a/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../ekomp1/a/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../ekomp1/a/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../ekomp1/a/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Argon JS -->
    <script src="../ekomp1/a/assets/js/argon.js?v=1.2.0"></script>
  </body>
</html>
