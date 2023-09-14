<?php
session_start();
$koneksi = new mysqli('localhost', 'root', '', 'penjualan');

$username = $_POST['username'];
$pass = $_POST['password'];

//menyeleksi data username
$login = $koneksi->query("SELECT * FROM logins where username='$username' and password='$pass'");
//menghitung jumlah data yg ditemukan
$data = $login->fetch_assoc();
$cek = $login->num_rows;
//cek apa usernmae ditemukan pd database
if($cek > 0){
    if($data['role']=="admin"){
        $_SESSION['admin'] = $data['id'];
        header("location:index.php");

    }else if($data['role']=="user"){
        $_SESSION['user'] = $data['id'];
        header("location:user.php");
    }else{
        ?>
            <script type="text/javascript">
                alert("Login GAGAL username dan password anda salah... Silahkan ulangi lagi");
            </script>
        <?php
    }
}

?>