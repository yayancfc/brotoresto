    <link rel="stylesheet" href="<?php echo base_url('assets/css/minuman.css') ?>">
  <div class="main">
                <div class="container">
                    <div class="main-header">
                        <div class="row">
                            <div class="header col-md-4 col-sm-4 col-xs-4">
                                <span>Minuman</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <hr>
                            </div>
                        </div>                        
                    </div>
                    <div class="main-content">

                    <?php foreach ($minuman as $menuItem): ?>

                        <div class="col-md-3 col-sm-4 col-xs-6">
                            <figure>
                                <img src="<?php echo base_url().'assets/image/pelanggan/'.$menuItem->gambar; ?>"/>

                                <figcaption>
                                    <span><?php echo $menuItem->nama_menu; ?></span><br>
                                    <span><?php echo $menuItem->harga_menu ?></span>
                                </figcaption>

                                <div class="pesan pesanan"
                                        data-id='<?php echo $menuItem->id_menu; ?>'
                                        data-nama='<?php echo $menuItem->nama_menu; ?>' 
                                        data-harga='<?php echo $menuItem->harga_menu; ?>'
                                        data-gambar='<?php echo $menuItem->gambar; ?>'
                                    >
                                    <i class="fa fa-cart-plus"></i><span>Pesan</span>
                                </div>
                            </figure>
                        </div>


                    <?php endforeach; ?>

                    </div>
                </div>
            </div><br><br><br>         
        </div><br><br><br>         
        </div>
