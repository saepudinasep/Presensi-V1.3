<?php

class Data_matkul extends Controller{
    public function tambahMk()
    {
        session_start();
        if ($this->model('Model_matkul')->tambahDataMk($_POST) > 0) {
            Flasher::setFlash('Data Berhasil','Ditambah', 'success');
            header('Location: '.BASEURL.'?url=Baak/data_matkul');
            exit;
        }else {
            Flasher::setFlash('Data Gagal','Ditambah', 'danger');
            header('Location: '.BASEURL.'?url=Baak/data_matkul');
            exit;
        }
    }

    public function hapusMk($id_mk)
    {
        session_start();
        $data['mk'] = $this->model('Model_matkul')->getAllSesi($id_mk);
        if ($data['mk']==NULL) {
            if ($this->model('Model_matkul')->hapusDataMk($id_mk) > 0) {
                Flasher::setFlash('Data Berhasil','Dihapus', 'success');
                header('Location: '.BASEURL.'?url=Baak/data_matkul');
                exit;
            }else {
                Flasher::setFlash('Data Gagal','Dihapus', 'danger');
                header('Location: '.BASEURL.'?url=Baak/data_matkul');
                exit;
            }
        }
        
    }

    public function getUbahMk()
    {
        echo json_encode($this->model('Model_matkul')->getDataMkById($_POST['id']));
    }

    
    public function ubahMk()
    {
        session_start();
        if ($this->model('Model_matkul')->ubahDataMk($_POST) > 0) {
            Flasher::setFlash('Data Berhasil','Diubah', 'success');
            header('Location: '.BASEURL.'?url=Baak/data_matkul');
            exit;
        }else {
            Flasher::setFlash('Data Gagal','Diubah', 'danger');
            header('Location: '.BASEURL.'?url=Baak/data_matkul');
            exit;
        }
    }
    
    // ==================== CARI MATA KULIAH ====================

    public function cariMatkul()
    {
        session_start();
        $data['judul'] = 'Data Mata Kuliah - Presline';
        $user = $_SESSION['user'];
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['mk'] = $this->model('Model_matkul')->cariDataMk();
        $data['dosen'] = $this->model('Model_dosen')->getAllDosen();
        $this->view('templates/header_baak', $data);
        $this->view('baak/data_matkul', $data);
        $this->view('templates/footer_baak');
    }
}