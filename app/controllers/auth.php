<?php

class auth extends Controller
{
    public function __construct()
    {
        session_start();
        if(isset($_SESSION['login'])){$this->route('index');}
    }

    public function register()
    {
        if(isset($_POST['email']) && isset($_POST['password'])){
            if($this->model('UserModel')->cek() != null){
                $data['type'] = 'danger';
                $data['desc'] = 'Email / telepon sudah terdaftar.';
                $this->view('auth/register', $data);
                exit();
            }
            $data = [
                'nama_lengkap'  => $_POST['nama_lengkap'],
                'email'         => $_POST['email'],
                'password'      => $_POST['password'],
                'telepon'       => $_POST['telepon'],
                'level'         => $_POST['level']
            ];
            $this->model('UserModel')->register($data);
            $this->login();
        }
        $this->view('auth/register');
    }

    public function login()
    {
        if(isset($_POST['email']) && isset($_POST['password'])){
            $data = $this->model('UserModel')->login();
            if ($data) {
                if($data['status'] == 0)
                {
                    session_destroy();
                    $data['type'] = 'info';
                    $data['desc'] = 'Akun anda sedang dicek admin, mohon cek berkala untuk melihat apakah akun anda sudah bisa dipakai. Terimakasih';
                    $this->view('auth/login', $data);
                }
                else if ($data['status'] == -1)
                {
                    session_destroy();
                    $data['type'] = 'danger';
                    $data['desc'] = 'Akun anda diban sementara! Akun anda diduga melakukan beberapa pelanggaran Syarat dan Ketentuan website.';
                    $this->view('auth/login', $data);
                }else{
                    $_SESSION['login']          = TRUE;
                    $_SESSION['id']             = $data['id'];
                    $_SESSION['email']          = $data['email'];
                    $_SESSION['level']          = $data['level'];
                    $_SESSION['nama_lengkap']   = $data['nama_lengkap'];
                    $_SESSION['foto']           = $data['foto'];
                    $_SESSION['status']         = $data['status'];

                    if(!isset($_POST['remember'])){
                        setcookie('login', $data['nama_lengkap'], time() - 60);
                    }
                    header('location: '.BASEURL.'/index');
                }
            }
            else
            {
                session_destroy();
                $data['type'] = 'danger';
                $data['desc'] = 'Email tidak ditemukan atau kata sandi yang ada masukkan salah.';
                $this->view('auth/login', $data);
            }
        }
        $this->view('auth/login');
    }

    public function lupa_sandi()
    {
        $this->view('auth/lupa_sandi');
    }
}
