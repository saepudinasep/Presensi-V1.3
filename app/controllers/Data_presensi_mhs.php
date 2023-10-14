<?php

class Data_presensi_mhs extends Controller {
    
    // DATA PRESENSI MAHASISWA
    public function presensi_kelas($id_prodi)
    {
        session_start();
        $_SESSION['id_prodi'] = $id_prodi;
        header('Location: '.BASEURL.'?url=Data_presensi_mhs/presensi_kls');
    }

    public function presensi_kls()
    {
        session_start();
        $id_prodi = $_SESSION['id_prodi'];
        $data['judul'] = 'Presensi Mahasiswa - Presline';
        $user = $_SESSION['user'];
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['prodi_1'] = $this->model('Model_prodi')->getProdi($id_prodi);
        $data['kelas'] = $this->model('Model_kelas')->getAllKelasProdi($id_prodi);
        $this->view('templates/header_baak', $data);
        $this->view('baak/presensi_kls', $data);
        $this->view('templates/footer_baak');
    }

    public function presensi_mk_mhs($id_kelas)
    {
        session_start();
        $_SESSION['id_kelas'] = $id_kelas;
        header('Location: '.BASEURL.'?url=Data_presensi_mhs/presensi_matkul');
    }

    public function presensi_matkul()
    {
        session_start();
        $id_prodi = $_SESSION['id_prodi'];
        $id_kelas = $_SESSION['id_kelas'];
        $data['judul'] = 'Presensi Mahasiswa - Presline';
        $user = $_SESSION['user'];
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['kelas'] = $this->model('Model_kelas')->getKelas($id_kelas);
        $data['prodi_1'] = $this->model('Model_prodi')->getProdi($id_prodi);
        $data['mk'] = $this->model('Model_matkul')->getAllMkByKls($id_kelas);
        $this->view('templates/header_baak', $data);
        $this->view('baak/presensi_matkul', $data);
        $this->view('templates/footer_baak');
    }

    public function presensi_sesiMk($id_mk)
    {
        session_start();
        $_SESSION['id_mk'] = $id_mk;
        header('Location: '.BASEURL.'?url=Data_presensi_mhs/presensi_sesi');
    }

    public function presensi_sesi()
    {
        session_start();
        $id_prodi = $_SESSION['id_prodi'];
        $id_kelas = $_SESSION['id_kelas'];
        $id_mk = $_SESSION['id_mk'];
        $data['judul'] = 'Presensi Mahasiswa - Presline';
        $user = $_SESSION['user'];
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['kelas'] = $this->model('Model_kelas')->getKelas($id_kelas);
        $data['prodi_1'] = $this->model('Model_prodi')->getProdi($id_prodi);
        $data['mk'] = $this->model('Model_matkul')->getMk($id_mk);
        $data['sesi'] = $this->model('Model_sesi')->getMkSesi($id_mk);
        $this->view('templates/header_baak', $data);
        $this->view('baak/presensi_sesi', $data);
        $this->view('templates/footer_baak');
    }

    public function data_viewPresensiMhs($id_mk_sesi)
    {
        session_start();
        $_SESSION['id_mk_sesi'] = $id_mk_sesi;
        header('Location: '.BASEURL.'?url=Data_presensi_mhs/presensi_mhs');
    }

    public function presensi_mhs()
    {
        session_start();
        $id_prodi = $_SESSION['id_prodi'];
        $id_kelas = $_SESSION['id_kelas'];
        $id_mk = $_SESSION['id_mk'];
        $id_mk_sesi = $_SESSION['id_mk_sesi'];
        $data['judul'] = 'Presensi Mahasiswa - Presline';
        $user = $_SESSION['user'];
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['kelas'] = $this->model('Model_kelas')->getKelas($id_kelas);
        $data['prodi_1'] = $this->model('Model_prodi')->getProdi($id_prodi);
        $data['mhs'] = $this->model('Model_mahasiswa')->getMhs($id_kelas);
        $data['mk'] = $this->model('Model_matkul')->getMk($id_mk);
        $data['sesi'] = $this->model('Model_sesi')->getSesi($id_mk);
        $data['presensi'] = $this->model('Model_mahasiswa')->getAllPresensi($id_mk_sesi);
        $this->view('templates/header_baak', $data);
        $this->view('baak/presensi_mhs', $data);
        $this->view('templates/footer_baak');
    }
    // END DATA PRESENSI MAHASISWA
}