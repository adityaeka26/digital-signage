<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon2.png" title="favicon">
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/datatables.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/style.css" />
    <style>
        #row1 {
            margin-bottom:30px;
        }
        .row {
            display: flex;
            flex-wrap: no-wrap;
            padding-top: 30px;
        }
        .col {
            flex: 1;
            text-align: center;
            margin-bottom:30px;
        }
        .col img {
            width: 250px;
            border-radius: 50%;
        }
        .name {
            margin-top:10px;
            font-size: 30px;
            text-transform: uppercase;
        }
        .activity {
            font-size: 20px;
        }
        #title {
            margin-top:30px;
            text-align: center;
        }
        h1 {
            text-transform: uppercase;
        }
    </style>
</head>
<body onload="display_ct()">
    <div class="main container mx-auto">
        <div class="time">
            <span id="time"></span>
        </div>
        <div id="title">
            <h1><?=$kode_ruangan?></h1>
        </div>
        <div class="row" id="row1">
            <?php foreach($dosen->result_array() as $dosen_arr) { ?>
                <div class="col">
                    <img src="<?=base_url()?>assets/img/<?=$dosen_arr["foto_dosen"]?>" alt="">
                    <div class="name"><?=$dosen_arr["kode_dosen"]?></div>
                    <div class="activity" id="activity<?=$dosen_arr["kode_dosen"]?>"></div> 
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="<?=base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/datatables.min.js"></script>
    <!-- JS Tanggal & Waktu -->
    <script type="text/javascript">
        var hour
        var minute
        var day
        function display_ct() {
            var now = new Date()
            var month = now.getMonth() + 1
            var date = now.getDate()
            var year = now.getFullYear()
            if (now.getDay() == 0) {
                day = "Minggu"
            } else if (now.getDay() == 1) {
                day = "Senin"
            } else if (now.getDay() == 2) {
                day = "Selasa"
            } else if (now.getDay() == 3) {
                day = "Rabu"
            } else if (now.getDay() == 4) {
                day = "Kamis"
            } else if (now.getDay() == 5) {
                day = "Jumat"
            } else if (now.getDay() == 6) {
                day = "Sabtu"
            }
            minute = now.getMinutes()
            hour = now.getHours()
            var second = now.getSeconds()
            var time = 
                day + ", " + 
                date + "/" + month + "/" + year + " " + 
                hour + ":" + minute + ":" + second;
            document.getElementById("time").innerHTML = time
            setTimeout("display_ct()", 1000)
        }
    </script>
    <!-- End -->
    <!-- JS Kegiatan -->
    <?php foreach($dosen->result_array() as $dosen_arr) { ?>
        <script>
            $(document).ready(function() {
                setInterval(function() {
                    $.ajax({
                        type:"GET",
                        url:"<?=base_url()?>page/json_kegiatan/<?=$dosen_arr["kode_dosen"]?>",
                        success: function(result) {
                            var current = new Date()
                            var element = ""
                            for (var i in result) {
                                var time_start = new Date()
                                time_start.setHours(result[i].jam_mulai.substring(0, 2))
                                time_start.setMinutes(result[i].jam_mulai.substring(3, 5))

                                var time_end = new Date()
                                time_end.setHours(result[i].jam_selesai.substring(0, 2))
                                time_end.setMinutes(result[i].jam_selesai.substring(3, 5))

                                if (time_start < current && time_end > current && day == result[i].nama_hari) {
                                    element += result[i].nama_kegiatan + "<br>" + result[i].jam_mulai + " - " + result[i].jam_selesai + "<br>"
                                }
                            }
                            console.log("Tes")
                            $("#activity<?=$dosen_arr["kode_dosen"]?>").html(element)
                        }
                    })
                }, 1000)
            })
        </script>
    <?php } ?>
    <!-- End -->
</body>
</html>