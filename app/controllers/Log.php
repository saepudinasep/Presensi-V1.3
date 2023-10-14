<?php

class Log extends Controller
{
    public function index()
    {
        $data['judul'] = 'Presline - STMIK IKMI Cirebon';

        $this->view('log/index', $data);
    }

    public function login()
    {
        session_start();
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $data['login'] = $this->model('Model_Log')->getLogin($user, $pass);

        if ($data['login'] == NULL) {

            Flasher::setFlash('Username atau Password', 'Tidak Terdaftar', 'danger');
            header("Location:" . BASEURL . "?url=Log/index");
        } else {
            foreach ($data['login'] as $row) :
                $_SESSION['user'] = $row['username'];
                $_SESSION['pass'] = $row['password'];
                $_SESSION['level'] = $row['admin_level'];

                $user_md5 = md5($row['username']);


                if ($user == $pass) {
                    if ($_SESSION['level'] == 1) {
                        $this->model('Model_Log')->UpdateLogin($user);
                        $_SESSION['nama'] = $row['nama_mhs'];
                        header("Location:" . BASEURL . "?url=Log/ubah_password");
                        exit;
                    } elseif ($_SESSION['level'] == 2) {
                        $this->model('Model_Log')->UpdateLogin($user);
                        $_SESSION['nama'] = $row['nama_dosen'];
                        header("Location:" . BASEURL . "?url=Log/ubah_password");
                        exit;
                    } else {
                        $this->model('Model_Log')->UpdateLogin($user);
                        $_SESSION['nama'] = $row['username'];
                        header("Location:" . BASEURL . "?url=Log/ubah_password");
                        exit;
                    }
                } else {
                    if ($_SESSION['level'] == 1) {
                        $this->model('Model_Log')->UpdateLogin($user);
                        $_SESSION['nama'] = $row['nama_mhs'];
                        Flasher::setFlash('Selamat Datang ' . $_SESSION['nama'], 'Anda Login Sebagai Mahasiswa', 'success');
                        header("Location:" . BASEURL . "?url=User/index");
                        exit;
                    } elseif ($_SESSION['level'] == 2) {
                        $this->model('Model_Log')->UpdateLogin($user);
                        Flasher::setFlash('Selamat Datang ' . $_SESSION['nama'], 'Anda Login Sebagai Dosen', 'success');
                        $_SESSION['nama'] = $row['nama_dosen'];
                        header("Location:" . BASEURL . "?url=User/index");
                        exit;
                    } else {
                        $this->model('Model_Log')->UpdateLogin($user);
                        Flasher::setFlash('Selamat Datang ' . $_SESSION['user'], 'Anda Login Sebagai Baak', 'success');
                        $_SESSION['nama'] = $row['username'];
                        header("Location:" . BASEURL . "?url=Baak/dashboard");
                        exit;
                    }
                }
            endforeach;
        }
    }

    public function ubah_password()
    {
        session_start();
        $this->view('log/ubah_password');
    }

    public function ubah_pass()
    {
        session_start();
        $level = $_POST['admin_lev'];
        $user = $_SESSION['user'];
        $pass = $_POST['pass_session'];
        $pass_default = md5($_POST['pass_default']);
        $pass_new = md5($_POST['pass_new']);
        $pass_confirm = md5($_POST['pass_confirm']);

        if ($pass_default == $pass) {
            // jika password default dan sesi sama maka jalankan perintah dibawah
            if ($pass_default == $pass_new) {

                Flasher::setFlash('Password Masih', 'Default', 'danger');
                header("Location:" . BASEURL . "?url=Log/ubah_password");
                exit;
            }
            // jika tidak maka jalankan perintah dibawah
            else {
                if ($pass_new == $pass_confirm) {
                    // jika password baru dan password konfirmasi sama maka jalankan perintah update password

                    $this->model('Model_Log')->pass_ubah($user, $pass_new);
                    header("Location:" . BASEURL . "?url=Log/upload_foto");
                    exit;
                }
                // jika tidak maka tampilkan pesan password konfirmasi berbeda
                else {
                    Flasher::setFlash('Password Konfirmasi', 'Berbeda', 'danger');
                    header("Location:" . BASEURL . "?url=Log/ubah_password");
                    exit;
                }
            }
        }
        // jika tidak maka tampilkan pesan error
        else {
            Flasher::setFlash('Password Default', 'Salah', 'danger');
            header("Location:" . BASEURL . "?url=Log/ubah_password");
            exit;
        }
    }

    public function upload_foto()
    {
        $data['judul'] = 'Presline - STMIK IKMI Cirebon';
        $this->view('log/upload_foto', $data);
    }

    public function upload()
    {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        // cek apakah tidak ada gambar yang diupload
        if ($error === 4) {
            echo "<script>
                    alert('pilih gambar terlebih dahulu!');
                    </script>";
            return false;
        }

        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
                    alert('yang anda upload bukan gambar!');
            </script>";
            return false;
        }

        // cek jika ukuran terlalu besar
        if ($ukuranFile > 1000000) {
            echo "<script>
                    alert('ukuran gambar terlalu besar!');
            </script>";
            return false;
        }

        // lulus pengecekan, gambar siap diupload
        // generate nama gambar baru
        $namaFileBaru = '_' . uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'public/img/_uploads/' . $namaFileBaru);

        return $namaFileBaru;
    }

    public function foto_profile()
    {
        session_start();
        $user = $_POST['user'];
        // $user = $_SESSION['user'];
        // Upload gambar
        $gambar = $this->upload();
        if (!$gambar) {
            Flasher::setFlash('Data Gagal', 'Diupload', 'danger');
            header('Location: ' . BASEURL . '?url=Log/upload_foto');
            return false;
        }

        if ($this->model('Model_Log')->uploadFoto($user, $gambar) > 0) {
            if ($_SESSION['level'] == 1) {
                // $_SESSION['nama'] = $row['nama_mhs'];
                Flasher::setFlash('Selamat Datang ' . $_SESSION['nama'], 'Anda Login Sebagai Mahasiswa', 'success');
                header("Location:" . BASEURL . "?url=User/index");
                exit;
            } elseif ($_SESSION['level'] == 2) {
                Flasher::setFlash('Selamat Datang ' . $_SESSION['nama'], 'Anda Login Sebagai Dosen', 'success');
                // $_SESSION['nama'] = $row['nama_dosen'];
                header("Location:" . BASEURL . "?url=User/index");
                exit;
            } else {
                Flasher::setFlash('Selamat Datang ' . $_SESSION['user'], 'Anda Login Sebagai Baak', 'success');
                // $_SESSION['nama'] = $row['username'];
                header("Location:" . BASEURL . "?url=Baak/dashboard");
                exit;
            }
        } else {
            Flasher::setFlash('Data Gagal', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '?url=Log/upload_foto');
            exit;
        }
    }


    public function editProfile()
    {
        session_start();
        // $user = $_POST['user'];
        $user = $_SESSION['user'];
        // Upload gambar
        $gambar = $this->upload();
        if (!$gambar) {
            header('Location: ' . BASEURL . '?url=User/profile');
            return false;
        }

        if ($this->model('Model_Log')->uploadFoto($user, $gambar) > 0) {
            Flasher::setFlash('Foto profile Berhasil', 'Diubah', 'success');
            header('Location: ' . BASEURL . '?url=User/profile');
            exit;
        } else {
            Flasher::setFlash('Foto profile Gagal', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '?url=User/profile');
            exit;
        }
    }

    public function logout()
    {
        session_start();
        $user = $_SESSION['user'];
        $this->model('Model_Log')->UpdateLogin($user);
        unset($_SESSION['user']);
        session_destroy();
        header("Location:" . BASEURL);
    }
}
