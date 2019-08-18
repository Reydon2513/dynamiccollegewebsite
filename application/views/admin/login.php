<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMIN LOGIN|BALAKRISHNA COLLEGE</title>
    <meta name="description" content="BALAKRISHNA COLLEGE">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    
</head>

<body>



<div class="content">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-5">
           
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <i class='fa fa-user-circle mr-2'></i>Admin Login
                </div>
                <div class="card-body">

                    <form action="<?php echo base_url().'index.php/login/do_login'; ?>" method="post">

                        <?php
                            if($error == 1):
                        ?>
                            <div class="alert alert-danger">Invalid Credentials !!</div>
                        <?php
                            endif;
                        ?>
                        
                        <div class="form-group">
                            <label for="username"> <i class='fa fa-user'></i> Username</label>
                            <input type="text" class="form-control" name='username' required>
                        </div>

                        <div class="form-group">
                            <label for="password"> <i class='fa fa-key'></i> Password</label>
                            <input type="password" class="form-control" name='password' required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary text-white btn-sm"> <i class='fa fa-sign-in'></i> Sign In</button>
                        </div>

                    </form>

                </div>
            </div>
           
        </div>
    </div>
</div>



    
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <!-- <script src="assets/js/init/fullcalendar-init.js"></script> -->
    <script src="<?php echo base_url();?>assets/js/lib/data-table/datatables.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/lib/data-table/jszip.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/init/datatables-init.js"></script>

    </body>

    </html>