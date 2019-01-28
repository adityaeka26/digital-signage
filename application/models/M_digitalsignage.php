<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_digitalsignage extends CI_Model {
    public function login($username, $password) {
        return $this->db->query("SELECT * FROM dosen WHERE username='$username' AND password='$password'");
    }
    public function get_all_config($kode_dosen) {
        return $this->db->query("SELECT * FROM config WHERE nama_config LIKE '%$kode_dosen'");
    }
    public function get_config_name($kode_config) {
        return $this->db->query("SELECT nama_config FROM config WHERE kode_config=$kode_config");
    }
    public function get_kegiatan($kode_config) {
        return $this->db->query("SELECT nama_kegiatan, nama_hari, jam_mulai, jam_selesai
            FROM config_dosen 
            INNER JOIN kegiatan_dosen USING (kode_kegiatan_dosen)
            INNER JOIN kegiatan USING (kode_kegiatan)
            INNER JOIN kegiatan_dosen_hari USING (kode_kegiatan_dosen)
            INNER JOIN kegiatan_dosen_jam_mulai USING (kode_kegiatan_dosen)
            INNER JOIN kegiatan_dosen_jam_selesai USING (kode_kegiatan_dosen)
            INNER JOIN hari USING (kode_hari)
            INNER JOIN jam_mulai USING (kode_jam_mulai)
            INNER JOIN jam_selesai USING (kode_jam_selesai)
            WHERE kode_config=$kode_config
        ");
    }
}