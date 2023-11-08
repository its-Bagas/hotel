<?php 
    if($_GET['id']){
        include "config.php";
        $qry_hapus=mysqli_query($connection,"delete from pesanan where id='".$_GET['id']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus pesanan');location.href='pesanan.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus pesanan');location.href='pesanan.php';</script>";
        }
    }
?>