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
}