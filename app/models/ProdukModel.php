<?php

class ProdukModel{
  
    private $table = 'produk';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function semua(){
        $this->db->query("SELECT *, (SELECT avg(rating) FROM rating WHERE rating.id_produk = produk.id_produk ) AS rating, (SELECT count(rating) FROM rating WHERE rating.id_produk = produk.id_produk ) AS total_rating FROM produk WHERE id_user = '".$this->cek_user()['id_user']."' AND status >= 0 ORDER BY dibuat_pada DESC");
        return $this->db->resultSet();
    }

    // Laporan by Admib
    public function semua_byadmin(){
        $this->db->query("SELECT produk.*, user.nama_lengkap, user.email, user.telepon, (SELECT avg(rating) FROM rating WHERE rating.id_produk = produk.id_produk ) AS rating, (SELECT count(rating) FROM rating WHERE rating.id_produk = produk.id_produk ) AS total_rating FROM produk LEFT JOIN user ON user.id_user = produk.id_user WHERE produk.status >= 0 ORDER BY dibuat_pada DESC");
        return $this->db->resultSet();
    }

    public function produk($id_produk){
        $this->db->query("SELECT *, (SELECT avg(rating) FROM rating WHERE rating.id_produk = produk.id_produk ) AS rating, (SELECT count(rating) FROM rating WHERE rating.id_produk = produk.id_produk ) AS total_rating FROM produk WHERE id_user = '".$this->cek_user()['id_user']."' AND id_produk = '".$id_produk."'");
        return $this->db->single();
    }

    public function calon_arsitek_produk($id_user){
        $this->db->query("SELECT * FROM produk WHERE id_user = '".$id_user."' ORDER BY id_produk DESC");
        return $this->db->single();
    }

    public function tambah($data)
    {
        $user = $this->cek_user();
        $this->db->query('INSERT INTO '.$this->table.' (id_user, judul, gambar, harga, deskripsi, status, dibuat_pada, diperbaharui_pada) VALUES(:id_user, :judul, :gambar, :harga, :deskripsi, :status, :dibuat_pada, :diperbaharui_pada)');
        $this->db->bind('id_user',$user['id_user']);
        $this->db->bind('judul',$data['judul']);
        $this->db->bind('gambar',$data['gambar']);
        $this->db->bind('harga',$data['harga']);
        $this->db->bind('deskripsi',$data['deskripsi']);
        $this->db->bind('status',$data['status']);
        $this->db->bind('dibuat_pada',date("Y-m-d H:i:s"));
        $this->db->bind('diperbaharui_pada',date("Y-m-d H:i:s"));
        $this->db->execute();
    }

    public function update($data)
    {
        if($data['gambar'] != null)
        {
            $this->db->query('UPDATE '.$this->table.' SET judul= :judul, gambar = :gambar, harga = :harga, deskripsi = :deskripsi, diperbaharui_pada = :diperbaharui_pada WHERE id_produk = '.$data['id_produk']);
            $this->db->bind('gambar',$data['gambar']);
        }
        else
        {
            $this->db->query('UPDATE '.$this->table.' SET judul= :judul, harga = :harga, deskripsi = :deskripsi, diperbaharui_pada = :diperbaharui_pada WHERE id_produk = '.$data['id_produk']);
        }
        $this->db->bind('judul',$data['judul']);
        $this->db->bind('harga',$data['harga']);
        $this->db->bind('deskripsi',$data['deskripsi']);
        $this->db->bind('diperbaharui_pada',date("Y-m-d H:i:s"));
        $this->db->execute();
    }

    public function update_status_byadmin($id_user, $status){
        $this->db->query("UPDATE produk SET status = ".$status." WHERE id_user = '".$id_user."'");
        return $this->db->execute();
    }

    public function update_status($id_produk, $status){
        $this->db->query("UPDATE produk SET status = ".$status." WHERE id_user = '".$this->cek_user()['id_user']."' AND id_produk = '".$id_produk."'");
        return $this->db->execute();
    }

    public function hapus($id_produk){
        $this->db->query("DELETE FROM produk WHERE id_user = '".$this->cek_user()['id_user']."' AND id_produk = '".$id_produk."'");
        return $this->db->execute();
    }

    public function produk_rating($id_produk){
        $this->db->query("SELECT rating.*, user.nama_lengkap FROM rating LEFT JOIN user ON rating.id_user = user.id_user WHERE id_produk = '".$id_produk."' ORDER BY rating.dibuat_pada DESC");
        return $this->db->resultSet();
    }

    public function cek_produk($status){
        $this->db->query("SELECT * FROM produk WHERE id_user = '".$this->cek_user()['id_user']."' AND status = ".$status);
        return $this->db->resultSet();
    }

    // Arsitek cek
    public function cek_user(){
        $this->db->query("SELECT * FROM user WHERE email = '".$_SESSION['email']."'");
        return $this->db->single();
    }
}