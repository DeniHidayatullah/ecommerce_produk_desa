<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
   <title><?php echo $title; ?></title>
   <!-- Favicon -->
   
   <link rel="shortcut icon" type="image/png" href="<?php echo base_url("assets/img/".$this->func->globalset("logo")); ?>"/>
   <!-- Fonts -->
   <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"> -->
   <!-- Icons -->
   <link rel="stylesheet" href="<?php echo base_url('assets/themes/argon/js/plugins/nucleo/css/nucleo.css'); ?>" type="text/css">
   <link rel="stylesheet" href="<?php echo base_url('assets/themes/argon/js/plugins/@fortawesome/fontawesome-free/css/all.min.css'); ?>" type="text/css">
 
   <!-- Argon CSS -->
   <link rel="stylesheet" href="<?php echo base_url('assets/themes/argon/css/argon9f1e.css?v=1.1.0'); ?>" type="text/css">

   <script src="<?php echo base_url('assets/themes/argon/vendor/jquery/dist/jquery.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/themes/argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
 
 </head>
 
 <body class="@yield('sidebar_type')">
   <!-- Sidenav -->
   <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-sm navbar-light bg-white" id="sidenav-main">
     <div class="scrollbar-inner">
       <!-- Brand -->
       <div class="sidenav-header d-flex align-items-center">
         <a class="navbar-brand" href="<?php echo base_url(); ?>">Logo
           <img src="<?php echo ''; ?>" class="navbar-brand-img" alt="">
         </a>
         <div class="ml-auto">
           <!-- Sidenav toggler -->
           <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
             <div class="sidenav-toggler-inner">
               <i class="sidenav-toggler-line"></i>
               <i class="sidenav-toggler-line"></i>
               <i class="sidenav-toggler-line"></i>
             </div>
           </div>
         </div>
       </div>
       <div class="navbar-inner">
         <!-- Collapse -->
         <div class="collapse navbar-collapse" id="sidenav-collapse-main">
           <!-- Nav items -->
          <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('dashboard'); ?>">
              <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link collapse" href="#navbar-pesanan" data-toggle="collapse" role="button"
              aria-expanded="false" aria-controls="navbar-pesanan">
              <i class="fa fa-money-bill-alt text-success"></i>
              <span class="nav-link-text">Data Pesanan</span>
            </a>
            <div class="collapse" id="navbar-pesanan" style="">
              <ul class="nav nav-sm flex-column">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('pesanan'); ?>">
                <i class="fas fa-dolly-flatbed text-success"></i>
                <span class="nav-link-text">Pesanan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('pesanan/preorder'); ?>">
                <i class="fas fa-box text-success"></i>
                <span class="nav-link-text">Pre Order</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('pesanan/pesanmasuk'); ?>">
                <i class="fas fa-comments text-success"></i>
                <span class="nav-link-text">Pesan Masuk</span>
              </a>
            </li>
              </ul>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link collapse" href="#navbar-laporan" data-toggle="collapse" role="button"
              aria-expanded="false" aria-controls="navbar-laporan">
              <i class="ni ni-collection text-danger"></i>
              <span class="nav-link-text">Laporan</span>
            </a>
            <div class="collapse" id="navbar-laporan" style="">
              <ul class="nav nav-sm flex-column">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('laporanpenjualan'); ?>">
                <i class="fas fa-chart-area text-warning"></i>
                <span class="nav-link-text">Laporan Penjualan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('laporan/transaksi'); ?>">
                <i class="fas fa-user-clock text-warning"></i>
                <span class="nav-link-text">Laporan Transaksi</span>
              </a>
            </li>
              </ul>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link collapse" href="#navbar-dataproduk" data-toggle="collapse" role="button"
              aria-expanded="false" aria-controls="navbar-navbar-dataproduk">
              <i class="ni ni-bullet-list-67 text-info"></i>
              <span class="nav-link-text">Data Produk</span>
            </a>
            <div class="collapse" id="navbar-dataproduk" style="">
              <ul class="nav nav-sm flex-column">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('produk'); ?>">
                <i class="fas fa-boxes text-success"></i>
                <span class="nav-link-text">Produk</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('produk/kategori'); ?>">
                <i class="fas fa-clipboard-list text-success"></i>
                <span class="nav-link-text">Kategori Produk</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('products/variasi'); ?>">
                <i class="fas fa-tags text-success"></i>
                <span class="nav-link-text">Variasi Produk</span>
              </a>
            </li>
              </ul>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('usermanager'); ?>">
              <i class="fas fa-users text-warning"></i>
              <span class="nav-link-text">User Contumer</span>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('pengaturan'); ?>">
              <i class="fas fa-cogs text-muted"></i>
              <span class="nav-link-text">Pengaturan</span>
            </a>
          </li>
        </ul>
         </div>
       </div>
     </div>
   </nav>
   <!-- Main content -->
   <div class="main-content" id="panel">
     <!-- Topnav -->
     <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
       <div class="container-fluid">
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <!-- Search form -->
           <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main" action="<?php echo site_url('admin/products/search'); ?>" required>
             <div class="form-group mb-0">
               <div class="input-group input-group-alternative input-group-merge">
                 <div class="input-group-prepend">
                   <span class="input-group-text"><i class="fas fa-search"></i></span>
                 </div>
                 <input class="form-control" value="<?php echo (isset($query) ? $query : ''); ?>" name="search_query" placeholder="Cari..." type="text" required>
               </div>
             </div>
             <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
               <span aria-hidden="true">×</span>
             </button>
           </form>
           <!-- Navbar links -->
           <ul class="navbar-nav align-items-center ml-md-auto">
             <li class="nav-item d-xl-none">
               <!-- Sidenav toggler -->
               <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                 <div class="sidenav-toggler-inner">
                   <i class="sidenav-toggler-line"></i>
                   <i class="sidenav-toggler-line"></i>
                   <i class="sidenav-toggler-line"></i>
                 </div>
               </div>
             </li>
             <li class="nav-item d-sm-none">
               <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                 <i class="ni ni-zoom-split-in"></i>
               </a>
             </li>

           </ul>
           <ul class="navbar-nav align-items-center ml-auto ml-md-0">
             <li class="nav-item dropdown">
               <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <div class="media align-items-center">
                   <span class="avatar avatar-sm rounded-circle">
                     <img src="<?php echo('assets/uploads/users/admin.png'); ?>">
                   </span>
                   <div class="media-body ml-2 d-none d-lg-block">
                     <span class="mb-0 text-sm  font-weight-bold"><?=$this->func->getUser($_SESSION["usrid"],"nama")?></span></span>
							</span>
                   </div>
                 </div>
               </a>
               <div class="dropdown-menu dropdown-menu-right">
                 <div class="dropdown-header noti-title">
                   <h6 class="text-overflow m-0">Welcome!</h6>
                 </div>
                 <a href="<?php echo site_url('admin/settings/profile'); ?>" class="dropdown-item">
                   <i class="ni ni-single-02"></i>
                   <span>Profil</span>
                 </a>
                 <a href="<?php echo site_url('admin/settings'); ?>" class="dropdown-item">
                   <i class="ni ni-settings-gear-65"></i>
                   <span>Pengaturan</span>
                 </a>
                 <div class="dropdown-divider"></div>
                 <a href="<?php echo site_url('admin/logout'); ?>" class="dropdown-item">
                   <i class="ni ni-user-run"></i>
                   <span>Logout</span>
                 </a>
               </div>
             </li>
           </ul>
         </div>
       </div>
     </nav>