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
        a:hover {
            text-decoration:none;
        }
        .main {
            background:white;
            margin-top:10px;
            padding:30px;
            border-top:5px solid #dc3545;
            border-bottom:10px solid #dc3545;
            box-shadow:0px 0px 10px #1234;
            overflow:hidden;
        }
        h3.title {
            margin:20px 0px;
        }
        .top-menu {
            margin-bottom:15px;
        }
        .bottom-menu {
            float:right;
        }
    </style>
</head>
<body onload="display_ct()">
    <div class="main mx-auto container">
        <div class="alert alert-success">
            <center><span id="time"></span></center>
        </div>
        <h3 class="title">Daftar Config</h3>
        <div class="top-menu">
            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#tambah-kegiatan">Tambah Config</button>
        </div>  
        <table class="table" id="kegiatan">
            <thead>
                <tr>
                    <th>Nama Config</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($config->result_array() as $config_arr) { ?>
                    <tr>
                        <td><a href="<?=base_url()?>page/config/<?=$config_arr["kode_config"]?>"><?=$config_arr["nama_config"]?></a></td>
                        <td><?=$config_arr["tanggal_mulai"]?></td>
                        <td><?=$config_arr["tanggal_selesai"]?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="bottom-menu">
            <a class="btn btn-danger" href="<?=base_url()?>">Dasbor</a>
            <a class="btn btn-danger" href="<?=base_url()?>dosen/logout">Logout</a>
        </div>
    </div>
    <div class="modal fade" id="tambah-kegiatan" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="<?=base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/datatables.min.js"></script>
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
            var second = now.getSeconds();
            document.getElementById("time").innerHTML = 
                day + ", " + 
                date + "/" + month + "/" + year + " " + 
                hour + ":" + minute + ":" + second;
            tt = display_c();
        }
    </script>
</body>
</html>