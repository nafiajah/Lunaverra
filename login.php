<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>

    <!-- INI KURANG > -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body id="bg-login">

    <div class="box-login">

        <!-- BAGIAN KIRI -->
        <div class="login-form">

            <h1 class="logo">LunaVerra*</h1>

            <form action="" method="POST">

                <label>Username</label>
                <input type="text" name="user" placeholder="Enter Your Username Here" class="input-control">

                <label>Password</label>
                <input type="password" name="pass" placeholder="Enter Your Password Here" class="input-control">

                <input type="submit" name="submit" value="Submit" class="btn">

                <p class="register-text">
                    Belum punya akun?
                    <a href="register.php">Klik di sini untuk mendaftar</a>
                </p>

            </form>

            <?php
            include ('db.php');

            if(isset($_POST['submit'])){

                $username = $_POST['user'];
                $password = $_POST['pass'];

                $sql = mysqli_query($conn, "SELECT * FROM tb_admin 
                WHERE username = '$username' AND password = '$password'")
                or die(mysqli_error($conn));

                if(mysqli_num_rows($sql) == 0){

                    echo "<script>alert('Username / Password Salah')</script>";
                    echo '<script>window.location="login.php"</script>';

                }else{

                    session_start();

                    $row = mysqli_fetch_assoc($sql);

                    $_SESSION['id_login'] = $row['admin_id'];
                    $_SESSION['level'] = $row['level'];
                    $_SESSION['status_login'] = true;

                    if($row['level'] == 'admin'){

                        echo "<script>alert('Login Berhasil')</script>";
                        echo '<script>window.location="admin/dashboard.php"</script>';

                    }elseif($row['level'] == 'pelanggan'){

                        echo "<script>alert('Login Berhasil')</script>";
                        echo '<script>window.location="user/dashboard_user.php"</script>';

                    }else{

                        header('location:index.php');

                    }
                }
            }
            ?>

        </div>

        <!-- BAGIAN KANAN -->
        <div class="login-image">
            <img src="img/produk1.jpg" alt="Fashion">
        </div>

    </div>

</body>
</html>