<?php
    require_once 'Connection/conn.php';
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $level = TRUE;

    $sql = "INSERT INTO akun (nama,username,email,password,level) VALUES ('$nama','$username','$email','$password','$level')"; 
    mysqli_query($db, $sql);
    echo "<script>
        alert('Yay, Registrasi Admin berhasil!'); 
        window.location.replace('index.php');
        </script>";
    if(mysqli_error($err)){
        echo "Yah, Error : $error";
    }

?>