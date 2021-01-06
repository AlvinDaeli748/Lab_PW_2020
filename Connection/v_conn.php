<?php include "conn.php" ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cek Koneksi PDO</title>
    </head>
    <body>
        <h1>Cek Koneksi</h1>
        <?php 
            if($db){
                echo "<p>Koneksi berhasil.</p>";
            }
            elseif(isset($error)){
                echo "<p>Koneksi Gagal. Error : $error</p>";
            }
        ?>
    </body>
</html>