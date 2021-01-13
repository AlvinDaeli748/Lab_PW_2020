<?php 
    include "Connection/session.php";
    if(!isset($_SESSION['userLogin'])){
        echo "<script> 
                alert('Anda tidak memiliki akses.');
                window.location.replace('index.php');
                </script>";
        // header("location:index.php");
    }

?>

<html>
    <head>
        <title>Register Admin</title>
    </head>
    <body>
    <form action="adminReg.php" method="POST">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>
                        <input type="text" name="nama" value="" placeholder="e.g Alvin Daeli" required pattern="[a-zA-Z\s]+" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Please input your name only using characters and white spaces')">
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" value="" minlength="8" placeholder="e.g alvin123" required>
                    </td>
                </tr>
                <tr>
                    <td>E-Mail</td>
                    <td>
                        <input type="email" name="email" value="" placeholder="e.g alvin@example.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Please input your email match the requested format')">
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" minlength="8" maxlength="16"  placeholder="minimum 8 characters" required>
                    </td>
                </tr>
                <tr>
                    <td>Level</td>
                    <td>
                        <input type="text" value="1" readonly>
                    </td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Register">&emsp;<input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>