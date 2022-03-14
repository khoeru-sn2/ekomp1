<?php
session_start();
//koneksi ke database
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <!--style css-->
    <link rel="stylesheet" href="style.css" />

    <!--bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!--style font nav-brand-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!--style font nav-link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Prompt&display=swap" rel="stylesheet">

    <title>E-Commputer</title>
  </head>

<body id="home">
<!--navbar-->
<?php include 'menu.php'; ?>
<!--akhir navbar-->

    <!--container-->
    <section class="main">
      <div class="container py-5">
        <div class="row py-5">
          <div class="col-lg-7 pt-5 text-center">
           <h1 class="pt-5">Spesial! 02-10 Nov Diskon Up to 40%</h1>
          </div>
        </div>
    </section>
    <!--akhir container-->

   
    <!--product-->
    <section id="product">
      <div class="container">
        <div class="row text-center mb-4">
          <div class="col">
            <h3>PRODUCT</h3>
          </div>
        </div>
        <div class="row">

          <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
          <?php while($perproduk = $ambil->fetch_assoc()) { ?>

          <div class="col-lg-3 text-center">
            <div class="card border-0 bg-light">
              <div class="card-body">
                <img src="../ekomp1/foto_produk/<?php echo $perproduk['foto_produk']; ?>" class="img-fluid" alt="">
                <h6><?php echo $perproduk['nama_produk'];?></h6>
                <p><?php echo number_format($perproduk['harga_produk']);?></p>
                <div class="caption">
                  <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
                  <a href="detail.php?id=<?php echo $perproduk["id_produk"];?>" class="btn btn-default">Detail</a>
                </div>
              </div>
            </div>
          </div>

          <?php } ?>
   
        </div>
      </div>
    </section>
    <!--akhir product-->

<!--footer-->
<section class="footer py-5">
  <p class="text-center">Copyright @2021 All Rights Reserved | Created With <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
  </svg> by Kelompok 1 SI</p>   
</section>
<!--akhir footer-->

  </body>
</html>