<?php
include 'koneksi.php';
session_start();

$id    = $_GET['id'];

$delete = mysqli_query($konek, "DELETE FROM mahasiswa WHERE id='$id'");


$_SESSION['message'] = "Data Berhasil Dihapus";
header("location:index.php");

 ?> 