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
}