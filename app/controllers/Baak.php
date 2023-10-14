<?php

class Baak extends Controller
{
    public function dashboard()
    {
        session_start();
        $user = $_SESSION['user'];
        $data['judul'] = 'Dashboard Baak - Presline';
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['dosen'] = $this->model('Model_dosen')->getAllDosen();
        $data['prodi'] = $this->model('Model_prodi')->getAllProdi();
        $data['mhs'] = $this->model('Model_mahasiswa')->getAllMahasiswa();
        $data['kls'] = $this->model('Model_kelas')->getAllKelas();
        $this->view('templates/header_baak', $data);
        $this->view('baak/dashboard', $data);
        $this->view('templates/footer_baak');
    }

    public function data_akademik()
    {
        session_start();
        $user = $_SESSION['user'];
        $data['judul'] = 'Data Akademik - Presline';
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['prodi'] = $this->model('Model_prodi')->getAllProdi();
        $this->view('templates/header_baak', $data);
        $this->view('baak/data_akademik', $data);
        $this->view('templates/footer_baak');
    }

    public function data_dosen()
    {
        session_start();
        $user = $_SESSION['user'];
        $data['judul'] = 'Data Akademik - Presline';
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['dosen'] = $this->model('Model_dosen')->getAllDosen();
        $this->view('templates/header_baak', $data);
        $this->view('baak/data_dosen', $data);
        $this->view('templates/footer_baak');
    }

    public function data_matkul()
    {
        session_start();
        $data['judul'] = 'Data Mata Kuliah - Presline';
        $user = $_SESSION['user'];
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['mk'] = $this->model('Model_matkul')->getAllMk();
        $data['dosen'] = $this->model('Model_dosen')->getAllDosen();
        $this->view('templates/header_baak', $data);
        $this->view('baak/data_matkul', $data);
        $this->view('templates/footer_baak');
    }


    public function data_presensi_dosen()
    {
        session_start();
        $data['judul'] = 'Data Presensi Dosen - Presline';
        $user = $_SESSION['user'];
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['mk'] = $this->model('Model_matkul')->getAllMk();
        $this->view('templates/header_baak', $data);
        $this->view('baak/data_presensi_dosen', $data);
        $this->view('templates/footer_baak');
    }

    public function data_presensi_mhs()
    {
        session_start();
        $data['judul'] = 'Data Presensi Mahasiswa - Presline';
        $user = $_SESSION['user'];
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['prodi'] = $this->model('Model_prodi')->getAllProdi();
        $this->view('templates/header_baak', $data);
        $this->view('baak/data_presensi_mhs', $data);
        $this->view('templates/footer_baak');
    }
}
