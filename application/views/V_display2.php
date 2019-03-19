<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Display</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon2.png" title="favicon">
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/datatables.min.css" />
    <style>
        body {
            text-align:center;
            font-family: Calibri;
            background: url("<?=base_url()?>assets/img/bg.png");
        }
        .mainn {
            margin: 15px auto 0px auto;
            width: 800px;
        }
        .main {
            border-top: 6px solid #1883b6;
            border-bottom: 6px solid #1883b6;
            /* height: 500px; */
            display: flex;
            flex-wrap: wrap;
            background: white;
        }
        .sidebar {
            background: #f9f9f9;
            /* height: 100%; */
            padding: 20px 60px;
            text-align: center;
        }
        .logo { 
            padding: 10px 20px;
            margin: 0px auto 30px auto;
        }
        .logo img {
            width: 120px;
        }
        .photo {
            width: 180px;
            margin: 0px auto 10px auto;
        }
        .photo img {
            border-radius: 50%;
        }
        .content {
            padding: 20px 20px 30px 20px;
            height: 100%;
            flex: 1;
        }
        .kode {
            margin-bottom: 5px;
            font-weight: bold;
            font-size: 32px;
            text-transform: uppercase;
        }
        .nama {
            margin-bottom: 5px;
            font-size: 16px;
        }
        .kegiatan {
            margin-bottom: 15px;
            font-size: 18px;
        }
        .time {
            text-align: right;
            margin-bottom: 30px;
            margin-right: 5px;
        }
        .title-kegiatan {
            text-align: center;
            font-size: 22px;
            margin-bottom: 30px;
        }
        .data-kegiatan {
            font-size: 17px;
            margin-bottom: 10px;
        }
        .footer {
            background: #242424;
            color: #eee;
            font-size: 12px;
            padding-top: 5px;
            padding-bottom: 7px;
        }
        .footer a {
            color: #eee;
        }
        .on-going {
            font-weight: bold;
            color: #1883b6;
        }
    </style>
</head>
<body onload="display_ct()">
    <div class="shadow-sm mainn">
        <div class="main shadow-sm">
            <div class="sidebar">
                <div class="logo">
                    <img src="<?=base_url()?>assets/img/logo.png" alt="">
                </div>
                <div class="photo">
                    <img class="photo" src="<?=base_url()?>assets/img/foto_adr.jpg" alt="">
                </div>
                <div class="kode">
                    <?=$dosen["kode_dosen"]?>
                </div>  
                <div class="nama">
                    <?=$dosen["nama_dosen"]?>
                </div>
            </div>
            <div class="content">
                <div class="time">
                    <span id="time"></span>
                </div>
                <div class="title-kegiatan">
                    Kegiatan Hari Ini
                </div>
                <div class="daftar-kegiatan" id="kegiatan-today">
                    <!-- <div class="data-kegiatan">
                        Bimbingan Mahasiswa<br>
                        10:00:00 - 12:30:00
                    </div> -->
                </div>
            </div>
        </div>
        <div class="footer">
            Copyright &copy; <a href="https://iotstudio.labs.telkomuniversity.ac.id/">IoT Studio Labs</a> 2019 
        </div>
    </div>
    
    <script src="<?=base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/datatables.min.js"></script>
    <script src="<?=base_url()?>assets/js/waktu.js"></script>
    <script>
        $(document).ready(function() {
            setInterval(function() {
                $.ajax({
                    type:"GET",
                    url:"<?=base_url()?>page/json_kegiatan/<?=$dosen["kode_dosen"]?>",
                    success: function(result) {
                        var current = new Date()
                        var kegiatan_today = ""
                        for (var i in result) {
                            var time_start = new Date()
                            time_start.setHours(result[i].jam_mulai.substring(0, 2))
                            time_start.setMinutes(result[i].jam_mulai.substring(3, 5))

                            var time_end = new Date()
                            time_end.setHours(result[i].jam_selesai.substring(0, 2))
                            time_end.setMinutes(result[i].jam_selesai.substring(3, 5))

                            if (day == result[i].nama_hari) {
                                if (time_start < current && time_end > current && day == result[i].nama_hari) {
                                    kegiatan_today += "<div class='data-kegiatan on-going'>" +
                                        result[i].nama_kegiatan + "<br>" +
                                        result[i].jam_mulai + " - " + result[i].jam_selesai +
                                        "</div>";
                                } else {
                                    kegiatan_today += "<div class='data-kegiatan'>" +
                                        result[i].nama_kegiatan + "<br>" +
                                        result[i].jam_mulai + " - " + result[i].jam_selesai +
                                        "</div>";
                                }
                            }
                        }
                        console.log("Tes")
                        $("#kegiatan-today").html(kegiatan_today)
                    }
                })
            }, 1000)
        })
    </script>
    <!-- End -->
</body>
</html>