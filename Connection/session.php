<?php 
    include "conn.php";
    session_start();
    $check = $_SESSION['userLogin'] ?? NULL;
    $adm = $db->prepare('SELECT * FROM akun WHERE username = :username');
    $adm->execute(array(
        ':username' => $check
    ));
    $row = $adm->fetch(PDO::FETCH_ASSOC);
    if(!isset($row)){
        echo "<script>alert('Unknown Username');</script>";
    } else {
        $userSession = $row['username'] ?? NULL;
    }

?>