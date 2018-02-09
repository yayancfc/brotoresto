 <link rel="stylesheet" href="<?php echo base_url('assets/css/nota.css') ?>">
 <style type="text/css">
     
    .modal-content .modal-header {
        background: #00B1FF;
        border-radius: 5px 5px 0px 0px;
        padding-left: 0px;
        padding-right: 0px;
    }

    .modal-content .modal-header i {
        color: #FFFFFF;
        font-size: 20px;
        cursor: pointer;
    }

    .modal-content .modal-header i:hover {
        color: #F2F2F2;
    }

    .modal-title {
        color: #FFFFFF;
        font-size: 18px;
    }

    .modal-body .col-md-12 {
        padding: 5px;
    }

    .modal-body span {
        color: #95989A;
    }

    .modal-body input {
        margin-top: 10px;
        width: 100%;
    }

    .modal-footer {
        text-align: center;
        border: 0px;
        padding-top: 0px;
        padding-bottom: 30px;
    }

    .modal-footer .col-md-12 {
        padding-top: 20px;
    }

    .modal-footer .btn-default {
        width: 80px;
        background: #FF5722;
        color: #FFFFFF;
        border: 0px;
    }

    .modal-footer .btn-default:hover {
        background-color: #E64A19;
    }


 </style>
    <div class="modal fade" id="modalNota" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <span class="modal-title">Nota</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 text-right">
                            <i class="fa fa-close" data-dismiss="modal"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <span>Nota masih kosong</span><p></p>
                            <span>Silahkan memesan menu terlebih dahulu</span>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <a href="<?= base_url('Pelanggan/makanan') ?>"><button type="button" class="btn btn-default" >Oke</button></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
<script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
<script type="text/javascript">
    
    $(document).ready(function() {
        $("#modalNota").modal('show');
    });
</script>