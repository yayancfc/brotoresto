<link rel="stylesheet" href="<?php echo base_url('assets/css/pantry/detail_makanan.css') ?>">
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
                        <span>Detail Makanan</span>
                    </div>
                    <div class="cari col-md-3 col-sm-3 col-xs-3">
                        <a href="<?= base_url('Pantry/makanan') ?>"><button type="button" class="btn btn-default"><span class="kembali">Kembali</span></button></a>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
                
                <div class="sub-header">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-2 col-sm-2 col-xs-2">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <span>Nama Makanan</span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 kategori">
                            <span>Kategori</span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 harga">
                            <span>Harga</span>
                        </div>
                    </div>
                </div>
                
                <div class="isi">

                    <?php foreach ($detail as $value): ?>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-2 col-sm-2 col-xs-2 gambar">
                            <img src="<?= base_url('assets/image/pelanggan/'.$value->gambar) ?>" alt="">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <span><?= $value->nama_menu ?></span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <span><?= $value->nama_menu ?></span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <span><?= $value->harga_menu ?></span>
                            <input type="hidden" id="id_menu" value="<?= $value->id_menu ?>">
                        </div>
                    </div>


                    <?php endforeach ?>

                </div>
                
                <div class="header2">
                    <div class="judul col-md-9 col-sm-9 col-xs-10">
                        <span>Bahan</span>
                    </div>
                    <div class="cari col-md-3 col-sm-3 col-xs-2">
                        <i class="tambah fa fa-plus-circle" data-toggle="modal" data-target="#tambahModal" id="btnTambah""></i>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
                
                <div class="isi2" id="bahanDetail">

                    <?php foreach ($detailbahan as $value): ?>
                        

                    <div class="col-md-6 col-sm-6 col-xs-12 utama">
                        <figure>
                            <div class="col-md-5 col-sm-5 col-xs-5">
                                <span><?= $value->nama_bahan ?></span>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <span><?=$value->jumlah ?> <?= $value->satuan ?></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3 fitur">
                                <i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#ubahModal" id="btnUbah" 
                                data-id_bhn="<?=$value->id_bhn ?>"
                                data-id_menu="<?=$value->id_menu ?>"
                                data-jumlah="<?=$value->jumlah ?>"></i>
                                <i class="fa fa-trash-o" aria-hidden="true" data-toggle="modal" data-target="#hapusModal" id="btnHapus"
                                data-id_bhn="<?=$value->id_bhn ?>"
                                data-id_menu="<?=$value->id_menu ?>"
                                data-jumlah="<?=$value->jumlah ?>"
                                ></i>
                            </div>
                        </figure>
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
                            <span class="modal-title">Tambah Makanan</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 text-right">
                            <i class="fa fa-close" data-dismiss="modal"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Nama Bahan</span>
                            <div class="dropdown">
                                <select class="form-control" id="idBahanTambah">
                                    <?php foreach ($bahan as $value): ?>                                    
                                        <option value="<?= $value->id_bhn ?>"><?= $value->nama_bahan ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Jumlah</span>
                            <input type="text" class="form-control" id="jumlahTambah">
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span id="pesan"></span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button id="simpan" type="button" class="btn btn-default">Simpan</button>
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
                            <span class="modal-title">Ubah Makanan</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 text-right">
                            <i class="fa fa-close" data-dismiss="modal"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Nama Bahan</span>
                            <div class="dropdown">
                                <select class="form-control" id="idUbah">
                                    <?php foreach ($bahan as $value): ?>                                    
                                        <option value="<?= $value->id_bhn ?>"><?= $value->nama_bahan ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Jumlah</span>
                            <input type="text" class="form-control" id="jumlahUbah">
                            <input type="hidden" class="form-control" id="idMenuUbah">
                            <input type="hidden" class="form-control" id="id_awal">
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span id="pesan1"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button id="ubah" type="button" class="btn btn-default" >Ubah</button>
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
                            <span class="modal-title">Hapus Makanan</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 text-right">
                            <i class="fa fa-close" data-dismiss="modal"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Nama Bahan</span>
                            <div class="dropdown">
                                <select class="form-control" id="idHapus" disabled>
                                    <?php foreach ($bahan as $value): ?>                                    
                                        <option value="<?= $value->id_bhn ?>"><?= $value->nama_bahan ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Jumlah</span>
                            <input type="text" class="form-control" id="jumlahHapus" disabled>
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
        <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/detail_makanan.js') ?>" type="text/javascript"></script>

        <script type="text/javascript">


        $(document).on('click','#btnUbah',function(){

                var id = $(this).data('id_bhn');
                var jumlah = $(this).data('jumlah');
                var id_menu = $(this).data('id_menu');

                $("#idUbah").val(id);    
                $("#id_awal").val(id);                
                $("#idMenuUbah").val(id_menu);
                $("#jumlahUbah").val(jumlah);


        });

        $(document).on('click','#ubah',function(){
            var data = {
                id_bhn : $("#idUbah").val(),
                id_awal : $("#id_awal").val(),
                id_menu : $("#idMenuUbah").val(),
                jumlah : $("#jumlahUbah").val()
            };

            if (data['jumlah']=="") {
                $("#pesan1").html("Semua Kolom Harus Diisi");
            }else{
                $.ajax({
                    url:"<?php echo base_url() ?>Pantry/ubahBahanMenu",
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

                var id = $(this).data('id_bhn');
                var jumlah = $(this).data('jumlah');
                var id_menu = $(this).data('id_menu');

                $("#idHapus").val(id);                 
                $("#idMenuHapus").val(id_menu);
                $("#jumlahHapus").val(jumlah);


        });

        $(document).on('click','#hapus',function(){

            var id_bhn = $("#idHapus").val();

            $.ajax({
                    url:"<?php echo base_url() ?>Pantry/hapusBahanMenu",
                    method:"POST",
                    data:{id_bhn:id_bhn},
                    success:function(data)
                    {
                         $("#bahanDetail").load(location.href + " #bahanDetail>*", "");
                        

                    }
                });

            console.log(id_bhn);


        });        
            
        $(document).on('click','#simpan',function(){
            $(document).ready(function() {
                var data = {
                    'id_menu' : $("#id_menu").val(),
                    'id_bhn' : $("#idBahanTambah").val(),
                    'jumlah' : $("#jumlahTambah").val()
                };

                if (data['jumlah']=="") {
                    $("#pesan").html("Semua Kolom Harus Diisi");
                }else{
                    $.ajax({
                        url:"<?php echo base_url() ?>Pantry/simpanBahanMenu",
                        method:"POST",
                        data:data,
                        success:function(data)
                        {
                            window.location.reload();
                        }
                    });              
                }
            });


        });
        </script>