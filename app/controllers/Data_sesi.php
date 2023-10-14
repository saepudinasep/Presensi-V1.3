<?php

class Data_sesi extends Controller{
    public function sesi_mk($id_mk){
        session_start();
        $_SESSION['id_mk'] = $id_mk;
        header('Location: '.BASEURL.'?url=Data_sesi/data_sesi');
    }

    public function data_sesi()
    {
        session_start();
        $id_mk = $_SESSION['id_mk'];
        $data['judul'] = 'Data Mata Kuliah - Presline';
        $user = $_SESSION['user'];
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['mk'] = $this->model('Model_matkul')->getMk($id_mk);
        $data['sesi'] = $this->model('Model_sesi')->getMkSesi($id_mk);
        $data['dosen'] = $this->model('Model_dosen')->getAllDosen();
        $this->view('templates/header_baak', $data);
        $this->view('baak/data_sesi', $data);
        $this->view('templates/footer_baak');
    }



    // =============== CRUD SESI MATA KULIAH ===============
    public function tambahMkSesi()
    {
        session_start();
        if ($this->model('Model_sesi')->tambahDataMkSesi($_POST) > 0) {
            Flasher::setFlash('Data Berhasil','Ditambah', 'success');
            header('Location: '.BASEURL.'?url=Data_sesi/data_sesi');
            exit;
        }else {
            Flasher::setFlash('Data Gagal','Ditambah', 'danger');
            header('Location: '.BASEURL.'?url=Data_sesi/data_sesi');
            exit;
        }
    }

    public function hapusMkSesi($id)
    {
        session_start();
        if ($this->model('Model_sesi')->hapusDataMkSesi($id) > 0) {
            Flasher::setFlash('Data Berhasil','Dihapus', 'success');
            header('Location: '.BASEURL.'?url=Data_sesi/data_sesi');
            exit;
        }else {
            Flasher::setFlash('Data Gagal','Dihapus', 'danger');
            header('Location: '.BASEURL.'?url=Data_sesi/data_sesi');
            exit;
        }
    }

    public function getUbahMkSesi()
    {
        echo json_encode($this->model('Model_sesi')->getDataMkSesiById($_POST['id']));
    }

    
    public function ubahMkSesi()
    {
        session_start();
        if ($this->model('Model_sesi')->ubahDataMkSesi($_POST) > 0) {
            Flasher::setFlash('Data Berhasil','Diubah', 'success');
            header('Location: '.BASEURL.'?url=Data_sesi/data_sesi');
            exit;
        }else {
            Flasher::setFlash('Data Gagal','Diubah', 'danger');
            header('Location: '.BASEURL.'?url=Data_sesi/data_sesi');
            exit;
        }
    }
    // end data_mk_sesi
}