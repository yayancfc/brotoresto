<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Koki</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>"> 
        <link rel="stylesheet" href="<?= base_url('assets/fonts/font-awesome.min.css')?>">  
        <link rel="stylesheet" href="<?= base_url('assets/fonts/material.css')?>"> 
        <link rel="stylesheet" href="<?= base_url('assets/css/koki/pesanan.css') ?>">
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
                    <img src="<?= base_url('assets/image/icon/chef.png') ?>" alt="">
                    
                    <figcaption>
                        Koki
                    </figcaption>
                </figure>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#"><i class="fa fa-home"></i>Pesanan</a>
                </li>
                <li>
                    <a href="<?=base_url('Login/destroy') ?>"><i class="fa fa-sign-out"></i>Keluar</a>
                </li>
            </ul>
        </nav>

        <div id="content">

            <nav class="navbar navbar-default" id="collapse">
                <div class="container">
                    <div class="navbar-header">
                        <i class="fa fa-bars" id="sidebarCollapse"></i>
                    </div>
                </div>
            </nav>

            <div id="main-content">
                <div class="header">
                    <div class="judul col-md-12 col-sm-12 col-xs-12">
                        <span>Pesanan</span>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
                
                <div class="isi" id="daftarpesanan">

                    <?php foreach ($pesanan as $value): ?>
                        


                    <div class="col-md-6 col-sm-12 col-xs-12 kotak">
                        <figure>
                            <div class="col-md-3 col-sm-3 col-xs-3 gambar">
                                <img src="<?= base_url('assets/image/pelanggan/'.$value->gambar) ?>" alt="">
                            </div>
                            <div class="col-md-6 col-sm-5 col-xs-6">
                                <span><?= $value->nama_menu ?></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <span><?= $value->jml_pesanan ?></span>
                            </div>
                        </figure>
                    </div>
                    
                    <?php endforeach ?>

                </div>
            </div>
            
        </div>

        <div class="overlay"></div>

        <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/scrollbar.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/koki/pesanan.js') ?> " type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function($) {
                
                
                var loadHtml = function () {
                   $("#daftarpesanan").load(location.href + " #daftarpesanan>*", "");

                   setTimeout(loadHtml, 3000);
                };
                loadHtml();  
            });
        </script>

    </body>
</html>
