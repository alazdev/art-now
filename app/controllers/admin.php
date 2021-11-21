<?php

class admin extends Controller
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION['email']))
        {
            $this->route('auth/login');
        }
        else if ($_SESSION['level'] != 2) 
        {
            $this->controller('alert')->message('Forbidden', '403 | Forbidden');
            exit();
        }
    }
    
    public function index()
    {
        $data['total_user'] = count($this->model('UserModel')->semua_user());
        $data['total_pengguna'] = count($this->model('UserModel')->semua_user('0'));
        $data['total_arsitek'] = count($this->model('UserModel')->semua_user(1));
        $data['total_calon_arsitek'] = count($this->model('UserModel')->semua_user(-1));

        $start = $month = date('Y-m-d');
        $end = date('Y-m-d', strtotime('-12 month'));
        while($month > $end)
        {
            $data['nama_bulan'][] = date('M', strtotime($month));
            $data['tahun'][] = date('Y', strtotime($month));
            $month = date('Y-m-d', strtotime('-1 months', strtotime($month)));
        }
        $this->view('dasbor/admin/index', $data);
    }
    
    public function calon_arsitek()
    {
        $data['calon_arsiteks'] = $this->model('UserModel')->semua_calon_arsitek();
        $this->view('dasbor/admin/calon-arsitek/index', $data);
    }
    public function detail_calon_arsitek($id_user)
    {
        $data['calon_arsitek'] = $this->model('UserModel')->profile_arsitek($id_user);
        $data['produk'] = $this->model('ProdukModel')->calon_arsitek_produk($id_user);
        $this->view('dasbor/admin/calon-arsitek/detail', $data);
    }
    public function terima_calon_arsitek($id_user)
    {
        $this->model('ProdukModel')->update_status_byadmin($id_user, 0);
        $this->model('UserModel')->update_level_byadmin($id_user, 1);
        $this->route('admin/calon_arsitek');
    }
    public function tolak_calon_arsitek($id_user)
    {
        $this->model('ProdukModel')->update_status_byadmin($id_user, -1);
        $this->route('admin/calon_arsitek');
    }

    // CRUD Data Admin
    public function data_admin()
    {
        $data = [
            'admins' => $this->model('UserModel')->semua_admin()
        ];
        $this->view('dasbor/admin/admin/index', $data);
    }
    public function tambah_admin()
    {
        $data = [
            'nama_lengkap'  => $_POST['nama_lengkap'],
            'email'         => $_POST['email'],
            'password'      => $_POST['password'],
            'telepon'       => $_POST['telepon'],
            'level'         => 2
        ];
        $this->model('UserModel')->register($data);
        $this->alert('Admin berhasil ditambahkan.', 'admin/data_admin');
    }
    public function nonaktifkan_user($id_user)
    {
        $this->model('UserModel')->update_status_byadmin($id_user, 0);
        $this->alert('User berhasil dinonaktifkan.', null);
        echo "<script>window.location.href='".$_SERVER['HTTP_REFERER']."';</script>";
    }
    public function aktifkan_user($id_user)
    {
        $this->model('UserModel')->update_status_byadmin($id_user, 1);
        $this->alert('User berhasil diaktifkan.', null);
        echo "<script>window.location.href='".$_SERVER['HTTP_REFERER']."';</script>";
    }
    public function edit_admin($id_user)
    {
        if ($this->model('UserModel')->cek_user($id_user, 2) != null){
            $data = $this->model('UserModel')->cek_user($id_user, 2);
            $this->view('dasbor/admin/admin/edit', $data);
        } else {
            $this->controller('alert')->message('Not Found', '404 | Not Found');
        }
    }

    public function update_admin($id_user)
    {
        if($this->model('UserModel')->cek_user($id_user, 2) != null){
            if (isset($_POST['update']))
            {
                $data = [
                    'id_user'       => $id_user,
                    'nama_lengkap'  => $_POST['nama_lengkap'],
                    'email'         => $_POST['email'],
                    'telepon'       => $_POST['telepon']
                ];
                if($_POST['password'] != null){
                    $data['password'] = $_POST['password'];
                } else {
                    $data['password'] = null;
                }
                $this->model('UserModel')->update_user($data);
                $this->alert('Data user berhasil diupdate.', 'admin/data_admin');
                exit();
            }else{
                $this->controller('alert')->message('Not Found', '404 | Not Found');
            }
        }else{
            $this->controller('alert')->message('Not Found', '404 | Not Found');
        }
    }
    public function hapus_admin($id_user)
    {
        if ($this->model('UserModel')->cek_user($id_user, 2) != null){
            $foto = dirname(getcwd())."/public/image/profile/".$this->model('UserModel')->cek_user($id_user)['foto'];
            if(file_exists($foto)){
                unlink($foto);
            }
            $this->model('UserModel')->hapus_user($id_user);
            $this->alert('Admin berhasil dihapus.', 'admin/data_admin');
        } else {
            $this->controller('alert')->message('Not Found', '404 | Not Found');
        }
    }
    
    // CRUD Arsitek dan Pengguna
    public function data_arsitek()
    {
        $data = [
            'arsiteks' => $this->model('UserModel')->semua_arsitek()
        ];
        $this->view('dasbor/admin/arsitek/index', $data);
    }
    public function data_pengguna()
    {
        $data = [
            'penggunas' => $this->model('UserModel')->semua_pengguna()
        ];
        $this->view('dasbor/admin/pengguna/index', $data);
    }

    // Laporan
    public function laporan_user()
    {
        $data = [
            'users' => $this->model('UserModel')->semua_tanpa_owner()
        ];
        $this->view('dasbor/admin/laporan/user', $data);
    }
    public function export_user()
    {
        $status = $_POST['status'];
        $level = $_POST['level'];

        $query = "";
        $data['status'] = 'Semua Status';
        $data['level'] = 'Semua Level';
        if($status != '' ){
            $query .= "AND status = ".$status." ";
            if ($status == 1){
                $data['status'] = 'Aktif';
            }else if ($status == 0){
                $data['status'] = 'Nonaktif';
            }
        }
        if($level != '' ){
            $query .= "AND level = ".$level." ";
            if ($level == -1){
                $data['level'] = 'Calon Arsitek';
            }else if ($level == 0){
                $data['level'] = 'Pengguna';
            }else if ($level == 1){
                $data['level'] = 'Arsitek';
            }else if ($level == 2){
                $data['level'] = 'Admin';
            }
        }
        $query .= "ORDER BY dibuat_pada DESC ";
        $data += [
            'users' => $this->model('UserModel')->semua_tanpa_owner($query)
        ];
        $this->view('dasbor/admin/laporan/export_user', $data);
    }
    public function laporan_produk()
    {
        $data = [
            'produks' => $this->model('ProdukModel')->semua_byadmin()
        ];
        $this->view('dasbor/admin/laporan/produk', $data);
    }
    public function export_produk()
    {
        $data = [
            'produks' => $this->model('ProdukModel')->semua_byadmin()
        ];
        $this->view('dasbor/admin/laporan/export_produk', $data);
    }
    public function laporan_transaksi()
    {
        $data = [
            'transaksis' => $this->model('PembayaranModel')->semua_byadmin()
        ];
        $this->view('dasbor/admin/laporan/transaksi', $data);
    }
    public function export_transaksi()
    {
        $data = [
            'transaksis' => $this->model('PembayaranModel')->semua_byadmin()
        ];
        $this->view('dasbor/admin/laporan/export_transaksi', $data);
    }
}
