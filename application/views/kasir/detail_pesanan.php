 <link rel="stylesheet" href="<?=base_url('assets/css/kasir/detail_pesanan.css') ?>">
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
                    <div class="judul col-md-9 col-sm-9 col-xs-10">
                        <span>ID Pesanan <?=$detail[0]->id_pesanan ?></span>
                    </div>
                    <div class="cari col-md-3 col-sm-3 col-xs-2">
                        <a href="<?= base_url('Kasir') ?>"><button type="button" class="btn btn-default"><span class="kembali">Kembali</span></button></a>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
                
                <div class="isi" >


                        
                    <div class="col-md-9 col-sm-12 col-xs-12" id="isipesanan">


                    <?php foreach ($detail as $value): ?>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <img src="<?= base_url('assets/image/pelanggan/'.$value->gambar) ?>" alt="">
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-5">
                                <span><?= $value->nama_menu ?></span>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <span><?= $value->harga_menu ?></span>
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-1">
                                <span><?= $value->jml_pesanan ?></span>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <span><?= $value->total?></span>
                            </div>
                        </div>
                    <?php endforeach ?>

                        
                    </div>



                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <span>Total</span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 kanan">
                                <span id="totalharga"><?= $value->total_harga ?></span>
                            </div><br>
                            <hr>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <span>Bayar</span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 kanan">
                                <input type="text" class="form-control" id="bayar">
                            </div><br>
                            <hr>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <span>Kembalian</span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 kanan">
                                <span id="kembali"></span>
                            </div><br>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 button">
                            <a href="<?= base_url('Kasir/cetak?id='.$detail[0]->id_pesanan) ?>"><button type="button" class="btn btn-default" id="btnCetak" disabled>Cetak</button></a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="overlay"></div>


        <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/kasir/detail_pesanan.js') ?>"></script>
        <script type="text/javascript">
            $("#bayar").on("change paste keyup", function() {
               var bayar = $("#bayar").val();
               var total = $("#totalharga").text();
               var kembali = bayar - total;
               $("#kembali").html(kembali);
               $("#btnCetak").attr('disabled',false);
               
            });
            
            $(document).ready(function($) {
                
                
                var loadHtml = function () {
                   $("#isipesanan").load(location.href + " #isipesanan>*", "");

                   setTimeout(loadHtml, 3000);
                };
                loadHtml();  
            });


            // $(document).ready(function(){
            //      $("#btnCetak").on("click", function(){
            //          window.print(); 
            //     });
            // });
        </script>