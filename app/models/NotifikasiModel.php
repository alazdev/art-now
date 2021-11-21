<?php

class NotifikasiModel{
  
    private $table = 'notifikasi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function notifikasi($data)
    {
        $this->db->query('INSERT INTO '.$this->table.' (id_user, judul, keterangan, link, status, dibuat_pada) VALUES(:id_user, :judul, :keterangan, :link, :status, :dibuat_pada)');
        $this->db->bind('id_user',$data['id_user']);
        $this->db->bind('judul',$data['judul']);
        $this->db->bind('keterangan',$data['keterangan']);
        $this->db->bind('link',$data['link']);
        $this->db->bind('status',0);
        $this->db->bind('dibuat_pada',date("Y-m-d H:i:s"));
        $this->db->execute();
    }
}