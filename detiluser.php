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
            $data_sal=mysqli_fetch_array($qry_pel)
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

<div class="w-full flex px-6 py-8">
        <p class="text-xl font-medium px-6"> Data Pesanan Anda</p>
    </div>
<div class=" px-10">
          <table class="  table-auto w-full shadow-lg">
                    <thead class="bg-gray-50 text-base font-semibold text-gray-400 px-4">
                        <tr>
                            
                            <th class="p-2 text-center">
                                <div class=" font-semibold">pelanggan</div>
                            </th>
                            <th class="p-2 text-center">
                                <div class=" font-semibold">resepsionis</div>
                            </th>
                            <th class="p-2 text-center">
                                <div class=" font-semibold">Tipe kamar</div>
                            </th>
                            <th class="p-2 text-center">
                                <div class=" font-semibold">tanggal</div>
                            </th>
                            <th class="p-2 text-center">
                                <div class=" font-semibold">Jumlah kamar</div>
                            </th>
                            <th class="p-2 text-center">
                                <div class=" font-semibold">harga kamar</div>
                            </th>
                            <th class="p-2 text-center">
                                <div class=" font-semibold">Total</div>
                            </th>
                        </tr>
                    </thead>
          
            <?php
            $qry_pesanan = mysqli_query($connection,"SELECT user.username AS username_resepsionis, pelanggan.username AS username_pelanggan, pesanan.* FROM pesanan JOIN user ON user.id=pesanan.ID_resepsionis JOIN pelanggan ON pelanggan.id=pesanan.ID_pelanggan where pesanan.ID_pelanggan = '".$data_sal['id']."' ");
            

            while($data_pesanan=mysqli_fetch_array($qry_pesanan)){
            ?> 
              <div class="">
                <tr class=" py-8">
                <td class=" hidden text-center py-8 my-5"><?=$data_pesanan['id']?></td>
                    <td class="text-center py-8 my-5"><?=$data_pesanan['username_pelanggan']?></td>
                    <td class="text-center my-5"><?=$data_pesanan['username_resepsionis']?></td>
                    <td class="text-center my-5"><?=$data_pesanan['tipe_kamar']?></td>
                    <td class="text-center my-5"><?=$data_pesanan['tanggal']?></td>
                    <td class=" my-5 text-center"><?=$data_pesanan['jumlah']?></td>
                    <td class=" my-5 text-center"><?=$data_pesanan['harga']?></td>

                   <td class=" text-center my-5"><?=$data_pesanan['total']?></td>
                </tr>
              </div>
            <?php
            }
            ?>
        </table>
        
      </div>



<script src="./js/scripts.js"></script>
</body>
</html>