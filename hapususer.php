<?php 
    if($_GET['id']){
        include "config.php";
        $qry_hapus=mysqli_query($connection,"delete from user where id='".$_GET['id']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus user');location.href='Staff.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus user');location.href='Staff.php';</script>";
        }
    }
?>