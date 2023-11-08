<?php 

if ($_POST) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $resepsionis = $_POST['resepsionis'];
    $tipe = $_POST['TipeKamar'];
    $jumlah = $_POST['jumlah'];
    $date = $_POST['tgl'];
    $saldo = $_POST['saldo'];

  
    if (empty($username)) {
        echo "<script>alert('username tidak boleh kosong');</script>";
    } elseif (empty($resepsionis)) {
        echo "<script>alert('resepsionis tidak boleh kosong');</script>";
    } elseif (empty($tipe)) {
      echo "<script>alert('tipe kamar tidak boleh kosong');</script>";
  } elseif (empty($jumlah)) {
   echo "<script>alert('jumlah kamar tidak boleh kosong');</script>";
} elseif (empty($date)) {
   echo "<script>alert('tanggal tidak boleh kosong');</script>";
} 
    else {
      include "config.php";

      $harga = mysqli_query($connection, "select harga from tipe_kamar where id = '".$tipe."' ");
      while ($row=mysqli_fetch_array($harga)){
        $hrg=$row[0];
      }
        $total = (int)$jumlah * (int)$hrg;
        
        $krg = (int)$saldo - (int)$total;
        if ($krg < 0 ){
          echo "<script>alert('Saldo Tidak Mencukupi Untuk Pembayaran Kamar');</script>";
        }else {
          $insert = $connection->query("insert into pesanan (`ID_pelanggan`,`ID_resepsionis`,`tipe_kamar`,`jumlah`,`harga`,`tanggal`,`total`) values ('$username','$resepsionis','$tipe', '$jumlah', '$hrg', '$date', '$total')");
            if ($insert) {
                echo "<script>alert('Sukses tambah pesanan');location.href='pesanan.php'</script>";
            } else {
                echo "<script>alert('Gagal tambah pesanan');location.href='pesanan.php';</script>";
            }
            
        }

    }
}

?>