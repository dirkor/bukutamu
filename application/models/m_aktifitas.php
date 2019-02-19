<?php
class M_aktifitas extends CI_model{
	function __construct(){
		parent::__construct();
	}

	function selectAktifitas(){
		$query = $this->db->query('SELECT tamu.id_tamu, tamu.nama, aktifitas.tujuan, aktifitas.aksi, aktifitas.time
									from tamu join aktifitas on tamu.id_tamu=aktifitas.id_tamu order by aktifitas.time DESC');
		return $query->result();
	}

	function selectTamu(){
		$nama = $this->input->post('idornama');
		$id = intval($nama);
		$hasil = 0;
		if (!empty($nama)) {
			$query = $this->db->query('SELECT * FROM tamu where nama LIKE "%'.$nama.'%" OR id_tamu='.$id.'');
			$hasil = $query->result();
			if($query->num_rows() > 0){
				$hasil = $query->result();
				echo json_encode($hasil);
			}else{
				$hasil = 0;
				echo json_encode($hasil);
			}
		}else{
			echo json_encode($hasil);
		}
		
	}

	function insertAktifitas(){
		$id = $this->input->post('input_idtamu');
		$nama = $this->input->post('input_nama');
		$tujuan = $this->input->post('input_tujuan');
		$pesan = "";
		if (!empty($id) || !empty($nama) || !empty($tujuan)) {
				$this->db->query('INSERT INTO aktifitas (id_tamu, tujuan, aksi, time) values ('.$id.', "'.$tujuan.'", "masuk", now())');
			
				$pesan = "Data berhasil dicatat.";
		}else{
			$pesan = "<font color='red'>Data belum lengkap.</font>";
		}
		return $pesan;
	}

	function insertTamu(){
		$id = $this->input->post('idtamu');
		$nama = $this->input->post('nama');
		$this->db->query('INSERT INTO tamu (id_tamu, nama) values ('.$id.', "'.$nama.'")');
		return 'Data berhasil di-inputkan.';
	}
}
?>