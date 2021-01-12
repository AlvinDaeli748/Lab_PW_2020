<?php 
    include "Connection/conn.php";
    session_start();
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $adm = mysqli_query($db, "SELECT * FROM akun WHERE username = '$username' AND password = '$password'");

    $row = mysqli_fetch_array($adm);

    if(empty($row['username'])){
        $_SESSION['loginSuccess'] = NULL;
        $_SESSION['loginFailed'] = TRUE;
        header("location:index.php");
    } else {
        $_SESSION['userLogin'] = $_POST['username'];
        $_SESSION['loginFailed'] = NULL;
        $_SESSION['loginSuccess'] = TRUE;
        header("location:index.php");
    }
    
?>