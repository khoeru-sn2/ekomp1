<?php
//skrip koneksi
session_start();
include 'koneksi.php';
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4." />
    <meta name="author" content="Creative Tim" />
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <!--style css-->
    <link rel="stylesheet" href="style.css" />

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
              <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                <h1 class="text-white">Selamat Datang !</h1>
              </div>
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
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-7">
            <div class="card bg-secondary border-0 mb-0">
              <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <small>Login di sini</small>
                  </div>
                  <form method="post">
                  <div class="form-group mb-3">
                    <div class="input-group input-group-merge input-group-alternative">
                      <input class="form-control" placeholder="Email" type="email" name="email" required/>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                      <input class="form-control" placeholder="Password" type="password" name="password" required/>
                    </div>
                  </div>
                  
                  <div class="text-center">
                    <button class="btn btn-primary my-4" name="login">Login</button>
                  </div>
                </form>
                </div>

            </div>
            <div class="row mt-3">
              <div class="col-6">
                <a href="#" class="text-light"><small></small></a>
              </div>
              <div class="col-6 text-right">
                <a href="daftar.php" class="text-light"><small>Buat Akun Baru</small></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php

if (isset($_POST["login"]))
{
  $email = $_POST["email"];
  $password = $_POST["password"];

  $ambil = $koneksi->query("SELECT * FROM pelanggan 
            WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

  $akunyangcocok = $ambil->num_rows;
  if ($akunyangcocok==1)
  {
    $akun = $ambil->fetch_assoc();
    $_SESSION["pelanggan"] = $akun;
    echo "<script>alert('anda sukses login');</script>";

    //jika sudah belanja
    if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
    {
    echo "<script>location='checkout.php';</script>";
    }
    else 
    {
      echo "<script>location='riwayat.php';</script>";
    }

    }
    else {
    echo "<script>alert('anda gagal login, periksa akun anda');</script>";
    echo "<script>location='login.php';</script>";
    }
}

?>

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
