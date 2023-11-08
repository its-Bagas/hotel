<?php 
if ($_POST) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    if (empty($username)) {
        echo "<script>alert('username tidak boleh kosong');location.href='ubahstaff.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('password tidak boleh kosong');location.href='ubahstaff.php';</script>";
    } elseif (empty($email)) {
      echo "<script>alert('email tidak boleh kosong');location.href='ubahstaff.php';</script>";
  } elseif (empty($role)) {
   echo "<script>alert('role tidak boleh kosong');location.href='ubahstaff.php';</script>";
} 
    else {
      include "config.php";
            $sql = "UPDATE user set username='" .$username ."', email='" .$email. "', password='" .md5($password). "', role='" . $role . "' where id = '" . $id ."'  "; 
            $update = mysqli_query($connection, $sql);
            if ($update) {
                echo "<script>alert('Sukses update User');location.href='Staff.php'</script>";
            } else {
                echo "<script>alert('Gagal update User');location.href='ubahstaff.php?id=" . $id . "';</script>";
            }
    }
}

?>