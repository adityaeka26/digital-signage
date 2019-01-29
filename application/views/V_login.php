<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/datatables.min.css" />
    <style>
        body {
            background:#eee;
        }
        .content {
            width:400px;
            background:white;
            margin-top:30px;
            border-top:5px solid #dc3545;
            border-bottom:10px solid #dc3545;
            padding:20px;
            box-shadow:0px 0px 10px #1234;
        }
        .btn-login {
            width:100%;
        }
    </style>
</head>
<body>
    <div class="mx-auto content">
        <form action="<?=base_url()?>dosen/login" method="post">
            <center><h2>Login</h2></center>
            <div class="form-group">
                <label>Username</label>
                <input required type="text" class="form-control" placeholder="adityaeka26" name="username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input required type="password" class="form-control" placeholder="******" name="password">
            </div>
            <input class="btn btn-danger btn-login" type="submit" value="Login">
        </form>
    </div>
    <!-- Modal Notifikasi -->
    <?php if ($this->session->flashdata("notification")) { ?>
        <div class="modal fade" id="notifikasi" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Notifikasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?=$this->session->flashdata("notification")?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <script src="<?=base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/datatables.min.js"></script>
    <!-- JS Modal Notifikasi -->
    <script type="text/javascript">
        $(window).on('load',function(){
            $('#notifikasi').modal('show');
        });
    </script>
</body>
</html>