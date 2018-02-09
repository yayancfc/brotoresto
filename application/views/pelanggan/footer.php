<style type="text/css">
    
    .copyright a {
        color: #95989A;
    }

</style>

 <footer class="style-1">
            <div class="container">
                <div class="row">
                    <div class="footer-copyright">
                        <span class="copyright">Copyright <a href="<?= base_url('Login/destroy') ?>">&copy;</a> mobaDeff 2017</span>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Script -->
        <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

        <script src="<?php echo base_url('assets/js/sweetalert.min.js') ?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.barrating.js'); ?>"></script>

        <script type="text/javascript">

            $(document).ready(function(){

                getJumlah();
                //cekOrder();
                $(document).on('click','.pesanan',function(){
                    var id = $(this).data('id');
                    var nama = $(this).data('nama');
                    var harga = $(this).data('harga');
                    var gambar = $(this).data('gambar');
                    var qty = 1;

                    $.ajax({
                    url:"<?php echo base_url() ?>Pelanggan/orderMenu",
                    method:"POST",
                    data:{id:id,nama:nama,harga:harga,qty:qty, gambar:gambar},
                    success:function(data)
                    {
                        getJumlah();
                        swal("Success!!", "Menu Telah Ditambahkan ke Pesanan", "success")
                         }
                    });


                })

                function getJumlah(){
                    $.ajax({
                        url:"<?php echo base_url() ?>Pelanggan/getJumlahBarang",
                        method:"GET",
                        success:function(data)
                        {
                            $('.badge').text(data);
                        }
                    });
                }

                function cekOrder(){
                    $.ajax({
                        url:"<?php echo base_url() ?>Pelanggan/getJumlahBarang",
                        method:"GET",
                        success:function(data)
                        {
                            if ($('.badge').text()==0){
                                $('#tes').remove();
                                $('#kosong').text('Pesanan Kosong');
                                
                            }else{
                                $('.record').show();
                            }
                        }
                    });
                }


            });

        </script>

    </body>
</html>