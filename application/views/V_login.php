<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/css/datatables.min.css" />
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
        <form action="<?php echo base_url()?>dosen/login" method="post">
            <?php if ($this->session->flashdata("notification")) {?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata("notification")?>
                </div>
            <?php } ?>
            <center><h2>Login</h2></center>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="adityaeka26" name="username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="******" name="password">
            </div>
            <input class="btn btn-danger btn-login" type="submit" value="Login">
        </form>
    </div>
    <script src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/datatables.min.js"></script>
</body>
</html>