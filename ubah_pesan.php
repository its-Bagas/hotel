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
    $qry_get_pes = mysqli_query($connection, "select * from pesanan where id = '" . $_GET['id'] . "'");
    $dt_pes = mysqli_fetch_array($qry_get_pes);
    ?>

    <div class="flex justify-center items-center min-h-screen">

    <div data-aos="zoom-in" data-aos-duration="1600" class=" flex w-2/3  shadow-lg bg-white rounded-md" >

          <div class="m-auto py-8 ">
          
              <h2 class="text-2xl  font-bold text-center">Ubah Data Pesanan</h2>
              <form action= "proses_ubahpes.php" method="post" class=" py-4"> 
              <div class=" hidden border border-black rounded-lg mb-5">
                  <input type="id" name="id" class=" text-base px-2 py-2.5 flex w-full rounded-lg" value=" <?= $dt_pes['id'] ?>" placeholder="Id">
              </div>     
              <div class="border border-black rounded-lg mb-5">
                  <input type="username" name="ID_pelanggan" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="<?=$dt_pes['ID_pelanggan']?>" placeholder="Username">
              </div>
              <div class="border border-black rounded-lg mb-5">
                  <input type="resepsionis" name="ID_resepsionis" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="<?=$dt_pes['ID_resepsionis']?>" placeholder="resepsionis">
              </div>
              <?php
                $arr_tipe = array('normal' => 'normal', 'deluxe' => 'deluxe');
                ?>
              <div class="border border-black rounded-lg mb-5">
                  <select type="tipe" name="tipe_kamar" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value=" <?= $dt_pes['tipe_kamar'] ?>" placeholder="tipe kamar">
                  <?php foreach ($arr_tipe as $key_tipe => $val_tipe):
                        if ($key_tipe == $dt_pes['tipe_kamar']) {
                            $selek = "selected";
                        } else {
                            $selek = "";
                        }
                        ?>
                        <option value="<?= $key_tipe ?>" <?= $selek ?>><?= $val_tipe ?></option>
                    <?php endforeach ?>
                 </select>
              </div>
              <div class="border border-black rounded-lg mb-5">
                  <input type="jumlah" name="jumlah" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value=" <?= $dt_pes['jumlah'] ?>" placeholder="jumlah kamar">
              </div>
              <div class="border border-black rounded-lg mb-5">
                  <input type="date" name="tanggal" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value="<?=$dt_pes['tanggal']?>" placeholder="tanggal">
              </div>
                <?php
                $arr_status = array('baru' => 'baru', 'check_in' => 'check in', 'check_out' => 'check out');
                ?>
              <div class="border border-black rounded-lg mb-5">
                  <select type="status" name="status" class=" form-control text-base px-2 py-2.5 flex w-full rounded-lg" value=" <?= $dt_pes['status'] ?>" placeholder="status">
                  <?php foreach ($arr_status as $key_status => $val_status):
                        if ($key_status == $dt_pes['status']) {
                            $selek = "selected";
                        } else {
                            $selek = "";
                        }
                        ?>
                        <option value="<?= $key_status ?>" <?= $selek ?>><?= $val_status ?></option>
                    <?php endforeach ?>
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
