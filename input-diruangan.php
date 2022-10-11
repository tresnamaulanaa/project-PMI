<?php 

session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

$title = 'Tambah Data Pegawai Didalam Ruangan';

require 'layout/header.php'; 

//CHECK TOMBOL SIMPAN
if (isset($_POST['simpan'])) {
    if (tambahRuangan($_POST) > 0) {
        echo "<script>
                alert('Data Pegawai berhasil ditambahkan!');
                document.location.href = 'ruangan.php';
            </script>";
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Data Pegawai gagal ditambahkan!');
            </script>";
    }
}
?>

<div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data Pegawai Didalam Ruangan</h3>
            </div>
            <hr>
        </div>
    <div class="row my-2">
        <div class="col-md">
            <form method="post" action="">
            <div class="mb-3">
                <label for="npp" class="form-label">NPP</label>
                <input type="text" class="form-control w-50" id="npp" placeholder="Masukkan NPP" min="1" name="npp"  required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control w-50" id="nama" placeholder="Masukkan Nama Lengkap" name="nama"  required>
            </div>
            <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <input type="text" class="form-control w-50" id="hari" placeholder="Masukkan Hari Tugas" name="hari"  required>
            </div>
            <div class="mb-3">
                <label for="tgl_tugas" class="form-label">Tanggal Tugas</label>
                <input type="date" class="form-control w-50" id="tgl_tugas" name="tgl_tugas" required>
            </div>
            <div class="mb-3">
                <label for="nope" class="form-label">No. Handphone</label>
                <input type="number" class="form-control w-50" id="nope" placeholder="Masukkan Nomor Handphone" min="1" name="nope"  required>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control w-50" id="keterangan" rows="5" name="keterangan" placeholder="Masukkan keterangan"  required></textarea>
            </div>
            <hr>
                <a href="ruangan.php" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>