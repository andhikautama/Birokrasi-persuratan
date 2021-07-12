<?php

defined('BASEPATH') or exit('No direct script access allowed');

class surat_Masuk extends CI_Model
{
    public function getsurat_Masuk($table)
    {
        $data = $this->db->get($table);
        return $data->result_array();
    }
}
