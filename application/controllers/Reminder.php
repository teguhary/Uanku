<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reminder extends CI_Controller
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

        $query = $this->db->query("SELECT * FROM reminder WHERE id_user='$id'");
        $data['reminder'] = $query->row_array();

        $reminder = $data['reminder'];


        $this->form_validation->set_rules(
            'nominal',
            'Nominal',
            'required|trim|numeric',
            array(
                'required' => 'Field tidak boleh kosong',
                'numeric' => 'Field hanya bisa di isi angka'
            )
        );
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim', array('required' => 'Field tidak boleh kosong'));
        $this->form_validation->set_rules('tanggal1', 'Tanggal', 'required|trim', array('required' => 'Field tidak boleh kosong'));

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Setting Reminder';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('form/reminder', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nominal' => htmlspecialchars($this->input->post('nominal')),
                'tgl_awal' => htmlspecialchars($this->input->post('tanggal')),
                'tgl_akhir' => htmlspecialchars($this->input->post('tanggal1')),
                'id_user' => $data['user']['id'],
            ];
            if (empty($reminder)) {
                $this->db->insert('reminder', $data);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">
                    Setting reminder berhasil.
                    </div>'
                );
                redirect('reminder');
            } else {
                $this->db->where('id', $reminder['id']);
                $this->db->update('reminder', $data);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">
                    Setting reminder berhasil diubah.
                    </div>'
                );
                redirect('reminder');
            }
        }
    }
    public function hapus()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $data['user']['id'];
        $query = $this->db->query("SELECT sum(nominal) AS total FROM transaksi WHERE tipe='pengeluaran'  and id_user='$id'");
        $data['pengeluaran'] = $query->row_array();
        $query = $this->db->query("SELECT sum(nominal) AS total FROM transaksi WHERE tipe='pemasukan'  and id_user='$id'");
        $data['pemasukan'] = $query->row_array();

        $this->db->where('id_user', $id);
        $this->db->delete('reminder');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">
            Setting reminder berhasil dihapus.
            </div>'
        );
        redirect('reminder');
    }
}
