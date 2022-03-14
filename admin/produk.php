<h2>Data Produk</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Berat (Kg)</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
        <?php while($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td><?php echo $pecah['harga_produk']; ?></td>
            <td><?php echo $pecah['berat_produk']; ?></td>
            <td>
                <img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100">
            </td>
            <td>
                <a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk'] ; ?>" class="btn-danger btn">hapus</a>
                
            </td>
            
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>
