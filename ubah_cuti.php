<?php 

session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

$title = 'Ubah Pengajuan Cuti';

require 'layout/header.php'; 

//MENGAMBIL ID PEGAWAI DARI URL
$id =(int)$_GET['id'];

$cuti = select("SELECT * FROM tb_cuti WHERE id = $id")[0];

//CHECK TOMBOL SIMPAN
if (isset($_POST['ubah'])) {
    if (ubahCuti($_POST) > 0) {
        echo "<script>
                alert('Berhasil Diubah!');
                document.location.href = 'cuti.php';
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
                <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Ubah Pengajuan Cuti</h3>
            </div>
            <hr>
        </div>
    <div class="row my-2">
        <div class="col-md">
            <form method="post" action="">
                <input type="hidden" name="id" value="<?= $cuti['id']; ?>">
            <div class="mb-3">
                <label for="npp" class="form-label">NPP</label>
                <input type="text" class="form-control w-50" id="npp" placeholder="Masukkan NPP" min="1" name="npp" value="<?= $cuti['npp']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control w-50" id="nama" placeholder="Masukkan Nama Lengkap" name="nama" value="<?= $cuti['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="dari_tgl" class="form-label">Dari Tanggal</label>
                <input type="date" class="form-control w-50" id="dari_tgl" name="dari_tgl" value="<?= $cuti['dari_tgl']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="sampai_tgl" class="form-label">Sampai Tanggal</label>
                <input type="date" class="form-control w-50" id="sampai_tgl" name="sampai_tgl" value="<?= $cuti['sampai_tgl']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="Disetujui" value="Disetujui" <?php if ($cuti['status'] == 'Disetujui') { ?> checked='' <?php } ?>>
                        <label class="form-check-label" for="Disetujui">Disetujui</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="Tidak Disetujui" value="Tidak Disetujui" <?php if ($cuti['status'] == 'Tidak Disetujui') { ?> checked='' <?php } ?>>
                        <label class="form-check-label" for="Tidak Disetujui">Tidak Disetujui</label>
                    </div>
                </div>
            <hr>
                <a href="cuti.php" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
            </form>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>