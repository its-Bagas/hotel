<?php
    session_start();

    include 'config.php';
    require 'funtions.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
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

    <!-- side bar -->
      <!-- isi  -->


        
      <div class = "grid grid-cols-3 gap-8 mb-8 px-6 py-10">
        <!-- kartu laporan -->

        <div class="shadow-lg rounded-lg p-5 bg-yellow-400">
            <p class="text-center text-lg">staff</p>
          <div class="flex justify-around items-center">
            <i class="fa-regular fa-user fa-3x"></i>
            <div class>
              <?php
              $sql = "SELECT * FROM user where role = 'resepsionis'";
              $data = mysqli_query($connection,$sql);
              $number = mysqli_num_rows($data);
              echo $number ;
              ?>
            </div>
          </div>
        </div>
        
        <div class="shadow-lg rounded-lg p-5 bg-blue-400">
            <p class="text-center text-lg">pelanggan</p>
          <div class="flex justify-around items-center">
            <i class="fa-regular fa-user fa-3x"></i>
            <div class>
              <?php
              $sql = "SELECT * FROM pelanggan";
              $data = mysqli_query($connection,$sql);
              $number = mysqli_num_rows($data);
              echo $number ;
              ?>
            </div>
          </div>
        </div>
        
        <div class=" shadow-lg rounded-lg p-5">
            <p class="text-center text-lg">baru</p>
          <div class="flex justify-around items-center">
            <i class="fa-regular fa-user fa-3x"></i>
            <div class>
              <?php
              $sql = "SELECT * FROM pesanan  where status = 'baru' ";
              $data = mysqli_query($connection,$sql);
              $number = mysqli_num_rows($data);
              echo $number ;
              ?>
            </div>
          </div>
        </div>

        <div class=" shadow-lg rounded-lg p-5 bg-blue-400">
            <p class="text-center text-lg">Check in</p>
          <div class="flex justify-around items-center">
            <i class="fa-regular fa-user fa-3x"></i>
            <div class>
              <?php
              $sql = "SELECT * FROM pesanan where status = 'check_in'";
              $data = mysqli_query($connection,$sql);
              $number = mysqli_num_rows($data);
              echo $number ;
              ?>
            </div>
          </div>
        </div>
        <div class="shadow-lg rounded-lg p-5 bg-green-400">
            <p class="text-center text-lg">Check out</p>
          <div class="flex justify-around items-center">
            <i class="fa-regular fa-user fa-3x"></i>
            <div class>
              <?php
              $sql = "SELECT * FROM pesanan where status = 'check_out'";
              $data = mysqli_query($connection,$sql);
              $number = mysqli_num_rows($data);
              echo $number ;
              ?>
            </div>
          </div>
        </div>
      </div>
        

    <script src="./js/scripts.js"></script>
  </body>
</html>
