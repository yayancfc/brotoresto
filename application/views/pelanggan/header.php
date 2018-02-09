<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Pelanggan</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>"> 
        <link rel="stylesheet" href="<?= base_url('assets/fonts/font-awesome.min.css')?>">  
        <link rel="stylesheet" href="<?= base_url('assets/css/sweetalert.min.css')?>">  
        <style type="text/css">
            
            .navbar-brand img {
                height: 45px;
                margin-top: -13px;
            }

        </style>
 
    </head>
    <body>
        <!-- Navigation -->
        <div class="wrapper">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="<?= base_url() ?>" class="navbar-brand">
                            <span><img src="<?= base_url('assets/image/icon/BrotoResto.png') ?>"></span>
                        </a>
                    </div>

                    <div id="navbar-collapse" class="collapse navbar-collapse">
                        <ul id="top-nav" class="nav navbar-nav navbar-right">
                            <li >
                                <a href="<?php echo base_url() ?>" class="<?php if($header=='index') echo 'aktif' ?>">
                                <i class="fa fa-home"></i>Beranda</a>
                            </li>

                            <li >
                                <a  href="<?php echo base_url('pelanggan/makanan') ?>" class="<?php if($header=='makanan') echo 'aktif' ?>">
                                <i class="fa fa-cutlery"></i>Makanan</a>
                            </li>

                            <li >
                                <a href="<?php echo base_url('pelanggan/minuman') ?>" class="<?php if($header=='minuman') echo 'aktif' ?>">
                                <i class="fa fa-coffee"></i>Minuman</a>
                            </li>

                            <li class="pesan">
                                <a href="<?php echo base_url('pelanggan/pesanan') ?>" class="<?php if($header=='pesanan') echo 'aktif' ?>">
                                <i class="fa fa-shopping-cart"></i>Pesanan<span class="badge"></span></a>
                            </li>
                            
                            <li >
                                <a  href="<?php echo base_url('pelanggan/nota') ?>" class="<?php if($header=='nota') echo 'aktif' ?>">
                                <i class="fa fa-file-text"></i>Nota</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>