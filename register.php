<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
    <div class="box-login">
        <h2>Isi Data Anda</h2>
        <form action="" method="POST">
            <p>Nama Lengkap</p>
            <input type="text" name="nama" placeholder="Masukkan Nama Lengkap..." class="input-control" required>
            <p>Alamat</p>
            <input type="text" name="alamat" placeholder="Masukkan Alamat..." class="input-control" required>
                <p>Nomor Telfon</p>
            <input type="text" name="telpon" placeholder="Masukkan Nomor Telfon..." class="input-control" required>
            <p>Email</p>
            <input type="text" name="email" placeholder="Masukkan Email..." class="input-control" required>
            <hr><br>
                <p>Username</p>
            <input type="text" name="user" placeholder="Masukkan Username..." class="input-control" required>
            <p>Password</p>
            <input type="password" name="pass" placeholder="Masukkan Password..." class="input-control" required>
            <input type="submit" name="submit" value="Register" class="btn">
        </form>
        <?php
            include('db.php');
            if(isset($_POST['submit'])){
                $nama     = $_POST['nama'];
                $alamat   = $_POST['alamat'];
                $telpon   = $_POST['telpon'];
                $email    = $_POST['email'];
                $username = $_POST['user'];
                $password = $_POST['pass'];

                $insert = mysqli_query($conn, "INSERT INTO tb_admin VALUES (
                    null,
                    '".$nama."',
                    '".$username."',
                    '".$password."',
                    '".$telpon."',
                    '".$email."',
                    '".$alamat."',
                    'pelanggan'
                )");

                if($insert){
                    echo '<script>alert("Berhasil, silakan login")</script>';
                    echo '<script type="text/javascript">window.location="login.php"</script>';
                }else{
                    echo '<script>alert("Gagal")</script>';
                    echo '<script type="text/javascript">window.location="register.php"</script>';
                }
            }
        ?>
    </div>
</body>
</html>