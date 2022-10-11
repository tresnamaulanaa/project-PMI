<?php

// Memanggil atau membutuhkan file function.php
require 'layout/header.php';

// Mengambil data dari id dengan fungsi get
$id = $_GET['id'];

// Jika fungsi hapus lebih dari 0/data terhapus, maka munculkan alert dibawah
if (hapus($id) > 0) {
    echo "<script>
                alert('Data Pegawai berhasil dihapus!');
                document.location.href = 'index.php';
            </script>";
} else {
    // Jika fungsi hapus dibawah dari 0/data tidak terhapus, maka munculkan alert dibawah
    echo "<script>
            alert('Data Pegawai gagal dihapus!');
        </script>";
}