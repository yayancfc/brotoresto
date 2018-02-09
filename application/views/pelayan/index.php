
        <link rel="stylesheet" href="<?php echo base_url('assets/css/pelayan/meja_makan.css') ?> ">
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
                        <span>Meja Makan</span>
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
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <span>No Meja</span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <span>Kapasitas</span>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-4">
                        </div>
                    </div>
                </div>
                
                <div class="isi">
                    <?php foreach ($meja as $value): ?>
                         
                    <div class="col-md-12 col-sm-12 col-xs-12 listMeja">
                           
                            <div class="col-md-1 col-sm-1 col-xs-2">
                                <span><i class="material-icons utama">event_seat</i></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <span><?= $value->no_meja ?></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <span><?= $value->kapasitas ?></span>
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-4">

<!--                                 <ul class="dropdown-menu dropdown-menu-right coba" aria-labelledby="dropdownMenu1">
                                    <li><a href="#" id="a+'<?=$value->no_meja ?>'" onclick="tes(<?=$value->no_meja ?>)">Kosong</a></li>
                                    <li><a href="#" >Penuh</a></li>
                                </ul> -->
                                <select class="input-small form-control" id="pilih<?=$value->no_meja ?>" onClick="cekMeja('<?=$value->no_meja ?>');" data-no_meja="<?=$value->no_meja ?>">
                                    <option value="0" <?php if ($value->status == 0) echo "selected"; ?> >Kosong</option>
                                    <option value="1" <?php if ($value->status == 1) echo "selected"; ?>>Penuh</option>
                                </select>
                            </div>
                    </div>

                        <?php endforeach ?>
                    
                </div>
            </div>
            
        </div>

        <div class="overlay"></div>


<script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
<script type="text/javascript">
    //$(document).ready(function() {
        //cekMeja();
        function cekMeja(id) {
        
            $("#pilih"+id).change(function () {
                var selectedText = $(this).find("option:selected").val();
                var no_meja    = $(this).data('no_meja');
                
                $.ajax({
                    url:"<?php echo base_url() ?>Pelayan/cekMeja",
                    method:"POST",
                    data:{no_meja : no_meja, status:selectedText},
                    success:function(data)
                    {
                        console.log(data);
                    }
                });

            });
        }
    //});
</script>