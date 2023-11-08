<?php 
include "config.php";

function check($email,  $connection){
    $check = mysqli_real_escape_string($connection, $email);
    $query = "SELECT * FROM pelanggan WHERE email = '$check'";
    $result = $connection -> query($query);
 
    if ($result -> num_rows > 0){
       return true; // sdh digunkan
    }
 }
 
 function checks($username,  $connection){
    $check = mysqli_real_escape_string($connection, $username);
    $query = "SELECT * FROM pelanggan WHERE username = '$check'";
    $result = $connection -> query($query);
 
    if ($result -> num_rows > 0){
       return true; // sdh digunkan
    }
 }

    if($_POST){
      $id  = $_POST['id'];     
      $username = $_POST['username'];
       $email= $_POST['email'];
       $password = md5($_POST['password']);
       $kota= $_POST['kota'];
       $umur = $_POST['umur'];
       //cek apakah email sudah terdaftar atau belum
         $check = check($email, $connection);
          $checks = checks($username,  $connection);
         if(empty($username)){
             echo "<script>alert('username tidak boleh kosong');location.href='tambahpel.php';</script>";
         } elseif (empty($email)){
             echo"<script>alert('email tidak boleh kosong');location.href='tambahpel.php'</script>";
         } elseif (empty($password)){
             echo" <script> alert('password tidak boleh kosong');location.href='tambahpel.php'</script>";
         }elseif (empty($kota)){
             echo" <script> alert('kota tidak boleh kosong');location.href='tambahpel.php'</script>";
         }elseif (empty($umur)){
             echo" <script> alert('umur tidak boleh kosong');location.href='tambahpel.php'</script>";
         }else{
             if ($check) {
                echo "<script>alert('Email sudah terdaftar');location.href='tambahpel.php';</script>";
             } elseif ($checks) {
                echo "<script>alert('Username sudah terdaftar');location.href='tambahpel.php';</script>";
             }else{
                include "config.php";
                $insert = $connection->query("insert into pelanggan (`username`,`email`,`password`,`kota`,`umur`) values ('$username','$email','$password', '$kota', '$umur')");
                if ($insert){
                      echo "<script>alert('Sukses menambahkan pelanggan');location.href='pelanggan.php';</script>";
                   } else {
                      echo "<script>alert('Gagal menambahkan pelanggan');location.href='pelanggan.php';</script>";
                   }
             }
 
          }
       }
      

?>