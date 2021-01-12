<?php 
    require_once 'MySQLi_conn.php';

    if(mysqli_connect_errno()){
        echo "<p>Koneksi Gagal. Error : ".mysqli_connect_error()."</p>";
    }

?>