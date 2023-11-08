<?php
    session_start();

    include 'config.php';
    require 'funtions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="dist/output.css" />
    <title>Document</title>
</head>
<body>
    <!-- navabar -->
    <div class=" justify-between ">
    <!-- navabar -->
    <div class="flex flex-row flex-wrap items-center bg-slate-700 p-6 border-b border-gray-200 px-14">
      <div class="flex-none w-48 flex flex-row items-center mr-auto">
        <p class="ml-1 flex-1 text-2xl text-white font-bold">Permata puri</p>
          </a>
      </div>

      <div class=" mr-auto">
        <a href="home_pengguna.php#" class="mb-3 font-medium pr-8 text-base text-white">
            Home
          </a>

          <a href="home_pengguna.php#kamar" class="mb-3 font-medium pr-8 text-base text-white">
            Kamar
          </a>

          <a href="trans.php" class="mb-3 font-medium pr-8 text-base text-white">
            Pesan
          </a>

          <a href="detiluser.php" class="mb-3 font-medium pr-8 text-base text-white">
            histori
          </a>

        </div>

        <div class=" flex items-center ">
        <?php
        include "config.php";
            $qry_pel = mysqli_query($connection,"SELECT * FROM pelanggan where username = '".$_SESSION['username']."' ");
            $data_sal=mysqli_fetch_array($qry_pel);
       ?>
        <p class=" text-lg font-medium mr-36 text-white "> Saldo : <?=$data_sal['saldo']?></p>
        </div>

      <!-- user -->
      <div class="flex justify-end items-center ">
        <div class="dropdown relative">
          <button class="menu-btn flex flex-wrap items-center">
            <div class="w-8 h-8 overflow-hidden rounded-full">
              <img class="w-full h-full object-cover text-white" src="img/user.svg" />
            </div>

            <div class="ml-2 flex">
              <h1 class="text-base font-semibold m-0 p-0 text-white"><?= $_SESSION['username']?></h1>
              <i class=" text-white fad fa-chevron-down ml-2 my-auto text-xs leading-none"></i>
            </div>
          </button>

          <button class=" hidden fixed top-0 left-0 z-10 w-10 h-full menu-overflow"></button>
          <!-- drop menu -->
          <div class="text-gray-200 menu hidden bg-white shadow-md absolute z-20 right-0 w-40 mt-5 py-2 animated faster">
            <div method="post">
            <a class="px-4 py-2 block font-medium text-sm tracking-wide bg-white hover:bg-gray-50 hover:text-orange-400" href="topup.php?id=<?= $_SESSION['id'] ?>">
                          <i class="fad fa-user-times text-xs mr-1"></i>
                          Isi Saldo
                        </a>
            </div>
            <a class="px-4 py-2 block font-medium text-sm tracking-wide bg-white hover:bg-gray-50 hover:text-orange-400" href="logpel.php">
              <i class="fad fa-user-times text-xs mr-1"></i>
              Log Out
            </a>
          </div>
        </div>
      </div>
    </div>
</div>


<div class="flex justify-center items-center min-h-screen">

<div data-aos="zoom-in" data-aos-duration="1600" class=" flex w-1/3  shadow-lg bg-white rounded-md" >

      <div class="m-auto py-8 ">
      
          <h2 class="text-2xl font-bold text-center">Pesanan Kamar Anda</h2>
          <form action= "prosespel.php" method="post" class=" py-4"> 
          <div class=" hidden border border-black rounded-lg mb-5">
              <input type="id" name="id" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="<?= $_SESSION['id'] ?>" placeholder="Masukkan id">
          </div> 
          
          <div class=" hidden border border-black rounded-lg mb-4">
              <select type="username" name="username" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="" placeholder="Masukkan username">
                <?php 
                include "config.php";
                $qry=mysqli_query($connection,"select * from pelanggan ");
                while($data_use=mysqli_fetch_array($qry)){
                    echo '<option value="'.$data_use['id'].'">'.$data_use['username'].'</option>';    
                }
                ?>
              </select>
          </div>
    
          <div class="border border-black rounded-lg mb-4">
              <select type="resepsionis" name="resepsionis" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="" placeholder="Masukkan Resepsionis">
                <option> Pilih Resepsionis </option>
                <?php 
                include "config.php";
                $qry_role=mysqli_query($connection,"select * from user where role != 'admin' ");
                while($data_role=mysqli_fetch_array($qry_role)){
                    echo '<option value="'.$data_role['id'].'">'.$data_role['username'].'</option>';    
                }
                ?>
              </select>
          </div>
          <div class="border border-black rounded-lg mb-4">
              <select type="Tipekamar" name="TipeKamar" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="" placeholder="Masukkan Tipe Kamar">
              <option> Pilih Tipe Kamar </option>
                <?php 
                include "config.php";
                $qry_tipe=mysqli_query($connection,"select * from tipe_kamar");
                while($data_tipe=mysqli_fetch_array($qry_tipe)){
                    echo '<option value="'.$data_tipe['id'].'">'.$data_tipe['tipe'].'</option>';    
                }

              
                ?>
              </select>
          </div>
          <div class="border border-black rounded-lg mb-4">
              <input type="number" name="jumlah" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="" placeholder="Masukkan Jumlah kamar">
          </div>
          <div class="border border-black rounded-lg mb-4">
              <input type="Date" name="tgl" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="" placeholder="Masukkan tanggal">
          </div>
          <div class=" hidden border border-black rounded-lg mb-4">
              <input type="saldo" name="saldo" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="<?=$data_sal['saldo']?>" placeholder="Masukkan tanggal">
          </div>
          <!-- button continue -->
         <a href="#"><button type="submit" name="submit" class="bg-[#1E65D9]  py-2 px-3 rounded-md w-full text-white  mb-5  hover:[]" >Lanjut</button></a>
         </form>
       
      </div>            
  </div>
</div>
</div>
</div>

<script src="./js/login.js"></script>
    <script src="./js/scripts.js"></script>
</body>
</html>     