<?php
class Transaksi extends CI_Controller
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
           $x['data'] = $this->M_data->tampil_data_transaksi();
           $x['detail'] = $this->M_data->tampilkan_detail_transaksi();
             $x['barang'] = $this->M_data->get_data('tbl_barang');
        $this->load->view('v_transaksi', $x);
    }

    public function save()
    {
        $tanggal = $this->input->post('xtanggal', TRUE);
        $operator = $this->input->post('xoperator', TRUE);
        $idbarang = $this->input->post('xbarang', TRUE);
        $jumlah = $this->input->post('xjumlah', TRUE);
        $barang = $this->db->get_where('tbl_barang',array('barang_id'=>$idbarang))->row_array();

        $data = [
            "barang_id" => $idbarang,
            "qty" => $jumlah,
            "harga" => $barang['harga'],
            "status" => '0',
        ];
        echo $this->session->set_flashdata('message', 'success');
        $this->M_data->insert_data($data, 'tbl_transaksi_detail');
        redirect('transaksi.js');
    }

        function selesai_belanja()
    {
        $tanggal=date('Y-m-d');
        $user=  $this->session->userdata('idadmin');
        $data=array('operator_id'=>$user,'tanggal_transaksi'=>$tanggal);
        $this->M_data->selesai_belanja($data);
          echo $this->session->set_flashdata('message', 'info');
        redirect('transaksi.js');
    }

   
     function hapusitem()
    {
        $id=  $this->uri->segment(3);
        $this->M_data->hapusitem($id);
   echo $this->session->set_flashdata('message', 'warning');
        redirect('transaksi.js');
    }
}