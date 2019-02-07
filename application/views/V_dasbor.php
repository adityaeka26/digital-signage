<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon2.png" title="favicon">
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/datatables.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/style.css" />
</head>
<body onload="display_ct()">
    <div class="main mx-auto container">
        <div class="time">
            <span id="time"></span>
        </div>
        <h3 class="title">Daftar Config</h3>
        <div class="top-menu">
            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#tambah-config">Tambah Config</button>
        </div>  
        <table class="table" id="config">
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
    <!-- Modal Tambah Config -->
    <div class="modal fade" id="tambah-config" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="<?=base_url()?>dosen/insert_config" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Config</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Config</label>
                            <input type="text" class="form-control" name="nama_config">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tanggal_mulai"/>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tanggal_selesai"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End -->
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
    <!-- End -->
    <script src="<?=base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/datatables.min.js"></script>
    <!-- JS Modal Notifikasi -->
    <script type="text/javascript">
        $(window).on('load',function(){
            $('#notifikasi').modal('show');
        });
    </script>
    <!-- End -->
    <!-- JS Datatables Kegiatan -->
    <script type="text/javascript">
        $(document).ready( function () {
            $('#config').DataTable();
        });
    </script>
    <!-- End -->
    <!-- JS Tanggal & Waktu -->
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
    <!-- End -->
</body>
</html>