<?php 
    require_once 'Connection/conn.php';
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    if($db){
        $sql = "UPDATE akun SET nama='$nama',username='$username',email='$email',password='$password' WHERE id=$id";
        $db->exec($sql);
        echo "<script>
                    alert('Yay, Update berhasil!'); 
                    window.location.replace('index.php');
                </script>";
    } elseif(isset($error)){
        echo "Yah, Error : $error";
    }
?>