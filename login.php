<?php 
    include "Connection/conn.php";
    session_start();
    $adm = $db->prepare('SELECT * FROM akun WHERE username = :username AND password = :password');
    $adm->execute(array(
        ':username' => $_POST['username'],
        ':password' => md5($_POST['password'])
    ));
    $row = $adm->fetch(PDO::FETCH_ASSOC);

    if(empty($row['username'])){
        $_SESSION['loginSuccess'] = NULL;
        header("location:index.php");
    } else {
        $_SESSION['userLogin'] = $_POST['username'];
        $_SESSION['loginSuccess'] = TRUE;
        header("location:index.php");
    }
?>