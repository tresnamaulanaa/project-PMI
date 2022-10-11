<?php 
require 'config/app.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- DATA TABLES -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!-- Logo Title Bar -->
    <link rel="icon" href="logopmi.jpg" type="image/x-icon">
  </head>
  <body>

    <header>
        <!-- START NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="logopmi.jpg" width="30" class="d-inline-block align-text-top me-2">
    PMI Kab Sukabumi
  </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        
        <li class="nav-item">
          <a class="nav-link" href="ruangan.php">Diruangan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="diluar.php">Dilapangan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cuti.php">Pengajuan Cuti</a>
        </li>
        <li class="nav-item">
        <a href="logout.php" class="nav-link" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin keluar?');">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
        <!-- END NAVBAR -->
    </header>


    <main>