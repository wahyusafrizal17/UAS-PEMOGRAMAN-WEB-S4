<?php
include 'koneksi.php';
session_start();

$id            = $_GET['id'];
$nama          = $_POST['nama_lengkap'];
$nim           = $_POST['nim'];
$program_studi = $_POST['program_studi'];
$periode       = $_POST['periode'];
$temp        = $_FILES['foto']['tmp_name'];
$name       = $_FILES['foto']['name'];
$folder = "foto/";

if($name != null){
    move_uploaded_file($temp, $folder . $name);
    $sql = "UPDATE mahasiswa SET nama_lengkap='$nama', nim='$nim', program_studi='$program_studi', periode='$periode', foto='$name' where id='$id'";
}else{
    $sql = "UPDATE mahasiswa SET nama_lengkap='$nama', nim='$nim', program_studi='$program_studi', periode='$periode' where id='$id'";
}
$update = mysqli_query($konek, $sql);

$_SESSION['message'] = "Data Berhasil Diubah";
header("location:index.php");

 ?> 