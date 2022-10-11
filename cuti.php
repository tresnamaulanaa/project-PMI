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

$pengajuan_cuti = select("SELECT * FROM tb_cuti ORDER BY id DESC");


?>

<div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="text-center fw-bold text-uppercase">Pengajuan Cuti</h3>
                <hr>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <a href="tambah_cuti.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah</a>
                <a href="exportPengajuanCuti.php" class="btn btn-success ms-1"><i class="bi bi-file-earmark-spreadsheet-fill"></i>&nbsp;Ekspor ke Excel</a>
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
                            <th>Dari Tanggal</th>
                            <th>Sampai Tanggal</th>
                            <th>Jumlah Hari</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($pengajuan_cuti as $cuti) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $cuti['npp']; ?></td>
                                <td><?= $cuti['nama']; ?></td>
                                <td><?= date("d-M-Y", strtotime($cuti['dari_tgl'])); ?></td>
                                <td><?= date("d-M-Y", strtotime($cuti['sampai_tgl'])); ?></td>
                               <td><?php $dr_tgl    =new DateTime($cuti['dari_tgl']);
                                    $sampai_tgl        =new DateTime($cuti['sampai_tgl']);
                                    $diff = $dr_tgl->diff($sampai_tgl);
                                    echo $diff->d; echo " Hari";
                                    ?>
                                </td>
                                <td><?= $cuti['status']; ?></td>
                                <td>

                                    <a href="ubah_cuti.php?id=<?= $cuti['id']; ?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-pencil-square"></i>&nbsp;Ubah</a> |

                                    <a href="hapus_cuti.php?id=<?= $cuti['id']; ?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $diruangan['nama']; ?> ?');"><i class="bi bi-trash-fill"></i>&nbsp;Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include "layout/footer.php"; ?>