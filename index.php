<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-2">

    <?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <?php unset($_SESSION['message']) ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>List Data Mahasiswa</h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="insert.php" class="btn btn-primary btn-sm">Tambah Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Kelas</th>
                            <th>Program Studi</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT
                            mahasiswa.id,
                            mahasiswa.nama_lengkap,
                            mahasiswa.nim,
                            mahasiswa.periode,
                            mahasiswa.foto,
                            program_studi.program_studi,
                            kelas.nama_kelas 
                        FROM
                            mahasiswa
                            LEFT JOIN program_studi ON mahasiswa.program_studi = program_studi.ps_id
                            LEFT JOIN kelas_mahasiswa ON mahasiswa.id = kelas_mahasiswa.mahasiswa_id
                            LEFT JOIN kelas ON kelas_mahasiswa.kelas_id = kelas.id_kelas
                        WHERE
                            kelas.nama_kelas LIKE '%IF 2021 K%'";                                                                                                                                                                                                                                                                                                                              
                            $data = mysqli_query($konek,$sql);
                            $no = 1;
                            while($row = mysqli_fetch_array($data)):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nama_lengkap'] ?></td>
                            <td><?= $row['nim'] ?></td>
                            <td><?= $row['nama_kelas'] ?></td>
                            <td><?= $row['program_studi'] ?></td>
                            <td> <?php if($row['foto']): ?> <img src="foto/<?= $row['foto'] ?>" width="100" alt=""><?php else: ?> - <?php endif; ?> </td>
                            <td>
                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <?php
                            endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        new DataTable('#example');
    </script>
</body>
</html>