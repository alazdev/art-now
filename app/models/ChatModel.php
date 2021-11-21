<?php

class ChatModel{
  
    private $table = 'pesan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function kirim($data)
    {
        $this->db->query('INSERT INTO pesan (id_user_from, id_user_to, tipe, pesan, status, dibuat_pada, dihapus_pada) VALUES(:id_user_from, :id_user_to, :tipe, :pesan, :status, :dibuat_pada, :dihapus_pada)');
        $this->db->bind('id_user_from',$this->cek_user()['id_user']);
        $this->db->bind('id_user_to',$data['id_user_to']);
        $this->db->bind('tipe',$data['tipe']);
        $this->db->bind('pesan',$data['pesan']);
        $this->db->bind('status','0');
        $this->db->bind('dibuat_pada',date("Y-m-d H:i:s"));
        $this->db->bind('dihapus_pada',date("Y-m-d H:i:s"));
        $this->db->execute();
    }

    // User cek
    public function cek_user(){
        $this->db->query("SELECT * FROM user WHERE email = '".$_SESSION['email']."'");
        return $this->db->single();
    }

    public function cek_from_id($data){
        $this->db->query("SELECT * FROM user WHERE id_user = '".$data['id_user']."'");
        return $this->db->single();
    }
}