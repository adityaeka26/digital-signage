<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_digitalsignage extends CI_Model {
    public function login($username, $password) {
        return $this->db->query("SELECT * FROM dosen WHERE username='$username' AND password='$password'");
    }
    public function get_all_config($kode_dosen) {
        return $this->db->query("SELECT * FROM config WHERE nama_config LIKE '%$kode_dosen'");
    }
}