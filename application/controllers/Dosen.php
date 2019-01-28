<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function login() {
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $result = $this->M_digitalsignage->login($username, $password)->row_array();

        if ($result > 0) {
            $this->session->set_userdata("username", $username);
            redirect("page/dasbor");
        } else {
            $this->session->set_flashdata("notification", "Login gagal!");
            redirect("page/login");
        }
    }
    public function logout() {
        $this->session->unset_userdata("username");
        redirect("page/login");
    }
    public function insert_kegiatan() {
        $kode_dosen = $this->session->userdata("username");
        $kode_config = $this->input->post("kode_config");
        $kegiatan = $this->input->post("nama_kegiatan");
        $hari = $this->input->post("hari");
        $jam_mulai = $this->input->post("jam_mulai");
        $jam_selesai = $this->input->post("jam_selesai");

        $this->M_digitalsignage->insert_kegiatan($kode_dosen, $kode_config, $kegiatan, $hari, $jam_mulai, $jam_selesai);
        redirect("page/config/".$kode_config);
    }
}