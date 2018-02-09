<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Customer Service</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>"> 
        <link rel="stylesheet" href="<?= base_url('assets/fonts/font-awesome.min.css')?>">  
        <link rel="stylesheet" href="<?= base_url('assets/css/cs/kuisioner.css') ?>">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="<?= base_url('assets/css/scrollbar.css')?>"> 

        <style type="text/css">
            img.logo {
              height: 70px;
            }
        </style>
    </head>
    <body>

        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fa fa-close"></i>
            </div>

            <div class="sidebar-header">
                 <span><img class="logo" src="<?php echo base_url('assets/image/icon/BrotoResto.png') ?>"></span>
                
                <figure>
                    <img src="<?= base_url('assets/image/icon/cs.png') ?>" alt="">
                    
                    <figcaption>
                        Customer Service
                    </figcaption>
                </figure>
            </div>

            <ul class="list-unstyled components">
                <li class="<?php if($header=='kuisioner') echo 'active' ?>">
                    <a href="<?= base_url('CS') ?>"><i class="fa fa-home"></i>Kusioner</a>
                </li>
                <li class="<?php if($header=='hasil_kuisioner') echo 'active' ?>">
                    <a href="<?= base_url('CS/hasil_kuisioner') ?>"><i class="fa fa-file-text"></i>Hasil Kusioner</a>
                </li>
                <li>
                    <a href="<?= base_url('Login/destroy') ?>"><i class="fa fa-sign-out"></i>Keluar</a>
                </li>
            </ul>
        </nav>