<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Pelayan</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/fonts/font-awesome.min.css') ?> ">
        <link rel="stylesheet" href="<?= base_url('assets/fonts/material.css')?>"> 
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="<?= base_url('assets/css/scrollbar.css')?>"> 

        <style type="text/css">
            .toast {
              background: #333;
              padding: 10px 5px;
              width: 40%;
              position: fixed;
              color: white;
              text-align: center;
              font-family: "Roboto";
              font-size: 14px;
              border-radius: 3px;
              position: fixed;
              bottom: 2%;
              left: 50%;
              margin-left: -20%;
              line-height: 2rem;
              padding-bottom: 0;
              visibility: hidden;
              transition: 0.5s all;
              opacity: 0;
            }

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
                    <img src="<?php echo base_url('assets/image/icon/pelayan.png') ?>" alt="">
                    
                    <figcaption>
                        Pelayan
                    </figcaption>
                </figure>
            </div>

            <ul class="list-unstyled components">
                <li class="<?php if($header=='index') echo 'active' ?>">
                    <a href="<?= base_url('Pelayan') ?>"><i class="fa fa-home"></i>Meja Makan</a>
                </li>
                <li class="<?php if($header=='pesanan') echo 'active' ?>">
                    <a href="<?= base_url('Pelayan/pesanan') ?>"><i class="fa fa-home"></i>Pesanan</a>
                </li>
                <li>
                    <a href="<?= base_url('Login/destroy') ?>"><i class="fa fa-sign-out"></i>Keluar</a>
                </li>
            </ul>
        </nav>