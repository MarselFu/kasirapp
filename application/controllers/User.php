<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_data');
    }
    function index()
    {

        if ($this->session->userdata('username') != '') {
            echo "<script>window.location='" . base_url('dashboard.js') . "';</script>";
        }
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username Harus diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('v_login');
        } else {
            $this->auth();
        }
    }

     function auth()
    {
        $username = strip_tags(str_replace("'", "", $this->input->post('username', true)));
        $password = strip_tags(str_replace("'", "", $this->input->post('password', true)));
        $cadmin = $this->M_data->cekadmin($username, $password);
        if ($cadmin->num_rows() > 0) {
            $xcadmin = $cadmin->row_array();
            $newdata = array(
                'idadmin' => $xcadmin['operator_id'],
                'username' => $xcadmin['nama_lengkap'],
                'nama' => $xcadmin['username'],
                'level' => $xcadmin['akses'],
                'logged_in' => true
            );

            $this->session->set_userdata($newdata);
            redirect('dashboard');
        } else {
            echo $this->session->set_flashdata('message', 'error');
            redirect('login.js');
        }
    }

 function datauser()
    {

           $x['data'] = $this->M_data->get_data('tbl_user');
        $this->load->view('v_user', $x);
    }
    function gagallogin()
    {
        echo $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Username Atau Password Salah</div>');
        redirect('login.js');
    }


    function save()
    {

        $username = $this->input->post('xusername', true);
        $nama = $this->input->post('xnama', true);
        $pass = $this->input->post('xpassword', true);
        $status = $this->input->post('xstatus', true);
        $tgl = date('Y-m-d');
        $data = [
            "nama_lengkap" => $nama,
            "username" => $username,
            "password" => md5($pass),
            "akses" => $status,
            "last_login" => $tgl,
        ];
        echo $this->session->set_flashdata('message', 'success');
        $this->M_data->insert_data($data, 'tbl_user');
        redirect('data-user.js');
    }

    function update()
    {
        $id = $this->input->post('kode', true);
        $nama = $this->input->post('xnama', true);
        $username = $this->input->post('xusername', true);
        $pass = $this->input->post('xpassword', true);
        $status = $this->input->post('xstatus', true);
        $tgl = date('Y-m-d');
        $where = array('operator_id' => $id);
        $data = array(
            "nama_lengkap" => $nama,
            "username" => $username,
            "password" => md5($pass),
            "akses" => $status,
            "last_login" => $tgl,
        );
        echo $this->session->set_flashdata('message', 'info');
        $this->M_data->update_data($where, $data, 'tbl_user');
        redirect('data-user.js');
    }

    function resetpass()
    {
        $kode = $this->input->post('xkode');
        // $password_user = $nidn;
        $password_user = 'admin';
        $pass_64 = base64_encode($password_user);
        $pass_md5 = md5($password_user);
        $where = array('operator_id' => $kode);
        $data = array(
            'password' => $pass_md5,
        );
        echo $this->session->set_flashdata('message', 'info');
        $this->M_data->update_data($where, $data, 'tbl_user');
        redirect('data-user.js');
    }
  
  public function reset_password()
    {

        $iduser = $this->session->userdata('idadmin');
        $password = $this->input->post('xpassword');
        $konfirm_password = $this->input->post('xpassword1');
        if (empty($password) && empty($konfirm_password)) {
            $this->session->set_flashdata('message', 'error');
            redirect('dashboard.js');
        } elseif ($password != $konfirm_password) {
            $this->session->set_flashdata('message', 'error');
            redirect('dashboard.js');
        } else {
            $data = array(
                'password' => md5($password),
            );
            $where = array('operator_id' => $iduser);
            $this->db->where($where);
            $this->db->update('tbl_user', $data);

            $this->session->set_flashdata('message', 'info');
            redirect('dashboard.js');
        }
    }
    
    function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata("pesan", "<div class='alert alert-success alert-message' role='alert'>Anda telah logout!!</div>");
        $url = base_url('login.js');
        redirect($url);
    }

    public function deleteuser()
    {
        $kode = $this->input->post('xkode');
        $this->db->query("DELETE FROM tbl_user where operator_id='$kode'");
        $this->session->set_flashdata('message', 'warning');
        redirect(base_url() . 'data-user.js');
    }

 
}