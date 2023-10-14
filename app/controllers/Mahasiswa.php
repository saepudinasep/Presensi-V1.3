<?php

class Mahasiswa extends Controller {
    public function dashboard()
    {
        session_start();
        $user = $_SESSION['user'];
        // $user
        $data['judul'] = 'Presline - Dashboard';
        $data['mahasiswa'] = $this->model('Model_mahasiswa')->getMahasiswaByUser($user);
        if ($data['mahasiswa']==NULL) {
            unset($_SESSION);
            session_destroy();
            echo "
            <script>
            alert('Maaf anda belum tergabung dalam Kelas manapun di sistem ini!!');
            window.location = '".BASEURL."';
            </script>
            ";
        }else {
            $this->view('templates/header_mhs', $data);
            $this->view('mahasiswa/dashboard', $data);
            $this->view('templates/footer');
        }
    }

    public function mata_kuliah($id)
    {
        session_start();
        $user = $_SESSION['user'];
        // $user
        $data['mahasiswa'] = $this->model('Model_mahasiswa')->getMahasiswaByUser($user);
        $data['judul'] = 'Presline - Mata Kuliah';
        $data['mk'] = $this->model('Model_mahasiswa')->getMkById($id);
        $this->view('templates/header_mhs', $data);
        $this->view('mahasiswa/mata_kuliah', $data);
        $this->view('templates/footer');
    }
    
    public function sesi_kuliah($id)
    {
        session_start();
        $user = $_SESSION['user'];
        // $user
        $data['mahasiswa'] = $this->model('Model_mahasiswa')->getMahasiswaByUser($user);
        $data['judul'] = 'Presline - Sesi Kuliah';
        $data['sesi_mk'] = $this->model('Model_mahasiswa')->getSesiMkById($id);
        $this->view('templates/header_mhs', $data);
        $this->view('mahasiswa/sesi_kuliah', $data);
        $this->view('templates/footer');
    }

    public function profile()
    {
        session_start();
        $user = $_SESSION['user'];
        // $user
        $data['mahasiswa'] = $this->model('Model_mahasiswa')->getMahasiswaByUser($user);
        $data['judul'] = 'Presline - Mata Kuliah';
        $this->view('templates/header_mhs', $data);
        $this->view('mahasiswa/profile', $data);
        $this->view('templates/footer');
    }

    public function join_sesi($id_sesi, $id_mk)
    {
        session_start();
        $user = $_SESSION['user'];
        // $user
        $data['mahasiswa'] = $this->model('Model_mahasiswa')->getMahasiswaByUser($user);
        $data['judul'] = 'Presline - Join Sesi';
        $data['join_sesi'] = $this->model('Model_dosen')->getSesiMkJoinById($id_sesi);
        $data['mhs'] = $this->model('Model_dosen')->getJoinMhs($id_sesi, $id_mk);
        // $data['mhs'] = $this->model('Model_dosen')->getMhsBy;
        $this->view('templates/header_mhs', $data);
        $this->view('mahasiswa/join_sesi', $data);
        $this->view('templates/footer');
    }

    public function leaderboard()
    {
        session_start();
        $this->view('templates/header_mhs');
        $this->view('mahasiswa/leaderboard');
        // $this->view('templates/footer');
    }
}