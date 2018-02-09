<link rel="stylesheet" href="<?php echo base_url('assets/css/pelayan/pesanan.css') ?> ">
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
                    <div class="judul col-md-10 col-sm-10 col-xs-10">
                        <span>Pesanan</span>
                    </div>
                    <!-- <div class="cari col-md-2 col-sm-2 col-xs-2">
                        <i class="fa fa-search"></i>
                    </div> -->
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
                
                <div class="isi" id="isipesanan">

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
                            <a href="<?php echo base_url('Pelayan/detailpesanan?id='.$value->id_pesanan); ?>">
                                <button type="button" class="btn btn-default detail_pesanan" 
                                data-id="<?= $value->id_pesanan ?>"
                                >Lihat</button></a>
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
                   $("#isipesanan").load(location.href + " #isipesanan>*", "");

                   setTimeout(loadHtml, 3000);
                };
                loadHtml();  
            });
    
        </script> 
