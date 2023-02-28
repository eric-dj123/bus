<?php
session_start();
include "koneksi.php";
$email = $_POST['email'];
$password = $_POST['password'];
$op = $_GET['op'];

if($op=="in"){
    $sql = mysqli_query($connect,"SELECT * FROM users WHERE email='$email' AND password='$password'");
    if(mysqli_num_rows($sql)==1){//jika berhasil akan bernilai 1
        $qry = mysqli_fetch_array($sql);
        $_SESSION['user_id'] = $qry['user_id'];
        $_SESSION['email'] = $qry['email'];
        $_SESSION['role'] = $qry['role'];
        if($qry['role']=="admin"){
            header("location:home_admin.php");
        }else if($qry['role']=="driver"){
            header("location:home_user.php");
        }
    }else{
        ?>
        <script language="JavaScript">
            alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
            document.location='index.php';
        </script>
        <?php
    }
}else if($op=="out"){
    unset($_SESSION['email']);
    unset($_SESSION['role']);
    header("location:index.php");
}
?>
