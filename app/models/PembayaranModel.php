<?php

class PembayaranModel{
  
    private $table = 'pembayaran';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    // Untuk Dasboard Arsitek
    public function total_pembayaran(){
        $this->db->query("SELECT pembayaran.total_dibayar FROM pembayaran LEFT JOIN pesanan ON pembayaran.id_pesanan = pesanan.id_pesanan LEFT JOIN produk ON produk.id_produk = pesanan.id_produk LEFT JOIN user on produk.id_user = user.id_user WHERE user.id_user = '".$this->cek_user()['id_user']."' AND pembayaran.status = 1");
        return $this->db->resultSet();
    }

    // Semua by admin
    public function semua_byadmin(){
        $this->db->query("SELECT 
            pembayaran.*, 
            pengguna.nama_lengkap as nama_lengkap_pengguna, 
            pengguna.email as email_pengguna, 
            pengguna.telepon as telepon_pengguna, 
            arsitek.nama_lengkap as nama_lengkap_arsitek, 
            arsitek.email as email_arsitek, 
            arsitek.telepon as telepon_arsitek, 
            produk.judul as judul_produk
            FROM pembayaran 
            LEFT JOIN pesanan ON pembayaran.id_pesanan = pesanan.id_pesanan 
            LEFT JOIN produk ON produk.id_produk = pesanan.id_produk 
            LEFT JOIN user pengguna on pesanan.id_user = pengguna.id_user 
            LEFT JOIN user arsitek on produk.id_user = arsitek.id_user 
            WHERE pembayaran.status = 1");
        return $this->db->resultSet();
    }

    public function tahunan_pembayaran(){
        $this->db->query("
            SELECT 
                SUM(IF(month = 'Jan', total, 0)) AS 'Jan',
                SUM(IF(month = 'Feb', total, 0)) AS 'Feb',
                SUM(IF(month = 'Mar', total, 0)) AS 'Mar',
                SUM(IF(month = 'Apr', total, 0)) AS 'Apr',
                SUM(IF(month = 'May', total, 0)) AS 'May',
                SUM(IF(month = 'Jun', total, 0)) AS 'Jun',
                SUM(IF(month = 'Jul', total, 0)) AS 'Jul',
                SUM(IF(month = 'Aug', total, 0)) AS 'Aug',
                SUM(IF(month = 'Sep', total, 0)) AS 'Sep',
                SUM(IF(month = 'Oct', total, 0)) AS 'Oct',
                SUM(IF(month = 'Nov', total, 0)) AS 'Nov',
                SUM(IF(month = 'Dec', total, 0)) AS 'Dec'
            FROM (
                SELECT DATE_FORMAT(pembayaran.dibuat_pada, '%b') AS month, SUM(pembayaran.total_dibayar) as total 
                FROM pembayaran 
                LEFT JOIN pesanan ON pembayaran.id_pesanan = pesanan.id_pesanan 
                LEFT JOIN produk ON produk.id_produk = pesanan.id_produk 
                LEFT JOIN user on produk.id_user = user.id_user 
                WHERE (user.id_user = '".$this->cek_user()['id_user']."' AND pembayaran.status = 1) 
                AND (pembayaran.dibuat_pada <= NOW() AND pembayaran.dibuat_pada >= Date_add(Now(),interval - 12 month)) 
                GROUP BY DATE_FORMAT(pembayaran.dibuat_pada, '%m-%Y')
            ) as sub
        ");
        return $this->db->resultSet();
    }

    public function tambah($data)
    {
        $this->db->query('INSERT INTO pembayaran (id_pesanan, nomor_transaksi, metode_pembayaran, nomor_pembayaran, total_dibayar, status, dibuat_pada) VALUES(:id_pesanan, :nomor_transaksi, :metode_pembayaran, :nomor_pembayaran, :total_dibayar, :status, :dibuat_pada)');
        $this->db->bind('id_pesanan',$data['id_pesanan']);
        $this->db->bind('nomor_transaksi',$data['nomor_transaksi']);
        $this->db->bind('metode_pembayaran',$data['metode_pembayaran']);
        $this->db->bind('nomor_pembayaran',$data['nomor_pembayaran']);
        $this->db->bind('total_dibayar',$data['total_dibayar']);
        $this->db->bind('status',$data['status']);
        $this->db->bind('dibuat_pada',date("Y-m-d H:i:s"));
        $this->db->execute();
    }

    // Arsitek cek
    public function cek_user(){
        $this->db->query("SELECT * FROM user WHERE email = '".$_SESSION['email']."'");
        return $this->db->single();
    }
}