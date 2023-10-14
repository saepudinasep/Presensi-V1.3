<?php

class Home extends Controller {
    public function index()
    {
        $data['judul'] = 'Presline - STMIK IKMI Cirebon';
        
        $data['mhs'] = $this->model('Model_mahasiswa')->getAllMahasiswa();
        $data['dosen'] = $this->model('Model_dosen')->getAllDosen();
        $data['leaderboard'] = $this->model('Model_user')->getAllLeaderboard();

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function panduan()
    {
        $data['judul'] = 'Presline - STMIK IKMI Cirebon - Panduan';

        $this->view('templates/header', $data);
        $this->view('home/panduan');
        $this->view('templates/footer');
    }
}