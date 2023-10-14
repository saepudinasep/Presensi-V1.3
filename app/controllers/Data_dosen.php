<?php

class Data_dosen extends Controller {
    public function tambahDosen()
    {
        session_start();
        if ($this->model('Model_user')->tambahUserDosen($_POST) > 0) {
            if ($this->model('Model_dosen')->tambahDataDosen($_POST) > 0) {
                Flasher::setFlash('Data Berhasil','Ditambahkan', 'success');
                header('Location: '.BASEURL.'?url=Baak/data_dosen');
                exit;
            }else {
                Flasher::setFlash('Data Gagal','Ditambahkan', 'danger');
                header('Location: '.BASEURL.'?url=Baak/data_dosen');
                exit;
            }
        }
    }

    public function hapusDosen($user)
    {
        session_start();
        $data['dosen'] = $this->model('Model_user')->getMkByUser($user);
        if ($data['dosen']==NULL) {
            if ($this->model('Model_dosen')->hapusDataDosen($user) > 0) {
                if ($this->model('Model_user')->hapusUserDosen($user) > 0) {
                    Flasher::setFlash('Data Berhasil','Dihapus', 'success');
                    header('Location: '.BASEURL.'?url=Baak/data_dosen');
                    exit;
                }else {
                    Flasher::setFlash('Data Gagal','Dihapus', 'danger');
                    header('Location: '.BASEURL.'?url=Baak/data_dosen');
                    exit;
                }
            }
        }else {
            Flasher::setFlash('Dosen Sudah Punya Mata Kuliah Jangan Sembarangan','Dihapus', 'danger');
            header('Location: '.BASEURL.'?url=Baak/data_dosen');
            exit;
        }
        
    }

    public function getUbahDosen()
    {
        echo json_encode($this->model('Model_dosen')->getDataDosenById($_POST['id']));
    }

    public function ubahDosen()
    {
        session_start();
        if ($this->model('Model_dosen')->ubahDataDosen($_POST) > 0) {
            Flasher::setFlash('Data Berhasil','Diubah', 'success');
            header('Location: '.BASEURL.'?url=Baak/data_dosen');
            exit;
        }else {
            Flasher::setFlash('Data Gagal','Diubah', 'danger');
            header('Location: '.BASEURL.'?url=Baak/data_dosen');
            exit;
        }
    }

// ========== CARI DATA DOSEN ==========
    public function cariDosen()
    {
        session_start();
        $user = $_SESSION['user'];
        $data['judul'] = 'Data Akademik - Presline';
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['dosen'] = $this->model('Model_dosen')->cariDataDosen();
        $this->view('templates/header_baak', $data);
        $this->view('baak/data_dosen', $data);
        $this->view('templates/footer_baak');
    }
}