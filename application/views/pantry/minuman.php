<link rel="stylesheet" href="<?php echo base_url('assets/css/pantry/makanan.css') ?>">
<div id="content">
              <?php if ($this->session->userdata("message")){ ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p>
                      <?= $this->session->userdata("message");

                      ?>
                    </p>
                </div>
              <?php
                  $this->session->sess_destroy("message");
                }
              ?>

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
                        <span>Minuman</span>
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
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <span>Nama Minuman</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <span>Kategori</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 harga">
                            <span>Harga</span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 fitur">
                        </div>
                    </div>
                </div>

                <div class="isi">

                    <?php foreach ($minuman as $value): ?>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-2 col-sm-2 col-xs-2 gambar">
                            <img src="<?= base_url('assets/image/pelanggan/'.$value->gambar) ?>" alt="">
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <span><?= $value->nama_menu ?></span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <span><?= $value->kategori_menu ?></span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <span><?= $value->harga_menu ?></span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 fitur">
                            <div class="button-group">
                                <a href="<?= base_url('Pantry/detailminuman?id_menu='.$value->id_menu) ?>"><button type="button" class="lihat">Lihat</button></a>
                                <i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#ubahModal" id="btnUbah"
                                    data-id_menu="<?= $value->id_menu ?>"
                                    data-nama_menu="<?= $value->nama_menu ?>"
                                    data-jenis_menu="<?= $value->jenis_menu ?>"
                                    data-kategori_menu="<?= $value->kategori_menu ?>"
                                    data-harga_menu="<?= $value->harga_menu ?>"
                                    data-gambar="<?= $value->gambar ?>"
                                    data-nama_file = "<?= $value->gambar ?>"
                                ></i>
                                <i class="fa fa-trash-o" aria-hidden="true" data-toggle="modal" data-target="#hapusModal" id="btnHapus"
                                    data-id_menu="<?= $value->id_menu ?>"
                                    data-nama_menu="<?= $value->nama_menu ?>"
                                    data-jenis_menu="<?= $value->jenis_menu ?>"
                                    data-kategori_menu="<?= $value->kategori_menu ?>"
                                    data-harga_menu="<?= $value->harga_menu ?>"
                                    data-gambar="<?= $value->gambar ?>"
                                ></i>
                            </div>
                        </div>
                    </div>


                    <?php endforeach ?>

                </div>


            </div>

        </div>
                <div class="modal fade" id="tambahModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <form action="<?= base_url() ?>Pantry/tambahminuman" method="post" enctype="multipart/form-data" id="uploadimage">
                    <div class="modal-header">
                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <span class="modal-title">Tambah minuman</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 text-right">
                            <i class="fa fa-close" data-dismiss="modal"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                       <div id="message">

                       </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>ID minuman</span>
                            <input type="text" class="form-control" id="idTambah" name="idTambah" required>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Nama minuman</span>
                            <input type="text" class="form-control" id="namaTambah" name="namaTambah" required>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Jenis Menu</span>
                            <!-- <input type="text" class="form-control" id="jenisUbah"> -->
                            <select class="form-control" id="jenisTambah" name="jenisTambah">
                                    <option value="minuman">minuman</option>
                                    <option value="Minuman">Minuman</option>

                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Kategori</span>
                            <div class="dropdown">

                                <select class="form-control" id="kategoriTambah" name="kategoriTambah">
                                    <option value="Juice">Juice</option>
                                    <option value="Tea">Tea</option>
                                    <option value="Coffee">Coffee</option>
                                    <option value="Special">Special</option>

                                </select>

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Harga</span>
                            <input type="text" class="form-control" id="hargaUbah" name="hargaUbah" required>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <img id="gambarUbah"  src="<?= base_url() ?>/assets/image/noimage.png" alt="your image" width="80px;" />
                            <input type='file' id="gambar" name="gambar" onchange="readURL(this);" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="submit" class="btn btn-default" value="Simpan">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                  </form>
                </div>

            </div>
        </div>

        <div class="modal fade" id="ubahModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <form action="<?= base_url() ?>Pantry/updateminuman" method="post" enctype="multipart/form-data" >
                    <div class="modal-header">
                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <span class="modal-title">Ubah minuman</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 text-right">
                            <i class="fa fa-close" data-dismiss="modal"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>ID minuman</span>
                            <input type="text" class="form-control" id="idUbah" name="idUbah" readonly>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Nama minuman</span>
                            <input type="text" class="form-control" id="namaUbah" name="namaUbah" required>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Jenis Menu</span>
                            <!-- <input type="text" class="form-control" id="jenisUbah"> -->
                            <select class="form-control" id="jenisUbah" name="jenisUbah">
                                    <option value="minuman">minuman</option>
                                    <option value="Minuman">Minuman</option>

                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Kategori</span>
                            <div class="dropdown">


                                <select class="form-control" id="kategoriUbah" name="kategoriUbah">
                                    <option value="Juice">Juice</option>
                                    <option value="Tea">Tea</option>
                                    <option value="Coffee">Coffee</option>
                                    <option value="Special">Special</option>

                                </select>

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Harga</span>
                            <input type="text" class="form-control hargaUbah" id="hargaUbah" name="hargaUbah" required>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <img id="gambarUbah" class="ubahGambar" src="#" alt="your image" width="80px;" />
                            <input type='file' name="ubahGambar" onchange="readURL(this);" />
                            <input type="hidden" name="nama_file" class="nama_file">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-default">Ubah</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
              </form>
            </div>
        </div>

        <div class="modal fade" id="hapusModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <span class="modal-title">Hapus minuman</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 text-right">
                            <i class="fa fa-close" data-dismiss="modal"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>ID minuman</span>
                            <input type="text" class="form-control" id="idHapus" disabled>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Nama minuman</span>
                            <input type="text" class="form-control" id="namaHapus" disabled>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Jenis Menu</span>
                            <select class="form-control" id="jenisHapus" disabled>
                                    <option value="minuman">minuman</option>
                                    <option value="Minuman">Minuman</option>

                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Kategori</span>
                            <div class="dropdown">
                                <select class="form-control" id="kategoriHapus" disabled>
                                    <option value="Juice">Juice</option>
                                    <option value="Tea">Tea</option>
                                    <option value="Coffee">Coffee</option>
                                    <option value="Special">Special</option>

                                </select>

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <span>Harga</span>
                            <input type="text" class="form-control" id="hargaHapus" disabled>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <img id="gambarHapus"  src="#" alt="your image" width="80px;" />
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
        <script src="<?php echo base_url('assets/js/minuman.js') ?>" type="text/javascript"></script>

        <script type="text/javascript">
            // $("#uploadimage").on('submit',function(e) {
            //   e.preventDefault();
            //   $.ajax({
            //     url:"",
            //     type: "POST",
            //     data: new FormData(this),
            //     contentType: false,
            //     cache: false,
            //     processData:false,
            //     success: function(){
            //       window.location.reload();
            //     }
            //   });
            // });
            $(document).on('click','#btnUbah',function(){

                var data = {
                    'id_menu' : $(this).data('id_menu'),
                    'nama_menu' : $(this).data('nama_menu'),
                    'jenis_menu' : $(this).data('jenis_menu'),
                    'kategori_menu': $(this).data('kategori_menu'),
                    'harga_menu' : $(this).data('harga_menu'),
                    'gambar' : $(this).data('gambar'),
                    'nama_file':$(this).data('nama_file')
                };


                $("#idUbah").val(data['id_menu']);
                $("#namaUbah").val(data['nama_menu']);
                $("#jenisUbah").val(data['jenis_menu']);
                $("#kategoriUbah").val(data['kategori_menu']);
                $(".hargaUbah").val(data['harga_menu']);
                $(".nama_file").val(data['nama_file']);
                $(".ubahGambar").attr("src","<?= base_url() ?>"+"assets/image/pelanggan/"+data['gambar']+"");

            });


            $(document).on('click','#simpan',function(){


                var data = {
                    'id_menu' : $("#idUbah").val(),
                    'nama_menu' : $("#namaUbah").val(),
                    'jenis_menu' : $("#jenisUbah").val(),
                    'kategori_menu' : $("#kategoriUbah").val(),
                    'harga_menu' : $("#hargaUbah").val(),
                    'gambar' : $("#gambarUbah").html()

                };

                console.log(data);





                // $.ajax({
                //     url:"<?php echo base_url() ?>Pantry/ubahBahan",
                //     method:"POST",
                //     data:data,
                //     success:function(data)
                //     {
                //         window.location.reload();

                //     }
                // });

            });

            $(document).on('click','#btnHapus',function(){

                var data = {
                    'id_menu' : $(this).data('id_menu'),
                    'nama_menu' : $(this).data('nama_menu'),
                    'jenis_menu' : $(this).data('jenis_menu'),
                    'kategori_menu': $(this).data('kategori_menu'),
                    'harga_menu' : $(this).data('harga_menu'),
                    'gambar' : $(this).data('gambar')
                };


                $("#idHapus").val(data['id_menu']);
                $("#namaHapus").val(data['nama_menu']);
                $("#jenisHapus").val(data['jenis_menu']);
                $("#kategoriHapus").val(data['kategori_menu']);
                $("#hargaHapus").val(data['harga_menu']);
                $("#gambarHapus").attr("src","<?= base_url('assets/image/pelanggan/')?>"+data['gambar']);

            });

            $(document).on('click','#hapus',function(){

                var id_menu = $("#idHapus").val();

                $.ajax({
                    url:"<?php echo base_url() ?>Pantry/hapusMenu",
                    method:"POST",
                    data:{id_menu:id_menu},
                    success:function(data)
                    {
                        window.location.reload();
                    }
                });


            });

        </script>


        <script type="text/javascript">
          function readURL(input) {
              $("#message").empty();
              var file = input.files[0];
              var imagefile = file.type;
              var match= ["image/jpeg","image/png","image/jpg"];

              if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
              {
                $('#gambarUbah').attr('src','<?= base_url() ?>/assets/image/noimage.png');
                $("#message").html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p>Only jpeg, jpg and png Images type allowed</p></div>');
                input.value = "";
                return false;
              }
              else{
                if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function (e) {
                      $('#gambarUbah')
                          .attr('src', e.target.result)
                          .width(150)
                          .height(200);
                  };

                  reader.readAsDataURL(input.files[0]);
              }

            }
        }
        </script>
