<?php 
if ($_POST) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $kota = $_POST['kota'];
    $umur = $_POST['umur'];
    if (empty($username)) {
        echo "<script>alert('username tidak boleh kosong');location.href='ubahpel.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('password tidak boleh kosong');location.href='ubahpel.php';</script>";
    } elseif (empty($email)) {
      echo "<script>alert('email tidak boleh kosong');location.href='ubahpel.php';</script>";
  } elseif (empty($kota)) {
   echo "<script>alert('kota tidak boleh kosong');location.href='ubahpel.php';</script>";
} elseif (empty($umur)) {
   echo "<script>alert('umur tidak boleh kosong');location.href='ubahpel.php';</script>";
} 
    else {
      include "config.php";
            $sql = "UPDATE pelanggan set username='" .$username ."', email='" .$email. "', password='" .md5($password). "', kota='" . $kota . "', umur='" . $umur . "' where id = '" . $id ."'  "; 
            $update = mysqli_query($connection, $sql);
            if ($update) {
                echo "<script>alert('Sukses update pelanggan');location.href='pelanggan.php'</script>";
            } else {
                echo "<script>alert('Gagal update pelanggan');location.href='ubahpel.php?id=" . $id . "';</script>";
            }
    }
}

?>