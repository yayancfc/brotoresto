<link rel="stylesheet" href="<?= base_url('assets/css/cs/hasil_kuisioner.css') ?>">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                        <span>Hasil Kusioner</span>
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
                        <div class="col-md-5 col-sm-5 col-xs-5">
                            <span>Pertanyaan</span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <span>Hasil</span>
                        </div>
                    </div>
                </div>
                
                <div class="isi">
                    
                    <?php foreach ($hasil as  $value): ?>
                        

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <span><?=$value->id_pesanan ?></span>
                        </div>

                        <div class="col-md-5 col-sm-5 col-xs-5">
                            <span><?=$value->pertanyaan ?></span>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <span><?=$value->hasil ?></span>
                        </div>
                    </div>
                

                    <?php endforeach ?>
                </div>
            </div>
            
        </div>

        <div class="overlay"></div>

        <script src="<?= base_url('assets/js/jquery.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/js/hasil_kuisioner.js') ?>" type="text/javascript"></script>