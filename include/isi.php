<?php

    $page = $_GET['page'];
    $aksi = $_GET['aksi'];

    if ($page == "masuk") {
      if ($aksi == "") {
        include "page/masuk/masuk.php";
      }
      if ($aksi == "tambah") {
        include "page/masuk/tambah.php";
      }
      if ($aksi == "ubah") {
        include "page/masuk/ubah.php";
      }
      if ($aksi == "detail") {
        include "page/masuk/detail.php";
      }if ($aksi == "disposisi") {
        include "page/masuk/disposisi.php";
      }
      if ($aksi == "hapus") {
        include "page/masuk/hapus.php";
      }
    }

    if ($page == "keluar") {
      if ($aksi == "") {
        include "page/keluar/keluar.php";
      }
      if ($aksi == "tambah") {
        include "page/keluar/tambah.php";
      }
      if ($aksi == "buat") {
        include "page/keluar/buat.php";
      }
      if ($aksi == "ubah") {
        include "page/keluar/ubah.php";
      }
      if ($aksi == "hapus") {
        include "page/keluar/hapus.php";
      }
      if ($aksi == "tambah_surat") {
        include "page/keluar/tambah_surat_keluar.php";
      }
      if ($aksi == "ubah_surat") {
        include "page/keluar/ubah_surat_keluar.php";
      }
    }
    

    if ($page == "pengguna") {
      if ($aksi == "") {
        include "page/pengguna/pengguna.php";
      }
      if ($aksi == "tambah") {
        include "page/pengguna/tambah.php";
      }
      if ($aksi == "ubah") {
        include "page/pengguna/ubah.php";
      }
      if ($aksi == "hapus") {
        include "page/pengguna/hapus.php";
      }
    }
    

    if ($page == "disposisi") {
      if ($aksi == "") {
        include "page/disposisi/disposisi.php";
      }
      if ($aksi == "tambah") {
        include "page/disposisi/tambah.php";
      }
      if ($aksi == "ubah") {
        include "page/disposisi/ubah.php";
      }
    }

    if ($page == "") {
      include "home.php";
    }


?>
