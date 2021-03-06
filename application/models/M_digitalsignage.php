<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_digitalsignage extends CI_Model {
    public function login($username, $password) {
        return $this->db->query("SELECT * FROM dosen WHERE username='$username' AND password='$password'");
    }
    public function get_kegiatan($kode_dosen) {
        return $this->db->query("SELECT kode_kegiatan_dosen, nama_kegiatan, nama_hari, jam_mulai, jam_selesai, kode_kegiatan, kode_hari, kode_jam_mulai, kode_jam_selesai
            FROM kegiatan_dosen
            INNER JOIN kegiatan USING (kode_kegiatan)
            INNER JOIN kegiatan_dosen_hari USING (kode_kegiatan_dosen)
            INNER JOIN kegiatan_dosen_jam_mulai USING (kode_kegiatan_dosen)
            INNER JOIN kegiatan_dosen_jam_selesai USING (kode_kegiatan_dosen)
            INNER JOIN hari USING (kode_hari)
            INNER JOIN jam_mulai USING (kode_jam_mulai)
            INNER JOIN jam_selesai USING (kode_jam_selesai)
            WHERE kode_dosen='$kode_dosen'
            ORDER BY kode_hari, kode_jam_mulai, kode_jam_selesai
        ");
    }
    public function insert_kegiatan($kode_dosen, $kegiatan, $hari, $jam_mulai, $jam_selesai) {
        $this->db->query("INSERT INTO kegiatan_dosen (kode_dosen, kode_kegiatan) VALUES ('$kode_dosen', $kegiatan)");
        $kode_kegiatan_dosen = $this->db->insert_id();
        $this->db->query("INSERT INTO kegiatan_dosen_hari (kode_kegiatan_dosen, kode_hari) VALUES ($kode_kegiatan_dosen, '$hari')");
        $this->db->query("INSERT INTO kegiatan_dosen_jam_mulai (kode_kegiatan_dosen, kode_jam_mulai) VALUES ($kode_kegiatan_dosen, '$jam_mulai')");
        $this->db->query("INSERT INTO kegiatan_dosen_jam_selesai (kode_kegiatan_dosen, kode_jam_selesai) VALUES ($kode_kegiatan_dosen, '$jam_selesai')");
    }
    public function get_nama_kegiatan($kode_kegiatan) {
        return $this->db->query("SELECT nama_kegiatan FROM kegiatan WHERE kode_kegiatan=$kode_kegiatan");
    }
    public function delete_kegiatan($kode_kegiatan_dosen) {
        $this->db->query("DELETE FROM kegiatan_dosen_hari WHERE kode_kegiatan_dosen=$kode_kegiatan_dosen");
        $this->db->query("DELETE FROM kegiatan_dosen_jam_mulai WHERE kode_kegiatan_dosen=$kode_kegiatan_dosen");
        $this->db->query("DELETE FROM kegiatan_dosen_jam_selesai WHERE kode_kegiatan_dosen=$kode_kegiatan_dosen");
        $this->db->query("DELETE FROM kegiatan_dosen WHERE kode_kegiatan_dosen=$kode_kegiatan_dosen");
    }
    public function get_nama_kegiatan_from_kegiatan_dosen($kode_kegiatan_dosen) {
        return $this->db->query("SELECT nama_kegiatan FROM kegiatan_dosen INNER JOIN kegiatan USING (kode_kegiatan) WHERE kode_kegiatan_dosen=$kode_kegiatan_dosen");
    }
    public function edit_kegiatan($kode_kegiatan_dosen, $kode_kegiatan, $kode_hari, $kode_jam_mulai, $kode_jam_selesai) {
        $this->db->query("UPDATE kegiatan_dosen SET kode_kegiatan=$kode_kegiatan WHERE kode_kegiatan_dosen=$kode_kegiatan_dosen");
        $this->db->query("UPDATE kegiatan_dosen_hari SET kode_hari='$kode_hari' WHERE kode_kegiatan_dosen=$kode_kegiatan_dosen");
        $this->db->query("UPDATE kegiatan_dosen_jam_mulai SET kode_jam_mulai='$kode_jam_mulai' WHERE kode_kegiatan_dosen=$kode_kegiatan_dosen");
        $this->db->query("UPDATE kegiatan_dosen_jam_selesai SET kode_jam_selesai='$kode_jam_selesai' WHERE kode_kegiatan_dosen=$kode_kegiatan_dosen");
    }
    public function get_dosen($kode_ruangan) {
        return $this->db->query("SELECT * FROM dosen WHERE kode_ruangan='$kode_ruangan'");
    }
    public function get_dosen_by_kodedosen($kode_dosen) {
        return $this->db->query("SELECT * FROM dosen WHERE kode_dosen='$kode_dosen'");
    }
}