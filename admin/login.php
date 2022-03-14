<?php
//skrip koneksi
session_start();
$koneksi = new mysqli("localhost", "root", "", "ekomp1")
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4." />
    <meta name="author" content="Creative Tim" />
    <title>Login Admin</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" />
    <!-- Icons -->
    <link rel="stylesheet" href="../a/assets/vendor/nucleo/css/nucleo.css" type="text/css" />
    <link rel="stylesheet" href="../a/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css" />
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../a/assets/css/argon.css?v=1.2.0" type="text/css" />
  </head>

  <body class="bg-default">
  <!-- Main content -->
    <div class="main-content">
      <!-- Header -->
      <div class="header bg-gradient-info py-7 py-lg-8 pt-lg-9">
        <div class="container">
          <div class="header-body text-center mb-2">
            <div class="row justify-content-center">
              <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                <h1 class="text-white">Login Admin </h1>
              </div>
            </div>
          </div>
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
                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                      <input type="text" class="form-control" name="user" placeholder="Username" required>
                    </div>
                  </div>
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                      <input type="text" class="form-control" name="pass" placeholder="Password" required>
                    </div>
                  </div>
                  
                  <div class="text-center">
                    <button class="btn btn-primary my-4" name="login">Login</button>
                  </div>
                </form>
                
                <?php
                if (isset($_POST['login']))
                {
                    $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' 
                    AND password ='$_POST[pass]'");
                    $yangcocok = $ambil->num_rows;
                    if ($yangcocok==1)
                    {
                        $_SESSION['admin']=$ambil->fetch_assoc();
                        echo "<div class='alert alert-info'>Login Sukses</div>";
                        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                    }
                    else {
                        echo "<div class='alert alert-danger'>Login Gagal</div>";
                        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
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
    <script src="../a/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../a/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../a/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../a/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../a/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Argon JS -->
    <script src="../a/assets/js/argon.js?v=1.2.0"></script>
  </body>
</html>
