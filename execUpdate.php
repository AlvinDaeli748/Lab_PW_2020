<?php 
    require_once 'Connection/conn.php';
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
        $sql = "UPDATE akun SET nama='$nama',username='$username',email='$email',password='$password' WHERE id=$id";
        mysqli_query($db, $sql);
        echo "<script>
                    alert('Yay, Update berhasil!'); 
                    window.location.replace('index.php');
                </script>";
    if(mysqli_error($error)){
        echo "Yah, Error : $error";
    }
?>