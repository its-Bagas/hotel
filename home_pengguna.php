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
            

            while($data_sal=mysqli_fetch_array($qry_pel)){
                ?>
                <p class=" text-lg font-medium mr-36 text-white "> Saldo : <?=$data_sal['saldo']?></p>
                <?php 
            } 
       ?>
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

<!-- isi -->
<div id="home" class=" pt-12 max-md:pt-24 mb-8">
      <div class="container">
        <div class="flex flex-wrap items-center mx-auto justify-evenly">
          <div class="w-full self-center px-4 lg:w-1/2 md:w-1/2 md:px-2">
            <h1 class="font-semibold text-red-300 text-xl lg:text-5xl md:text-4xl w-4/5">Solusi<span class="font-bold text-orange-300 lg:text-6xl"> Penginapan </span> disemua kalangan</h1>
            <p class="font-medium text-lg md:text-base text-dark mt-4 mb-10 leading-relaxed">Merupakan wesite hotel permata puri modern yang digunakan <br> untuk melayani reservasi secara online</p>
            <a href="trans.php" class="text-base font font-semibold text-white bg-red-300 py-3.5 px-8 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-out">Pesan Sekarang</a>
          </div>
          <div class="h-full px-4 md:w-2/5 lg:w-1/3">
            <div class="mt-18 md:mt-14 md:right-0">
              <img src="img/maskot.jpg" alt="" class="w-full mx-auto max-md:hidden" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- slice -->
    <div class="slice">
      <div class="footer wrapper">
        <div class="footer-content bg-slate-50 pt-6 mt-12 pb-8 h-1/6 flex items-center">
          <div class="content-wrapper w-full flex flex-row text-center">
            <div class="content 1 personCount w-full font-semibold">
              <p class="text-5xl max-md:text-2xl" id="pertest">0</p>
              <p>Person Stay</p>
            </div>
            <div class="content 2 pertherapy w-full font-semibold">
              <p class="text-5xl max-md:text-2xl" id="pertherapy">0</p>
              <p>Person Reservation</p>
            </div>
            <div class="content 3 personCount w-full font-semibold">
              <p class="text-5xl max-md:text-2xl" id="perkosul">0</p>
              <p>New User</p>
            </div>
            <div class="content 2 pervisit w-full font-semibold">
              <p class="text-5xl max-md:text-2xl" id="pervisit">0</p>
              <p>Person Visit</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- room -->
    <div id="kamar"></div>
    <div class="review-container">
		<div class="review-header">
			<h2 class="review-title flex justify-center mt-12 font-semibold text-2xl">
				Type Room
			</h2>
			
<div class="max-w-sm w-full flex lg:max-w-full lg:flex mt-8 justify-center ">
  <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('./img/hotelq.jpg')">
  </div>
  <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
    <div class="mb-8">
      <div class="text-gray-900 font-bold text-xl mb-2"> Type Deluxe</div>
      <p class="text-gray-700 text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, <br> nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
    </div>
    <div class="flex items-center">
    <a href="trans.php" class="text-base font font-semibold text-white bg-red-300 py-2 px-4 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-out">Pesan Sekarang</a>
    </div>
  </div>
</div>
</div>

<div class="max-w-sm w-full flex lg:max-w-full lg:flex mt-8 justify-center ">
  <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('./img/log.jpg')">
  </div>
  <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
    <div class="mb-8">
      <div class="text-gray-900 font-bold text-xl mb-2"> Type Normal</div>
      <p class="text-gray-700 text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, <br> nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
    </div>
    <div class="flex items-center">
    <a href="trans.php" class="text-base font font-semibold text-white bg-red-300 py-2 px-4 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-out">Pesan Sekarang</a>
    </div>
  </div>
</div>
</div>

<footer>
      <div class="bg-dark mt-12 pb-8">
        <div class="container">
          <div>
            <p class="text-white text-center pt-4 text-xl font-bold">Dibuat oleh Rosy</p>
          </div>
        </div>
      </div>
    </footer>

    <script src="./js/login.js"></script>
    <script src="./js/scripts.js"></script>
</body>
</html>