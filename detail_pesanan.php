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
  <div class=" justify-between">

    
<div class="flex flex-row flex-wrap items-center bg-white p-6 border-b border-gray-200 px-14">
  <div class="flex-none w-48 flex flex-row items-center mr-80">
    <p class="ml-1 flex-1 text-2xl text-black font-bold">Permata puri</p>
  </div>


  <div class=" mr-auto">
    <a href="home_admin.php" class="mb-3 font-medium pr-8 text-base">
        Dashboard
      </a>

      <a href="pelanggan.php" class="mb-3 font-medium pr-8 text-base">
        pelanggan
      </a>

      <a href="Staff.php" class="mb-3 font-medium pr-8 text-base">
        staff
      </a>
      
      <a href="pesanan.php" class="mb-3 font-medium pr-8 text-base">
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

<!-- isi -->

    <!-- room -->
    
<div class="flex justify-center items-center h-screen mt-16">

<div data-aos="zoom-in" data-aos-duration="1600" class=" flex w-1/3  shadow-lg bg-white rounded-md" >

      <div class="m-auto py-8 ">

      <?php
            $qry_pesanan = mysqli_query($connection,"SELECT * from pesanan where id = '".$_GET['id']."'");
            $data_pesanan=mysqli_fetch_array($qry_pesanan);
            ?>
      
          <h2 class="text-2xl font-bold text-center">Detail pesanan Anda</h2>
          <form action= "" method="post" class=" py-4"> 
          Username :
          <div class=" border border-black rounded-lg mb-4">
              <input type="username" name="username" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="<?= tmplNamaPl($data_pesanan['ID_pelanggan']) ?>" placeholder="Masukkan username">
              </input>
          </div>
          Resepsionis : 
          <div class="border border-black rounded-lg mb-4">
              <input type="resepsionis" name="resepsionis" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="<?= tmplNamaSt($data_pesanan['ID_resepsionis']) ?>" placeholder="Masukkan Resepsionis">
              </input>
          </div>
          Tipe kamar :
          <div class="border border-black rounded-lg mb-4">
              <input type="Tipekamar" name="TipeKamar" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="<?= $data_pesanan['tipe_kamar'] ?>" placeholder="Masukkan Tipe Kamar">
    
              </input>
          </div>
          Jumlah pesanan :
          <div class="border border-black rounded-lg mb-4">
              <input type="number" name="jumlah" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="<?= $data_pesanan['jumlah'] ?>" placeholder="Masukkan Jumlah kamar">
          </div>
          Harga per kamar :
          <div class="border border-black rounded-lg mb-4">
              <input type="harga" name="harga" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="<?= $data_pesanan['harga'] ?>" placeholder="Masukkan tanggal">
          </div>
          Tanggal : 
          <div class="border border-black rounded-lg mb-4">
              <input type="Date" name="tgl" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="<?= $data_pesanan['tanggal'] ?>" placeholder="Masukkan tanggal">
          </div>
          Total harga:
          <div class=" border border-black rounded-lg mb-4">
              <input type="total" name="total" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="<?=$data_pesanan['total']?>" placeholder="Masukkan tanggal">
          </div>

          </div>
      </div>
  </div>

    <script src="./js/login.js"></script>
    <script src="./js/scripts.js"></script>
</body>
</html>