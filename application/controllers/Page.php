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
            $data["title"] = "Dasbor";
            $kode_dosen = $this->session->userdata("username");
            $data["config"] = $this->M_digitalsignage->get_all_config($kode_dosen);
            $this->load->view("V_dasbor", $data);
        }        
    }
}