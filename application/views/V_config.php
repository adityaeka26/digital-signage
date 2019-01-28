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
        .main {
            background:white;
            margin-top:10px;
            padding:20px;
            border-top:5px solid #dc3545;
            border-bottom:10px solid #dc3545;
            box-shadow:0px 0px 10px #1234;
        }
    </style>
</head>
<body>
    <div class="main mx-auto container">
        <span id='time'></span>
        <h3><?php echo $title?></h3>
    </div>
    <script src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/datatables.min.js"></script>
    <script type="text/javascript"> 
        function display_c(){
            var refresh=1000;
            mytime=setTimeout("display_ct()", refresh);
        }
        function display_ct() {
            var now = new Date();
            var month = now.getMonth() + 1;
            var date = now.getDate();
            var year = now.getFullYear();
            if (now.getDay() == 0) {
                var day = "Minggu";
            } else if (now.getDay() == 1) {
                var day = "Senin";
            } else if (now.getDay() == 2) {
                var day = "Selasa";
            } else if (now.getDay() == 3) {
                var day = "Rabu";
            } else if (now.getDay() == 4) {
                var day = "Kamis";
            } else if (now.getDay() == 5) {
                var day = "Jumat";
            } else if (now.getDay() == 6) {
                var day = "Sabtu";
            }
            var minute = now.getMinutes();
            var hour = now.getHours();
            document.getElementById("time").innerHTML = 
                day + ", " + 
                date + "/" + month + "/" + year + " " + 
                hour + ":" + minute;
            tt = display_c();
        }
    </script>
</body>