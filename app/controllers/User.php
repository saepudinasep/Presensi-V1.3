<?php

class User extends Controller {
    public function index()
    {
        session_start();
        $data['judul'] = "Presline - Dashboard";
        $user = $_SESSION['user'];
        if ($_SESSION['level']==1) {
            $data['user'] = $this->model('Model_user')->getMahasiswaByUser($user);
            $id = $data['user']['id_kelas'];
            $data['mk'] = $this->model('Model_user')->getMkById($id);
            $data['data_hadir'] = $this->model('Model_user')->getDataHadirMhs($id, $user);
            $data['tidak_hadir'] = $this->model('Model_user')->getTidakHadirMhs($id, $user);
            $this->view('templates/header_user', $data);
            $this->view('user/index', $data);
            $this->view('templates/footer');
        }elseif ($_SESSION['level']==2) {
            $data['user'] = $this->model('Model_user')->getDosenByUser($user);
            $data['data_hadir'] = $this->model('Model_user')->getDataHadirDosen($user);
            $data['tidak_hadir'] = $this->model('Model_user')->getTidakHadirDosen($user);
            $data['mk'] = $this->model('Model_user')->getMkByUser($user);
            $this->view('templates/header_user', $data);
            $this->view('user/index', $data);
            $this->view('templates/footer');
        }elseif ($_SESSION['level']==3) {
            header("Location:".BASEURL."?url=Baak/dashboard");
        }
    }

    public function mata_kuliah()
    {
        session_start();
        $data['judul'] = "Presline - Mata Kuliah";
        $user = $_SESSION['user'];
        if ($_SESSION['level']==1) {
            $data['user'] = $this->model('Model_user')->getMahasiswaByUser($user);
            $id = $data['user']['id_kelas'];
            $data['mk'] = $this->model('Model_user')->getMkById($id);
            $this->view('templates/header_user', $data);
            $this->view('user/mata_kuliah', $data);
            $this->view('templates/footer');
        }elseif ($_SESSION['level']==2) {
            $data['user'] = $this->model('Model_user')->getDosenByUser($user);
            $data['mk'] = $this->model('Model_user')->getMkByUser($user);
            $this->view('templates/header_user', $data);
            $this->view('user/mata_kuliah', $data);
            $this->view('templates/footer');

        }
    }

    public function ubahDesc()
    {
        session_start();
        if ($this->model('Model_user')->ubahMkDesc($_POST) > 0) {
            Flasher::setFlash('Deskripsi Berhasil','Diubah', 'success');
            header('Location: '.BASEURL.'?url=User/mata_kuliah');
            exit;
        }else {
            Flasher::setFlash('Deskripsi Gagal','Diubah', 'danger');
            header('Location: '.BASEURL.'?url=User/mata_kuliah');
            exit;
        }
    }

    // SESI KULIAH

    public function getKuliah($id_mk)
    {
        session_start();
        $_SESSION['id_mk'] = $id_mk;
        header('Location: '.BASEURL.'?url=User/sesi_kuliah');
    }

    public function waktu_ajax()
    {
        $this->view('user/waktu_ajax');
    }

    public function sesi_kuliah()
    {
        session_start();
        $id = $_SESSION['id_mk'];
        $data['mk'] = $this->model('Model_matkul')->getDataMkById($id);
        $data['judul'] = "Presline - Sesi Kuliah";
        $user = $_SESSION['user'];
        if ($_SESSION['level']==1) {
            $data['sesi_mk'] = $this->model('Model_user')->getSesiMkMhsById($id);
            // $this->view('user/mk_sesi', $data);
        }elseif ($_SESSION['level']==2) {
            $data['sesi_mk'] = $this->model('Model_user')->getSesiMkByUserId($user, $id);
            // $this->view('user/mk_sesi', $data);
        }
        $this->view('templates/header_user', $data);
        $this->view('user/sesi_kuliah', $data);
    }
    // arahkan ke join_sesi
    public function getSesi($id_sesi)
    {
        session_start();
        $_SESSION['id_sesi'] = $id_sesi;
        // $this->model('Model_user')->updateSesi($id_sesi);
        header('Location: '.BASEURL.'?url=User/join_sesi');
    }

    // END SESI KULIAH

    // JOIN SESI
    public function join_sesi()
    {
        session_start();
        $id_mk = $_SESSION['id_mk'];
        $id_sesi = $_SESSION['id_sesi'];
        $data['judul'] = "Presline - Join Sesi";
        $data['mk'] = $this->model('Model_user')->getMkKuliah($id_mk);
        $data['mk_info'] = $this->model('Model_user')->getMkSesiById($id_sesi);
        if ($_SESSION['level']==1) {
            $this->view('templates/header_user', $data);
            $this->view('user/join_sesi', $data);
        }elseif ($_SESSION['level']==2) {
            // belum dibuat
            $this->view('templates/header_user', $data);
            $this->view('user/join_sesi', $data);

        }
    }

    public function leaderboard($id_sesi)
    {
        session_start();
        $_SESSION['id_sesi'] = $id_sesi;
        header('Location: '.BASEURL.'?url=User/leaderboard_mhs');
        exit;
    }

    public function leaderboard_mhs()
    {
        session_start();
        $id_sesi = $_SESSION['id_sesi'];
        $data['judul'] = "Presline - Leaderboard";
        $data['leaderboard'] = $this->model('Model_user')->getLeaderboard($id_sesi);
        $this->view('templates/header_user', $data);
        $this->view('user/leaderboard_mhs', $data);
        // $this->view('templates/footer');
    }
    


    public function UpdateMk()
    {
        session_start();
        $id = $_SESSION['id_sesi'];
        if ($this->model('Model_user')->UpdateMkSesi($id) > 0) {
            header('Location: '.BASEURL.'?url=User/join_sesi');
            exit;
        }else {
            echo "Salahhhhhh";
        }
    }

    public function UpdateMkDua()
    {
        session_start();
        $id = $_SESSION['id_sesi'];
        $id_sesi = $_SESSION['id_sesi'];
        // $this->model('Model_user')->updateSesiDua($id_sesi);
        if ($this->model('Model_user')->UpdateMkSesiDua($id) > 0) {
            header('Location: '.BASEURL.'?url=User/join_sesi');
            exit;
        }else {
            echo "Salahhhhhh";
        }
    }

    public function UpdateDurasi()
    {
        session_start();
        $id_sesi = $_SESSION['id_sesi'];
        
    }

    public function mk_info_join()
    {
        session_start();
        $id_mk = $_SESSION['id_mk'];
        $id_sesi = $_SESSION['id_sesi'];
        $data['mk'] = $this->model('Model_user')->getMkKuliah($id_mk);
        $data['mk_info'] = $this->model('Model_user')->getMkSesiById($id_sesi);
        $this->view('user/mk_info_join', $data);
    }

    public function leave()
    {
        session_start();
        $user = $_SESSION['user'];
        if ($this->model('Model_Log')->updateLastActivity($user) > 0) {
            header('Location: '.BASEURL.'?url=User/mata_kuliah');
            exit;
        }else {
            echo "Salahhhhhh";
        }
    }

    public function leaderboard_join()
    {
        session_start();
        $id_sesi = $_SESSION['id_sesi'];
        $data['judul'] = "Presline - Leaderboard";
        $data['leaderboard'] = $this->model('Model_user')->getLeaderboard($id_sesi);
        $this->view('user/leaderboard_join', $data);
    }
    
    public function user_join()
    {
        session_start();
        $id_sesi = $_SESSION['id_sesi'];
        $id_mk = $_SESSION['id_mk'];

        $data['mhs'] = $this->model('Model_user')->getJoinMhs($id_sesi, $id_mk);
        $this->view('user/user_join', $data);
    }
    
    public function chat_join()
    {
        session_start();
        $this->view('user/chat_join');
    }
    

    // END JOIN SESI

    public function profile()
    {
        session_start();
        $data['judul'] = "Presline - Profile";
        $user = $_SESSION['user'];
        if ($_SESSION['level']==1) {
            $data['user'] = $this->model('Model_user')->getMahasiswaByUser($user);

            $this->view('templates/header_user', $data);
            $this->view('user/profile', $data);
            $this->view('templates/footer');
        }elseif ($_SESSION['level']==2) {
            $data['user'] = $this->model('Model_user')->getDosenByUser($user);
            
            $this->view('templates/header_user', $data);
            $this->view('user/profile', $data);
            $this->view('templates/footer');

        }
    }

    public function getUser()
    {
        session_start();
        $user = $_POST['username'];
        if ($_SESSION['level']=='1') {
            echo json_encode($this->model('Model_user')->getMahasiswaByUser($user));
        }elseif ($_SESSION['level']=='2') {
            echo json_encode($this->model('Model_user')->getDosenByUser($user));
        }
    }

    public function ubah_pass()
    {
        session_start();
        $pass = $_SESSION['pass'];
        $pass_default = md5($_POST['pass_default']);
        $pass_new = md5($_POST['pass_new']);
        $pass_confirm = md5($_POST['pass_confirm']);
        var_dump($pass_default);
        var_dump($pass_new);
        var_dump($pass_confirm);
        var_dump($pass);
        if ($pass_default == $pass) {
            if ($pass_default == $pass_new) {
                Flasher::setFlash('Password Masih','Default', 'danger');
                header("Location:".BASEURL."?url=User/profile");
                exit;
            }else {
                if ($pass_new == $pass_confirm) {
                    Flasher::setFlash('Password Berhasil','Diubah', 'success');
                    $this->model('Model_Log')->pass_ubah($user, $pass_new);
                    header("Location:".BASEURL."?url=User/profile");
                    exit;
                }else {
                    Flasher::setFlash('Password Konfirmasi','Berbeda', 'danger');
                    header("Location:".BASEURL."?url=User/profile");
                    exit;
                }
            }
        }else {
            Flasher::setFlash('Password Default','Salah', 'danger');
                header("Location:".BASEURL."?url=User/profile");
                exit;
        }
    }


    
}