<?php 

session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

$title = 'Pegawai Didalam Ruangan';

require 'layout/header.php';

$pegawai_diruangan = select("SELECT * FROM tb_ruangan ORDER BY id DESC");


?>

<div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="text-center fw-bold text-uppercase">Pegawai Didalam Ruangan</h3>
                <hr>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <a href="input-diruangan.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</a>
                <a href="exportDidalam.php" class="btn btn-success ms-1"><i class="bi bi-file-earmark-spreadsheet-fill"></i>&nbsp;Ekspor ke Excel</a>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md">
                <table id="data" class="table table-striped table-responsive table-hover table-bordered" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>NPP</th>
                            <th>Nama</th>
                            <th>Hari Tugas</th>
                            <th>Tanggal Tugas</th>
                            <th>No. Hp</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($pegawai_diruangan as $diruangan) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $diruangan['npp']; ?></td>
                                <td><?= $diruangan['nama']; ?></td>
                                <td><?= $diruangan['hari']; ?></td>
                                <td><?= date("d-M-Y", strtotime($diruangan['tgl_tugas'])); ?></td>
                                <td><?= $diruangan['nope']; ?></td>
                                <td><?= $diruangan['keterangan']; ?></td>
                                <td>

                                    <a href="ubah-ruangan.php?id=<?= $diruangan['id']; ?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-pencil-square"></i>&nbsp;Ubah</a> |

                                    <a href="hapus-ruangan.php?id=<?= $diruangan['id']; ?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $diruangan['nama']; ?> ?');"><i class="bi bi-trash-fill"></i>&nbsp;Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include "layout/footer.php"; ?>