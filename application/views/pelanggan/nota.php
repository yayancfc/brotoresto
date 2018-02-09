 <link rel="stylesheet" href="<?php echo base_url('assets/css/nota.css') ?>">
 <link rel="stylesheet" href="<?php echo base_url('assets/css/themes/fontawesome-stars.css') ?>">

<div class="main">
                <div class="container">
                    <div class="main-header">
                        <div class="row">
                            <div class="header col-md-12 col-sm-12 col-xs-12">
                                <span><?php echo $this->session->flashdata('id'); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <hr>
                            </div>
                        </div>                        
                    </div>
                    <div class="main-content">


                        <div class="record col-md-9 col-sm-12 col-xs-12">

                        <?php foreach ($nota as $value): ?>
                            

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <figure>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <img src="<?= base_url('assets/image/pelanggan/'.$value->gambar) ?>" alt="">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <div class="data">
                                            <span class="nama"><?= $value->nama_menu ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <div class="data">
                                            <span class="harga"><?= $value->harga_menu ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <div class="data">
                                            <span class="jumlah"><?= $value->jml_pesanan ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <div class="data">
                                            <span class="total"><?= $value->total ?></span>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        <?php endforeach ?>

                        </div>


                        <div class="subTotal col-md-3 col-sm-12 col-xs-12">
                            <figure>
                                <div class="variabel col-md-6 col-sm-6 col-xs-6">
                                    <span>Total Bayar</span>
                                </div>
                                <div class="nilai col-md-6 col-sm-6 col-xs-6">
                                    <span id="subtotal"><?= $nota[0]->total_harga ?></span>
                                </div>

                            </figure>
                            <div class="button col-md-12">
                                <button class="btn btn-info" id="btnBayar" data-toggle="modal" data-target="#kuisionerModal">Minta Tagihan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br><br><br>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="kuisionerModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <span class="modal-title">Kuisioner</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 text-right">
                            <i class="fa fa-close" data-dismiss="modal"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                            
                    <?php foreach ($kuisioner as $value): ?>
                            
                        <div class="col-md-12 col-sm-12 col-xs-12 nanya">
                            <input type="hidden" value="<?=$value->kode_kuisioner ?>" name="" id="id<?= $value->kode_kuisioner ?>" >
                            <span><?= $value->pertanyaan ?></span>
                            <select class="example-fontawesome<?= $value->kode_kuisioner ?>" id="kode<?= $value->kode_kuisioner ?>" name="rating" autocomplete="off">
                                <option value="1" data-html="Sangat Buruk">1</option>
                                <option value="2" data-html="Buruk">2</option>
                                <option value="3" data-html="Cukup">3</option>
                                <option value="4" data-html="Baik">4</option>
                                <option value="5" data-html="Sangat Baik">5</option>
                            </select>
                        </div>

                        <?php endforeach ?>


                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button id="simpan" type="button" class="btn btn-default" >Kirim</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.barrating.min.js'); ?>"></script>
        
        <script type="text/javascript">
                $("#btnBayar").on('click', function(){
                    var table= "<?php echo  $this->session->userdata['no_meja']; ?>" 
                    localStorage.setItem('no_meja', table);
                });

            var data = [];


                $(document).ready(function() {
                    var i=0;
                    <?php foreach ($kuisioner as $value): ?>
                        i++;
                    <?php endforeach ?>

                    var j=0;
                    <?php foreach ($kuisioner as $value): ?>
                    

                    

                    $('.example-fontawesome'+<?=$value->kode_kuisioner ?>).barrating('show', {
                    theme: 'fontawesome-stars',
                    onSelect: function(value, text, event) {
                    if (typeof(event) !== 'undefined') {

                                var data = $("#id"+<?= $value->kode_kuisioner ?>).val();
                                var rating = text;
                                j++;
                                var array = {
                                    'kode_kuisioner' : data,
                                    'rating' : rating,
                                    'i' : i,
                                    'j' : j
                                }
                                

                               $("#simpan").on('click', function(){


                                    $.ajax({
                                        url:"<?php echo base_url() ?>Pelanggan/rating",
                                        method:"POST",
                                        data:array,
                                        success:function(data)
                                        {
                                            
                                            
                                            window.location.href = "<?= base_url() ?>";

                                        }
                                    });

                                });

                            }
                        }
                    });

                    <?php endforeach ?>
                });            
        </script>