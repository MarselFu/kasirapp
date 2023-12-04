<?php
defined('BASEPATH') or exit('No dirext script access allowed');
class M_data extends CI_Model
{

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function get_data($table)
    {
        return $this->db->get($table);
    }
    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function pengguna_dashbord()
    {
        $id_admin = $this->session->userdata('kode_pt');
        $hsl = $this->db->query("SELECT * FROM users WHERE id='$id_admin'");
        return $hsl;
    }


    public function cekadmin($username, $password)
    {
        $hasil = $this->db->query("SELECT * FROM tbl_user WHERE username='$username' AND password=md5('$password')");
        return $hasil;
    }


    function getdata_user()
    {
        $query = $this->db->query("SELECT a.*,b.*
        FROM `users` AS a
        LEFT JOIN `roles` AS b ON a.id_role=b.`id_role`
    
         ORDER BY a.`id_user` DESC");
        return $query;
    }



    function tampil_data_transaksi()
    {
        $query = $this->db->query("SELECT
  b.barang_id,
  b.nama_barang,
  b.harga,
  kb.nama_kategori
FROM
 `tbl_barang` AS b,
  `tbl_kategori_barang` AS kb
WHERE b.kategori_id = kb.kategori_id");
        return $query;
    }

    function tampilkan_detail_transaksi()
    {
        $query = $this->db->query("SELECT
  td.t_detail_id,
  td.qty,
  td.harga,
  b.nama_barang
FROM
  `tbl_transaksi_detail` AS td,
  `tbl_barang` AS b
WHERE b.barang_id = td.barang_id
  AND td.status = '0'");
        return $query;
    }

      function selesai_belanja($data)
    {
        $this->db->insert('tbl_transaksi',$data);
        $last_id=  $this->db->query("select transaksi_id from tbl_transaksi order by transaksi_id desc")->row_array();
        $this->db->query("update tbl_transaksi_detail set transaksi_id='".$last_id['transaksi_id']."' where status='0'");
        $this->db->query("update tbl_transaksi_detail set status='1' where status='0'");
    }

        function hapusitem($id)
    {
        $this->db->where('t_detail_id', $id);
        $this->db->delete('tbl_transaksi_detail');
    }
   
}