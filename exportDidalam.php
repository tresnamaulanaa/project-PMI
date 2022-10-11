<?php

session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

$title = 'Pegawai Didalam Ruangan';
// Memanggil atau membutuhkan file function.php
require 'config/database.php';
require 'config/controller.php';

// Menampilkan semua data dari table siswa berdasarkan nis secara Descending
$pegawai_diruangan = select("SELECT * FROM tb_ruangan ORDER BY id DESC");
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
            <h2>Pegawai Didalam Ruangan</h2>
                <div class="data-tables datatable-dark">
                    
                    <!-- Masukkan table nya disini, dimulai dari tag TABLE -->

                    <table border="1" id="mauexport">
    <thead>
        <tr>
            
                            <th>No.</th>
                            <th>NPP</th>
                            <th>Nama</th>
                            <th>Hari Tugas</th>
                            <th>Tanggal Tugas</th>
                            <th>No. Hp</th>
                            <th>Keterangan</th>

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