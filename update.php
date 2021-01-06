<?php include "Connection/conn.php" ?>
<html>
    <head>
        <title>Update Data</title>
    </head>
    <body>
        <?php 
            $id = $_POST['id'];
            $search = $db->prepare("SELECT * FROM akun WHERE id=$id");
            $search->execute();
            $hasil = $search;

            foreach($hasil as $x):
        ?>
        <h3>Update Data</h3>
            <form action="execUpdate.php" method="POST">
                <table>
                    <tr>
                        <input type="text" name="id" value="<?php echo $x['id']; ?>" hidden> 
                        <td>Nama</td>
                        <td>
                            <input type="text" name="nama" value="<?php echo $x['nama']; ?>" placeholder="e.g Alvin Daeli" required pattern="[a-zA-z\s]+" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Please input your name only using characters and white spaces')">
                        </td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>
                            <input type="text" name="username" value="<?php echo $x['username']; ?>" minlength="8" placeholder="e.g alvin123" required>
                        </td>
                    </tr>
                    <tr>
                        <td>E-Mail</td>
                        <td>
                            <input type="email" name="email" value="<?php echo $x['email']; ?>" placeholder="e.g alvin@example.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Please input your email match the requested format')">
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input type="password" name="password" minlength="8" maxlength="16" value="<?php echo $x['password']; ?>" placeholder="minimum 8 characters" required>
                        </td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Update">&emsp;<input type="reset" value="Reset">
                        </td>
                    </tr>
                </table>
            </form>
            <?php endforeach; ?>
    </body>
</html>