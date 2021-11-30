<?php

class pesanan extends arsitek
{
    // CRUD
    public function index()
    {
        $data = [
            'pesanans' => $this->model('PesananModel')->semua()
        ];
        $this->view('dasbor/arsitek/pesanan/index', $data);
    }

    public function laporan()
    {
        $data = [
            'pesanans' => $this->model('PesananModel')->semua()
        ];
        $this->view('dasbor/arsitek/pesanan/laporan', $data);
    }

    public function terima($id_pesanan)
    {
        $pesanan = $this->model('PesananModel')->pesanan($id_pesanan);
        if($pesanan != null){
            if($this->model('PesananModel')->cek_pesanan(1) == null){
                $this->model('PesananModel')->update_status($id_pesanan, 1);
                
                $pesan = [
                    'id_user' => $pesanan['id_user'],
                    'judul' => 'Pesanan Diterima',
                    'keterangan' => 'Pesanan Anda kepada Arsitek dengan Produk <a href="'.BASEURL.'/home/produk/'.$pesanan['id_produk'].'">'.$pesanan->judul.'</a> telah diterima, harap masukkan <a href="'.BASEURL.'/pengguna/imb_pesanan/'.$id_pesanan.'">IMB</a> Anda secepatnya.',
                    'link' => '/pengguna/imb_pesanan/'.$id_pesanan
                ];
                $this->model('NotifikasiModel')->notifikasi($pesan);
                $this->route('arsitek/pesanan');
            } else {
                $this->alert('Anda hanya bisa memiliki 1 pesanan yang bisa diproses.', 'arsitek/pesanan');
            }
        }else{
            $this->controller('alert')->message('Not Found', '404 | Not Found');
        }
    }

    public function tolak($id_pesanan)
    {
        $pesanan = $this->model('PesananModel')->pesanan($id_pesanan);
        if($pesanan != null){
            $this->model('PesananModel')->update_status($id_pesanan, -1);

            $pesan = [
                'id_user' => $pesanan['id_user'],
                'judul' => 'Pesanan Ditolak',
                'keterangan' => 'Pesanan Anda kepada Arsitek dengan Produk <a href="'.BASEURL.'/home/produk/'.$pesanan['id_produk'].'">'.$pesanan->judul.'</a> telah ditolak, <a href="'.BASEURL.'/index">klik</a> untuk temukan arsitek lain.',
                'link' => 'index'
            ];
            $this->model('NotifikasiModel')->notifikasi($pesan);
            $this->route('arsitek/pesanan');
        }else{
            $this->controller('alert')->message('Not Found', '404 | Not Found');
        }
    }
}
