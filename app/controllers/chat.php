<?php

class chat extends Controller
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
        else if ($_SESSION['level'] == 1) 
        {
            $this->controller('arsitek')->__construct();
        }
    }
    
    public function index()
    {
        $this->view('dasbor/chat/index');
    }
    
    public function kirim_chat()
    {
        $data = [
            'id_user_to'=> $_POST['id_user_to'],
            'tipe'      => $_POST['tipe'],
            'pesan'     => $_POST['pesan'],
        ];
        $this->model('ChatModel')->kirim($data);

        $from = $this->model('ChatModel')->cek_from_id(['id_user' => $data['id_user_to']]);

        $pesan = 
        '<div class="media border-bottom py-3">'.
            '<div class="media-body">'.
                '<div class="d-flex align-items-center">'.
                    '<div class="flex">'.
                        '<a href="#" class="text-body bold">'.$from['nama_lengkap'].'</a>'.
                    '</div>'.
                    '<small class="text-muted">'.$this->time_elapsed_string(date("Y-m-d H:i:s")).'</small>'.
                '</div>'.
                '<div>'.$data['pesan'].'</div>'.
            '</div>'.
        '</div>';
        $this->view('dasbor/chat/index', $pesan);
    }

    private function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'tahun',
            'm' => 'bulan',
            'w' => 'minggu',
            'd' => 'hari',
            'h' => 'jam',
            'i' => 'menit',
            's' => 'detik',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' yang lalu' : 'sekarang';
    }
}