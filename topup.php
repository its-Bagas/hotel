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
    $qry_get_id = mysqli_query($connection, "select * from pelanggan where id = '" . $_GET['id'] . "'");
    $dt_id = mysqli_fetch_array($qry_get_id);

    ?>


    <div class="flex justify-center items-center min-h-screen">

    <div data-aos="zoom-in" data-aos-duration="1600" class=" flex w-2/3  shadow-lg bg-white rounded-md" >

          <div class="m-auto py-8 ">
          
              <h2 class="text-2xl  font-bold text-center">Isi Saldo</h2>
              <form action= "proses_topup.php" method="post" class=" py-4"> 
              <div class=" hidden border border-black rounded-lg mb-5">
                  <input type="id" name="id" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="<?= $dt_id['id'] ?>" placeholder="Masukkan id">
              </div>
              <div class=" hidden border border-black rounded-lg mb-5">
                  <input type="saldos" name="saldos" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="<?= $dt_id['saldo'] ?>" placeholder="Masukkan Jumlah Saldo">
              </div>     
              <div class="border border-black rounded-lg mb-5">
                  <input type="saldo" name="saldo" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="" placeholder="Masukkan Jumlah Saldo">
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
