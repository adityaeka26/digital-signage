<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Display</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <style>
        body {
            text-align:center;
            font-family: Calibri;
            background: url("<?=base_url()?>assets/img/bg.png");
        }
        .main {
            border-top: 6px solid #1883b6;
            border-bottom: 6px solid #1883b6;
            margin: 15px auto;
            width: 800px;
            /* height: 500px; */
            display: flex;
            flex-wrap: wrap;
            background: white;
        }
        .sidebar {
            background: #f9f9f9;
            height: 100%;
            padding: 10px 30px;
            text-align: center;
        }
        .logo { 
            padding: 10px 20px;
            margin: 0px auto 30px auto;
        }
        .logo img {
            width: 180px;
        }
        .photo {
            width: 180px;
            margin: 0px auto 10px auto;
        }
        .photo img {
            border-radius: 50%;
        }
        .content {
            padding: 20px;
            height: 100%;
            flex: 1;
        }
        .kode {
            margin-bottom: 5px;
            font-size: 20px;
        }
        .nama {
            margin-bottom: 5px;
            font-size: 22px;
        }
        .kegiatan {
            margin-bottom: 15px;
            font-size: 18px;
        }
        .waktu {
            text-align: right;
            margin-bottom: 30px;
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
    </style>
</head>
<body>
    <div class="main shadow-sm">
        <div class="sidebar">
            <div class="logo">
                <img src="<?=base_url()?>assets/img/logo.png" alt="">
            </div>
            <div class="photo">
                <img class="photo" src="<?=base_url()?>assets/img/foto_adr.jpg" alt="">
            </div>
            <div class="kode">
                RYJ
            </div>  
            <div class="nama">
                Rahmat Yasirandi
            </div>  
            <div class="kegiatan">
                Bimbingan Mahasiswa
            </div>  
        </div>
        <div class="content">
            <div class="waktu">
                Kamis, 18/03/2019 16:19:22
            </div>
            <div class="title-kegiatan">
                Kegiatan Hari Ini
            </div>
            <div class="daftar-kegiatan">
                <div class="data-kegiatan">
                    Bimbingan Mahasiswa<br>
                    10:00:00 - 12:30:00
                </div>
                <div class="data-kegiatan">
                    Bimbingan Mahasiswa<br>
                    10:00:00 - 12:30:00
                </div>
                <div class="data-kegiatan">
                    Bimbingan Mahasiswa<br>
                    10:00:00 - 12:30:00
                </div>
                <div class="data-kegiatan">
                    Bimbingan Mahasiswa<br>
                    10:00:00 - 12:30:00
                </div>
                <div class="data-kegiatan">
                    Bimbingan Mahasiswa<br>
                    10:00:00 - 12:30:00
                </div>
                <div class="data-kegiatan">
                    Bimbingan Mahasiswa<br>
                    10:00:00 - 12:30:00
                </div>
            </div>
        </div>
    </div>
</body>
</html>