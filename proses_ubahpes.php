<?php 
if ($_POST) {
    $id = $_POST['id'];
    $idpel = $_POST['ID_pelanggan'];
    $idresep = $_POST['ID_resepsionis'];
    $tipekamar = $_POST['tipe_kamar'];
    $jlmh = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];
    if (empty($idpel)) {
        echo "<script>alert('pelanggan tidak ditemukan');</script>";
    } elseif (empty($idresep)) {
        echo "<script>alert('resepsionis tidak ditemukan');location.href='ubah_pesan.php';</script>";
    } elseif (empty($tipekamar)) {
      echo "<script>alert('tipekamar tidak ditemukan');location.href='ubah_pesan.php';</script>";
  } elseif (empty($jlmh)) {
    echo "<script>alert('jumlah kamar tidak boleh kosong');location.href='ubah_pesan.php';</script>";
} elseif (empty($tanggal)) {
   echo "<script>alert('tanggal tidak boleh kosong');location.href='ubah_pesan.php';</script>";
} elseif (empty($status)) {
    echo "<script>alert('status tidak boleh kosong');location.href='ubah_pesan.php';</script>";
 } 
    else {
      include "config.php";
            $sql = "UPDATE pesanan set ID_pelanggan='" .$idpel ."', ID_resepsionis='" .$idresep. "', tipe_kamar='" .$tipekamar. "', tanggal='" . $tanggal . "', status='" . $status . "', jumlah='" . $jlmh . "' where id = '" . $id ."'  "; 
            $update = mysqli_query($connection, $sql);
            if ($update) {
                echo "<script>alert('Sukses update pesanan');location.href='pesanan.php'</script>";
            } else {
                echo "<script>alert('Gagal update pesanan');location.href='ubah_pesan.php?id=" . $id . "';</script>";
            }
    }
}

?>