<?php

class Transaksi_model extends CI_model
{

    public function getTransaksiById($id)
    {
        return $this->db->get_where('transaksi', ['id' => $id])->row_array();
    }

    public function getTransaksi($limit, $start)
    {
    }
}
