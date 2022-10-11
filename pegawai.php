<?php 

session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

$title = 'Data Pegawai';

include 'layout/header.php'; 

$data_pegawai = select("SELECT * FROM tb_pegawai ORDER BY id DESC");
?>

<div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="text-center fw-bold text-uppercase">Data Pegawai</h3>
                <hr>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <a href="tambah_data.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</a>
                <a href="export.php" class="btn btn-success ms-1"><i class="bi bi-file-earmark-spreadsheet-fill"></i>&nbsp;Ekspor ke Excel</a>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md">
                <table id="data" class="table table-striped table-responsive table-hover table-bordered" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>npp</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data_pegawai as $pegawai) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $pegawai['npp']; ?></td>
                                <td><?= $pegawai['nama']; ?></td>
                                <td><?= $pegawai['jabatan']; ?></td>
                                <td><?= $pegawai['nope']; ?></td>
                                <td>
                                    <a href="detail.php?id=<?= $pegawai['id']; ?>" class="btn btn-success btn-sm text-white detail" style="font-weight: 600;"><i class="bi bi-info-circle-fill"></i>&nbsp;Detail</a> |

                                    <a href="ubah.php?id=<?= $pegawai['id']; ?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-pencil-square"></i>&nbsp;Ubah</a> |

                                    <a href="hapus.php?id=<?= $pegawai['id']; ?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $pegawai['nama']; ?> ?');"><i class="bi bi-trash-fill"></i>&nbsp;Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include 'layout/footer.php'; ?>