<?php
class Kategori extends CI_Controller
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
        $x['data'] = $this->M_data->get_data('tbl_kategori_barang');
        $this->load->view('v_kategori_barang', $x);
    }

    public function save()
    {
        $judul = strip_tags(htmlspecialchars($this->input->post('xjudul', TRUE), ENT_QUOTES));
        $data = [
            "nama_kategori" => $judul,
        ];
        echo $this->session->set_flashdata('message', 'success');
        $this->M_data->insert_data($data, 'tbl_kategori_barang');
        redirect('kategori-barang.js');
    }

    function update()
    {

        $id = $this->input->post('kode');
        $judul = strip_tags(htmlspecialchars($this->input->post('xjudul', TRUE), ENT_QUOTES));

        $where = array('kategori_id' => $id);
        $data = array(
            "nama_kategori" => $judul,
        );
        echo $this->session->set_flashdata('message', 'info');
        $this->M_data->update_data($where, $data, 'tbl_kategori_barang');
        redirect('kategori-barang.js');
    }

    function hapus()
    {
        $kode = $this->input->post('xkode');
        $this->db->query("DELETE FROM tbl_kategori_barang where kategori_id='$kode'");
        echo $this->session->set_flashdata('message', 'warning');
        redirect('kategori-barang.js');
    }
}