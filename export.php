<?php

session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

$title = 'Data Pegawai';
// Memanggil atau membutuhkan file function.php
require 'config/database.php';
require 'config/controller.php';

// Menampilkan semua data dari table siswa berdasarkan nis secara Descending
$data_pegawai = select("SELECT * FROM tb_pegawai ORDER BY id DESC");
?>
<title><?= $title ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<body>
<div class="container-fluid">
            <h2>Data Pegawai</h2>
                <div class="data-tables datatable-dark">
                    
                    <!-- Masukkan table nya disini, dimulai dari tag TABLE -->

                    <table border="1" id="mauexport">
    <thead>
        <tr>
            
                            <th>No.</th>
                            <th>NPP</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Agama</th>
                            <th>Goldar</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Pendidikan</th>
                            <th>Jabatan</th>
                            <th>Mulai Tugas</th>
                            <th>Status Pegawai</th>

        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($data_pegawai as $pegawai) : ?>
            <tr>
                <td><?= $no++; ?></td>
           
                
                <td><?= $pegawai['npp']; ?></td>
            
                
                <td > <?= $pegawai['nik']; ?></td>
            
               
                <td > <?= $pegawai['nama']; ?></td>
            
                
                <td > <?= $pegawai['tmp_lahir']; ?></td>
                <td><?= date("d-M-Y", strtotime($pegawai['tgl_lahir'])); ?></td>
            
                
                <td > <?= $pegawai['agama']; ?></td>
           
                
                <td > <?= $pegawai['goldar']; ?></td>
            
                
                <td > <?= $pegawai['alamat']; ?></td>
            
                
                <td > <?= $pegawai['nope']; ?></td>
            
                
                <td > <?= $pegawai['email']; ?></td>
            
                
                <td > <?= $pegawai['pendidikan']; ?></td>
            
                
                <td > <?= $pegawai['jabatan']; ?></td>
            
                
                <td > <?= date("d-M-Y", strtotime($pegawai['tmt'])); ?></td>
            
                
                <td > <?= $pegawai['status_pegawai']; ?></tdb>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
                    
                </div>
</div>
    
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

    

</body>

</html>