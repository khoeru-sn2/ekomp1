<?php
session_start();
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

        <section class="konten">
            <div class="container">
            <!-- nota copas yang ada di admin -->
            <h2>Nota Pembelian</h2>
                <?php
                $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
                    ON pembelian. id_pelanggan=pelanggan. id_pelanggan
                    WHERE pembelian. id_pembelian='$_GET[id]'");
                $detail = $ambil->fetch_assoc();

                
                ?>
            <br>
        <div class="row">
            <div class="col-md-4">
              <h3>Pembelian</h3>
              <strong>No. Pembelian: <?php echo $detail['id_pembelian']?></strong><br>
              Tanggal : <?php echo $detail['tanggal_pembelian'];?><br>
              Total : Rp. <?php echo number_format($detail['total_pembelian']) ?>
            </div>
            <div class="col-md-4">
              <h3>Pelanggan</h3>
              <strong><?php echo $detail['nama_pelanggan'];?> </strong><br>
              <p>
            <?php echo $detail['telepon_pelanggan']; ?> <br>
            <?php echo $detail['email_pelanggan'];?> 
          </p>
            </div>
            <div class="col-md-4">
              <h3>Pengiriman</h3>
              <strong><?php echo $detail['nama_kota']?></strong><br>
              Ongkos kirim: Rp. <?php echo number_format($detail['tarif']);?><br>
              Alamat: <?php echo $detail['alamat_pengiriman']?>
            </div>
        </div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Jumlah</th>
            <th>Subberat</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    
   
    <tbody>
        <?php $nomor=1 ?>
        <?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk 
        ON pembelian_produk. id_produk=produk. id_produk
        WHERE pembelian_produk. id_pembelian='$_GET[id]'"); ?>
        <?php while($pecah=$ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah['nama_produk'];?></td>
            <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
            <td><?php echo $pecah['berat_produk'];?> Kg</td>
            <td><?php echo $pecah['jumlah'];?></td>
            <td><?php echo ($pecah['berat_produk']*$pecah['jumlah']);?> Kg</td>
            <td>Rp. <?php echo number_format($pecah['harga_produk']*$pecah['jumlah']);?></td>
        </tr>
    <?php $nomor++ ; ?>
    <?php } ?>
    </tbody>
</table>

<div class="row">
    <div class="col-md-7">
        <div class="alert alert-info">
            <p>
                Silahkan Melakukan Pembayaran Rp. <?php echo number_format($detail['total_pembelian']);?> ke <br>
                <strong>BANK BCA 6581-0313-233 AN. E-Commputer </strong>
            </p>
        </div>
    </div>
</div>

            </div>
        </section>
    </body>
</html>