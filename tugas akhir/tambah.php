<?php 
    // connect database
    include("db.php");
    // kode ini akan dijalankan ketika user menekan button dengan name submit
    if(isset($_POST["submit"])){
        // membuat variabel yang berisi input dari form
        $nama = $conn->real_escape_string($_POST['nama']);
        $harga = $conn->real_escape_string($_POST['harga']);
        $spf = $conn->real_escape_string($_POST['SPF']);
        $tekstur = $conn->real_escape_string($_POST['tekstur']);
        $manfaat = $conn->real_escape_string($_POST['manfaat']);
        $keunggulan = $conn->real_escape_string($_POST['keunggulan']);
        $rating = $conn->real_escape_string($_POST['rating']);
        //membuat alamat gambarnya
        $filename = $_FILES['image']["name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $new_name = date('YmdHis');
        $tempname = $_FILES['image']['tmp_name'];
        $folder = "./images/".$new_name.".".$extension;

        // melakukan upload gambar ke folder image
        // jika ada gambar yang diunggah maka kita akan memasukkan seluruh data
        // jika tidak ada gambar maka kita akan memasukkan seluruh data kecuali kolom image
        if(move_uploaded_file($tempname, $folder)){
            $sql = "INSERT INTO mahasiswa (nama, harga, spf, tekstur, manfaat, keunggulan, rating) VALUES ('$nama', $harga, '$spf', '$tekstur', 'manfaat', 'keunggulan', 'rating')";        
        } else {
            $sql = "INSERT INTO mahasiswa (nama, harga, spf, tekstur, manfaat, keunggulan, rating) VALUES ('$nama', $harga, '$spf', '$tekstur', 'manfaat', 'keunggulan', 'rating')";
        } 
        // menjalankan query
        $result = $conn->query($sql);

        if($result) {
            // jika query sukses maka akan diarahkan ke page index.php
            header('Location: index.php');
        } else {
            echo "error";
        }

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
    <div class="update-data">
        <div class="text-data">
        <h1>Tambah Sunscreen</h1>
         <form method="POST" action="update.php" enctype="multipart/form-data">
            <label>Nama</label>
            <br>
            <!-- menambahkan attribute value yang nilainya dari database. jadi nanti di input formnya langsung terisi nilai -->
            <input type="text" name="name" value=<?php echo $student['nama']; ?> >
            <br>
            <label>Harga</label>
            <br>
            <input type="text" name="harga" value=<?php echo $student['harga']; ?> >
            <br>
            <label>spf<label>
            <br>
            <input type="text" name="SPF" value=<?php echo $student['SPF']; ?> >
            <br>
            <label>Tekstur</label>
            <br>
            <input type="text" name="tekstur" value=<?php echo $student['tekstur']; ?> >
            <br>
            <label>manfaat</label>
            <br>
            <input type="text" name="manfaat" value=<?php echo $student['manfaat']; ?> >
            <br>
            <label>keunggulan</label>
            <br>
            <input type="text" name="keunggulan" value=<?php echo $student['keunggulan']; ?> >
            <br>
            <label>rate</label>
            <br>
            <input type="text" name="rate" value=<?php echo $student['rate']; ?> >
            <br>
            <label>gambar</label>
            <br>
            <input type="file" name="update" value=<?php echo $student['']; ?> >
            <br>
            
            <br>
            <br>
            <br>
            <button type="submit" name="update" value=<?php echo $student["id"]; ?>>Submit</button>
        </form>
            </div>
        </div>    
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