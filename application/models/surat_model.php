<?php

defined('BASEPATH') or exit('No direct script access allowed');

class surat_model extends CI_Model
{
    public function tampil_data($table)
    {
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

    public function getsuratKeluarByID($id)
    {
        return $this->db->get_where('surat_keluar', ['id_suratKeluar' => $id])->row_array();
    }

    public function updateDataSuratKeluar()
    {
        $data['no_surat'] = $this->input->post('no_surat');
        $data['tgl_suratKeluar'] = $this->input->post('tgl_suratKeluar');
        $data['pengirim'] = $this->input->post('pengirim');
        $data['penerima'] = $this->input->post('penerima');
        $data['perihal'] = $this->input->post('perihal');
        $data['disposisi'] = $this->input->post('disposisi');
        $this->db->where('id_suratKeluar', $this->input->post('id_suratKeluar'));
        $this->db->update('surat_keluar', $data);
    }

    public function hapus_disposisi($id_disposisi)
    {
        $this->db->where('id_disposisi', $id_disposisi);
        $this->db->delete('disposisi');
        // return $this->db->table($this->surat_keluar)->delete(['id_suratKeluar' => $id]);
    }

    public function getDisposisiByID($id_disposisi)
    {
        return $this->db->get_where('disposisi', ['id_disposisi' => $id_disposisi])->row_array();
    }

    public function ubahDataDisposisi()
    {

        $data['surat_dari'] = $this->input->post('surat_dari');
        $data['tgl_surat'] = $this->input->post('tgl_surat');
        $data['no_surat'] = $this->input->post('no_surat');
        $data['diterima_tgl'] = $this->input->post('diterima_tgl');
        $data['no_agenda'] = $this->input->post('no_agenda');
        $data['perihal'] = $this->input->post('perihal');
        $data['diteruskan_kepada'] = $this->input->post('diteruskan_kepada');
        $data['isi_disposisi'] = $this->input->post('isi_disposisi');

        $this->db->where('id_disposisi', $this->input->post('id_disposisi'));
        $this->db->update('disposisi', $data);
    }

    public function ambil_id_disposisi($id_disposisi)
    {
        $result = $this->db->where('id_disposisi', $id_disposisi)->get('disposisi');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
