<link rel="stylesheet" href="<?php echo base_url('assets/css/pelayan/detail_pesanan.css') ?> ">
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
                        <span><?= $detail[0]->id_pesanan ?></span>
                    </div>
                    <div class="cari col-md-3 col-sm-3 col-xs-2">
                        <a href="<?= base_url('Pelayan/pesanan') ?>"><button type="button" class="btn btn-default"><span class="kembali">Kembali</span></button></a>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
                
                <div class="isi" id="isipesanan">
                    <?php foreach ($detail as $value): ?>
                        

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <img src="<?= base_url('assets/image/pelanggan/'.$value->gambar) ?>" alt="">
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-5">
                            <span><?= $value->nama_menu ?></span>
                            <input type="hidden" id="idpesanan" value="<?= $value->id_pesanan ?>">
                            <input type="hidden" id="idmenu<?= $value->id_menu?>" value="<?= $value->id_menu ?>">
                        </div>
                        <div class="col-md-1 col-sm-1 col-xs-1 jumlah">
                            <span><?= $value->jml_pesanan ?></span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 selek">
                            <select class="input-small form-control" id="pilih<?=$value->id_menu ?>" onClick="cekMeja('<?=$value->id_menu ?>');">
                                <option value="0" <?php if ($value->status == 0) echo "selected"; ?>>Sedang Dimasak</option>
                                <option value="1" <?php if ($value->status == 1) echo "selected"; ?>>Tersajikan</option>
                            </select>
                        </div>

                    </div>


                    <?php endforeach ?>

                    <div class="col-md-12 col-sm-12 col-xs-12 harga">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 kanan">
                            <span>Total Harga:</span>
                            <span><?= $value->total_harga ?></span>
                        </div>
                    </div>
                    
                </div>
                
                <div class="selesai">

                    <?php 
                        $selesai = true;
                        foreach ($detail as  $value) {
                            if ($value->status==0) {
                                $selesai = false;
                            }
                        }

                     ?>

                    <a href="<?= base_url('Pelayan/selesaiPesanan?id_pesanan='.$value->id_pesanan.'&status='.$value->status) ?>"><input type="button"  class="btn btn-default" type="button" id="btnSelesai" value="Selesai"></a>
                </div>
            </div>
            
        </div>

        <div class="overlay"></div> 
<script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/detail_pesanan.js') ?>"></script>
<script type="text/javascript">
    //$(document).ready(function() {
        //cekMeja();

            <?php if ($selesai==false): ?>
                $("#btnSelesai").attr('disabled', 'disabled');
            <?php endif ?>   


        function cekMeja(id) {
        
            $("#pilih"+id).change(function () {
                var selectedText = $(this).find("option:selected").val();
                var id_pesanan = $("#idpesanan").val();
                var id_menu = $("#idmenu"+id).val();
                $.ajax({
                    url:"<?php echo base_url() ?>Pelayan/cekPesanan",
                    method:"POST",
                    data:{status:selectedText, id_pesanan : id_pesanan, id_menu:id_menu},
                    success:function(data)
                    {
                        if (data==true) {
                            $("#btnSelesai").removeAttr('disabled')

                        }else{
                            $("#btnSelesai").attr('disabled', 'disabled');

                        }



                    }
                });

            });
        }
    //});

    var loadHtml = function () {
           $("#isipesanan").load(location.href + " #isipesanan>*", "");

           setTimeout(loadHtml, 3000);
        };
       loadHtml();  
    

</script>
