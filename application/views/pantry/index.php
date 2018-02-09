<link rel="stylesheet" href="<?php echo base_url('assets/css/pantry/bahan_baku.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/datepicker.min.css') ?>">

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
                    <div class="judul col-md-9 col-sm-9 col-xs-9">
                        <span>Bahan Baku</span>
                    </div>
                    <div class="cari col-md-3 col-sm-3 col-xs-3">   
                        <i class="tambah fa fa-plus-circle" data-toggle="modal" data-target="#tambahModal"></i>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
                
                <div class="sub-header">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <span>ID Bahan</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <span>Nama Bahan</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <span>Stok</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <span>Tanggal Masuk</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <span>Tanggal Kadaluarsa</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                        </div>
                    </div>
                </div>
                
                <div class="isi">

                    <?php foreach ($bahan as $value): ?>
                        
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <span><?= $value->id_bhn  ?></span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <span><?= $value->nama_bahan  ?></span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <span><?= $value->stok  ?> <?= $value->satuan  ?></span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <span><?= $value->tgl_masuk  ?></span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <span><?= $value->tgl_exp  ?></span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 fitur">
                            <div class="button-group">
                                <?php $tanggal =  date("Y-m-d");?>
                                
                                <?php if ($value->stok==0): ?>
                                    <button type="button" class="empty">Empty</button>                                    
                                <?php else : ?>
                                    <?php if ($value->tgl_exp<=$tanggal): ?>
                                        <button type="button" class="expired">Expired</button>  
                                    <?php endif ?>
                                    
                                <?php endif ?>

                                <i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#ubahModal" id="btnUbah"
                                    data-idbahan="<?= $value->id_bhn ?>"
                                    data-nama_bahan="<?= $value->nama_bahan ?>"
                                    data-stok="<?= $value->stok ?>"
                                    data-tgl_masuk="<?= $value->tgl_masuk ?>"
                                    data-tgl_exp="<?= $value->tgl_exp ?>"
                                    data-satuan="<?= $value->satuan ?>"
                                ></i>
                                <i class="fa fa-trash-o" aria-hidden="true" data-toggle="modal" data-target="#hapusModal" id="btnHapus"
                                    data-idbahan="<?= $value->id_bhn ?>"
                                    data-nama_bahan="<?= $value->nama_bahan ?>"
                                    data-stok="<?= $value->stok ?>"
                                    data-tgl_masuk="<?= $value->tgl_masuk ?>"
                                    data-tgl_exp="<?= $value->tgl_exp ?>"
                                    data-satuan="<?= $value->satuan ?>"
                                ></i>
                            </div>
                        </div>
                    </div>
                    

                    <?php endforeach ?>
                    
                </div>
                
                
            </div>
            
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="tambahModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <span class="modal-title">Tambah Bahan</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 text-right">
                            <i class="fa fa-close" data-dismiss="modal"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Kode Bahan</span>
                            <input type="text" class="form-control required" id="idtambah" required>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Nama Bahan</span>
                            <input type="text" class="form-control" id="namatambah" required>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Stok</span>
                            <input type="text" class="form-control" id="stoktambah" required>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Satuan</span>
                            <input type="text" class="form-control" id="satuantambah" required>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Tanggal Masuk</span>
                            <input type="text" class="form-control" id="tgl_masuktambah" required>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Tanggal Kadaluarsa</span>
                            <input type="text" class="form-control" id="tgl_exptambah" required>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span id="pesan"></span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button id="tambahbahan" type="button" class="btn btn-default">Simpan</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        <div class="modal fade" id="ubahModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <span class="modal-title">Ubah Bahan</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 text-right">
                            <i class="fa fa-close" data-dismiss="modal"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>ID Bahan</span>
                            <input type="text" class="form-control" id="idubah" required>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Nama Bahan</span>
                            <input type="text" class="form-control" id="namaubah">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Stok</span>
                            <input type="text" class="form-control" id="stokubah">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Satuan</span>
                            <input type="text" class="form-control" id="satuanubah">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Tanggal Masuk</span>
                            <input type="text" class="form-control" id="tgl_masukubah">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Tanggal Kadaluarsa</span>
                            <input type="text" class="form-control" id="tgl_expubah">
                            <input type="hidden" class="form-control" id="id_awal">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span id="pesan1"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button id="simpan" type="button" class="btn btn-default" >Simpan</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        <div class="modal fade" id="hapusModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <span class="modal-title">Hapus Bahan</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 text-right">
                            <i class="fa fa-close" data-dismiss="modal"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Kode Bahan</span>
                            <input type="text" class="form-control" id="idhapus" disabled>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Nama Bahan</span>
                            <input type="text" class="form-control" id="namahapus" disabled>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Stok</span>
                            <input type="text" class="form-control" id="stokhapus" disabled>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Satuan</span>
                            <input type="text" class="form-control" id="satuanhapus" disabled>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Tanggal Masuk</span>
                            <input type="text" class="form-control" id="tgl_masukhapus" disabled>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Tanggal Kadaluarsa</span>
                            <input type="text" class="form-control" id="tgl_exphapus" disabled>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button id="hapus" type="button" class="btn btn-default" data-dismiss="modal">Hapus</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="overlay"></div>
        <script src="<?= base_url('assets/js/jquery.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/bahan_baku.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/datepicker.min.js') ?>" type="text/javascript"></script>
        <script type="text/javascript">

            $(document).ready(function($) {
                $("#tgl_masukubah").datepicker({
                        format : 'yyyy-mm-dd'
                    });

                $("#tgl_expubah").datepicker({
                        format : 'yyyy-mm-dd'
                    });

                 $("#tgl_masuktambah").datepicker({
                        format : 'yyyy-mm-dd'
                    });

                $("#tgl_exptambah").datepicker({
                        format : 'yyyy-mm-dd'
                    });          
            });

            $(document).on('click','#btnUbah',function(){

                var data = {
                    'id_bhn' : $(this).data('idbahan'),
                    'nama_bahan' : $(this).data('nama_bahan'),
                    'stok' : $(this).data('stok'),
                    'tgl_masuk': $(this).data('tgl_masuk'), 
                    'tgl_exp' : $(this).data('tgl_exp'),
                    'satuan' : $(this).data('satuan')
                };

                $("#idubah").val(data['id_bhn']);
                $("#namaubah").val(data['nama_bahan']);
                $("#stokubah").val(data['stok']);
                $("#satuanubah").val(data['satuan']);
                $("#tgl_masukubah").val(data['tgl_masuk']);
                $("#tgl_expubah").val(data['tgl_exp']);
                $("#id_awal").val(data['id_bhn']);

            });

            $("#ubahModal").on('click','#simpan',function(){
                    
                var data = {
                    'id_bhn' : $("#idubah").val(),
                    'nama_bahan' : $("#namaubah").val(),
                    'stok' : $("#stokubah").val(),
                    'tgl_masuk' : $("#tgl_masukubah").val(),
                    'tgl_exp' : $("#tgl_expubah").val(),
                    'id_awal' : $("#id_awal").val(),
                    'satuan' : $("#satuanubah").val()
                };

                

                if (data['id_bhn']=="" || data['nama_bahan']=="" || data['stok']=="" || data['tgl_masuk']=="" || data['tgl_exp']=="" || data['satuan']==""){
                    $("#pesan1").html("Semua Kolom Harus Diisi");
                } else {
                    $.ajax({
                        url:"<?php echo base_url() ?>Pantry/ubahBahan",
                        method:"POST",
                        data:data,
                        success:function(data)
                        {
                            window.location.reload();

                        }
                    });
                }                

            });

            $(document).on('click','#btnHapus',function(){
                var data = {
                    'id_bhn' : $(this).data('idbahan'),
                    'nama_bahan' : $(this).data('nama_bahan'),
                    'stok' : $(this).data('stok'),
                    'tgl_masuk': $(this).data('tgl_masuk'), 
                    'tgl_exp' : $(this).data('tgl_exp'),
                    'satuan' : $(this).data('satuan')
                };

                $("#idhapus").val(data['id_bhn']);
                $("#namahapus").val(data['nama_bahan']);
                $("#stokhapus").val(data['stok']);
                $("#tgl_masukhapus").val(data['tgl_masuk']);
                $("#tgl_exphapus").val(data['tgl_exp']);
                $("#satuanhapus").val(data['satuan']);

            });

            $(document).on('click','#hapus',function(){
            
                var id_bhn = $("#idhapus").val();

                $.ajax({
                    url:"<?php echo base_url() ?>Pantry/hapusBahan",
                    method:"POST",
                    data:{id_bhn:id_bhn},
                    success:function(data)
                    {
                        window.location.reload();
                    }
                });

                console.log(id_bhn);

            });

            $("#tambahModal").on('click','#tambahbahan',function(){
                var data = {
                    'id_bhn' : $("#idtambah").val(),
                    'nama_bahan' : $("#namatambah").val(),
                    'stok' : $("#stoktambah").val(),
                    'tgl_masuk' : $("#tgl_masuktambah").val(),
                    'tgl_exp' : $("#tgl_exptambah").val(),
                    'satuan' : $("#satuan").val()
                };

                if (data['id_bhn']=="" || data['nama_bahan']=="" || data['stok']=="" || data['tgl_masuk']=="" || data['tgl_exp']=="" || data['satuan']==""){
                    $("#pesan").html("Semua Kolom Harus Diisi");
                } else {
                    $.ajax({
                        url:"<?php echo base_url() ?>Pantry/tambahBahan",
                        method:"POST",
                        data:data,
                        success:function(data)
                        {
                            window.location.reload();
                        }
                    });
                }

            });

        </script>