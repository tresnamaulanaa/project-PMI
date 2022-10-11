<?php

$title = 'Detail Pegawai';

require 'layout/header.php';

//Mengambil ID Pegawai dari URL
$id     = (int)$_GET['id'];

//Menampilkan Data
$pegawai  = select("SELECT * FROM tb_pegawai WHERE id = $id")[0];
?>

<div class="container mt-5">
    <h1>Profil Lengkap <?= $pegawai['nama']; ?></h1>
    <hr>

    <table class="table table-striped table-responsive table-hover table-bordered mt-3">
        <tr align="center">
            <td colspan="2">
                <img src="assets/img/<?= $pegawai['foto']; ?>" width="25%">
            </td>
        </tr>
        <tr>
            <td width="40%">NPP</td>
            <td width="60%">: <?= $pegawai['npp']; ?></td>
        </tr>
        <tr>
            <td width="40%">NIK</td>
            <td width="60%">: <?= $pegawai['nik']; ?></td>
        </tr>
        <tr>
            <td width="40%">Nama</td>
            <td width="60%">: <?= $pegawai['nama']; ?></td>
        </tr>
        <tr>
            <td width="40%">Tempat Tanggal lahir</td>
            <td width="60%">: <?= $pegawai['tmp_lahir']. ', ' .date("d-M-Y", strtotime($pegawai['tgl_lahir'])); ?></td>
        </tr>
        <tr>
            <td width="40%">Agama</td>
            <td width="60%">: <?= $pegawai['agama']; ?></td>
        </tr>
        <tr>
            <td width="40%">Golongan Darah</td>
            <td width="60%">: <?= $pegawai['goldar']; ?></td>
        </tr>
        <tr>
            <td width="40%">alamat</td>
            <td width="60%">: <?= $pegawai['alamat']; ?></td>
        </tr>
        <tr>
            <td width="40%">No. Handphone</td>
            <td width="60%">: <?= $pegawai['nope']; ?></td>
        </tr>
        <tr>
            <td width="40%">email</td>
            <td width="60%">: <?= $pegawai['email']; ?></td>
        </tr>
        <tr>
            <td width="40%">Pendidikan Terakhir</td>
            <td width="60%">: <?= $pegawai['pendidikan']; ?></td>
        </tr>
        <tr>
            <td width="40%">Jabatan</td>
            <td width="60%">: <?= $pegawai['jabatan']; ?></td>
        </tr>
        <tr>
            <td width="40%">Tahun Mulai Tugas</td>
            <td width="60%">: <?= date("d-M-Y", strtotime($pegawai['tmt'])); ?></td>
        </tr>
        <tr>
            <td width="40%">Status Pegawai</td>
            <td width="60%">: <?= $pegawai['status_pegawai']; ?></tdb>
        </tr>
    </table>
    <hr>
    <a href="pegawai.php" class="btn btn-secondary btn-sm mb-3">Kembali</a>
</div>

<?php include 'layout/footer.php' ?>