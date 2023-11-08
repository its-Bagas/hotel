<?php
    session_start();

    include 'config.php';
    require 'funtions.php';

    if(isset($_POST['id'])) 
  {
    hapususer($_POST);
  };
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="src/input.css" />
    <title>Document</title>
  </head>
  <body>
    <!-- navabar -->
    <div class=" justify-between ">
    <!-- navabar -->
    <div class="flex flex-row flex-wrap items-center bg-white p-6 border-b border-gray-200 px-14">
      <div class="flex-none w-48 flex flex-row items-center mr-auto">
        <p class="ml-1 flex-1 text-2xl text-black font-bold">Permata puri</p>
          </a>
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
      <div class="flex justify-end items-center ">
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

      <!-- isi  -->
      <div class="w-full flex px-6 py-8">
            <p class="text-xl font-medium px-6"> Data Pelanggan</p>
            </div>
      <div class=" px-10">
          <table class="  table-auto w-full shadow-lg">
                    <thead class="bg-gray-50 text-base font-semibold text-gray-400 px-4">
                        <tr>
                            
                            <th class="p-2">
                                <div class=" font-semibold">Username</div>
                            </th>
                            <th class="p-2">
                                <div class=" font-semibold">Email</div>
                            </th>
                            <th class="p-2">
                                <div class=" font-semibold">Kota</div>
                            </th>
                            <th class="p-2">
                                <div class=" font-semibold">Umur</div>
                            </th>
                            <th class="p-2">
                                <div class=" font-semibold">Saldo</div>
                            </th>
                        </tr>
                    </thead>
          
            <?php
            $qry_staff = mysqli_query($connection,"SELECT * FROM pelanggan");
            

            while($data_pel=mysqli_fetch_array($qry_staff)){
            ?> 
              <tbody class="">
                <tr class=" my-10">
                    <td class="text-center py-4"><?=$data_pel['username']?></td>
                    <td class="text-center py-4"><?=$data_pel['email']?></td>
                    <td class="text-center py-4"><?=$data_pel['kota']?></td>
                    <td class="text-center py-4"><?=$data_pel['umur']?></td>
                    <td class="text-center py-4"><?=$data_pel['saldo']?></td>
                </tr>
              </tbody>
            <?php
            }
            ?>
        </table>
        
      </div>


    </div>

    <script src="./js/scripts.js"></script>
  </body>
</html>
