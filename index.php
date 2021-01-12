<?php include "Connection/session.php" ?>


<!DOCTYPE html>
<html>
    <head>
        <title>Lab PW 2020</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h1>Selamat Datang</h1>
        
        <!-- Login/Logout -->
        <?php if(!isset($_SESSION['userLogin'])): ?>
            <h3>Halo Guest</h3>
            <?php if(isset($_SESSION['guest'])){
                echo "<h5>Anda belum Login, Silahkan Login dibawah ini.</h5>";
            } ?>
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#loginModal">Login</button>
            <?php elseif($userSession != NULL): ?>
                <h3>Halo <?=$row['nama']?></h3>
                <form onsubmit="return confirm('Apakah Anda yakin ingin Logout ?');" action="logout.php">
                    <input type="submit" value="Logout" class="btn btn-info">
                </form>
                <?php endif; ?>

                <!-- Modal Login -->
            
                    <!-- Modal -->
                    <div class="modal fade" id="loginModal" role="dialog">
                        <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Login</h4>
                                </div>
                                <div class="modal-body" align="center">
                                    <!-- Login Section -->
                                    <form action="login.php" method="POST">
                                        <h5>Username</h5>
                                            <input type="text" name="username" value="" minlength="8" placeholder="Username/E-Mail" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Please input your username or e-mail')">
                                        <h5>Password</h5>
                                            <input type="password" name="password" value="" minlength="8" maxlength="16" placeholder="Password" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Please input your password correctly')">
                                </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Login</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </form>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                
                
        <!-- Register Section -->
        <h3>Silahkan Register</h3>
        <form action="register.php" method="POST">
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
                    <td><br></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Register">&emsp;<input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>

        <!-- Read Data from Database -->
            <h3>Data dari Database</h3>
            <?php if(!isset($_SESSION['userLogin'])){
                    echo "<h3>Login terlebih dahulu untuk melihat database.</h3>";
            } else {
                    if($row['level'] == FALSE){
                        echo "<h3>Anda tidak memiliki akses ke database.</h3>";
                    ?>
                        <form action="update.php" method="POST">
                            <input type="text" name="id" value="<?php echo $row['id']; ?>" hidden>
                            <input type="submit" name="update_data" value="Update Akun Anda">
                        </form>
                    <?php
                    }
                    elseif($row['level'] == TRUE){
                        if($row['level'] == 2){
                            echo "<form action='admin.html'>
                                <input type='submit' value='Buat Admin'>
                            </form>";
                        }
                        ?>
                        <table>
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                                <?php
                                    // Fetch Data sesuai Level Akun
                                    if($row['level'] == 2){
                                        $sql = "SELECT * FROM akun";
                                    } else {
                                        $sql = "SELECT * FROM akun WHERE level != 2";
                                    }
                                    $data = mysqli_query($db, $sql);

                                    while($x = mysqli_fetch_array($data)){
                                ?>
                            <tr>
                                <td><?php echo $x['id']; ?></td>
                                <td><?php echo $x['nama']; ?></td>
                                <td><?php echo $x['username']; ?></td>
                                <td><?php echo $x['email']; ?></td>
                                <?php if($x['level'] < $userlevel || $x['id'] == $userid){ ?>
                                    <td>
                                        <form action="update.php" method="POST">
                                            <input type="text" name="id" value="<?php echo $x['id']; ?>" hidden>
                                            <input type="submit" name="update_data" value="Update">
                                        </form>
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('Are you sure want to delete this Data?');" method="POST">
                                            <input type="text" name="id" value="<?php echo $x['id']; ?>" hidden>
                                            <input type="submit" name="delete_data" value="Delete">
                                        </form>
                                    </td>
                                <?php } ?>
                            </tr>
                                <?php } ?>
                        </table>


                    <?php } 
                } ?>
            <?php 
                if(isset($_POST['delete_data'])){
                    $id = $_POST['id'];
                    if($id == $userid){
                        echo "<script>
                            alert('Lah itu Akun Anda');
                    </script>";
                    } else {
                        $del = "DELETE FROM akun WHERE id=$id";

                        mysqli_query($db, $del);
                        echo "<script>
                                alert('Data succesfully deleted.');
                                window.location.replace('index.php');
                        </script>";
                    }
                }
            ?>
            <!-- Alert Status -->
            <?php if(isset($_SESSION['loginFailed'])):?>
                <script>
                    alert("Terjadi kesalahan dalam Login.");
                <?php $_SESSION['loginFailed'] = NULL; ?>
                </script>
            <?php elseif(isset($_SESSION['loginSuccess'])):?>
                <script>
                    alert("Login Success");
                <?php $_SESSION['loginSuccess'] = NULL; ?>
                </script>
            <?php endif; ?>
    </body>
</html>