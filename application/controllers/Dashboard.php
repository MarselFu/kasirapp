<?php
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') != true) {
			$url = base_url('login.js');
			redirect($url);
		};
		$this->load->model(['M_data']);
	}
	function index()
	{
		$x['barang'] = $this->db->query("SELECT COUNT(barang_id) AS barang FROM tbl_barang")->row();
		$x['kategori'] = $this->db->query("SELECT COUNT(kategori_id) AS kategori FROM tbl_kategori_barang")->row();
		$x['penjualan'] = $this->db->query("SELECT COUNT(transaksi_id) AS penjualan FROM tbl_transaksi")->row();
		$x['user'] = $this->db->query("SELECT COUNT(operator_id) AS user FROM tbl_user")->row();

		$this->load->view('v_dashboard',$x);
	}
}