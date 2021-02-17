<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utama extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('rupiah_helper');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $data['user']['id'];
        $query = $this->db->query("SELECT sum(nominal) AS total FROM transaksi WHERE tipe='pengeluaran' and id_user='$id'");
        $data['pengeluaran'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS total FROM transaksi WHERE tipe='pemasukan' and id_user='$id'");
        $data['pemasukan'] = $query->row_array();

        $query = $this->db->query("SELECT * FROM reminder WHERE id_user='$id'");
        $data['reminder'] = $query->row_array();
        if (empty($data['reminder'])) {
            $data['pesanbudget'] = '';
        } else {
            $tgl_awal = $data['reminder']['tgl_awal'];
            $tgl_akhir = $data['reminder']['tgl_akhir'];
            $query = $this->db->query("SELECT sum(nominal) AS total FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and tanggal between '$tgl_awal' and '$tgl_akhir'");
            $data['budget'] = $query->row_array();
            var_dump($data['budget']);
            $total = $data['budget']['total'];
            $budget = $data['reminder']['nominal'];
            $budget = (float)$budget;
            $total = (float)$total;


            if ($total >= $budget) {
                $data['pesanbudget'] = '<div class="alert alert-danger" role="alert">
                Anda sudah melebihi budget maksimal.
                </div>';
            } else {
                $data['pesanbudget'] = '';
            }
        }


        $tgl = date('m');
        $thn = date('Y');

        $query = $this->db->query("SELECT sum(nominal) AS gaji FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and kategori='Gaji' and month(tanggal)='$tgl' and year(tanggal)='$thn'");
        $data['gaji'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS pemberian FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and kategori='Pemberian' and month(tanggal)='$tgl' and year(tanggal)='$thn'");
        $data['pemberian'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS penjualan FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and kategori='Penjualan' and month(tanggal)='$tgl' and year(tanggal)='$thn'");
        $data['penjualan'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS pemasukanbulanan FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and month(tanggal)='$tgl' and year(tanggal)='$thn'");
        $data['pemasukanbulanan'] = $query->row_array();
        if (empty($data['pemasukanbulanan'])) {
            $data['pesan'] = 'Data pemasukan tidak tersedia';
        } else {
            $data['pesan'] = null;
        }

        $query = $this->db->query("SELECT sum(nominal) AS makanan FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and kategori='Makanan' and month(tanggal)='$tgl' and year(tanggal)='$thn'");
        $data['makanan'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS tagihan FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and kategori='Tagihan' and month(tanggal)='$tgl' and year(tanggal)='$thn'");
        $data['tagihan'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS kebutuhan FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and kategori='Kebutuhan' and month(tanggal)='$tgl' and year(tanggal)='$thn'");
        $data['kebutuhan'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS keinginan FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and kategori='Keinginan' and month(tanggal)='$tgl' and year(tanggal)='$thn'");
        $data['keinginan'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS transportasi FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and kategori='Transportasi' and month(tanggal)='$tgl' and year(tanggal)='$thn'");
        $data['transportasi'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS pengeluaranbulanan FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and month(tanggal)='$tgl' and year(tanggal)='$thn'");
        $data['pengeluaranbulanan'] = $query->row_array();
        if (empty($data['pengeluaranbulanan'])) {
            $data['pesan'] = 'Data pengeluaran tidak tersedia';
        } else {
            $data['pesan'] = null;
        }



        $data['title'] = 'Uanku';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('utama/index');
        $this->load->view('templates/footer');
    }
}
