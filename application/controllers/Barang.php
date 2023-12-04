<?php
class Barang extends CI_Controller
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
        $x['data'] = $this->db->query("SELECT tbl_barang.*,tbl_kategori_barang.* FROM tbl_barang 
        LEFT JOIN tbl_kategori_barang ON tbl_barang.kategori_id=tbl_kategori_barang.kategori_id
         order BY tbl_barang.barang_id desc ");
         $x['kat'] = $this->M_data->get_data('tbl_kategori_barang');
         $x['kate'] = $this->M_data->get_data('tbl_kategori_barang');
        $this->load->view('v_barang', $x);
    }

    public function save()
    {
        $judul = $this->input->post('xjudul', TRUE);
        $kategori = $this->input->post('xjenis', TRUE);
        $harga = $this->input->post('xharga', TRUE);
        $stock = $this->input->post('xstock', TRUE);
        $data = [
            "kategori_id" => $kategori,
            "nama_barang" => $judul,
            "harga" => $harga,
            "stock" => $stock,
        ];
        echo $this->session->set_flashdata('message', 'success');
        $this->M_data->insert_data($data, 'tbl_barang');
        redirect('barang.js');
    }

    function update()
    {

        $id = $this->input->post('kode');
        $judul = $this->input->post('xjudul', TRUE);
        $kategori = $this->input->post('xjenis', TRUE);
        $harga = $this->input->post('xharga', TRUE);
        $stock = $this->input->post('xstock', TRUE);

        $where = array('barang_id' => $id);
        $data = array(
            "kategori_id" => $kategori,
            "nama_barang" => $judul,
            "harga" => $harga,
            "stock" => $stock,
        );
        echo $this->session->set_flashdata('message', 'info');
        $this->M_data->update_data($where, $data, 'tbl_barang');
        redirect('barang.js');
    }

    function hapus()
    {
        $kode = $this->input->post('xkode');
        $this->db->query("DELETE FROM tbl_barang where barang_id='$kode'");
        echo $this->session->set_flashdata('message', 'warning');
        redirect('barang.js');
    }
}