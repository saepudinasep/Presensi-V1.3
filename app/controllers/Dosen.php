<?php

class Dosen extends Controller {
    public function dashboard()
    {
        session_start();
        $user = $_SESSION['user'];
        $data['judul'] = 'Presline - Dashboard';
        $data['dosen'] = $this->model('Model_dosen')->getDosenByUser($user);
        $this->view('templates/header_dosen', $data);
        $this->view('dosen/dashboard', $data);
        $this->view('templates/footer');
    }

    public function mata_kuliah()
    {
        session_start();
        $user = $_SESSION['user'];
        $data['judul'] = 'Presline - Mata Kuliah';
        $data['mk'] = $this->model('Model_dosen')->getMkByUser($user);
        $this->view('templates/header_dosen', $data);
        $this->view('dosen/mata_kuliah', $data);
        $this->view('templates/footer');
    }
    
    public function sesi_kuliah($id)
    {
        session_start();
        $user = $_SESSION['user'];
        $data['judul'] = 'Presline - Sesi Kuliah';
        $data['sesi_mk'] = $this->model('Model_dosen')->getSesiMkByUserId($user, $id);
        $data['mk'] = $this->model('Model_baak')->getDataMkById($id);
        $this->view('templates/header_dosen', $data);
        $this->view('dosen/sesi_kuliah', $data);
        $this->view('templates/footer');
    }

    public function profile()
    {
        session_start();
        $user = $_SESSION['user'];
        $data['judul'] = 'Presline - Mata Kuliah';
        $data['dosen'] = $this->model('Model_dosen')->getDosenByUser($user);
        $data['user'] = $this->model('Model_dosen')->getUserByUser($user);
        $data['prodi'] = $this->model('Model_baak')->getAllProdi();
        $this->view('templates/header_dosen', $data);
        $this->view('dosen/profile', $data);
        $this->view('templates/footer');
    }

    public function join_sesi($id_sesi, $id_mk)
    {
        session_start();
        $data['judul'] = 'Presline - Join Sesi';
        $data['join_sesi'] = $this->model('Model_dosen')->getSesiMkJoinById($id_sesi);
        $data['mhs'] = $this->model('Model_dosen')->getJoinMhs($id_sesi, $id_mk);
        // $data['mhs'] = $this->model('Model_dosen')->getMhsBy;
        $this->view('templates/header_dosen', $data);
        $this->view('dosen/join_sesi', $data);
        $this->view('templates/footer');
    }
    
}