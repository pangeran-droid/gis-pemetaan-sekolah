<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;

class Auth extends BaseController
{
    protected $ModelAuth;

    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
    }

    public function Register()
    {
        $data = [ 
            'judul' => 'Register',
        ];
        return view('v_register', $data);
    }

    public function SaveRegister()
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama Lengkap', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!',
                    'valid_email' => 'Format {field} tidak valid',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!',
                    'min_length' => '{field} minimal 6 karakter'
                ]
            ],
            // 'foto' => [
            //     'label' => 'Foto',
            //     'rules' => 'max_size[foto,1024]|is_image[foto]',
            //     'errors' => [
            //         'max_size' => '{field} maksimal 1MB',
            //         'is_image' => '{field} harus berupa gambar'
            //     ]
            // ]
        ])) {
            $fileFoto = $this->request->getFile('foto');

            if ($fileFoto && $fileFoto->getError() == 0) {
                $namaFoto = $fileFoto->getRandomName();
                $fileFoto->move('foto', $namaFoto);
            } else {
                $namaFoto = 'default.png';
            }

            $this->ModelAuth->InsertUser([
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => sha1($this->request->getPost('password')),
                'foto' => $namaFoto
            ]);

            session()->setFlashdata('pesan_sukses', 'Berhasil register, silahkan login!');
            return redirect()->to('Auth/Login');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Auth/Register')->withInput();
        }
    }

    public function Login()
    {
        $data = [
            'judul' => 'Login',
        ];
        return view('v_login', $data);
    }

    public function CekLogin()
    {
        if ($this->validate([
                'email' => [
                    'label' => 'E-Mail', 
                    'rules' => 'required', 
                    'errors' => [
                        'required' => '{field} Wajib Diisi !!'
                    ]
                ],
                'password' => [
                    'label' => 'Password', 
                    'rules' => 'required', 
                    'errors' => [
                        'required' => '{field} Wajib Diisi !!'
                    ]
                ],
        ])) {
            // Jika login berhasil
            $email = $this->request->getPost('email');
            $password = sha1($this->request->getPost('password'));
            $CekLogin = $this->ModelAuth->Login($email, $password);
            if ($CekLogin) {
                session()->set('nama_user', $CekLogin['nama_user']);
                session()->set('foto', $CekLogin['foto']);
                session()->set('login', 1);
                return redirect()->to('Admin');
            } else {
                session()->setFlashdata('pesan', 'Email atau Password salah');
                return redirect()->to('Auth/Login');
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Auth/Login')->withInput();
        }
    }

    public function LogOut()
    {
        session()->remove('nama_user');
        session()->remove('foto');
        session()->remove('login');
        session()->setFlashdata('logout', 'Anda berhasil Log Out');
        return redirect()->to('Auth/Login');
    }
}
