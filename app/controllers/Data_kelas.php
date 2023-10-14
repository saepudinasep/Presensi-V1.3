<?php

class Data_kelas extends Controller {
    public function kls($id_prodi){
        session_start();
        $_SESSION['id_prodi'] = $id_prodi;
        header('Location: '.BASEURL.'?url=Data_kelas/data_kls');
    }

    public function data_kls()
    {
        session_start();
        $id_prodi = $_SESSION['id_prodi'];
        $data['judul'] = 'Data Mahasiswa - Presline';
        $user = $_SESSION['user'];
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['prodi_1'] = $this->model('Model_prodi')->getProdi($id_prodi);
        $data['kelas'] = $this->model('Model_kelas')->getAllKelasProdi($id_prodi);
        $this->view('templates/header_baak', $data);
        $this->view('baak/data_kls', $data);
        $this->view('templates/footer_baak');
    }


    



    // ==================== CRUD KELAS PRODI ====================
    
    public function tambahKelas()
    {
        session_start();
        if ($this->model('Model_kelas')->tambahDataKelas($_POST) > 0) {
            Flasher::setFlash('Data Berhasil','Ditambah', 'success');
            header('Location: '.BASEURL.'?url=Data_kelas/data_kls');
            exit;
        }else {
            Flasher::setFlash('Data Gagal','Ditambah', 'danger');
            header('Location: '.BASEURL.'?url=Data_kelas/data_kls');
            exit;
        }
    }

    public function hapusKelas($id_kelas)
    {
        session_start();
        $data['kelas'] = $this->model('Model_mahasiswa')->getMhs($id_kelas);
        if ($data['kelas']==NULL) {
            if ($this->model('Model_kelas')->hapusDataKelas($id_kelas) > 0) {
                Flasher::setFlash('Data Berhasil','Dihapus', 'success');
                header('Location: '.BASEURL.'?url=Data_kelas/data_kls');
                exit;
            }else {
                Flasher::setFlash('Data Gagal','Dihapus', 'danger');
                header('Location: '.BASEURL.'?url=Data_kelas/data_kls');
                exit;
            }
        }else {
            Flasher::setFlash('Kelas Sudah Ada Mahasiswa Jangan Sembarangan','Dihapus', 'danger');
            header('Location: '.BASEURL.'?url=Data_kelas/data_kls');
            exit;
        }
    }

    public function getUbahKelas()
    {
        echo json_encode($this->model('Model_kelas')->getDataKelasById($_POST['id']));
    }

    
    public function UbahKelas()
    {
        session_start();
        if ($this->model('Model_kelas')->ubahDataKelas($_POST) > 0) {
            Flasher::setFlash('Data Berhasil','Diubah', 'success');
            header('Location: '.BASEURL.'?url=Data_kelas/data_kls');
            exit;
        }else {
            Flasher::setFlash('Data Gagal','Diubah', 'danger');
            header('Location: '.BASEURL.'?url=Data_kelas/data_kls');
            exit;
        }
    }

    

    // ==================== CARI KELAS PRODI ====================

    public function cariKelas()
    {
        session_start();
        $id_prodi = $_SESSION['id_prodi'];
        $data['judul'] = 'Data Mahasiswa - Presline';
        $user = $_SESSION['user'];
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['prodi_1'] = $this->model('Model_prodi')->getProdi($id_prodi);
        $data['kelas'] = $this->model('Model_kelas')->cariDataKelasProdi($id_prodi);
        $this->view('templates/header_baak', $data);
        $this->view('baak/data_kls', $data);
        $this->view('templates/footer_baak');
    }
}