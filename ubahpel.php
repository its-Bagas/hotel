<?php
include 'config.php';
require 'funtions.php';
?> 


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="./src/input.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
  </head>
  <body>
  <?php
    include "config.php";
    $qry_get_pel = mysqli_query($connection, "select * from pelanggan where id = '" . $_GET['id'] . "'");
    $dt_pel = mysqli_fetch_array($qry_get_pel);
    ?>

    <div class="flex justify-center items-center min-h-screen">

    <div data-aos="zoom-in" data-aos-duration="1600" class=" flex w-2/3  shadow-lg bg-white rounded-md" >

          <div class="m-auto py-8 ">
          
              <h2 class="text-2xl  font-bold text-center">Ubah Data Pelanggan</h2>
              <form action= "proses_ubahpel.php" method="post" class=" py-4"> 
              <div class=" hidden border border-black rounded-lg mb-5">
                  <input type="id" name="id" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value=" <?= $dt_pel['id'] ?>" placeholder="Masukkan Username">
              </div>     
              <div class="border border-black rounded-lg mb-5">
                  <input type="username" name="username" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value=" <?= $dt_pel['username'] ?>" placeholder="Masukkan Username">
              </div>
              <div class="border border-black rounded-lg mb-5">
                  <input type="password" name="password" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="" placeholder="Masukkan Password">
              </div>
              <div class="border border-black rounded-lg mb-5">
                  <input type="email" name="email" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value=" <?= $dt_pel['email'] ?>" placeholder="Masukkan Email">
              </div>
              <div class="border border-black rounded-lg mb-5">
                  <input type="kota" name="kota" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value=" <?= $dt_pel['kota'] ?>" placeholder="Masukkan Kota">
              </div>
              <div class="border border-black rounded-lg mb-5">
                  <input type="umur" name="umur" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value=" <?= $dt_pel['umur'] ?>" placeholder="Masukkan Umur">
              </div>
              <!-- button continue -->
             <a href="#"><button type="submit" name="submit" class="bg-[#1E65D9]  py-2 px-3 rounded-md w-full text-white  mb-5  hover:[]" >Lanjut</button></a>
             </form>
           
          </div>            
      </div>
  </div>
  </div>
    </div>
    <script>
      AOS.init();
        </script>
  </body>
</html>
