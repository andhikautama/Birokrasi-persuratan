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

    public function proses_edit_data()
    {
        $data = [
            "no_surat" => $this->input->post('no_surat', true),
            "tgl_suratMasuk" => $this->input->post('tgl_suratMasuk', true),
            "pengirim" => $this->input->post('pengirim', true),
            "penerima" => $this->input->post('penerima', true),
            "perihal" => $this->input->post('perihal', true),
            "disposisi" => $this->input->post('disposisi')
        ];

        $this->db->where('$id', $this->input->post('id')); 
        $this->db->update('surat_masuk', $data); 
    }
}