<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_sandi');
	}

	public function index() {
		$data['jml_password'] 	= $this->M_sandi->total_rows();
		$data['jml_ditolak'] 	= $this->M_sandi->total_rows_tolak();
		$data['jml_nodata'] 		= $this->M_sandi->total_rows_no();
		$data['userdata'] 		= $this->userdata;

		$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
		
		$posisi 				= $this->M_sandi->select_all_status();
		$index = 0;
		foreach ($posisi as $value) {
		    $color = '#' .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)];

			$pegawai_by_posisi = $this->M_sandi->select_by_posisi($value->id_sts);

			@$data_status[$index]['value'] = $pegawai_by_posisi->jml;
			@$data_status[$index]['color'] = $color;
			@$data_status[$index]['highlight'] = $color;
			@$data_status[$index]['label'] = $value->status;
			
			$index++;
		}

		$kota 				= $this->M_sandi->select_all_asal();
		$index = 0;
		foreach ($kota as $value) {
		    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];

			$pegawai_by_kota = $this->M_sandi->select_by_kota($value->kd_unit);

			@$data_asal[$index]['value'] = $pegawai_by_kota->jml;
			@$data_asal[$index]['color'] = $color;
			@$data_asal[$index]['highlight'] = $color;
			@$data_asal[$index]['label'] = $value->unit;
			
			$index++;
		}

		$data['data_status'] = json_encode($data_status);
		$data['data_asal'] = json_encode($data_asal);
		
		

		$data['page'] 			= "home";
		$data['judul'] 			= "Beranda";
		$data['deskripsi'] 		= "Dokumentasi Layanan Permintaan Data";
		$this->template->views('home', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */