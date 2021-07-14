<?php

defined('BASEPATH') or exit('No direct script access allowed');

class surat_model extends CI_Model
{
    public function hapus_suratKeluar($id)
    {
        $this->db->where('id_suratKeluar', $id);
        $this->db->delete('surat_keluar');
        // return $this->db->table($this->surat_keluar)->delete(['id_suratKeluar' => $id]);
    }

    public function hapus_suratMasuk($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('surat_masuk');
        // return $this->db->table($this->surat_keluar)->delete(['id_suratKeluar' => $id]);
    }

    public function ambil_id_surat($id)
    {
        return $this->db->get_where('surat_masuk', ['id' => $id])->row_array();
    }

    public function getsuratByID($id)
    {
        return $this->db->get_where('surat_masuk', ['id' => $id])->row_array();
    }

    public function ubahdatasrt()
    {
        $data['no_surat'] = $this->input->post('no_surat');
        $data['tgl_suratMasuk'] = $this->input->post('tgl_suratMasuk');
        $data['pengirim'] = $this->input->post('pengirim');
        $data['penerima'] = $this->input->post('penerima');
        $data['perihal'] = $this->input->post('perihal');
        $data['disposisi'] = $this->input->post('disposisi');
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('surat_masuk', $data);
    }
}