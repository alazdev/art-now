<?php

class arsitek extends Controller
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
        else if (!($_SESSION['level'] == -1 || $_SESSION['level'] == 1)) 
        {
            $this->controller('alert')->message('Forbidden', '403 | Forbidden');
            exit();
        }
        
        $this->cek_deskripsi();
    }

    public function cek_deskripsi()
    {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if ($this->model('UserModel')->cek_deskripsi()['deskripsi'] == null && $actual_link != BASEURL.'/arsitek/deskripsi')
        {
            $this->route('arsitek/deskripsi');
        }else if($this->model('UserModel')->cek_deskripsi()['deskripsi'] != null && $actual_link == BASEURL.'/arsitek/deskripsi'){
            $this->route('arsitek/verifikasi');
        }else if($actual_link != BASEURL.'/arsitek/deskripsi'){
            if ($this->model('ArsitekModel')->cek_user()['level'] == -1 && $actual_link != BASEURL.'/arsitek/verifikasi')
            {
                $this->route('arsitek/verifikasi');
            }else if($this->model('ArsitekModel')->cek_user()['level'] != -1 && $actual_link == BASEURL.'/arsitek/verifikasi'){
                $this->route('arsitek/index');
            }
        }
    }

    public function deskripsi()
    {
        if(isset($_POST['deskripsi']) && isset($_POST['alamat']))
        {
            // Memasukkan Dokumen Baru
            $output_dir = dirname(getcwd())."/public/dokumen/";
            $RandomNum  = time();
            $DokumenName  = str_replace(' ','-',strtolower($_FILES['dokumen']['name'][0]));
            $DokumenType  = $_FILES['dokumen']['type'][0];
        
            $DokumenExt   = substr($DokumenName, strrpos($DokumenName, '.'));
            $DokumenExt   = str_replace('.','',$DokumenExt);
            $DokumenName  = preg_replace("/\.[^.\s]{3,4}$/", "", $DokumenName);
            $NewDokumenName = $DokumenName.'-'.$RandomNum.'.'.$DokumenExt;
            $ret[$NewDokumenName] = $output_dir.$NewDokumenName;

            if (!file_exists($output_dir))
            {
                @mkdir($output_dir, 0777);
            }     

            move_uploaded_file($_FILES["dokumen"]["tmp_name"][0], $output_dir.$NewDokumenName );

            $data = [
                'deskripsi' => $_POST['deskripsi'],
                'alamat'    => $_POST['alamat'],
                'dokumen'   => $NewDokumenName
            ];
            $this->model('ArsitekModel')->tambah($data);
            $this->route('arsitek/deskripsi');
        }
        $this->view('dasbor/arsitek/deskripsi');
    }

    public function verifikasi()
    {
        if (isset($_POST['verifikasi']))
        {
            $output_dir = dirname(getcwd())."/public/image/produk/";
            $RandomNum  = time();
            $ImageName  = str_replace(' ','-',strtolower($_FILES['gambar']['name'][0]));
            $ImageType  = $_FILES['gambar']['type'][0];
        
            $ImageExt   = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt   = str_replace('.','',$ImageExt);
            $ImageName  = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            $ret[$NewImageName] = $output_dir.$NewImageName;

            if (!file_exists($output_dir))
            {
                @mkdir($output_dir, 0777);
            }     

            move_uploaded_file($_FILES["gambar"]["tmp_name"][0], $output_dir.$NewImageName );

            $data = [
                'judul'     => $_POST['judul'],
                'gambar'    => $NewImageName,
                'harga'     => $_POST['harga'],
                'deskripsi' => $_POST['deskripsi'],
                'status'    => 0,
            ];
            $this->model('ProdukModel')->tambah($data);
            $this->route('arsitek/verifikasi');
            exit();
        }
        
        $data['status'] = 'belum';
        if(count($this->model('ProdukModel')->cek_produk(0)) > 0){
            $data['status'] = 'diproses';
        }else if(count($this->model('ProdukModel')->cek_produk(-1)) > 0){
            $data['status'] = 'ditolak';
        }
        $this->view('dasbor/arsitek/verifikasi', $data);
    }

    // CRUD Produk
    public function index()
    {
        $total_pembayaran = $this->model('PembayaranModel')->total_pembayaran();
        $data['total_pembayaran'] = 0;
        foreach($total_pembayaran as $pembayaran){
            $data['total_pembayaran'] = $data['total_pembayaran']+$pembayaran['total_dibayar'];
        }
        $data['tahunan_pembayaran'] = $this->model('PembayaranModel')->tahunan_pembayaran();
        $data['total_pesanan'] = count($this->model('PesananModel')->total_pesanan());
        $data['tahunan_pesanan'] = $this->model('PesananModel')->tahunan_pesanan();
        
        $start = $month = date('Y-m-d');
        $end = date('Y-m-d', strtotime('-12 month'));
        while($month > $end)
        {
            $data['nama_bulan'][] = date('M', strtotime($month));
            $data['tahun'][] = date('Y', strtotime($month));
            $month = date('Y-m-d', strtotime('-1 months', strtotime($month)));
        }
        $this->view('dasbor/arsitek/index', $data);
    }

    public function produk()
    {
        $this->controller('produk')->index();
    }

    public function tambah_produk()
    {
        $this->controller('produk')->tambah();
    }

    public function detail_produk($id_produk)
    {
        $this->controller('produk')->detail($id_produk);
    }

    public function edit_produk($id_produk)
    {
        $this->controller('produk')->edit($id_produk);
    }

    public function update_produk($id_produk)
    {
        $this->controller('produk')->update($id_produk);
    }

    public function nonaktifkan_produk($id_produk)
    {
        $this->controller('produk')->nonaktifkan($id_produk);
    }

    public function aktifkan_produk($id_produk)
    {
        $this->controller('produk')->aktifkan($id_produk);
    }

    public function hapus_produk($id_produk)
    {
        $this->controller('produk')->hapus($id_produk);
    }

    public function rating_produk($id_produk)
    {
        $this->controller('produk')->rating($id_produk);
    }

    // CRUD Pesanan
    public function pesanan()
    {
        $this->controller('pesanan')->index();
    }

    public function laporan_pesanan()
    {
        $this->controller('pesanan')->laporan();
    }

    public function terima_pesanan($id_pesanan)
    {
        $this->controller('pesanan')->terima($id_pesanan);
    }

    public function tolak_pesanan($id_pesanan)
    {
        $this->controller('pesanan')->tolak($id_pesanan);
    }
}
