<link rel="stylesheet" href="<?php echo base_url('assets/css/pesanan.css') ?>">
<div class="main">
                <div class="container">
                    <div class="main-header">
                        <div class="row">
                            <div class="header col-md-12 col-sm-12 col-xs-12">
                                <span>Pesanan</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <hr>
                            </div>
                        </div>                        
                    </div>


                    <div id="kosong">
                            
                    </div>
                    
                    <div class="main-content" id="tes">
                        <?php foreach ($order as $value): ?>

                            <div class="record">
                            <div class="col-md-12">
                                <figure>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <img src="<?php echo base_url('assets/image/pelanggan/'. $value['image']);?>" alt="">
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                        <div class="data">
                                            <span class="nama"><?= $value['name'] ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <div class="data">
                                            <span class="harga"><?= $value['price'] ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <div class="jumlah" style="width: 80px;">
                                            <span>
                                                <input type="number" value="<?= $value['qty'] ?>" id="jumlah1" class="form-control" min="1" data-id="<?= $value['rowid']  ?>"> 
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <div class="data">
                                            <span class="subtotal">Rp. <?= number_format($value['subtotal']) ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-sm-1 col-xs-1">
                                        <div class="data">
                                            <a href="<?= site_url('Pelanggan/hapusOrder/'.$value['rowid']); ?>">
                                                <span class="hapus"><i class="fa fa-trash"></i></span></a>
                                        </div>
                                    </div>
                                </figure>
                                </div>
                            </div>
                            
                        <?php endforeach ?>
                        <div class="button">
                            <button class="btn btn-info konfirmasi" >Kirim Pesanan</button>
                        </div>
                    </div>
                </div>
            </div><br><br><br>
        </div>

        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/sweetalert.min.js') ?>"></script>
        <script type="text/javascript">
                $(document).on('change','#jumlah1', function(){
                    var nilai = $(this).val();
                    var id = $(this).data('id');

                    $.ajax({
                    url:"<?php echo base_url() ?>Pelanggan/updateQty",
                    method:"POST",
                    data:{id:id,nilai:nilai},
                    success:function(data){
                            $("#tes").load(location.href + " #tes>*", "");
                        }
                    });

                });

                $(document).on('click', '.konfirmasi', function() {
                  $.ajax({
                  url:"<?php echo base_url() ?>Pelanggan/confirmOrder",
                  success:function(data){
                     // window.location.reload();
                     console.log(data);
                     if (data) {
                            swal({
                            title: "Berhasil",
                            text : "Pesanan Berhasil Dipesan",
                            type: "success"
                        },
                        function(){
                            window.location.reload();
                        });

                    }else{
                            swal("Habis", "Maaf, Menu Tidak Tersedia", "warning");
                        }
                    }
                  });
                });



        </script>