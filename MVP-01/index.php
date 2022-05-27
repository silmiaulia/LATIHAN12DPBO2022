<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");


$tp = new TampilPasien();
$data = $tp->tampil(); //ambil data tabel


if(empty($_GET['id_edit'])) { //jika id_edit kosong 
    $tp->addform();
}

if(isset($_GET['id_edit'])) { //jika id_edit tidak kosong 

    $tp->editform($_GET['id_edit']);
}

if (isset($_GET['id_hapus'])) { //jika id_hapus tidak kosong

    $id = $_GET['id_hapus']; //dapatkan id pasien yang akan dihapus

    $tp->delete($id); 
    
}


$tp->show(); // menampilkan data ke template


