<?php
include("db.php");

$sql = "SELECT * FROM sunscreen";

$hasil = $conn->query($sql);
$kumpulan_sunscreen = $hasil->fetch_all(MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylee.css">
</head>
<body>
    <div class="navigasi">
        <div class="logo">
            <img src="./image/logo.png" alt="logo" class="gambar-logo">
            <span class="nama-logo">BS~</span>
        </div>         
        <div class="menu">
            <a href="index.php" class="menu-item">Home</a>
            <a href="rekomendasi.php" class="menu-item">Rekomendasi</a>
            <a href="halaman-5.php" class="menu-item">Tentang Kami</a>
            <a href="halaman-5.php" class="menu-item">Kontak</a>
        </div>
    </div>
    <div class="halaman-kedua">
        <div class="content-kedua">
        <h1 class="text-kedua">recomendasi sunscreen</h1>
        <a href="tambah.php" class="button-utama">Tambah</a>
    </div>
    </div>
    <div class="tabel">
    <table border="1">
        <tr>
            <th rowpan="2" bgcolor="blue">foto</th>
            <th colspan="1" bgcolor="red">nama</th>
            <th colspan="1" bgcolor="red">rate</th>
            <th colspan="1" bgcolor="red">harga</th>
            <th colspan="1" bgcolor="green">detail</th>
        </tr>
        <?php foreach($kumpulan_sunscreen as $sunscreen): ?>
        <tr>
            <td><img src=<?php echo $sunscreen['gambar'];?> alt=""width="100"></td>
            <td><?php echo $sunscreen["nama"] ?></td>
            <td><?php echo $sunscreen["rating"]."/10" ?></td>
            <td><?php echo $sunscreen["harga"] ?></td>
            <td><a href=<?php echo "detail.php?id=". $sunscreen['id']; ?>>detail</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    </div>
    <div class="halaman-bawah">
        <div class="logo-bawah">BS~
        </div>
        <div class="informasi">
            <h4 class="text-informasi">informasi</h4>
            <ul>
                <li>tentang kami</li>
                <li>hubungi kami</li>
                <li>help center</li>
              </ul>

        </div>
        <div class="purchase">
            <h4>purchase option</h4>
            <a href=""><img src="./image/tokped.png" alt="tokopedia"></a>
            <a href=""><img src="./image/shopee.png" alt="shopee"></a>
            <a href=""><img src="./image/download (8) 2.png" alt="sephora"></a>
            <a href=""><img src="./image/download (7) 2.png" alt="sociolla"></a>
        </div>
        <div class="customer">
            <h4>customer care</h4>
            <ul>
                <li>082294948414</li>
                <li>@bangoenstore.id</li>
                <li>bangoenstore@gmail.com</li>
              </ul>

        </div>
         </div>


    </div>
        </div>
    </div>
</body>
</html>
