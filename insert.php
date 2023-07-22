<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    </head>
<body>

<?php include 'navbar.php'; ?>

    <div class="container mt-2">
        <div class="card">
            <form action="save.php" method="post" enctype="multipart/form-data">
                <div class="card-header">
                    <h4>Tambah Mahasiswa</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nim" name="nim">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="program_studi" class="col-sm-2 col-form-label">Program Studi</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="program_studi" id="program_studi">
                                <?php
                                    include 'koneksi.php';
                                    $sql = "SELECT * from program_studi";                                                                                                                                                                                                                                                                                                                              
                                    $data = mysqli_query($konek,$sql);
                                    while($row = mysqli_fetch_array($data)):
                                ?>
                                    <option value="<?= $row['ps_id'] ?>"><?= $row['program_studi'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="periode" class="col-sm-2 col-form-label">Periode</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="periode" id="periode">
                                <?php
                                    $year = date('Y'); 
                                    for ($i=$year; $i > $year-5 ; $i--) { ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>  
                                <?php }  ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm float-end" style="margin-left: 10px">Simpan</button>
                <a href="index.php" class="btn btn-primary btn-sm float-end ml-1">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>