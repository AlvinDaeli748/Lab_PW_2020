<?php
    require_once 'Connection/conn.php';
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO akun (nama,username,email,password) VALUES ('$nama','$username','$email','$password')"; 
    mysqli_query($db, $sql);
    echo "<script>
        alert('Yay, Registrasi berhasil!'); 
        window.location.replace('index.php');
        </script>";
    if(mysqli_error($err)){
        echo "Yah, Error : $error";
    }

?>