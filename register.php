<?php
include 'config.php';
require 'funtions.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main flex justify-center items-center min-h-screen">
       
        <div class=" flex w-2/3 shadow-lg bg-white rounded-md">
            <div class="w-1/2 sm:block hidden">
                <img src="img/log.jpg" alt="" class="w-full h-[600px] rounded-l-md">
            </div>
            <div class="m-auto py-8">
                <h2 class="text-2xl  font-bold text-center">Selamat Datang Teman</h2>
                <p class=" text-sm font-light text-center text-gray-500  mb-5">Tekan Tombol Untuk Info Lebih Lanjut</p>
               
                <div class="flex justify-between mb-5">
                    <button onclick="window.location='hotel.php'" class=" bg-[#7BADFF] py-2 px-3 rounded-xl w-full mr-5 text-white text-center hover:bg-[#1953B2]"> Masuk</button>
                    <button class=" bg-[#1E65D9] py-2 px-3 rounded-xl w-full text-white text-center">Daftar</button>     
                </div> 
                 <form action="proses_tbhpel.php" method="post"> 
                 <div class="border border-black rounded-lg mb-5 hidden">
                    <input name="id" value=""  type="text" class=" text-base px-2 py-2.5 flex w-full rounded-lg " placeholder="Masukkan Username">
                </div>                 
                <div class="border border-black rounded-lg mb-5">
                    <input name="username" value=""  type="text" class=" text-base px-2 py-2.5 flex w-full rounded-lg " placeholder="Masukkan Username">
                </div>
                <div class="border border-black rounded-lg mb-5">
                    <input name="email" value="" type="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" class=" text-base px-2 py-2.5 flex w-full rounded-lg " placeholder="Masukkan Email">
                </div>
                <div class="border border-black rounded-lg mb-5">
                    <input name="password" value="" type="password" class=" text-base px-2 py-2.5 flex w-full rounded-lg " placeholder="Masukkan Password">
                </div>
                <div class="border border-black rounded-lg mb-5">
                  <input type="kota" name="kota" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="" placeholder="Masukkan Kota">
                </div>
                <div class="border border-black rounded-lg mb-5">
                    <input type="umur" name="umur" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="" placeholder="Masukkan Umur">
                </div>
                <a href="#"><button onclick="" type="submit" name="submit" class="hover:bg-[#7BADFF] py-2 px-3 rounded-md w-full text-white text-center block  mb-5 bg-[#1953B2] ">Daftar</button></a>
                </form> 

                </div>

            </div>
            
        </div>
    </div>
</body>
</html>