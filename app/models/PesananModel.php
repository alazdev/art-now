<?php

class PesananModel{
  
    private $table = 'pesanan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function semua(){
        $this->db->query("SELECT pesanan.*, user.nama_lengkap, produk.judul, imb.dokumen, (SELECT pembayaran.status FROM pembayaran WHERE pembayaran.id_pesanan = pesanan.id_pesanan AND pembayaran.status=-1 LIMIT 1) as status_pembayaran FROM pesanan LEFT JOIN user on user.id_user = pesanan.id_user LEFT JOIN produk ON produk.id_produk = pesanan.id_produk LEFT JOIN imb on imb.id_pesanan = pesanan.id_pesanan WHERE produk.id_user = '".$this->cek_user()['id_user']."' ORDER BY pesanan.dibuat_pada DESC");
        return $this->db->resultSet();
    }

    // Untuk pengguna
    public function semua_bypengguna(){
        $this->db->query("SELECT pesanan.*, user.nama_lengkap as nama_lengkap_arsitek, user.id_user as id_arsitek, produk.judul, imb.dokumen, (SELECT pembayaran.status FROM pembayaran WHERE pembayaran.id_pesanan = pesanan.id_pesanan AND pembayaran.status=-1 LIMIT 1) as status_pembayaran FROM pesanan LEFT JOIN produk ON produk.id_produk = pesanan.id_produk LEFT JOIN user on user.id_user = produk.id_user LEFT JOIN imb on imb.id_pesanan = pesanan.id_pesanan WHERE pesanan.id_user = '".$this->cek_user()['id_user']."' ORDER BY pesanan.dibuat_pada DESC");
        return $this->db->resultSet();
    }
    public function sedang_bypengguna(){
        $this->db->query("SELECT pesanan.*, user.nama_lengkap as nama_lengkap_arsitek, user.id_user as id_arsitek, produk.judul, imb.dokumen FROM pesanan LEFT JOIN produk ON produk.id_produk = pesanan.id_produk LEFT JOIN user on user.id_user = produk.id_user LEFT JOIN imb on imb.id_pesanan = pesanan.id_pesanan WHERE pesanan.id_user = '".$this->cek_user()['id_user']."' AND pesanan.status BETWEEN 0 AND 2");
        return $this->db->resultSet();
    }
    public function pesanan_bypengguna($id_pesanan){
        $this->db->query("SELECT pesanan.*, user.nama_lengkap as nama_lengkap_arsitek, user.id_user as id_arsitek, produk.judul, imb.dokumen, produk.harga FROM pesanan LEFT JOIN produk ON produk.id_produk = pesanan.id_produk LEFT JOIN user on user.id_user = produk.id_user LEFT JOIN imb on imb.id_pesanan = pesanan.id_pesanan WHERE pesanan.id_user = '".$this->cek_user()['id_user']."' AND pesanan.id_pesanan = ".$id_pesanan."");
        return $this->db->single();
    }
    public function hapus($id_pesanan){
        $this->db->query("DELETE FROM pesanan WHERE status = 0 AND id_pesanan = '".$id_pesanan."'");
        return $this->db->execute();
    }

    public function pesanan($id_produk){
        $this->db->query("SELECT pesanan.*, user.nama_lengkap, produk.judul, imb.dokumen FROM pesanan LEFT JOIN user on user.id_user = pesanan.id_user LEFT JOIN produk ON produk.id_produk = pesanan.id_produk LEFT JOIN imb on imb.id_pesanan = pesanan.id_pesanan WHERE produk.id_user = '".$this->cek_user()['id_user']."'");
        return $this->db->single();
    }

    public function tambah($data)
    {
        $user = $this->cek_user();
        $this->db->query('INSERT INTO pesanan (id_user, id_produk, status, dibuat_pada, diperbaharui_pada) VALUES(:id_user, :id_produk, :status, :dibuat_pada, :diperbaharui_pada)');
        $this->db->bind('id_user',$user['id_user']);
        $this->db->bind('id_produk',$data['id_produk']);
        $this->db->bind('status',$data['status']);
        $this->db->bind('dibuat_pada',date("Y-m-d H:i:s"));
        $this->db->bind('diperbaharui_pada',date("Y-m-d H:i:s"));
        $this->db->execute();
    }

    public function update_status($id_pesanan, $status){
        $this->db->query("UPDATE pesanan SET status = ".$status.", diperbaharui_pada = '".date("Y-m-d H:i:s")."' WHERE id_pesanan = '".$id_pesanan."'");
        return $this->db->execute();
    }

    public function cek_pesanan($status){
        $this->db->query("SELECT pesanan.*, user.nama_lengkap, produk.judul, imb.dokumen FROM pesanan LEFT JOIN user on user.id_user = pesanan.id_user LEFT JOIN produk ON produk.id_produk = pesanan.id_produk LEFT JOIN imb on imb.id_pesanan = pesanan.id_pesanan WHERE produk.id_user = '".$this->cek_user()['id_user']."' AND pesanan.status = ".$status."");
        return $this->db->single();
    }

    // Untuk Dasboard Arsitek
    public function total_pesanan(){
        $this->db->query("SELECT pesanan.id_pesanan FROM pesanan LEFT JOIN produk ON produk.id_produk = pesanan.id_produk LEFT JOIN user on produk.id_user = user.id_user WHERE user.id_user = '".$this->cek_user()['id_user']."' AND pesanan.status BETWEEN 0 AND 3");
        return $this->db->resultSet();
    }

    public function tahunan_pesanan(){
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
                SELECT DATE_FORMAT(pesanan.dibuat_pada, '%b') AS month, COUNT(pesanan.id_pesanan) as total 
                FROM pesanan 
                LEFT JOIN produk ON produk.id_produk = pesanan.id_produk 
                LEFT JOIN user on produk.id_user = user.id_user 
                WHERE (user.id_user = '".$this->cek_user()['id_user']."' AND pesanan.status BETWEEN 0 AND 3) 
                AND (pesanan.dibuat_pada <= NOW() AND pesanan.dibuat_pada >= Date_add(Now(),interval - 12 month)) 
                GROUP BY DATE_FORMAT(pesanan.dibuat_pada, '%m-%Y')
            ) as sub
        ");
        return $this->db->resultSet();
    }

    // Arsitek cek
    public function cek_user(){
        $this->db->query("SELECT * FROM user WHERE email = '".$_SESSION['email']."'");
        return $this->db->single();
    }
}