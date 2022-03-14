<?php
session_start();
//koneksi ke database
include 'koneksi.php';


if (!isset($_SESSION["pelanggan"]))
{
	echo "<script>alert('Anda harus login!');</script>";
	echo "<script>location='login.php';</script>";
}

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

    <--bootstrap js-->
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

<section class="konten">
    <div class="container">
        <h1>Keranjang Belanja</h1>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php $totalbelanja = 0; ?>
                <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>

                <?php
                $ambil = $koneksi->query("SELECT * FROM produk 
                WHERE id_produk='$id_produk'");
                $pecah = $ambil->fetch_assoc();
                $subharga = $pecah["harga_produk"]*$jumlah;

                ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah["nama_produk"]; ?></td>
                    <td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
                    <td><?php echo $jumlah; ?></td>
                    <td>Rp. <?php echo number_format($subharga); ?></td>
                </tr>

                <?php $nomor++; ?>
                <?php $totalbelanja+=$subharga; ?>
                <?php endforeach ?>
            
            </tbody>
            <tfoot>
              <tr>
                <th colspan="4">Total Belanja</th>
                <th>Rp. <?php echo number_format($totalbelanja) ?></th>
              </tr>
            </tfoot>
        </table>

<form method="post">
  <div class="row"> 
    <div class="col-md-4">
      <div class="form-group">
        <input type="text" readonly value="<?php echo $_SESSION["pelanggan"] 
        ['nama_pelanggan'] ?>" class="form-control">
        </div>
      </div>
    <div class="col-md-4">
      <div class="form-group">
        <input type="text" readonly value="<?php echo $_SESSION["pelanggan"] 
        ['telepon_pelanggan'] ?>" class="form-control"> 
      </div>
    </div>
    <div class="col-md-4">
      <select class="form-control" name="id_ongkir"> 
        <option value="">Pilih Ongkos Kirim</option>
        <?php 
        $ambil = $koneksi->query("SELECT * FROM ongkir");
        while($perongkir = $ambil->fetch_assoc()) {
        ?> 
        <option value="<?php echo $perongkir["id_ongkir"] ?>">
          <?php echo $perongkir['nama_kota'] ?>
          Rp. <?php echo number_format($perongkir['tarif'])  ?>
        </option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group"> <br>
		  <label>Alamat Lengkap Pengiriman</label> 
			<textarea class="form-control" name="alamat_pengiriman" placeholder="masukan alamat lengkap pengiriman (termasuk kode pos)"></textarea>
			</div>
      <div class=""> <br>
      <a href="nota.php?id"><button class="btn btn-primary" name="checkout">Checkout</button>
      </div>

</form>

    <?php 
    if(isset ($_POST["checkout"]))
    {
      $id_pelanggan = $_SESSION["pelanggan"] ["id_pelanggan"];
      $id_ongkir = $_POST["id_ongkir"];
      $tanggal_pembelian = date("Y-m-d");
      $alamat_pengiriman = $_POST['alamat_pengiriman'];

      $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
      $arrayongkir = $ambil->fetch_assoc();
      $nama_kota = $arrayongkir['nama_kota'];
      $tarif = $arrayongkir['tarif'];

      $total_pembelian = $totalbelanja + $tarif;

      // 1. menyimpan data ke tabel pembelian 
      $koneksi->query("INSERT INTO pembelian ( 
        id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian, nama_kota, tarif, alamat_pengiriman) 
      VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','
      $nama_kota','$tarif','$alamat_pengiriman') ");

      // 2. mendapatkan id_pembelian barusan terjadi 
      $id_pembelian_barusan = $koneksi->insert_id;

      foreach ($_SESSION["keranjang"] as $id_produk => $jumlah)
      {
        // mendapatkan data produk berdasarkan id_produk
        $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
        $perproduk = $ambil->fetch_assoc();

        $nama = $perproduk['nama_produk'];
        $harga = $perproduk['harga_produk'];
        $berat = $perproduk['berat_produk'];
        
        $subberat = $perproduk['berat_produk']*$jumlah;
        $subharga = $perproduk['harga_produk']*$jumlah; 

        $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah) 
        VALUES ('$id_pembelian_barusan','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah')");

        $koneksi->query("UPDATE produk SET stok_produk=stok_produk-$jumlah
        WHERE id_produk='$id_produk'");
      }

      // mengkosongkan keranjang belanja
      unset ($_SESSION["keranjang"]);


      // tampilan dialihkan ke halaman nota pembelian barusan
      echo "<script>alert('pembelian sukses');</script>";
      echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
      
      

    }
    ?>

</section>



</body>
</html>