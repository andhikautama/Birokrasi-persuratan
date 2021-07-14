<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_surat extends CI_Model
{

    public function hapus_suratMasuk($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('surat_masuk');
        // return $this->db->table($this->surat_keluar)->delete(['id_suratKeluar' => $id]);
    }

    public function detail($id)
    {
        $data['title']='Detail Surat Masuk';
        $data['user']=$this->model_surat->getsuratmasukByID($id);
        $this->load->view('template/header', $data);
        $this->load->view('mahasiswa/detail', $data);
        $this->load->view('template/footer');
    }

    public function hapus_suratKeluar($id)
    {
        $this->db->where('id_suratKeluar', $id);
        $this->db->delete('surat_keluar');
        // return $this->db->table($this->surat_keluar)->delete(['id_suratKeluar' => $id]);
    }

    
}