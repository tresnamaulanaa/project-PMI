<?php

require 'database.php';
//FUNGSI MENAMPILKAN DATA
function select($query)
{
    //PANGGIL KONEKSI DATABASE
    global $db;

    $result   = mysqli_query($db, $query);
    $rows     = [];

    while   ($row = mysqli_fetch_assoc($result)) {
      $rows[]   = $row;
    }
    return $rows;
  }



//SEMUA PEGAWAI====================================================================================================

//FUNGSI TAMBAH DATA
function tambah($post)
{
  global $db;

  $npp            = strip_tags($post['npp']);
  $nik            = strip_tags($post['nik']);
  $nama           = strip_tags($post['nama']);
  $tmp_lahir      = strip_tags($post['tmp_lahir']);
  $tgl_lahir      = strip_tags($post['tgl_lahir']);
  $jekel          = strip_tags($post['jekel']);
  $agama          = strip_tags($post['agama']);
  $goldar         = strip_tags($post['goldar']);
  $alamat         = strip_tags($post['alamat']);
  $nope           = strip_tags($post['nope']);
  $email          = strip_tags($post['email']);
  $pendidikan     = strip_tags($post['pendidikan']);
  $jabatan        = strip_tags($post['jabatan']);
  $tmt            = strip_tags($post['tmt']);
  $status_pegawai = strip_tags($post['status_pegawai']);
  $foto           = upload();

  //QUERY TAMBAH DATA
  $query = "INSERT INTO tb_pegawai VALUES(null, '$npp', '$nik', '$nama', '$tmp_lahir', '$tgl_lahir', '$jekel', '$agama', '$goldar', '$alamat', '$nope', '$email', '$pendidikan', '$jabatan', '$tmt', '$status_pegawai', '$foto')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}


// Membuat fungsi Ubah
function ubah($post)
{
    global $db;
    
  $id             = strip_tags($post['id']);
  $npp            = strip_tags($post['npp']);
  $nik            = strip_tags($post['nik']);
  $nama           = strip_tags($post['nama']);
  $tmp_lahir      = strip_tags($post['tmp_lahir']);
  $tgl_lahir      = strip_tags($post['tgl_lahir']);
  $jekel          = strip_tags($post['jekel']);
  $agama          = strip_tags($post['agama']);
  $goldar         = strip_tags($post['goldar']);
  $alamat         = strip_tags($post['alamat']);
  $nope           = strip_tags($post['nope']);
  $email          = strip_tags($post['email']);
  $pendidikan     = strip_tags($post['pendidikan']);
  $jabatan        = strip_tags($post['jabatan']);
  $tmt            = strip_tags($post['tmt']);
  $status_pegawai = strip_tags($post['status_pegawai']);
  $fotoLama       = strip_tags($post['fotoLama']);

    if ($_FILES['foto']['error'] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
    }
  //QUERY UPDATE DATA
  $query = "UPDATE tb_pegawai SET npp = '$npp', nik = '$nik', nama = '$nama', tmp_lahir = '$tmp_lahir', tgl_lahir = '$tgl_lahir', jekel = '$jekel', agama = '$agama', goldar = '$goldar', alamat = '$alamat', nope = '$nope', email = '$email', pendidikan = '$pendidikan', jabatan = '$jabatan', tmt = '$tmt', status_pegawai = '$status_pegawai', foto = '$foto' WHERE id = $id";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
    
}

// Membuat fungsi upload gambar
function upload()
{
    // Syarat
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // Jika tidak mengupload gambar atau tidak memenuhi persyaratan diatas maka akan menampilkan alert dibawah
    if ($error === 4) {
        echo "<script>alert('Pilih Foto terlebih dahulu!');</script>";
        return false;
    }

    // format atau ekstensi yang diperbolehkan untuk upload gambar adalah
    $extValid = ['jpg', 'jpeg', 'png'];
    $ext = explode('.', $namaFile);
    $ext = strtolower(end($ext));

    // Jika format atau ekstensi bukan gambar maka akan menampilkan alert dibawah
    if (!in_array($ext, $extValid)) {
        echo "<script>alert('Yang anda upload bukanlah gambar!');</script>";
        return false;
    }

    // Jika ukuran gambar lebih dari 3.000.000 byte maka akan menampilkan alert dibawah
    if ($ukuranFile > 3000000) {
        echo "<script>alert('Ukuran Foto anda terlalu besar!');</script>";
        return false;
    }

    // nama gambar akan berubah angka acak/unik jika sudah berhasil tersimpan
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ext;

    // memindahkan file ke dalam folde img dengan nama baru
    move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);

    return $namaFileBaru;
}

// Membuat fungsi hapus
function hapus($id)
{
    global $db;

    //AMBIL FOTO SESUAI DATA YG DI PILLIH
    $foto = select("SELECT * FROM tb_pegawai WHERE id = $id")[0];
    unlink("assets/img". $foto['foto']);

    mysqli_query($db, "DELETE FROM tb_pegawai WHERE id = $id");
    return mysqli_affected_rows($db);
}



//DI RUANGAN================================================================================================================================

//FUNGSI TAMBAH DATA PEGAWAI DIRUANGAN
function tambahRuangan($post)
{
  global $db;

  $npp          = strip_tags($post['npp']);
  $nama         = strip_tags($post['nama']);
  $hari         = strip_tags($post['hari']);
  $tgl_tugas    = strip_tags($post['tgl_tugas']);
  $nope         = strip_tags($post['nope']);
  $keterangan   = strip_tags($post['keterangan']);

  //QUERY TAMBAH DATA
  $query = "INSERT INTO tb_ruangan VALUES(null, '$npp', '$nama', '$hari', '$tgl_tugas', '$nope', '$keterangan')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}


// Membuat fungsi Ubah Diruangan
function ubahRuangan($post)
{
    global $db;
    
$id                 = strip_tags($post['id']);
$npp                = strip_tags($post['npp']);
$nama               = strip_tags($post['nama']);
$hari               = strip_tags($post['hari']);
$tgl_tugas          = strip_tags($post['tgl_tugas']);
$nope               = strip_tags($post['nope']);
$keterangan         = strip_tags($post['keterangan']);

  //QUERY UPDATE DATA
  $query = "UPDATE tb_ruangan SET npp = '$npp', nama = '$nama', hari = '$hari', tgl_tugas = '$tgl_tugas', nope = '$nope', keterangan = '$keterangan' WHERE id = $id";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
    
}


// Membuat fungsi hapus pegawai di ruangan
function hapusRuangan($id)
{
    global $db;

    mysqli_query($db, "DELETE FROM tb_ruangan WHERE id = $id");
    return mysqli_affected_rows($db);
}



//DI LAPANGAN============================================================================================================================================================


//FUNGSI TAMBAH DATA PEGAWAI DILAPANGAN
function tambahLuar($post)
{
  global $db;

  $npp          = strip_tags($post['npp']);
  $nama         = strip_tags($post['nama']);
  $hari         = strip_tags($post['hari']);
  $tgl_tugas    = strip_tags($post['tgl_tugas']);
  $nope         = strip_tags($post['nope']);
  $keterangan   = strip_tags($post['keterangan']);

  //QUERY TAMBAH DATA
  $query = "INSERT INTO tb_luar VALUES(null, '$npp', '$nama', '$hari', '$tgl_tugas', '$nope', '$keterangan')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}


// Membuat fungsi Ubah Dilapangan
function ubahLuar($post)
{
    global $db;
    
$id                 = strip_tags($post['id']);
$npp                = strip_tags($post['npp']);
$nama               = strip_tags($post['nama']);
$hari               = strip_tags($post['hari']);
$tgl_tugas          = strip_tags($post['tgl_tugas']);
$nope               = strip_tags($post['nope']);
$keterangan         = strip_tags($post['keterangan']);

  //QUERY UPDATE DATA
  $query = "UPDATE tb_luar SET npp = '$npp', nama = '$nama', hari = '$hari', tgl_tugas = '$tgl_tugas', nope = '$nope', keterangan = '$keterangan' WHERE id = $id";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
    
}



// Membuat fungsi hapus pegawai di ruangan
function hapusLuar($id)
{
    global $db;

    mysqli_query($db, "DELETE FROM tb_luar WHERE id = $id");
    return mysqli_affected_rows($db);
}


//PENGAJUAN CUTI =============================================================================================

//FUNGSI TAMBAH DATA PENGAJUAN CUTI PEGAWAI
function tambahCuti($post)
{
  global $db;

  $npp          = strip_tags($post['npp']);
  $nama         = strip_tags($post['nama']);
  $dari_tgl     = strip_tags($post['dari_tgl']);
  $sampai_tgl   = strip_tags($post['sampai_tgl']);
  $status     = strip_tags($post['status']);

  //QUERY TAMBAH DATA
  $query = "INSERT INTO tb_cuti VALUES(null, '$npp', '$nama', '$dari_tgl', '$sampai_tgl', '$status')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}


// Membuat fungsi Ubah Pengajuan Cuti
function ubahCuti($post)
{
    global $db;
    
$id                 = strip_tags($post['id']);
$npp                = strip_tags($post['npp']);
$nama               = strip_tags($post['nama']);
$dari_tgl           = strip_tags($post['dari_tgl']);
$sampai_tgl         = strip_tags($post['sampai_tgl']);
$status             = strip_tags($post['status']);

  //QUERY UPDATE DATA
  $query = "UPDATE tb_cuti SET npp = '$npp', nama = '$nama', dari_tgl = '$dari_tgl', sampai_tgl = '$sampai_tgl', status = '$status' WHERE id = $id";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
    
}

// Membuat fungsi hapus
function hapusCuti($id)
{
    global $db;

    mysqli_query($db, "DELETE FROM tb_cuti WHERE id = $id");
    return mysqli_affected_rows($db);
}