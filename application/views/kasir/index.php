<link rel="stylesheet" href="<?=base_url('assets/css/kasir/pesanan.css') ?>">
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
                
                <div class="sub-header">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-1 col-sm-1 col-xs-2">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <span>Kode Pesanan</span>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-3">
                            <span>Nomor Meja</span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                        </div>
                    </div>
                </div>
                
                <div class="isi" id="daftarpesanan">

                    <?php foreach ($pesanan as $value): ?>
                        
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-1 col-sm-1 col-xs-2">
                            <span><i class="material-icons utama">shopping_cart</i></span>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <span><?= $value->id_pesanan ?></span>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-3">
                            <span><?= $value->no_meja ?></span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <a href="<?= base_url('Kasir/detail_pesanan?id='.$value->id_pesanan) ?>"><button type="button" class="btn btn-default">Lihat</button></a>
                        </div>
                    </div>


                    <?php endforeach ?>

                    
                </div>
            </div>
            
        </div>

        <div class="overlay"></div>
     <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function($) {
                
                
                var loadHtml = function () {
                   $("#daftarpesanan").load(location.href + " #daftarpesanan>*", "");

                   setTimeout(loadHtml, 3000);
                };
                loadHtml();  
            });
    
        </script> 
