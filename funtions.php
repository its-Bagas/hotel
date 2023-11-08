<?php
require 'config.php';


// login
function login($data){
    global $connection;
    if ($data){
        $username = $data['username'];
        $password = md5($data['password']);
        if (empty($username)) {
         echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
          } elseif (empty($password)) {
            echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
               } else{
                     $sql = "SELECT * FROM user WHERE username = '$username' AND password ='$password'";
                     $query_login = mysqli_query($connection,$sql);
                     if (mysqli_num_rows($query_login) > 0  ){
                           $db_ta = mysqli_fetch_array($query_login);
                           session_start();
                           $_SESSION["username"]=$db_ta['username'];
                           $_SESSION["password"]=$db_ta['password'];
                           $_SESSION["role"] = $db_ta['role'];
                        
                           if($db_ta['role'] == 'admin'){
                              header("location: home_admin.php");
                           }elseif ($db_ta['role'] == 'resepsionis'){
                              header("location:home_resep.php");
                           }
                           else {
                              echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";
                           }
                     }
       }
    }
}

function logi($data){
   global $connection;
   if ($data){
       $id = $data['id'];
       $username = $data['username'];
       $password = md5($data['password']);
       if (empty($username)) {
        echo "<script>alert('Username tidak boleh kosong');location.href='hotel.php';</script>";
         } elseif (empty($password)) {
           echo "<script>alert('Password tidak boleh kosong');location.href='hotel.php';</script>";
              } else{
                    $sql = "SELECT * FROM pelanggan WHERE username = '$username' AND password ='$password'";
                    $query_login = mysqli_query($connection,$sql);
                    if (mysqli_num_rows($query_login) > 0  ){
                          $db_ta = mysqli_fetch_array($query_login);
                          session_start();

                          $_SESSION["id"]=$db_ta['id'];
                          $_SESSION["username"]=$db_ta['username'];
                          $_SESSION["password"]=$db_ta['password'];

                          header("location:home_pengguna.php");

                    }else {
                     echo "<script>alert('Username dan Password tidak benar');location.href='hotel.php';</script>";
                    }
      }
   }
}

//check pw dan email\

function check($email,  $connection){
   $check = mysqli_real_escape_string($connection, $email);
   $query = "SELECT * FROM user WHERE email = '$check'";
   $result = $connection -> query($query);

   if ($result -> num_rows > 0){
      return true; // sdh digunkan
   }
}

function checks($username,  $connection){
   $checks = mysqli_real_escape_string($connection, $username);
   $query = "SELECT * FROM user WHERE username = '$checks'";
   $result = $connection -> query($query);

   if ($result -> num_rows > 0){
      return true; // sdh digunkan
   }
}


// regis staff
function regisstaf($data){
   global $connection;

   if($data){
      $username = $data['username'];
      $email= $data['email'];
      $password = md5($data['password']);
      $role = $data['role'];
      //cek apakah email sudah terdaftar atau belum
        $check = check($email, $connection);
         $checks = checks($username,  $connection);
        if(empty($username)){
            echo "<script>alert('username tidak boleh kosong');location.href='staff.php';</script>";
        } elseif (empty($email)){
         echo"<script>alert('email tidak boleh kosong');location.href='staff.php'</script>";
        } elseif (empty($password)){
         echo" <script> alert('password tidak boleh kosong');location.href='staff.php'</script>";
        } elseif (empty($role)){
         echo" <script> alert('role anda tidak boleh kosong');location.href='staff.php'</script>";
        } else{
         if ($check) {
            echo "<script>alert('Email sudah terdaftar');location.href='staff.php';</script>";
        } elseif ($checks) {
         echo "<script>alert('Username sudah terdaftar');location.href='staff.php';</script>";
        }else{
         include "config.php";
         $insert = $connection->query("insert into user (`username`,`email`,`password`,`role`) values ('$username','$email','$password', '$role')");
            if ($insert){
               echo "<script>alert('Sukses menambahkan User');location.href='home_admin.php';</script>";
            } else {
               echo "<script>alert('Gagal menambahkan User');location.href='home_admin.php';</script>";
            }
        }

         }
      }
      echo "<script>alert('Tidak ada data masuk')</script>";

}

// logout
function logout(){
   session_start();
   session_destroy();
   header("Location: login.php");
}


//tampil nama staff
function tmplNamaSt($data){
   global $connection;

   $sql = mysqli_query($connection,"SELECT distinct username from user where id = $data");
   
   foreach($sql as $result){
      echo implode($result);   
   }
}

//tampil nama pelanggan
function tmplNamaPl($data){
   global $connection;

   $sql = mysqli_query($connection,"SELECT distinct username from pelanggan where id = $data");
   
   foreach($sql as $result){
      echo implode($result);   
   }
}


?>