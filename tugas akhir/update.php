<?php 
    // connect data ke database
    include("db_connect.php");

    // mengambil id dari URL dan mengambil data dari id tersebut
    if(isset($_GET['id'])){
        $id = $conn->real_escape_string($_GET["id"]);
        $sql = "SELECT * FROM sunscreen WHERE id=".$id;
        $result = $conn->query($sql);
        $sunscreen = $result->fetch_assoc();
        $result->free_result();
        $conn->close();
    }

    // mengambil data dari form yang memiliki button submit bernama update
    if(isset($_POST['update'])){
        // membuat variabel dari setiap data yang ada di form
        $id_to_update = $conn->real_escape_string($_POST['update']);
        $name = $conn->real_escape_string($_POST['name']);
        $npm = $conn->real_escape_string($_POST['npm']);
        $jenis_kelamin = $conn->real_escape_string($_POST['jenis_kelamin']);

        // membuat link dari gambar yang kita upload
        $filename = $_FILES['image']["name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $new_name = date('YmdHis');
        $tempname = $_FILES['image']['tmp_name'];
        $folder = "./images/".$name.".".$extension;

        // mengupload gambar. jika ada gambar maka akan mengupdate data gambar, jika tidak maka kita tidak akan mengupdate data gambar
        if(move_uploaded_file($tempname, $folder)){
            $sql = "UPDATE sunscreen SET name='$name', npm=$npm, jenis_kelamin='$jenis_kelamin', image='$folder' WHERE id=$id_to_update";
        } else {
            $sql = "UPDATE mahasiswa SET name='$name', npm=$npm, jenis_kelamin='$jenis_kelamin' WHERE id=$id_to_update";
        }
        $result = $conn->query($sql);

        // menjalankan query
        if($result) {
            // jika query berhasil maka akan diarahkan ke page index.php
            header('Location: index.php');
        } else {
            echo $conn->error;
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
        <h1>Update</h1>
            <form method="POST" action="update.php" enctype="multipart/form-data">
            <label>Nama</label>
            <br>
            <input type="text" name="nama"  value=<?php echo $sunscreen>['nama']; ?> >
            <br>
            <label>harga</label>
            <br>
            <input type="number" name="harga" value=<?php echo $sunscreen>['harga']; ?> >>
            <br>
            <label>SPF</label>
            <br>
            <input type="text" name="spf" value=<?php echo $sunscreen>['spf']; ?> >>
            <br>
            <label>tekstur</label>
            <br>
            <input type="text" name="tekstur" value=<?php echo $sunscreen>['tekstur']; ?> >>
            <br>
            <label>manfaat</label>
            <br>
            <input type="text" name="manfaat" value=<?php echo $sunscreen>['manfaat']; ?> >>
            <br>
            <label>keunggulan</label>
            <br>
            <input type="text" name="keunggulan" value=<?php echo $sunscreen>['keunggulan']; ?> >>
            <br>
            <label>rating</label>
            <br>
            <input type="text" name="rating" value=<?php echo $sunscreen>['rating']; ?> >>
            <br>
            <label>file</label>
            <br>
            <input type="file" name="gambar" value=<?php echo $sunscreen>['gambar']; ?> >>
            <br>
            <!-- button type submit ini berfungsi untuk submit form -->
            <button type="submit" name="update" value="submit">Submit</button>
           
           
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
