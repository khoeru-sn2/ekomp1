<!--navbar-->
      <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
      <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
              <a class="navbar-brand" href="index.php">FressBox</a>
              <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="keranjang.php">Keranjang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="riwayat.php">Riwayat Belanja</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="checkout.php">Checkout</a>
            </li>
              <!--script php-->
              <?php  if(isset($_SESSION["pelanggan"])): ?>
              <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
              </li>
              <?php else: ?>
              <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="daftar.php">Daftar</a>
              </li>
              <?php endif ?>
            <!--script php-->
            </ul>
            </div>
        </div>
    </nav>
    <!--akhir navbar-->