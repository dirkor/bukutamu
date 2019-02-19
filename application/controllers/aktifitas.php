<?php
class Aktifitas extends CI_controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_aktifitas');
	}
	function index(){
		$data['aktifitas'] = $this->m_aktifitas->selectAktifitas();
		$this->load->view('v_index', $data);
	}
	function tambahaktifitas(){
		$dataPesan = $this->m_aktifitas->insertAktifitas();
		$this->session->set_flashdata('msg', $dataPesan);
		redirect('aktifitas', 'refresh');
	}
	function tambahtamu(){
		$data = $this->m_aktifitas->insertTamu();
		$this->session->set_flashdata('msg', $data);
		redirect('aktifitas', 'refresh');
	}

	function cariTamu(){
		$this->m_aktifitas->selectTamu();
	}
}
?>