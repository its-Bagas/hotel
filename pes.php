<?php

    include 'config.php';
    require 'funtions.php';

    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="dist/output.css" />
    <title>Document</title>
  </head>
  <body>
    <!-- navabar -->
    <div class=" justify-between">

    
<div class="flex flex-row flex-wrap items-center bg-white p-6 border-b border-gray-200 px-14">
  <div class="flex-none w-48 flex flex-row items-center mr-80">
    <p class="ml-1 flex-1 text-2xl text-black font-bold">Permata puri</p>
  </div>


  <div class=" mr-auto">
    <a href="home_resep.php" class="mb-3 font-medium pr-8 text-base">
        Dashboard
      </a>

      <a href="pel.php" class="mb-3 font-medium pr-8 text-base">
        pelanggan
      </a>
      
      <a href="pes.php" class="mb-3 font-medium pr-8 text-base">
        pesanan
      </a>
    </div>

  <!-- user -->
  <div class=" flex justify-end items-center ">
    <div class="dropdown relative">
      <button class="menu-btn flex flex-wrap items-center">
        <div class="w-8 h-8 overflow-hidden rounded-full">
          <img class="w-full h-full object-cover" src="img/user.svg" />
        </div>

        <div class="ml-2 flex">
          <h1 class="text-base font-semibold m-0 p-0"><?= $_SESSION['username']?></h1>
          <i class="fad fa-chevron-down ml-2 my-auto text-xs leading-none"></i>
        </div>
      </button>

      <button class=" hidden fixed top-0 left-0 z-10 w-10 h-full menu-overflow"></button>
      <!-- drop menu -->
      <div class="text-gray-200 menu hidden bg-white shadow-md absolute z-20 right-0 w-40 mt-5 py-2 animated faster">
       

        <a class="px-4 py-2 block font-medium text-sm tracking-wide bg-white hover:bg-gray-50 hover:text-orange-400" href="logout.php">
          <i class="fad fa-user-times text-xs mr-1"></i>
          Log Out
        </a>
      </div>
    </div>
  </div>
</div>

</div>
      
      <div class="w-full flex px-6 py-8">
            <p class="text-xl font-medium px-6"> Data Pesanan</p>
            <a href="tambahpes.php" class="bg-sky-400 rounded-md px-3 py-2 text-black hover:text-white">tambah</a>
            </div>
      <div class=" px-10">
          <table class="  table-auto w-full shadow-lg">
                    <thead class="bg-gray-50 text-base font-semibold text-gray-400 px-4">
                        <tr>
                            
                            <th class="p-2">
                                <div class=" font-semibold">pelanggan</div>
                            </th>
                            <th class="p-2">
                                <div class=" font-semibold">resepsionis</div>
                            </th>
                            <th class="p-2">
                                <div class=" font-semibold">Tipe kamar</div>
                            </th>
                            <th class="p-2">
                                <div class=" font-semibold">tanggal</div>
                            </th>
                            <th class="p-2">
                                <div class=" font-semibold">keterangan</div>
                            </th>
                            <th class="p-2">
                                <div class=" font-semibold">Opsi</div>
                            </th>
                        </tr>
                    </thead>
          
            <?php
            $qry_pesanan = mysqli_query($connection,"SELECT user.username AS username_resepsionis, pelanggan.username AS username_pelanggan, pesanan.* FROM pesanan JOIN user ON user.id=pesanan.ID_resepsionis JOIN pelanggan ON pelanggan.id=pesanan.ID_pelanggan");
            

            while($data_pesanan=mysqli_fetch_array($qry_pesanan)){
            ?> 
              <div class="">
                <tr class=" py-8">
                <td class=" hidden text-center py-8 my-5"><?=$data_pesanan['id']?></td>
                    <td class="text-center py-8 my-5"><?=tmplNamaPl($data_pesanan['ID_pelanggan'])?></td>
                    <td class="text-center my-5"><?=tmplNamaSt($data_pesanan['ID_resepsionis'])?></td>
                    <td class="text-center my-5"><?=$data_pesanan['tipe_kamar']?></td>
                    <td class="text-center my-5"><?=$data_pesanan['tanggal']?></td>
                    <td class=" px-3 my-5"><?php if($data_pesanan['status'] == 'baru'){
                          ?>
                            <p class="bg-yellow-400 text-white text-center px-3 rounded-lg p-2"><?=$data_pesanan['status']?></p>
                          <?php
                          }elseif($data_pesanan['status'] == 'check_in'){
                          ?>
                            <p class="bg-green-400 text-white text-center px-3 rounded-lg p-2"><?=$data_pesanan['status']?></p>
                          <?php
                          }elseif($data_pesanan['status'] == 'check_out'){
                          ?>
                          <p class="bg-red-400 text-white text-center px-3 rounded-lg p-2"><?=$data_pesanan['status']?></p>
                          <?php
                          }
                          ?></td>
                    <td class=" text-center mt-4 mb-5">
                      <a href="detail_pesanan.php?id=<?= $data_pesanan['id']?>" class=" mr-2 px-3 py-2  bg-yellow-500 text-center rounded-lg  text-white">detail</a >
                      <a href="ubah_pesan.php?id=<?= $data_pesanan['id']?>" class=" mr-2 px-3 py-2  bg-blue-500 text-center rounded-lg  text-white">Edit</a >
                      <a href="hapuspes.php?id=<?= $data_pesanan['id']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class=" px-3 py-2 bg-red-500 text-center rounded-lg text-white">Hapus</a >
                    </td>
                </tr>
              </div>
            <?php
            }
            ?>
        </table>
        
      </div>
    </div>
    <script src="./js/scripts.js"></script>
  </body>
</html>
