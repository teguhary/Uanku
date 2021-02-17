<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Uanku Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->login();
        }
    }

    private function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email']
                ];
                $this->session->set_userdata($data);
                redirect('utama');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">
                Password salah
                </div>'
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">
            E-mail tidak terdaftar
            </div>'
            );
            redirect('auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[user.email]',
            array(
                'required' => 'Field tidak boleh kosong',
                'valid_email' => 'Field Email tidak valid',
                'is_unique' => 'Email yang digunakan telah terdaftar'
            )
        );
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', array('required' => 'Field tidak boleh kosong',));
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[3]|matches[password1]',
            array(
                'required' => 'Field tidak boleh kosong',
                'min_length' => '{field} Harus lebih dari {param} karakter.',
                'matches' => 'Password tidak sama dengan re-password'
            )
        );
        $this->form_validation->set_rules('password1', 'Re-Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'email' => htmlspecialchars($this->input->post('email')),
                'nama' => htmlspecialchars($this->input->post('nama')),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            Selamat akun berhasil dibuat.
            </div>'
            );
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
        Anda telah logout
        </div>'
        );
        redirect('auth');
    }
}
