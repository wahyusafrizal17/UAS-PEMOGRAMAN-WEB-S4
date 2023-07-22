<?php
include 'koneksi.php';
session_start();

$id = '40006';
$nama          = $_POST['nama_lengkap'];
$nim           = $_POST['nim'];
$program_studi = $_POST['program_studi'];
$periode       = $_POST['periode'];
$temp        = $_FILES['foto']['tmp_name'];
$name       = $_FILES['foto']['name'];
$size        = $_FILES['foto']['size'];
$type         = $_FILES['foto']['type'];
$folder = "foto/";
if($name != null){
    move_uploaded_file($temp, $folder . $name);
}

$sql = "insert into mahasiswa SET id='$id', nama_lengkap='$nama', nim='$nim', program_studi='$program_studi', periode='$periode', foto='$name'";
$insert = mysqli_query($konek, $sql);

if($insert){
    echo "Data Tersimpan" ;

    $sql1 = "insert into kelas_mahasiswa SET kelas_id='27', mahasiswa_id='$id'";
    $insert1 = mysqli_query($konek, $sql1);
}else{
    echo "Data Tidak Tersimpan";
}

$_SESSION['message'] = "Data Berhasil Ditambah";
header("location:index.php");

 ?> 