<?php

class Data_mhs extends Controller
{
    public function data_viewMhs($id_kelas)
    {
        session_start();
        $_SESSION['id_kelas'] = $id_kelas;
        header('Location: '.BASEURL.'?url=Data_mhs/viewMhs');
    }

    public function viewMhs()
    {
        session_start();
        $id_prodi = $_SESSION['id_prodi'];
        $id_kelas = $_SESSION['id_kelas'];
        $data['judul'] = 'Data Mahasiswa - Presline';
        $user = $_SESSION['user'];
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['kelas'] = $this->model('Model_kelas')->getKelas($id_kelas);
        $data['prodi_1'] = $this->model('Model_prodi')->getProdi($id_prodi);
        $data['mhs'] = $this->model('Model_mahasiswa')->getMhs($id_kelas);
        $this->view('templates/header_baak', $data);
        $this->view('baak/viewMhs', $data);
        $this->view('templates/footer_baak');
    }

    public function data_jadwal()
    {
        session_start();
        $id_prodi = $_SESSION['id_prodi'];
        $id_kelas = $_SESSION['id_kelas'];
        $data['judul'] = 'Data Mahasiswa - Presline';
        $user = $_SESSION['user'];
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['kelas'] = $this->model('Model_kelas')->getKelas($id_kelas);
        $data['prodi_1'] = $this->model('Model_prodi')->getProdi($id_prodi);
        $data['mk'] = $this->model('Model_matkul')->getAllMk();
        $data['mhs'] = $this->model('Model_mahasiswa')->getMhs($id_kelas);
        $this->view('templates/header_baak', $data);
        $this->view('baak/data_jadwal', $data);
        $this->view('templates/footer_baak');
    }


    // ========================= CRUD KELAS MATA KULIAH =========================
    public function tambahJadwal()
    {
        session_start();
        $id_kelas = $_SESSION['id_kelas'];
        $id_mk = $_POST['id_mk'];
        $tanggal_perkuliahan = $_POST['tanggal_perkuliahan'];

        $data['mk_sesi'] = $this->model('Model_sesi')->getMkSesi($id_mk);
        $i = 7;
						
		for($j = 0; $j <= count($data['mk_sesi']); $j++)
        {
            foreach ($data['mk_sesi'] as $index => $mk_sesi) {
                if ($index == $j) {
                    $tgl1 = $tanggal_perkuliahan;// pendefinisian tanggal awal
                    $tgl2 = date('D Y-m-d', strtotime('+'.$i*$j.' days', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak 7 hari
                    $id_mk_sesi = $mk_sesi['id_mk_sesi'];
                    echo "Insert ".$tgl2." ".$id_mk_sesi." ".$id_kelas."<br>"; //print tanggal
                    // $this->model('Model_kelas')->tambahJdwl($id_mk_sesi, $tgl2, $id_kelas);
                }
            }
        }
    }


    // ========================= CRUD MAHASISWA =========================
    public function tambahMhs()
    {
        session_start();
        if ($this->model('Model_user')->tambahUserMhs($_POST) > 0) {
            if ($this->model('Model_mahasiswa')->tambahDataMhs($_POST) > 0) {
                if ($this->model('Model_kelas')->tambahKelasPeserta($_POST) > 0) {
                    Flasher::setFlash('Data Berhasil','Ditambahkan', 'success');
                    header('Location: '.BASEURL.'?url=Data_mhs/viewMhs');
                    exit;
                }else {
                    Flasher::setFlash('Data Kelas Peserta Gagal','Ditambahkan', 'danger');
                    header('Location: '.BASEURL.'?url=Data_mhs/viewMhs');
                    exit;
                }
            }else {
                Flasher::setFlash('Data Mhs Gagal','Ditambahkan', 'danger');
                header('Location: '.BASEURL.'?url=Data_mhs/viewMhs');
                exit;
            }
        }else {
            Flasher::setFlash('Data User Gagal','Ditambahkan', 'danger');
            header('Location: '.BASEURL.'?url=Data_mhs/viewMhs');
            exit;
        }
    }

    public function hapusMhs($user)
    {
        session_start();
        if ($this->model('Model_kelas')->hapusKelasPeserta($user) > 0) {
            if ($this->model('Model_mahasiswa')->hapusDataMhs($user) > 0) {
                if ($this->model('Model_user')->hapusUserMhs($user) > 0) {
                    Flasher::setFlash('Data Berhasil','Dihapus', 'success');
                    header('Location: '.BASEURL.'?url=Data_mhs/viewMhs');
                    exit;
                }else {
                    Flasher::setFlash('Data Gagal','Dihapus', 'danger');
                    header('Location: '.BASEURL.'?url=Data_mhs/viewMhs');
                    exit;
                }
            }
        }
        
    }

    public function getUbahMhs()
    {
        echo json_encode($this->model('Model_mahasiswa')->getDataMhsById($_POST['id']));
    }

    public function ubahMhs()
    {
        session_start();
        if ($this->model('Model_mahasiswa')->ubahDataMhs($_POST) > 0) {
            Flasher::setFlash('Data Berhasil','Diubah', 'success');
            header('Location: '.BASEURL.'?url=Data_mhs/viewMhs');
            exit;
        }else {
            Flasher::setFlash('Data Gagal','Diubah', 'danger');
            header('Location: '.BASEURL.'?url=Data_mhs/viewMhs');
            exit;
        }
    }
    // END DATA MAHASISWA



    
    // ==================== CARI MAHASISWA ====================

    public function cariMhs()
    {
        session_start();
        $id_prodi = $_SESSION['id_prodi'];
        $id_kelas = $_SESSION['id_kelas'];
        $data['judul'] = 'Data Mahasiswa - Presline';
        $user = $_SESSION['user'];
        $data['user'] = $this->model('Model_user')->getUser($user);
        $data['kelas'] = $this->model('Model_kelas')->getKelas($id_kelas);
        $data['prodi_1'] = $this->model('Model_prodi')->getProdi($id_prodi);
        $data['prodi'] = $this->model('Model_prodi')->getAllProdi();
        $data['mhs'] = $this->model('Model_mahasiswa')->cariDataMahasiswa($id_kelas);
        $this->view('templates/header_baak', $data);
        $this->view('baak/viewMhs', $data);
        $this->view('templates/footer_baak');
    }
}
