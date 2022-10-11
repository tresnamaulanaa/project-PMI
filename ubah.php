<?php 

session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

$title = 'Ubah Data Pegawai';

require 'layout/header.php'; 

//MENGAMBIL ID PEGAWAI DARI URL
$id =(int)$_GET['id'];

$pegawai = select("SELECT * FROM tb_pegawai WHERE id = $id")[0];

//CHECK TOMBOL SIMPAN
if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Data Pegawai berhasil diubah!');
                document.location.href = 'index.php';
            </script>";
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Data Pegawai gagal diubah!');
            </script>";
    }
}
?>

<div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Ubah Data Pegawai</h3>
            </div>
            <hr>
        </div>
    <div class="row my-2">
        <div class="col-md">
            <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $pegawai['id']; ?>">
                <input type="hidden" name="fotoLama" value="<?= $pegawai['foto']; ?>">
            <div class="mb-3">
                <label for="npp" class="form-label">NPP</label>
                <input type="text" class="form-control w-50" id="npp" placeholder="Masukkan NPP" min="1" name="npp" value="<?= $pegawai['npp']; ?>" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="number" class="form-control w-50" id="nik" placeholder="Masukkan NIK" min="1" name="nik" value="<?= $pegawai['nik']; ?>" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control w-50" id="nama" placeholder="Masukkan Nama Lengkap" name="nama" value="<?= $pegawai['nama']; ?>" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="tmp_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control w-50" id="tmp_lahir" placeholder="Masukkan Tempat Lahir" name="tmp_lahir" value="<?= $pegawai['tmp_lahir']; ?>" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control w-50" id="tgl_lahir" name="tgl_lahir" value="<?= $pegawai['tgl_lahir']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jekel" id="Laki - Laki" value="Laki - Laki" <?php if ($pegawai['jekel'] == 'Laki - Laki') { ?> checked='' <?php } ?>>
                        <label class="form-check-label" for="Laki - Laki">Laki - Laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jekel" id="Perempuan" value="Perempuan" <?php if ($pegawai['jekel'] == 'Perempuan') { ?> checked='' <?php } ?>>
                        <label class="form-check-label" for="Perempuan">Perempuan</label>
                    </div>
                </div>
            <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                    <select class="form-select w-50" id="agama" name="agama">
                        <option disabled selected value>--------------------------------------------Pilih Agama--------------------------------------------</option>
                        <option value="Islam" <?php if ($pegawai['agama'] == 'Islam') { ?> selected='' <?php } ?>>Islam</option>
                        <option value="Kristen" <?php if ($pegawai['agama'] == 'Kristen') { ?> selected='' <?php } ?>>Kristen</option>
                        <option value="Hindu" <?php if ($pegawai['agama'] == 'Hindu') { ?> selected='' <?php } ?>>Hindu</option>
                        <option value="Budha" <?php if ($pegawai['agama'] == 'Budha') { ?> selected='' <?php } ?>>Budha</option>
                        <option value="Konghucu" <?php if ($pegawai['agama'] == 'Konghucu') { ?> selected='' <?php } ?>>Konghucu</option>
                    </select>
            </div>
            <div class="mb-3">
                <label for="goldar" class="form-label">Golongan Darah</label>
                    <select class="form-select w-50" id="goldar" name="goldar">
                        <option disabled selected value>--------------------------------------------Pilih Golongan Darah--------------------------------------------</option>
                        <option value="A" <?php if ($pegawai['goldar'] == 'A') { ?> selected='' <?php } ?>>A</option>
                        <option value="AB" <?php if ($pegawai['goldar'] == 'AB') { ?> selected='' <?php } ?>>AB</option>
                        <option value="B" <?php if ($pegawai['goldar'] == 'B') { ?> selected='' <?php } ?>>B</option>
                        <option value="O" <?php if ($pegawai['goldar'] == 'O') { ?> selected='' <?php } ?>>O</option>
                    </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control w-50" id="alamat" rows="5" name="alamat" placeholder="Masukkan Alamat" autocomplete="off" required><?= $pegawai['alamat']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="nope" class="form-label">No. Handphone</label>
                <input type="number" class="form-control w-50" id="nope" placeholder="Masukkan Nomor Handphone" min="1" name="nope" value="<?= $pegawai['nope']; ?>" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-Mail</label>
                <input type="email" class="form-control w-50" id="email" placeholder="Masukkan E-Mail" name="email" value="<?= $pegawai['email']; ?>" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="pendidikan" class="form-label">Pendidikan</label>
                <input type="text" class="form-control w-50" id="pendidikan" placeholder="Masukkan Sekolah Terakhir" name="pendidikan" value="<?= $pegawai['pendidikan']; ?>" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control w-50" id="jabatan" placeholder="Masukkan Jabatan" name="jabatan" value="<?= $pegawai['jabatan']; ?>" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="tmt" class="form-label">Tahun Mulai Tugas</label>
                <input type="date" class="form-control w-50" id="tmt" name="tmt" value="<?= $pegawai['tmt']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="status_pegawai" class="form-label">Status Pegawai</label>
                <input type="text" class="form-control w-50" id="status_pegawai" placeholder="Masukkan Status Pegawai" name="status_pegawai" value="<?= $pegawai['status_pegawai']; ?>" autocomplete="off" required>
            </div>
            <div class="mb-3">
                        <label for="foto" class="form-label">Foto <i>(Saat ini)</i></label> <br>
                        <input class="form-control form-control-sm w-50" id="foto" name="foto" type="file" onchange="previewImg()">
                        <img src="assets/img/<?= $pegawai['foto']; ?>" alt="" class="img-thumbnail img-preview mt-3" width="100px">
                    </div>
            <hr>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
            </form>
        </div>
    </div>
</div>

<!-- PREVIEW IMAGE -->
<script>
    function previewImg(){
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e){
            imgPreview.src = e.target.result;
        }
    }
</script>

<?php include '../layout/footer.php'; ?>