<?php 

session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

$title = 'Ubah Data Pegawai Diruangan';

require 'layout/header.php'; 

//MENGAMBIL ID PEGAWAI DARI URL
$id =(int)$_GET['id'];

$diluar = select("SELECT * FROM tb_luar WHERE id = $id")[0];

//CHECK TOMBOL SIMPAN
if (isset($_POST['ubah'])) {
    if (ubahLuar($_POST) > 0) {
        echo "<script>
                alert('Berhasil Diubah!');
                document.location.href = 'diluar.php';
            </script>";
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Gagal Diubah!');
            </script>";
    }
}
?>

<div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Ubah Data Pegawai Dilapangan</h3>
            </div>
            <hr>
        </div>
    <div class="row my-2">
        <div class="col-md">
            <form method="post" action="">
                <input type="hidden" name="id" value="<?= $diluar['id']; ?>">
            <div class="mb-3">
                <label for="npp" class="form-label">NPP</label>
                <input type="text" class="form-control w-50" id="npp" placeholder="Masukkan NPP" min="1" name="npp" value="<?= $diluar['npp']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control w-50" id="nama" placeholder="Masukkan Nama Lengkap" name="nama" value="<?= $diluar['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="hari" class="form-label">Hari Tugas</label>
                <input type="text" class="form-control w-50" id="hari" placeholder="Masukkan Tempat Lahir" name="hari" value="<?= $diluar['hari']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tgl_tugas" class="form-label">Tanggal Tugas</label>
                <input type="date" class="form-control w-50" id="tgl_tugas" name="tgl_tugas" value="<?= $diluar['tgl_tugas']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nope" class="form-label">No. Handphone</label>
                <input type="number" class="form-control w-50" id="nope" placeholder="Masukkan Nomor Handphone" min="1" name="nope" value="<?= $diluar['nope']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control w-50" id="keterangan" rows="5" name="keterangan" placeholder="Masukkan keterangan" required><?= $diluar['keterangan']; ?></textarea>
            </div>
            <hr>
                <a href="index.php" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
            </form>
        </div>
    </div>
</div>

<?php include '../layout/footer.php'; ?>