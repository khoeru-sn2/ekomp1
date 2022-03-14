<?php 
session_start();
include 'koneksi.php';




if (!isset($_SESSION["pelanggan"])OR empty($_SESSION["pelanggan"]))
{
    echo "<script>alert('silahkan login,);</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

$idpem=$_GET["id"];
$ambil=$koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem=$ambil->fetch_assoc();

$id_pelanggan_beli=$detpem["id_pelanggan"];
$id_pelanggan_login=$_SESSION["pelanggan"]["id_pelanggan"];


?>

<!DOCTYPE <html>
<html>
<head>
    <title> pembayaran </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <!--style css-->
    <link rel="stylesheet" href="style.css" />
    <!--bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'menu.php';?><br><br><br>

    <div class="container"><br>
        <h2>Konfirmasi Pembayaran</h2>
        <p>kirim bukti pembayaran Anda disini</p>
        <div class="alert alert-info">Total tagihan Anda <strong> Rp. <?php echo number_format($detpem["total_pembelian"])?></strong></div>
        
        
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Penyetor</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label>Bank</label>
                <input type="text" class="form-control" name="bank">
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="jumlah" min="1">
            </div>
            <div class="form-group">
                <label>Foto Bukti</label>
                <input type="file" class="form-control" name="bukti">
                <p class="text-danger"> foto bukti harus JPG maksimal 2MB </p>
            </div>
            <button class="btn btn-primary" name="kirim">Kirim</button>
        </form>
    </div>

<?php
if(isset($_POST["kirim"]))
{
	$namabukti=$_FILES["bukti"]["name"];
	$lokasibukti=$_FILES["bukti"]["tmp_name"];
	$namafiks=date("YmdHis").$namabukti;
	move_uploaded_file($lokasibukti,"bukti_pembayaran/$namafiks");

	$nama=$_POST["nama"];
	$bank=$_POST["bank"];
	$jumlah=$_POST["jumlah"];
	$tanggal=date("Y-m-d");


	$koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
		VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");

	$koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran'
		WHERE id_pembelian='$idpem'");

	echo "<script>alert('terimakasih sudah mengirimkan bukti pembayaran');</script>";
	echo "<script>location='riwayat.php';</script>";
}
?>

</body>
</html>