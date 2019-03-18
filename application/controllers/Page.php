<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        redirect("page/login");
    }
    public function login() {
        if ($this->session->userdata("username")) {
            redirect("page/dasbor");
        } else {
            $data["title"] = "Login Dosen";
            $this->load->view("V_login", $data);
        }        
    }
    public function dasbor() {
        if (!$this->session->userdata("username")) {
            $this->session->set_flashdata("notification", "Login terlebih dahulu!");
            redirect("page/login");
        } else {
            $kode_dosen = $this->session->userdata("username");
            $data["title"] = "Dasbor";
            $data["kode_dosen"] = $kode_dosen;
            $data["kegiatan"] = $this->M_digitalsignage->get_kegiatan($kode_dosen);
            $this->load->view("V_dasbor", $data);
        }       
    }
    public function display($kode_ruangan) {
        $data["title"] = "Display";
        $data["dosen"] = $this->M_digitalsignage->get_dosen($kode_ruangan);
        $data["kode_ruangan"] = $kode_ruangan;
        $this->load->view("V_display", $data);
    }
    public function json_kegiatan($kode_dosen) {
        $kegiatan = $this->M_digitalsignage->get_kegiatan($kode_dosen);
        $i = 0;
        foreach($kegiatan->result_array() as $kegiatan_arr) {
            $data[$i]["kode_kegiatan_dosen"] = $kegiatan_arr["kode_kegiatan_dosen"];
            $data[$i]["nama_kegiatan"] = $kegiatan_arr["nama_kegiatan"];
            $data[$i]["nama_hari"] = $kegiatan_arr["nama_hari"];
            $data[$i]["jam_mulai"] = $kegiatan_arr["jam_mulai"];
            $data[$i]["jam_selesai"] = $kegiatan_arr["jam_selesai"];
            $data[$i]["kode_kegiatan"] = $kegiatan_arr["kode_kegiatan"];
            $data[$i]["kode_hari"] = $kegiatan_arr["kode_hari"];
            $data[$i]["kode_jam_mulai"] = $kegiatan_arr["kode_jam_mulai"];
            $data[$i]["kode_jam_selesai"] = $kegiatan_arr["kode_jam_selesai"];
            $i++;
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function display2() {
        $this->load->view("V_display2");
    }
}