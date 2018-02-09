<link rel="stylesheet" href="<?=base_url('assets/css/kasir/laporan.css') ?>">
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
                        <span>Laporan Penjualan</span>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
                
                <div class="sub-header">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <span>ID Pesanan</span>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-3">
                            <span>Total Harga</span>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <span>Tanggal Pemesanan</span>
                        </div>
                    </div>
                </div>
                
                <div class="isi">

                    <?php foreach ($laporan as $value): ?>
                        
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <span><?= $value->id_pesanan ?></span>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-3">
                            <span><?= $value->total_harga ?></span>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <span><?= $value->tgl_pemesanan ?></span>
                        </div>
                    </div>


                    <?php endforeach ?>    

                                        
                    
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 button">
                    <button type="button" class="btn btn-default" id="btnCetak" onClick="window.print();" return false>Cetak</button>
                </div>
            </div>
            
        </div>

        <div class="overlay"></div>
