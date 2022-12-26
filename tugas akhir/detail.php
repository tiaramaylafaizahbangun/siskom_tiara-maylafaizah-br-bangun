<?php
    include("db.php");
    if(isset($_GET['id'])){
        $id= $conn->real_escape_string($_GET['id']);
        $sql = "SELECT * FROM sunscreen WHERE id = $id";
        $hasil = $conn->query($sql);
        // mengubah data menjadi associated array
        $sunscreen = $hasil->fetch_assoc();
        // $hasil->free_result();
        // $coon->close();
        print_r($sunscreen);


    }
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
    <div class="halaman-ketiga">
        <div class="content-ketiga">   
         <h4 class="text-ketiga">Skinaqua UV Moisture Milk</h4>
         <h6 class="text-ketiga">9/10</h6>

        </div>
         
    </div>
    <div class="tabel-2">
        <table border="2">
            <tr>
                <th colspan="3" bgcolor="yellow">detail sunscreen</th>
            </tr>
            <tr>
                <td rowspan="5">
                    <img src=<?php echo $sunscreen['gambar']; ?>"./image/skinaqua.png" width="100">
                </td>
            </tr>
            <tr>
                <td>SPF</td>
                <td><?php echo $sunscreen['spf']; ?>SPF 50+</td>
            </tr>
            <tr>
                <td>tekstur</td>
                <td><?php echo $sunscreen['tekstur']; ?>memiliki tekstur cair menyeruupai essence dan tidak lengket</td>
            </tr>
            <tr>
                <td>manfaat</td>
                <td>
                <?php echo $sunscreen['manfaat']; ?>
                <ul>
                <li>melindungi dari sengatan matahari, mencegah penuaan dini   </li>
                <li> mencegah penuaan dini   </li>
                <li> mencerahkan wajah </li>
                
                </ul>   
                </td>

            </tr>
            <tr>
                <td>keunggulan</td>
                <td>
                <?php echo $sunscreen['keunggulan']; ?>
                <ul>
                        <li>Tekstur yanag ringan memudahkan untuk digunakan dan cepat meresap di dalam kulit</li>
                        <li>terbuat dari bahan-bahan alamu yang aman digunakan oleh seluruh jenis kulit</li>
                        <li>Bisa digunakan oleh ibu hamil dan menyusui</li>
                        <li>harganya cukup terjangkau</li>
                <ul>     
                </td>

            </tr>
        </table>
    </div>
    <div class="text-ketiga">
        <a href="update.php" class="button-utama">update</a>
        <a href="delete.php" class="button-utama">delete</a>
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