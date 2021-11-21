<?php

class ImbModel{
  
    private $table = 'imb';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function tambah($data)
    {
        $this->db->query('INSERT INTO '.$this->table.' (id_pesanan, dokumen, dibuat_pada, diperbaharui_pada) VALUES(:id_pesanan, :dokumen, :dibuat_pada, :diperbaharui_pada)');
        $this->db->bind('id_pesanan',$data['id_pesanan']);
        $this->db->bind('dokumen',$data['dokumen']);
        $this->db->bind('dibuat_pada',date("Y-m-d H:i:s"));
        $this->db->bind('diperbaharui_pada',date("Y-m-d H:i:s"));
        $this->db->execute();
    }

    public function hapus($id_pesanan){
        $this->db->query("DELETE FROM imb WHERE id_pesanan = '".$id_pesanan."'");
        return $this->db->execute();
    }

    public function imb($id_pesanan){
        $this->db->query("SELECT * FROM imb WHERE id_pesanan = '".$id_pesanan."'");
        return $this->db->single();
    }
}