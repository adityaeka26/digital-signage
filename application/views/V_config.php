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
<body onload="display_ct()">
    <div class="main mx-auto container">
        <span id="time"></span>
        <h3 class="title"><?=$title?></h3>
        <table class="table" id="kegiatan">
            <thead>
                <tr>
                    <th>Nama Kegiatan</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kegiatan->result_array() as $kegiatan_arr) { ?>
                    <tr>
                        <td><?=$kegiatan_arr["nama_kegiatan"]?></td>
                        <td><?=$kegiatan_arr["nama_hari"]?></td>
                        <td><?=$kegiatan_arr["jam_mulai"]?></td>
                        <td><?=$kegiatan_arr["jam_selesai"]?></td>
                        <td>
                            <button class="btn btn-sm btn-primary">Edit</button>
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
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