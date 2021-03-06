<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function login() {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $passwordx = md5($password);

        $result = $this->M_digitalsignage->login($username, $passwordx)->row_array();

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
        $kegiatan = $this->input->post("nama_kegiatan");
        $hari = $this->input->post("hari");
        $jam_mulai = $this->input->post("jam_mulai");
        $jam_selesai = $this->input->post("jam_selesai");
        $nama_kegiatan = $this->M_digitalsignage->get_nama_kegiatan($kegiatan)->result_array()[0]["nama_kegiatan"];

        $this->M_digitalsignage->insert_kegiatan($kode_dosen, $kegiatan, $hari, $jam_mulai, $jam_selesai);
        $this->session->set_flashdata("notification", "Kegiatan ".$nama_kegiatan." berhasil ditambahkan!");
        redirect("page/dasbor");
    }
    public function delete_kegiatan($kode_kegiatan_dosen) {
        $nama_kegiatan = $this->M_digitalsignage->get_nama_kegiatan_from_kegiatan_dosen($kode_kegiatan_dosen)->result_array()[0]["nama_kegiatan"];
        $this->M_digitalsignage->delete_kegiatan($kode_kegiatan_dosen);        
        $this->session->set_flashdata("notification", "Kegiatan ".$nama_kegiatan." berhasil dihapus!");
        redirect("page/dasbor");
    }
    public function edit_kegiatan() {
        $kode_kegiatan_dosen = $this->input->post("kode_kegiatan_dosen");
        $kegiatan = $this->input->post("kode_kegiatan");
        $hari = $this->input->post("hari");
        $jam_mulai = $this->input->post("jam_mulai");
        $jam_selesai = $this->input->post("jam_selesai");
        $nama_kegiatan = $this->M_digitalsignage->get_nama_kegiatan($kegiatan)->result_array()[0]["nama_kegiatan"];

        $this->M_digitalsignage->edit_kegiatan($kode_kegiatan_dosen, $kegiatan, $hari, $jam_mulai, $jam_selesai);
        $this->session->set_flashdata("notification", "Kegiatan ".$nama_kegiatan." berhasil diperbarui!");
        redirect("page/dasbor");
    }
}