    <!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?=  base_url('assets/css/bootstrap.min.css')?> ">   
        <link rel="stylesheet" href=" <?= base_url('assets/css/style.css')?> ">
    </head>
    <body>
        <div class="container-fluid bg">
            <div class="row">
                <div class="col-md-4 col-sm-3 col-xs-1"></div>
                <div class="col-md-4 col-sm-6 col-xs-10">
                    <div class="image">
                        <img src="<?php echo base_url('assets/image/login.png');?>" alt="">
                    </div>
                    
                    <form method="post" class="form-container" action="<?php echo base_url('login/proses');?>">
                        <?php if ($this->session->flashdata('result_login')) { ?>
                            <div class="alert alert-info animated fadeInDown" role="alert">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?php echo validation_errors(); ?>
                                <?php echo $this->session->flashdata('result_login'); ?>
                            </div>
                          <?php } ?>

                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        
                        <div class="form-group">
                          <select class="form-control" name="jabatan">
                            <option value="pelanggan">Pelanggan</option>
                            <option value="koki">Koki</option>
                            <option value="kasir">Kasir</option>
                            <option value="pelayan">Pelayan</option>
                            <option value="pantry">Pantry</option>
                            <option value="cs">Customer Service</option>
                          </select>
                        </div> 

                        <button type="submit" class="btn btn-submit btn-block">Login</button>
                    </form>
                    
                </div>
                <div class="col-md-4 col-sm-3 col-xs-1"></div>
            </div>
        </div>
    </body>
</html>


        <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>