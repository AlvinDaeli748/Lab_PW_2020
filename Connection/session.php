<?php
    include "conn.php";
    session_start();
    $check = $_SESSION['userLogin'] ?? NULL;
    $adm = mysqli_query($db, "SELECT * FROM akun WHERE username = '$check'");

    $row = mysqli_fetch_array($adm);
    if(!isset($row)){
        $_SESSION['guest'] = TRUE;
    } else {
        $_SESSION['guest'] = NULL;
        $userSession = $row['username'];
        $userid = $row['id'];
        $userlevel = $row['level'];
    }

?>