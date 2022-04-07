<?php

class produk extends arsitek
{
    // CRUD
    public function index()
    {
        $data = [
            'produks' => $this->model('ProdukModel')->semua()
        ];
        $this->view('dasbor/arsitek/produk/index', $data);
    }

    public function tambah()
    {
        if (isset($_POST['tambah']))
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
                'status'    => 1,
            ];
            $this->model('ProdukModel')->tambah($data);
            $this->alert('Data produk berhasil ditambahkan.', 'arsitek/produk');
            exit();
        }
    }

    public function detail($id_produk)
    {
        if($this->model('ProdukModel')->produk($id_produk) != null){
            $data = $this->model('ProdukModel')->produk($id_produk);
            $this->view('dasbor/arsitek/produk/detail', $data);
        }else{
            $this->controller('alert')->message('Not Found', '404 | Not Found');
        }
    }

    public function edit($id_produk)
    {
        if($this->model('ProdukModel')->produk($id_produk) != null){
            $data = $this->model('ProdukModel')->produk($id_produk);
            if($data['status_pesanan'] != null ){
                $this->alert('Tidak dapat mengedit Produk. Selesaikan Proyek atau tolak semua pesanan mengenai Produk ini terlebih dahulu.', 'arsitek/produk');
            }
            $this->view('dasbor/arsitek/produk/edit', $data);
        }else{
            $this->controller('alert')->message('Not Found', '404 | Not Found');
        }
    }

    public function update($id_produk)
    {
        if($this->model('ProdukModel')->produk($id_produk) != null){
            if (isset($_POST['update']))
            {
                if($_FILES['gambar']["name"][0]){
                    // Memasukkan Gambar Baru
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

                    $data['gambar'] = $NewImageName;

                    // Penghapusan Gambar
                    $gambar = dirname(getcwd())."/public/image/produk/".$this->model('ProdukModel')->produk($id_produk)['gambar'];
                    if(file_exists($gambar)){
                        unlink($gambar);
                    }
                }else{
                    $data['gambar'] = null;
                }
    
                $data += [
                    'id_produk' => $id_produk,
                    'judul'     => $_POST['judul'],
                    'harga'     => $_POST['harga'],
                    'deskripsi' => $_POST['deskripsi']
                ];
                $this->model('ProdukModel')->update($data);
                $this->alert('Data produk berhasil diubah.', 'arsitek/produk');
                exit();
            }else{
                $this->controller('alert')->message('Not Found', '404 | Not Found');
            }
        }else{
            $this->controller('alert')->message('Not Found', '404 | Not Found');
        }
    }

    public function nonaktifkan($id_produk)
    {
        if($this->model('ProdukModel')->produk($id_produk) != null){
            $this->model('ProdukModel')->update_status($id_produk, 0);
            $this->alert('Data produk berhasil dinonaktifkan.', 'arsitek/produk');
        }else{
            $this->controller('alert')->message('Not Found', '404 | Not Found');
        }
    }

    public function aktifkan($id_produk)
    {
        if($this->model('ProdukModel')->produk($id_produk) != null){
            $this->model('ProdukModel')->update_status($id_produk, 1);
            $this->alert('Data produk berhasil diaktifkan.', 'arsitek/produk');
        }else{
            $this->controller('alert')->message('Not Found', '404 | Not Found');
        }
    }

    public function hapus($id_produk)
    {
        if($this->model('ProdukModel')->produk($id_produk) != null){
            $data = $this->model('ProdukModel')->produk($id_produk);
            if($data['status_pesanan'] != null ){
                $this->alert('Tidak dapat menghapus Produk. Selesaikan Proyek atau tolak semua pesanan mengenai Produk ini terlebih dahulu.', 'arsitek/produk');
            }else{
                try {
                    $gambar = $this->model('ProdukModel')->produk($id_produk)['gambar'];
                    $this->model('ProdukModel')->hapus($id_produk);
                    $path = dirname(getcwd())."/public/image/produk/".$gambar;
                    
                    if(file_exists($path)){
                        unlink($path);
                    }
                    $this->alert('Data produk berhasil dihapus.', 'arsitek/produk');
                } catch (\Throwable $th) {
                    $this->alert('Data produk yang pernah dipesan tidak dapat dihapus. Cukup nonaktifkan produk supaya pelanggan tidak dapat memesannya.', 'arsitek/produk');
                }
            }
        }else{
            $this->controller('alert')->message('Not Found', '404 | Not Found');
        }
    }

    public function rating($id_produk)
    {
        if($this->model('ProdukModel')->produk($id_produk) != null){
            $data['ratings'] = $this->model('ProdukModel')->produk_rating($id_produk);
            $data += $this->model('ProdukModel')->produk($id_produk);
            $this->view('dasbor/arsitek/produk/rating', $data);
        }else{
            $this->controller('alert')->message('Not Found', '404 | Not Found');
        }
    }
}
