<?php 

if ($_POST) {
    $id = $_POST['id'];
    $saldos= $_POST['saldos'];
    $saldo = $_POST['saldo'];

  
    if (empty($id)) {
        echo "<script>alert('id not found');</script>";
    }elseif(empty($saldo)){
        echo "<script>alert('nominal saldo tidak boleh kosong');</script>";
    }
    else {
      include "config.php";

      $baru = (int)$saldos + (int)$saldo;
      
      $insert = $connection->query("update pelanggan set saldo = '" .$baru. "' where id = '" .$id. "' ");
            if ($insert) {
                echo "<script>alert('Sukses tambah saldo');location.href='home_pengguna.php';</script>";
            } else {
                echo "<script>alert('Gagal tambah saldo');location.href='home_pengguna.php';</script>";
            }
    }
}

?>