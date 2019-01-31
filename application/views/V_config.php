<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/datatables.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/style.css" />
</head>
<body onload="display_ct()">
    <div class="main mx-auto container">
        <div class="time">
            <span id="time"></span>
        </div>
        <h3 class="title"><?=$title?></h3>
        <div class="top-menu">
            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#tambah-kegiatan">Tambah Kegiatan</button>
        </div>
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
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit-kegiatan<?=$kegiatan_arr["kode_kegiatan_dosen"]?>">Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus-kegiatan<?=$kegiatan_arr["kode_kegiatan_dosen"]?>">Hapus</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="bottom-menu">
            <a class="btn btn-danger" href="<?=base_url()?>">Dasbor</a>
            <a class="btn btn-danger" href="<?=base_url()?>dosen/logout">Logout</a>
        </div>
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
    <!-- End -->
    <!-- Modal Hapus Kegiatan -->
    <?php foreach ($kegiatan->result_array() as $kegiatan_arr) { ?>
        <div class="modal fade" id="hapus-kegiatan<?=$kegiatan_arr["kode_kegiatan_dosen"]?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Kegiatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin akan menghapus kegiatan <?=$kegiatan_arr["nama_kegiatan"]?>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a class="btn btn-danger" href="<?=base_url()?>dosen/delete_kegiatan/<?=$kode_config?>/<?=$kegiatan_arr["kode_kegiatan_dosen"]?>">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- End -->
    <!-- Modal Tambah Kegiatan -->
    <div class="modal fade" id="tambah-kegiatan" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="<?=base_url()?>dosen/insert_kegiatan" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kegiatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group d-none">
                            <label>Kode Config</label>
                            <input type="text" class="form-control" name="kode_config" readonly value="<?=$kode_config?>">
                        </div>
                        <div class="form-group">
                            <label>Kegiatan</label>
                            <select class="form-control" name="nama_kegiatan" required>
                                <option value="1">Mengajar</option>
                                <option value="2">Rapat</option>
                                <option value="3">Bimbingan Mahasiswa</option>
                                <option value="4">Responsi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hari</label>
                            <select class="form-control" name="hari" required>
                                <option value="h1">Senin</option>
                                <option value="h2">Selasa</option>
                                <option value="h3">Rabu</option>
                                <option value="h4">Kamis</option>
                                <option value="h5">Jumat</option>
                                <option value="h6">Sabtu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jam Mulai</label>
                            <select class="form-control mulai" name="jam_mulai" required>
                                <option value="jm01" class="op-mulai" id="1">06:30</option>
                                <option value="jm02" class="op-mulai" id="2">07:00</option>
                                <option value="jm03" class="op-mulai" id="3">07:30</option>
                                <option value="jm04" class="op-mulai" id="4">08:00</option>
                                <option value="jm05" class="op-mulai" id="5">08:30</option>
                                <option value="jm06" class="op-mulai" id="6">09:00</option>
                                <option value="jm07" class="op-mulai" id="7">09:30</option>
                                <option value="jm08" class="op-mulai" id="8">10:00</option>
                                <option value="jm09" class="op-mulai" id="9">10:30</option>
                                <option value="jm10" class="op-mulai" id="10">11:00</option>
                                <option value="jm11" class="op-mulai" id="11">11:30</option>
                                <option value="jm12" class="op-mulai" id="12">12:00</option>
                                <option value="jm13" class="op-mulai" id="13">12:30</option>
                                <option value="jm14" class="op-mulai" id="14">13:00</option>
                                <option value="jm15" class="op-mulai" id="15">13:30</option>
                                <option value="jm16" class="op-mulai" id="16">14:00</option>
                                <option value="jm17" class="op-mulai" id="17">14:30</option>
                                <option value="jm18" class="op-mulai" id="18">15:00</option>
                                <option value="jm19" class="op-mulai" id="19">15:30</option>
                                <option value="jm20" class="op-mulai" id="20">16:00</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jam Selesai</label>
                            <select class="form-control selesai" name="jam_selesai" required>
                                <option value="js02" class="op-selesai" id="2">07:00</option>
                                <option value="js03" class="op-selesai" id="3">07:30</option>
                                <option value="js04" class="op-selesai" id="4">08:00</option>
                                <option value="js05" class="op-selesai" id="5">08:30</option>
                                <option value="js06" class="op-selesai" id="6">09:00</option>
                                <option value="js07" class="op-selesai" id="7">09:30</option>
                                <option value="js08" class="op-selesai" id="8">10:00</option>
                                <option value="js09" class="op-selesai" id="9">10:30</option>
                                <option value="js10" class="op-selesai" id="10">11:00</option>
                                <option value="js11" class="op-selesai" id="11">11:30</option>
                                <option value="js12" class="op-selesai" id="12">12:00</option>
                                <option value="js13" class="op-selesai" id="13">12:30</option>
                                <option value="js14" class="op-selesai" id="14">13:00</option>
                                <option value="js15" class="op-selesai" id="15">13:30</option>
                                <option value="js16" class="op-selesai" id="16">14:00</option>
                                <option value="js17" class="op-selesai" id="17">14:30</option>
                                <option value="js18" class="op-selesai" id="18">15:00</option>
                                <option value="js19" class="op-selesai" id="19">15:30</option>
                                <option value="js20" class="op-selesai" id="20">16:00</option>
                                <option value="js21" class="op-selesai" id="21">16:30</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-danger" value="Tambah">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End -->
    <!-- Modal Edit Kegiatan -->
    <?php foreach ($kegiatan->result_array() as $kegiatan_arr) { ?>
        <div class="modal fade" id="edit-kegiatan<?=$kegiatan_arr["kode_kegiatan_dosen"]?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form action="<?=base_url()?>dosen/edit_kegiatan" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Kegiatan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group d-none">
                                <label>Kode Config</label>
                                <input type="text" class="form-control" name="kode_config" readonly value="<?=$kode_config?>">
                            </div>
                            <div class="form-group d-none">
                                <label>Kode Kegiatan Dosen</label>
                                <input type="text" class="form-control" name="kode_kegiatan_dosen" readonly value="<?=$kegiatan_arr["kode_kegiatan_dosen"]?>">
                            </div>
                            <div class="form-group">
                                <label>Kegiatan</label>
                                <select class="form-control" name="kode_kegiatan" required id="nama_kegiatan<?=$kegiatan_arr["kode_kegiatan_dosen"]?>">
                                    <option value="1">Mengajar</option>
                                    <option value="2">Rapat</option>
                                    <option value="3">Bimbingan Mahasiswa</option>
                                    <option value="4">Responsi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hari</label>
                                <select class="form-control" name="hari" required id="hari<?=$kegiatan_arr["kode_kegiatan_dosen"]?>">
                                    <option value="h1">Senin</option>
                                    <option value="h2">Selasa</option>
                                    <option value="h3">Rabu</option>
                                    <option value="h4">Kamis</option>
                                    <option value="h5">Jumat</option>
                                    <option value="h6">Sabtu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jam Mulai</label>
                                <select class="form-control mulai" name="jam_mulai" required id="jam_mulai<?=$kegiatan_arr["kode_kegiatan_dosen"]?>">
                                    <option value="jm01" class="op-mulai" id="1">06:30</option>
                                    <option value="jm02" class="op-mulai" id="2">07:00</option>
                                    <option value="jm03" class="op-mulai" id="3">07:30</option>
                                    <option value="jm04" class="op-mulai" id="4">08:00</option>
                                    <option value="jm05" class="op-mulai" id="5">08:30</option>
                                    <option value="jm06" class="op-mulai" id="6">09:00</option>
                                    <option value="jm07" class="op-mulai" id="7">09:30</option>
                                    <option value="jm08" class="op-mulai" id="8">10:00</option>
                                    <option value="jm09" class="op-mulai" id="9">10:30</option>
                                    <option value="jm10" class="op-mulai" id="10">11:00</option>
                                    <option value="jm11" class="op-mulai" id="11">11:30</option>
                                    <option value="jm12" class="op-mulai" id="12">12:00</option>
                                    <option value="jm13" class="op-mulai" id="13">12:30</option>
                                    <option value="jm14" class="op-mulai" id="14">13:00</option>
                                    <option value="jm15" class="op-mulai" id="15">13:30</option>
                                    <option value="jm16" class="op-mulai" id="16">14:00</option>
                                    <option value="jm17" class="op-mulai" id="17">14:30</option>
                                    <option value="jm18" class="op-mulai" id="18">15:00</option>
                                    <option value="jm19" class="op-mulai" id="19">15:30</option>
                                    <option value="jm20" class="op-mulai" id="20">16:00</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jam Selesai</label>
                                <select class="form-control selesai" name="jam_selesai" required id="jam_selesai<?=$kegiatan_arr["kode_kegiatan_dosen"]?>">
                                    <option value="js02" class="op-selesai" id="2">07:00</option>
                                    <option value="js03" class="op-selesai" id="3">07:30</option>
                                    <option value="js04" class="op-selesai" id="4">08:00</option>
                                    <option value="js05" class="op-selesai" id="5">08:30</option>
                                    <option value="js06" class="op-selesai" id="6">09:00</option>
                                    <option value="js07" class="op-selesai" id="7">09:30</option>
                                    <option value="js08" class="op-selesai" id="8">10:00</option>
                                    <option value="js09" class="op-selesai" id="9">10:30</option>
                                    <option value="js10" class="op-selesai" id="10">11:00</option>
                                    <option value="js11" class="op-selesai" id="11">11:30</option>
                                    <option value="js12" class="op-selesai" id="12">12:00</option>
                                    <option value="js13" class="op-selesai" id="13">12:30</option>
                                    <option value="js14" class="op-selesai" id="14">13:00</option>
                                    <option value="js15" class="op-selesai" id="15">13:30</option>
                                    <option value="js16" class="op-selesai" id="16">14:00</option>
                                    <option value="js17" class="op-selesai" id="17">14:30</option>
                                    <option value="js18" class="op-selesai" id="18">15:00</option>
                                    <option value="js19" class="op-selesai" id="19">15:30</option>
                                    <option value="js20" class="op-selesai" id="20">16:00</option>
                                    <option value="js21" class="op-selesai" id="21">16:30</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-danger" value="Tambah">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>
    <!-- End -->
    <script src="<?=base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/datatables.min.js"></script>
    <!-- JS Select by Value Edit Kegiatan -->
    <?php foreach ($kegiatan->result_array() as $kegiatan_arr) { ?>
        <script type="text/javascript">
            $(function() {
                var kode_kegiatan_dosen = "<?=$kegiatan_arr['kode_kegiatan_dosen']?>";
                var kode_kegiatan = "<?=$kegiatan_arr['kode_kegiatan']?>";
                var kode_hari = "<?=$kegiatan_arr['kode_hari']?>";
                var kode_jam_mulai = "<?=$kegiatan_arr['kode_jam_mulai']?>";
                var kode_jam_selesai = "<?=$kegiatan_arr['kode_jam_selesai']?>";
                $('#edit-kegiatan'+kode_kegiatan_dosen).on('shown.bs.modal', function() {
                    $('#nama_kegiatan'+kode_kegiatan_dosen).val(kode_kegiatan);
                    $('#hari'+kode_kegiatan_dosen).val(kode_hari);
                    $('#jam_mulai'+kode_kegiatan_dosen).val(kode_jam_mulai);
                    $('#jam_selesai'+kode_kegiatan_dosen).val(kode_jam_selesai);
                });
            });
        </script>
    <?php } ?>
    <!-- End -->
    <!-- JS Modal Notifikasi -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#notifikasi').modal('show');
        });
    </script>
    <!-- End -->
    <!-- JS Datatables Kegiatan -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#kegiatan').DataTable();
        });
    </script>
    <!-- End -->
    <!-- JS Input Jam Mulai & Selesai -->
    <script type="text/javascript">
        $(function() {
            $(".mulai").on("change", function() {
                var id = $(this).children(":selected").attr("id");
                $(".op-selesai").addClass("not-active");
                $('.selesai > option').each(function() {
                    if (parseInt($(this).attr("id")) > parseInt(id)) {
                        $(this).removeClass("not-active");
                        if (parseInt($(this).attr("id"))-1 == parseInt(id)) {
                            $(this).prop('selected', true);
                        }
                    }
                });
            });
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