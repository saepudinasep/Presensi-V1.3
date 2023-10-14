<?php

class data_presensi_dosen extends Controller {
    public function data_presensi_mk($id_mk)
    {
        session_start();
        $_SESSION['id_mk'] = $id_mk;
        header('Location: '.BASEURL.'?url=Data_presensi_dosen/presensi_mk');
    }

    public function presensi_mk()
    {
        session_start();
        $data['judul'] = 'Data Presensi Dosen - Presline';
        $user = $_SESSION['user'];
        $id_mk = $_SESSION['id_mk'];
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['sesi'] = $this->model('Model_matkul')->getMkById($id_mk);
        $data['mk'] = $this->model('Model_matkul')->getMk($id_mk);
        $this->view('templates/header_baak', $data);
        $this->view('baak/presensi_mk', $data);
        $this->view('templates/footer_baak');
    }

    public function data_presensi_sesi($id_mk)
    {
        session_start();
        $_SESSION['id_mk'] = $id_mk;
        header('Location: '.BASEURL.'?url=Data_presensi_dosen/presensi_sesi');
    }

    public function presensi_sesi()
    {
        session_start();
        $data['judul'] = 'Data Presensi Dosen - Presline';
        $user = $_SESSION['user'];
        $username = $_SESSION['username'];
        $id_mk = $_SESSION['id_mk'];
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['mk'] = $this->model('Model_matkul')->getMk($id_mk);
        $data['dosen'] = $this->model('Model_matkul')->getMkByUsername($username);
        $data['sesi'] = $this->model('Model_sesi')->getMkSesi($id_mk);
        $this->view('templates/header_baak', $data);
        $this->view('baak/presensi_sesi', $data);
        $this->view('templates/footer_baak');
    }
}