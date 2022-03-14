<?php
session_start();
include 'koneksi.php';

$id_pembelian=$_GET["id"];

$ambil=$koneksi->query("SELECT * FROM pembayaran 
    LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian
    WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay=$ambil->fetch_assoc();

//echo "<pre>";
//print_r($detbay);
//echo "</pre>";

//jika belum ada data pembayaran
if (empty($detbay))
{
    echo "<script>alert('belum ada data pembayaran')</script>";
    echo "<script>locatin='riwayat.php';</script>";
    exit();
}

//jika data pelanggan yang bayar tidak sesuai yang login

//echo "<pre>";
//print_r($_SESION);
//echo "</pre>";
if ($_SESSION["pelanggan"]['id_pelanggan']!==$detbay["id_pelanggan"])
{
    echo "<script>alert('Anda tidak berhak melihat pembayaran orang lain')</script>";
    echo "<script>locatin='riwayat.php';</script>";
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>lihat pembayaran</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <!--style css-->
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<?php include 'menu.php';?><br><br><br>

<div class="container"><br>
    <h3>Lihat Pembayaran</h3>
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <td><?php echo $detbay["nama"] ?></td>
                </tr>
                <tr>
                    <th>Bank</th>
                    <td><?php echo $detbay["bank"]?></td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td><?php echo $detbay["tanggal"]?></td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>Rp. <?php echo number_format($detbay["jumlah"])?></td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <img src="bukti_pembayaran/<?php echo $detbay["bukti"] ?>" alt="" class="img-responsive">
        </div>
    </div>
</div>

</body>
</html>



