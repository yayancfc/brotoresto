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
                    <div class="judul col-md-6 col-sm-6 col-xs-6">
                        <span>Kusioner</span>
                    </div>
                    <div class="cari col-md-6 col-sm-6 col-xs-6">
                        <i class="tambah fa fa-plus-circle" data-toggle="modal" data-target="#tambahModal"></i>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
                
                <div class="isi" id="isipertanyaan">

                    <?php foreach ($pertanyaan as  $value): ?>
                        
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                            <span><?= $value->pertanyaan ?></span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#ubahModal" id="btnUbah"
                                data-id="<?= $value->kode_kuisioner ?>"
                                data-pertanyaan="<?= $value->pertanyaan ?>"

                                ></i>
                            <i class="fa fa-trash-o" aria-hidden="true" data-toggle="modal" data-target="#hapusModal" id="btnHapus"
                                data-id="<?= $value->kode_kuisioner ?>"
                                data-pertanyaan="<?= $value->pertanyaan ?>"
                            ></i>
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
                            <span class="modal-title">Tambah Pertanyaan</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 text-right">
                            <i class="fa fa-close" data-dismiss="modal"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <span>Pertanyaan</span>
                            <input type="text" class="form-control" id="tambahpertanyaan">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <span id="pesan"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="simpan" type="button" class="btn btn-default">Simpan</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
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
                            <span class="modal-title">Ubah Pertanyaan</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 text-right">
                            <i class="fa fa-close" data-dismiss="modal"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <span>Pertanyaan</span>
                            <input type="text" class="form-control" id="ubahpertanyaan">
                            <input type="hidden" class="form-control" id="kode">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <span id="pesan1"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="btnSimpan">Simpan</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
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
                            <span class="modal-title">Hapus Pertanyaan</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 text-right">
                            <i class="fa fa-close" data-dismiss="modal"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <span>Pertanyaan</span>
                        <input type="hidden" class="form-control" id="kodehapus">
                        <input type="text" class="form-control" id="namapertanyaan" disabled>
                    </div>
                    <div class="modal-footer">
                        <button id="hapus" type="button" class="btn btn-default" data-dismiss="modal">Hapus</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    </div>
                </div>

            </div>
        </div>


        <div class="overlay"></div>


        <script src="<?= base_url('assets/js/jquery.js') ?>" type="text/javascript"></script>
        <script type="text/javascript">

            $(document).on('click','#btnUbah',function(){
                var id    = $(this).data('id');
                var pertanyaan    = $(this).data('pertanyaan');
                var ubah = $("#ubahpertanyaan").val(pertanyaan);
                var kode = $("#kode").val(id);
            });

            $(document).on('click','#btnSimpan',function(){

                var kode_pertanyaan = $("#kode").val();
                var pertanyaan = $("#ubahpertanyaan").val();

                if (pertanyaan == "") {
                    $("#pesan1").html("Semua Kolom Harus Diisi");
                }else{
                    $.ajax({
                        url:"<?php echo base_url() ?>CS/ubahPertanyaan",
                        method:"POST",
                        data:{kode_pertanyaan:kode_pertanyaan, pertanyaan:pertanyaan},
                        success:function(data)
                        {
                            window.location.reload();
                        }
                    });             
                }

            });

            $(document).on('click','#btnHapus',function(){
                var id    = $(this).data('id');
                var pertanyaan    = $(this).data('pertanyaan');
                
                var ubah = $("#namapertanyaan").val(pertanyaan);
                var kode = $("#kodehapus").val(id);


            });

            $(document).on('click','#hapus',function(){
            
                var kode = $("#kodehapus").val();

                $.ajax({
                    url:"<?php echo base_url() ?>CS/hapusPertanyaan",
                    method:"POST",
                    data:{kode_pertanyaan:kode},
                    success:function(data)
                    {
                        window.location.reload();
                    }
                });


            });

            $(document).on('click','#simpan',function(){
            
                var pertanyaan = $("#tambahpertanyaan").val();

                if (pertanyaan == "") {
                    $("#pesan").html("Semua Kolom Harus Diisi");
                }else{
                    $.ajax({
                        url:"<?php echo base_url() ?>CS/tambahPertanyaan",
                        method:"POST",
                        data:{pertanyaan:pertanyaan},
                        success:function(data)
                        {
                            window.location.reload();
                        }
                    });            
                }
            });

        </script>