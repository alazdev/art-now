<?php

class home extends Controller
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        $data['title'] = 'Halaman Home';
        $data['produks_asc'] = $this->model('ProdukModel')->index_byguest('ASC');
        $data['produks_desc'] = $this->model('ProdukModel')->index_byguest();
        $data['arsiteks'] = $this->model('ArsitekModel')->semua_arsitek();
        $this->view('Home/index', $data);
    }

    public function arsitek($id_user)
    {
        $data = $this->model('ArsitekModel')->profile_arsitek($id_user);
        if($data){
            $data['produks'] = $this->model('ProdukModel')->semua_byguest($id_user);
            $this->view('Home/arsitek', $data);
        }else{
            $this->controller('alert')->message('Not Found', '404 | Not Found');
        }
    }

    public function produk($id_produk)
    {
        $data = $this->model('ProdukModel')->single_byguest($id_produk);
        if($data){
            $this->view('Home/produk', $data);
        }else{
            $this->controller('alert')->message('Not Found', '404 | Not Found');
        }
    }

    public function cari()
    {
        $cari = $_POST["cari"];
        $data = $this->model('ProdukModel')->cari_byguest($cari);
        $this->view('Home/cari', $data);
    }
}
