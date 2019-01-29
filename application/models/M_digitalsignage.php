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
        return $this->db->query("SELECT kode_kegiatan_dosen, nama_kegiatan, nama_hari, jam_mulai, jam_selesai
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
    public function insert_kegiatan($kode_dosen, $kode_config, $kegiatan, $hari, $jam_mulai, $jam_selesai) {
        $this->db->query("INSERT INTO kegiatan_dosen (kode_dosen, kode_kegiatan) VALUES ('$kode_dosen', $kegiatan)");
        $kode_kegiatan_dosen = $this->db->insert_id();
        $this->db->query("INSERT INTO kegiatan_dosen_hari (kode_kegiatan_dosen, kode_hari) VALUES ($kode_kegiatan_dosen, '$hari')");
        $this->db->query("INSERT INTO kegiatan_dosen_jam_mulai (kode_kegiatan_dosen, kode_jam_mulai) VALUES ($kode_kegiatan_dosen, '$jam_mulai')");
        $this->db->query("INSERT INTO kegiatan_dosen_jam_selesai (kode_kegiatan_dosen, kode_jam_selesai) VALUES ($kode_kegiatan_dosen, '$jam_selesai')");
        $this->db->query("INSERT INTO config_dosen (kode_kegiatan_dosen, kode_config) VALUES ($kode_kegiatan_dosen, $kode_config)");
    }
    public function get_nama_kegiatan($kode_kegiatan) {
        return $this->db->query("SELECT nama_kegiatan FROM kegiatan WHERE kode_kegiatan=$kode_kegiatan");
    }
    public function delete_kegiatan($kode_kegiatan_dosen) {
        $this->db->query("DELETE FROM kegiatan_dosen_hari WHERE kode_kegiatan_dosen=$kode_kegiatan_dosen");
        $this->db->query("DELETE FROM kegiatan_dosen_jam_mulai WHERE kode_kegiatan_dosen=$kode_kegiatan_dosen");
        $this->db->query("DELETE FROM kegiatan_dosen_jam_selesai WHERE kode_kegiatan_dosen=$kode_kegiatan_dosen");
        $this->db->query("DELETE FROM config_dosen WHERE kode_kegiatan_dosen=$kode_kegiatan_dosen");
        $this->db->query("DELETE FROM kegiatan_dosen WHERE kode_kegiatan_dosen=$kode_kegiatan_dosen");
    }
}