<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Details extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('pagination');
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
        $tgl = date('m');
        $thn = date('Y');

        if ($this->input->post('bulantahun')) {
            $tgl1 = $this->input->post('bulantahun');
            $input = strtotime($tgl1);
            $tgl = date("m", $input);
            $thn = date("Y", $input);
        }

        $dateobj = DateTime::createFromFormat('!m', $tgl);
        $data['bulan'] = $dateobj->format('F');
        $data['tahun'] = $thn;

        $query = $this->db->query("SELECT * FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and month(tanggal)='$tgl' and year(tanggal)='$thn' order by tanggal");
        $data['dtlpemasukan'] = $query->result_array();
        $data['dtlpemasukan'] = $query->result_array();
        if (empty($data['dtlpemasukan'])) {
            $data['pesan'] = 'Data pemasukan tidak tersedia';
        } else {
            $data['pesan'] = null;
        }

        $query = $this->db->query("SELECT sum(nominal) AS gaji FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and kategori='Gaji' and month(tanggal)='$tgl' and year(tanggal)='$thn'");
        $data['gaji'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS pemberian FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and kategori='Pemberian' and month(tanggal)='$tgl' and year(tanggal)='$thn'");
        $data['pemberian'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS penjualan FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and kategori='Penjualan' and month(tanggal)='$tgl' and year(tanggal)='$thn'");
        $data['penjualan'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS pemasukanbulanan FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and month(tanggal)='$tgl' and year(tanggal)='$thn'");
        $data['pemasukanbulanan'] = $query->row_array();

        $data['title'] = 'Detail Pemasukan';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail/pemasukan');
        $this->load->view('templates/footer');
    }

    public function pengeluaran()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $data['user']['id'];
        $query = $this->db->query("SELECT sum(nominal) AS total FROM transaksi WHERE tipe='pengeluaran' and id_user='$id'");
        $data['pengeluaran'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS total FROM transaksi WHERE tipe='pemasukan' and id_user='$id'");
        $data['pemasukan'] = $query->row_array();
        $tgl = date('m');
        $thn = date('Y');

        if ($this->input->post('bulantahun')) {
            $tgl1 = $this->input->post('bulantahun');
            $input = strtotime($tgl1);
            $tgl = date("m", $input);
            $thn = date("Y", $input);
        }

        $dateobj = DateTime::createFromFormat('!m', $tgl);
        $data['bulan'] = $dateobj->format('F');
        $data['tahun'] = $thn;

        $query = $this->db->query("SELECT * FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and month(tanggal)='$tgl' and year(tanggal)='$thn' order by tanggal");
        $data['dtlpengeluaran'] = $query->result_array();
        if (empty($data['dtlpengeluaran'])) {
            $data['pesan'] = 'Data pengeluaran tidak tersedia';
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

        $data['title'] = 'Detail pengeluaran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail/pengeluaran');
        $this->load->view('templates/footer');
    }
}
