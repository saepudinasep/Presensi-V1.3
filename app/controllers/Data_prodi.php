<?php

class Data_prodi extends Controller
{
    
    public function tambahProdi()
    {
        session_start();
            if ($this->model('Model_prodi')->tambahDataProdi($_POST) > 0) {
                Flasher::setFlash('Data Berhasil','Ditambahkan', 'success');
                header('Location: '.BASEURL.'?url=Baak/data_akademik');
                exit;
            }else {
                Flasher::setFlash('Data Gagal','Ditambahkan', 'danger');
                header('Location: '.BASEURL.'?url=Baak/data_akademik');
                exit;
            }
    }

    public function hapusProdi($id_prodi)
    {
        session_start();
        $data['prodi'] = $this->model('Model_kelas')->getAllKelasProdi($id_prodi);
        if ($data['prodi']==NULL) {
            if ($this->model('Model_prodi')->hapusDataProdi($id_prodi) > 0) {
                Flasher::setFlash('Data Berhasil','Dihapus', 'success');
                header('Location: '.BASEURL.'?url=Baak/data_akademik');
                exit;
            }else {
                Flasher::setFlash('Data Gagal','Dihapus', 'danger');
                header('Location: '.BASEURL.'?url=Baak/data_akademik');
                exit;
            }
        }else {
            Flasher::setFlash('Prodi Sudah Mempunyai Kelas Jangan Sembarangan','Dihapus', 'danger');
            header('Location: '.BASEURL.'?url=Baak/data_akademik');
            exit;
        }
        
    }

    public function getUbahProdi()
    {
        echo json_encode($this->model('Model_prodi')->getDataProdiById($_POST['id']));
    }

    public function ubahProdi()
    {
        session_start();
        if ($this->model('Model_prodi')->ubahDataProdi($_POST) > 0) {
            Flasher::setFlash('Data Berhasil','Diubah', 'success');
            header('Location: '.BASEURL.'?url=Baak/data_akademik');
            exit;
        }else {
            Flasher::setFlash('Data Gagal','Diubah', 'danger');
            header('Location: '.BASEURL.'?url=Baak/data_akademik');
            exit;
        }
    }



    // ==================== CARI PRODI ====================

    public function cariProdi()
    {
        session_start();
        $user = $_SESSION['user'];
        $data['judul'] = 'Data Akademik - Presline';
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['prodi'] = $this->model('Model_prodi')->cariDataProdi();
        $this->view('templates/header_baak', $data);
        $this->view('baak/data_akademik', $data);
        $this->view('templates/footer_baak');
    }

    // ==================== IMPORT PRODI ====================

    public function import_data()
    {
        session_start();
        $user = $_SESSION['user'];
        $data['judul'] = 'Data Akademik - Presline';
        $data['user'] = $this->model('Model_user')->getUser($user);
        $this->view('templates/header_baak', $data);
        $this->view('baak/import_prodi', $data);
        $this->view('templates/footer_baak');
    }

    public function import()
    {
        if (isset($_POST['preview'])) {
            $nama_file_baru = $_FILES['file']['tmp_name'];

            if (is_file('public/tmp/'.$nama_file_baru)) 
                unlink('public/tmp/'.$nama_file_baru);

                $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                $tmp_file = $_FILES['file']['tmp_name'];

                if ($ext == "xlsx") {
                    move_uploaded_file($tmp_file, 'public/tmp/'.$nama_file_baru);

                    // Load library PHPEXCEL
                    require_once 'public/PHPExcel-1.8/Classes/PHPExcel.php';

                    $excelreader = new PHPExcel_Reader_Excel2007();
                    $loadexcel = $excelreader->load('public/tmp/'.$nama_file_baru);
                    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

                    foreach($sheet as $row){
                        $id_prodi = $row['A'];
                        $nama_prodi = $row['B'];
                        $singkatan_prodi = $row['C'];
                        $nama_kaprodi = $row['D'];
                        $nidn_kaprodi = $row['E'];

                        var_dump($id_prodi);
                        var_dump($nama_prodi);
                        var_dump($singkatan_prodi);
                        var_dump($nama_kaprodi);
                        var_dump($nidn_kaprodi);
                    }
                }else {
                    echo "xlsx";
                }

        }
    }
}