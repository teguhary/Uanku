<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
        $query = $this->db->query("SELECT sum(nominal) AS total FROM transaksi WHERE tipe='pengeluaran'  and id_user='$id'");
        $data['pengeluaran'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS total FROM transaksi WHERE tipe='pemasukan'  and id_user='$id'");
        $data['pemasukan'] = $query->row_array();

        $this->form_validation->set_rules(
            'nominal',
            'Nominal',
            'required|trim|numeric',
            array(
                'required' => 'Field tidak boleh kosong',
                'numeric' => 'Field hanya bisa di isi angka'
            )
        );
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', array('required' => 'Field tidak boleh kosong'));
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim', array('required' => 'Field tidak boleh kosong'));

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pencatatan pemasukan';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('form/pemasukan');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nominal' => htmlspecialchars($this->input->post('nominal')),
                'keterangan' => htmlspecialchars($this->input->post('keterangan')),
                'kategori' => htmlspecialchars($this->input->post('kategori')),
                'tanggal' => htmlspecialchars($this->input->post('tanggal')),
                'tipe' => 'pemasukan',
                'id_user' => $data['user']['id'],
            ];
            $this->db->insert('transaksi', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            Penambahaan pemasukan berhasil.
            </div>'
            );
            redirect('transaksi');
        }
    }
    public function pengeluaran()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $data['user']['id'];
        $query = $this->db->query("SELECT sum(nominal) AS total FROM transaksi WHERE tipe='pengeluaran'  and id_user='$id'");
        $data['pengeluaran'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS total FROM transaksi WHERE tipe='pemasukan'  and id_user='$id'");
        $data['pemasukan'] = $query->row_array();

        $this->form_validation->set_rules(
            'nominal',
            'Nominal',
            'required|trim|numeric',
            array(
                'required' => 'Field tidak boleh kosong',
                'numeric' => 'Field hanya bisa di isi angka'
            )
        );
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', array('required' => 'Field tidak boleh kosong'));
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim', array('required' => 'Field tidak boleh kosong'));

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pencatatan pengeluaran';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('form/pengeluaran');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nominal' => htmlspecialchars($this->input->post('nominal')),
                'keterangan' => htmlspecialchars($this->input->post('keterangan')),
                'kategori' => htmlspecialchars($this->input->post('kategori')),
                'tanggal' => htmlspecialchars($this->input->post('tanggal')),
                'tipe' => 'pengeluaran',
                'id_user' => $data['user']['id'],
            ];
            $this->db->insert('transaksi', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            Penambahaan pengeluaran berhasil.
            </div>'
            );
            redirect('transaksi/pengeluaran');
        }
    }
}
