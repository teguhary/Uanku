<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabungan extends CI_Controller
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

        $senin = date('Y-m-d', strtotime('monday this week'));
        $selasa = date('Y-m-d', strtotime('tuesday this week'));
        $rabu = date('Y-m-d', strtotime('wednesday this week'));
        $kamis = date('Y-m-d', strtotime('thursday this week'));
        $jumat = date('Y-m-d', strtotime('friday this week'));
        $sabtu = date('Y-m-d', strtotime('saturday this week'));
        $minggu = date('Y-m-d', strtotime('sunday this week'));

        $query = $this->db->query("SELECT sum(nominal) AS perminggu FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and tanggal between '$senin' and '$minggu'");
        $data['iperhari'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS perminggu FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and tanggal between '$senin' and '$minggu'");
        $data['operhari'] = $query->row_array();
        $masuk = $data['iperhari']['perminggu'];
        if (empty($data['iperhari']['perminggu']) and empty($data['operhari']['perminggu'])) {
            $data['pesan'] = '<div class="alert alert-info" role="alert">
                Tidak ada data perhari minggu ini.
                </div>';
        } else {
            $data['pesan'] = '';
        }



        $query = $this->db->query("SELECT sum(nominal) AS senin FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and tanggal='$senin'");
        $data['isenin'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS selasa FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and tanggal='$selasa'");
        $data['iselasa'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS rabu FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and tanggal='$rabu'");
        $data['irabu'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS kamis FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and tanggal='$kamis'");
        $data['ikamis'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS jumat FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and tanggal='$jumat'");
        $data['ijumat'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS sabtu FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and tanggal='$sabtu'");
        $data['isabtu'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS minggu FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and tanggal='$minggu'");
        $data['iminggu'] = $query->row_array();

        $query = $this->db->query("SELECT sum(nominal) AS senin FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and tanggal='$senin'");
        $data['osenin'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS selasa FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and tanggal='$selasa'");
        $data['oselasa'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS rabu FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and tanggal='$rabu'");
        $data['orabu'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS kamis FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and tanggal='$kamis'");
        $data['okamis'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS jumat FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and tanggal='$jumat'");
        $data['ojumat'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS sabtu FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and tanggal='$sabtu'");
        $data['osabtu'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS minggu FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and tanggal='$minggu'");
        $data['ominggu'] = $query->row_array();


        $data['title'] = 'Tabungan';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('grafik/harian');
        $this->load->view('templates/footer');
    }

    public function bulanan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $data['user']['id'];
        $query = $this->db->query("SELECT sum(nominal) AS total FROM transaksi WHERE tipe='pengeluaran' and id_user='$id'");
        $data['pengeluaran'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS total FROM transaksi WHERE tipe='pemasukan' and id_user='$id'");
        $data['pemasukan'] = $query->row_array();

        $thn = date('Y');
        $query = $this->db->query("SELECT sum(nominal) AS perbulan FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and year(tanggal)='$thn'");
        $data['iperbulan'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS perbulan FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and year(tanggal)='$thn'");
        $data['operbulan'] = $query->row_array();

        if (empty($data['iperbulan']['perbulan']) and empty($data['operbulan']['perbulan'])) {
            $data['pesan'] = '<div class="alert alert-info" role="alert">
            Tidak ada data perbulan tahun ini.
            </div>';
        } else {
            $data['pesan'] = null;
        }


        $query = $this->db->query("SELECT sum(nominal) AS bulan1 FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and month(tanggal)='1' and year(tanggal)='$thn'");
        $data['ibulan1'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan2 FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and month(tanggal)='2' and year(tanggal)='$thn'");
        $data['ibulan2'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan3 FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and month(tanggal)='3' and year(tanggal)='$thn'");
        $data['ibulan3'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan4 FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and month(tanggal)='4' and year(tanggal)='$thn'");
        $data['ibulan4'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan5 FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and month(tanggal)='5' and year(tanggal)='$thn'");
        $data['ibulan5'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan6 FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and month(tanggal)='6' and year(tanggal)='$thn'");
        $data['ibulan6'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan7 FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and month(tanggal)='7' and year(tanggal)='$thn'");
        $data['ibulan7'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan8 FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and month(tanggal)='8' and year(tanggal)='$thn'");
        $data['ibulan8'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan9 FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and month(tanggal)='9' and year(tanggal)='$thn'");
        $data['ibulan9'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan10 FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and month(tanggal)='10' and year(tanggal)='$thn'");
        $data['ibulan10'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan11 FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and month(tanggal)='11' and year(tanggal)='$thn'");
        $data['ibulan11'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan12 FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and month(tanggal)='12' and year(tanggal)='$thn'");
        $data['ibulan12'] = $query->row_array();

        $query = $this->db->query("SELECT sum(nominal) AS bulan1 FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and month(tanggal)='1' and year(tanggal)='$thn'");
        $data['obulan1'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan2 FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and month(tanggal)='2' and year(tanggal)='$thn'");
        $data['obulan2'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan3 FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and month(tanggal)='3' and year(tanggal)='$thn'");
        $data['obulan3'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan4 FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and month(tanggal)='4' and year(tanggal)='$thn'");
        $data['obulan4'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan5 FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and month(tanggal)='5' and year(tanggal)='$thn'");
        $data['obulan5'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan6 FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and month(tanggal)='6' and year(tanggal)='$thn'");
        $data['obulan6'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan7 FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and month(tanggal)='7' and year(tanggal)='$thn'");
        $data['obulan7'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan8 FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and month(tanggal)='8' and year(tanggal)='$thn'");
        $data['obulan8'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan9 FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and month(tanggal)='9' and year(tanggal)='$thn'");
        $data['obulan9'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan10 FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and month(tanggal)='10' and year(tanggal)='$thn'");
        $data['obulan10'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan11 FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and month(tanggal)='11' and year(tanggal)='$thn'");
        $data['obulan11'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS bulan12 FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and month(tanggal)='12' and year(tanggal)='$thn'");
        $data['obulan12'] = $query->row_array();

        $data['title'] = 'Tabungan';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('grafik/bulanan');
        $this->load->view('templates/footer');
    }
    public function tahunan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $data['user']['id'];
        $query = $this->db->query("SELECT sum(nominal) AS total FROM transaksi WHERE tipe='pengeluaran' and id_user='$id'");
        $data['pengeluaran'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS total FROM transaksi WHERE tipe='pemasukan' and id_user='$id'");
        $data['pemasukan'] = $query->row_array();

        $data['beforelastyear'] = date('Y', strtotime('-2 year'));
        $data['lastyear'] = date('Y', strtotime('-1 year'));
        $data['thisyear'] = date('Y');
        $data['nextyear'] = date('Y', strtotime('+1 year'));

        $tahun1 = $data['beforelastyear'];
        $tahun2 = $data['lastyear'];
        $tahun3 = $data['thisyear'];

        $query = $this->db->query("SELECT sum(nominal) AS pertahun FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and year(tanggal) between $tahun1 and $tahun3");
        $data['ipertahun'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS pertahun FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and year(tanggal) between $tahun1 and $tahun3");
        $data['opertahun'] = $query->row_array();


        if (empty($data['ipertahun']['pertahun']) and empty($data['opertahun']['pertahun'])) {
            $data['pesan'] = '<div class="alert alert-info" role="alert">
            Tidak ada data.
            </div>';
        } else {
            $data['pesan'] = null;
        }

        $query = $this->db->query("SELECT sum(nominal) AS beforelastyear FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and year(tanggal)='$tahun1'");
        $data['ibeforelastyear'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS lastyear FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and year(tanggal)='$tahun2'");
        $data['ilastyear'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS thisyear FROM transaksi WHERE tipe='pemasukan' and id_user='$id' and year(tanggal)='$tahun3'");
        $data['ithisyear'] = $query->row_array();

        $query = $this->db->query("SELECT sum(nominal) AS beforelastyear FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and year(tanggal)='$tahun1'");
        $data['obeforelastyear'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS lastyear FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and year(tanggal)='$tahun2'");
        $data['olastyear'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS thisyear FROM transaksi WHERE tipe='pengeluaran' and id_user='$id' and year(tanggal)='$tahun3'");
        $data['othisyear'] = $query->row_array();




        $data['title'] = 'Tabungan';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('grafik/tahunan');
        $this->load->view('templates/footer');
    }
}
