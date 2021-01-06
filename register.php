<?php
    require_once 'Connection/conn.php';
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    if($db){
        $sql = "INSERT INTO akun (nama,username,email,password) VALUES ('$nama','$username','$email','$password')";
        $db->exec($sql);
        echo "<script>
                    alert('Yay, Registrasi berhasil!'); 
                    window.location.replace('index.php');
                </script>";
    } elseif(isset($error)){
        echo "Yah, Error : $error";
    }
?>