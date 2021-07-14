<?php

defined('BASEPATH') or exit('No direct script access allowed');

class surat_model extends CI_Model
{
    public function tampil_data($table){
        return $this->db->get($table);
    }

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

<<<<<<< Updated upstream
=======
<<<<<<< HEAD
    public function hapus_disposisi($id_disposisi)
    {
        $this->db->where('id_disposisi', $id_disposisi);
        $this->db->delete('disposisi');
        // return $this->db->table($this->surat_keluar)->delete(['id_suratKeluar' => $id]);
    }

    public function edit_disposisi($id_disposisi)
    {
        $data = [
            'surat_dari' => $this->input->post('surat_dari', true),
            'tgl_surat' => $this->input->post('tgl_surat', true ),
            'no_surat' => $this->input->post('no_surat', true ),
            'diterima_tgl' => $this->input->post('diterima_tgl', true),
            'no_agenda' => $this->input->post('no_agenda', true),
            'perihal' => $this->input->post('perihal', true),
            'diteruskan_kepada' => $this->input->post('diteruskan_kepada', true),
            'isi_disposisi' => $this->input->post('isi_disposisi', true) 
        ];

        $this->db->where('id_disposisi', $this->input->post($id_disposisi));
        $this->db->update('disposisi', $data);
    }

    public function ambil_id_disposisi($id_disposisi){
        $result = $this->db->where('id_disposisi', $id_disposisi)->get('disposisi');
        if($result->num_rows()> 0 ) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
=======
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
}
=======
}
>>>>>>> 1658b8bae499f4458d428db1ad5cdc2681413cf2
>>>>>>> Stashed changes
