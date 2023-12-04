<?php
class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != true) {
            $url = base_url('login.js');
            redirect($url);
        };
        $this->load->model('M_data');
        $this->load->helper('date_helper');
    }
    function index()
    {
        $x['data'] = $this->db->query("SELECT
c.`tanggal_transaksi`,
b.`nama_barang`,
b.`harga`,
a.`qty`,
d.`nama_lengkap`

FROM `tbl_transaksi_detail` AS a
LEFT JOIN `tbl_barang` AS b ON a.`barang_id`=b.`barang_id`
LEFT JOIN `tbl_transaksi` AS c ON a.`transaksi_id`=c.`transaksi_id`
LEFT JOIN `tbl_user` AS d ON c.`operator_id`=d.`operator_id`
");
        $this->load->view('v_laporan', $x);
    }

    function cetak_pdf()
    {
    
        $data = array(
            'title' => 'LAPORAN PENJUALAN ',
            'hasil' => $this->db->query("SELECT
c.`tanggal_transaksi`,
b.`nama_barang`,
b.`harga`,
a.`qty`,
d.`nama_lengkap`

FROM `tbl_transaksi_detail` AS a
LEFT JOIN `tbl_barang` AS b ON a.`barang_id`=b.`barang_id`
LEFT JOIN `tbl_transaksi` AS c ON a.`transaksi_id`=c.`transaksi_id`
LEFT JOIN `tbl_user` AS d ON c.`operator_id`=d.`operator_id`")->result()
        );
        $this->load->view('pdf/v_lapaoran_penjualan_pdf', $data);
    }

    function cetak_excel()
    {
       
        $data = array(
            'title' => 'LAPORAN PENJUALAN',
            'hasil' => $this->db->query("SELECT
c.`tanggal_transaksi`,
b.`nama_barang`,
b.`harga`,
a.`qty`,
d.`nama_lengkap`

FROM `tbl_transaksi_detail` AS a
LEFT JOIN `tbl_barang` AS b ON a.`barang_id`=b.`barang_id`
LEFT JOIN `tbl_transaksi` AS c ON a.`transaksi_id`=c.`transaksi_id`
LEFT JOIN `tbl_user` AS d ON c.`operator_id`=d.`operator_id`")->result()
        );
        $this->load->view('excel/v_lapaoran_penjualan', $data);
    }

    
}