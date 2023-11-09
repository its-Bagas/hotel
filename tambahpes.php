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

    <div class="flex justify-center items-center min-h-screen">

    <div data-aos="zoom-in" data-aos-duration="1600" class=" flex w-2/3  shadow-lg bg-white rounded-md" >

          <div class="m-auto py-8 ">
          
              <h2 class="text-2xl  font-bold text-center">Tambah Data Pesanan</h2>
              <form action= "proses_tambahpes.php" method="post" class=" py-4"> 
              <div class=" hidden border border-black rounded-lg mb-5">
                  <input type="id" name="id" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="" placeholder="Masukkan id">
              </div>     
              <div class="border border-black rounded-lg mb-5">
                  <select type="username" name="username" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="" placeholder="Masukkan Username">
                  <option></option>
                    <?php 
                    include "config.php";
                    $qry_pel=mysqli_query($connection,"select * from pelanggan");
                    while($data_pel=mysqli_fetch_array($qry_pel)){
                        echo '<option value="'.$data_pel['id'].'">'.$data_pel['username'].'</option>';    
                    }
                    ?>
                  </select>
              </div>
              <div class="border border-black rounded-lg mb-5">
                  <select type="resepsionis" name="resepsionis" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="" placeholder="Masukkan Resepsionis">
                    <option></option>
                    <?php 
                    include "config.php";
                    $qry_role=mysqli_query($connection,"select * from user where role != 'admin' ");
                    while($data_role=mysqli_fetch_array($qry_role)){
                        echo '<option value="'.$data_role['id'].'">'.$data_role['username'].'</option>';    
                    }
                    ?>
                  </select>
              </div>
              <div class="border border-black rounded-lg mb-5">
                  <select type="Tipekamar" name="TipeKamar" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="" placeholder="Masukkan Tipe Kamar">
                  <option></option>
                    <?php 
                    include "config.php";
                    $qry_tipe=mysqli_query($connection,"select * from tipe_kamar");
                    while($data_tipe=mysqli_fetch_array($qry_tipe)){
                        echo '<option value="'.$data_tipe['id'].'">'.$data_tipe['tipe'].'</option>';    
                    }

                  
                    ?>
                  </select>
              </div>
              <div class="border border-black rounded-lg mb-5">
                  <input type="number" name="jumlah" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="" placeholder="Masukkan Jumlah kamar">
              </div>
              <div class="border border-black rounded-lg mb-5">
                  <input type="Date" name="tgl" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="" placeholder="Masukkan tanggal">
              </div>
              <div class=" hidden border border-black rounded-lg mb-5">
                  <select type="saldo" name="saldo" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="" placeholder="Masukkan saldo">
                  <?php 
                    include "config.php";
                    $qry_tipe=mysqli_query($connection,"select saldo from pelanggan");
                    while($data_tipe=mysqli_fetch_array($qry_tipe)){
                        echo '<option value="'.$data_tipe['id'].'">'.$data_tipe['tipe'].'</option>';    
                    }
                    ?>
                    </select>
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
