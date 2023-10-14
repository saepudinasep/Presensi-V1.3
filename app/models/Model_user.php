<?php

class Model_user
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // ====================TAMBAH & DELETE DATA USER MHS ========================
    public function tambahUserMhs($data)
    {
        $query = "INSERT INTO tb_user (username, password, admin_level, tanggal_buat, folder_uploads)
         VALUES (:nim, MD5(:nim), '1', current_timestamp(), NULL)";

         $this->db->query($query);
         $this->db->bind('nim', $data['nim']);

         $this->db->execute();

         return $this->db->rowCount();
    }

    public function hapusUserMhs($user)
    {
        $query = "DELETE FROM tb_user WHERE username = :user";
        $this->db->query($query);
        $this->db->bind('user', $user);

        $this->db->execute();

        return $this->db->rowCount();
    }

    // ====================TAMBAH DATA USER DOSEN ========================
    public function tambahUserDosen($data)
    {
        $query = "INSERT INTO tb_user (username, password, admin_level, tanggal_buat, folder_uploads)
         VALUES (:username, MD5(:username), '2', current_timestamp(), NULL)";

         $this->db->query($query);
         $this->db->bind('username', $data['username']);

         $this->db->execute();

         return $this->db->rowCount();
    }

    public function hapusUserDosen($user)
    {
        $query = "DELETE FROM tb_user WHERE username = :user";
        $this->db->query($query);
        $this->db->bind('user', $user);

        $this->db->execute();

        return $this->db->rowCount();
    }



    // ==================== MENAMPILKAN LEADERBOARD ========================
    public function getLeaderboard($id_sesi)
    {
        $this->db->query('SELECT * FROM tb_presensi, tb_mhs, tb_mk_sesi WHERE 
        tb_presensi.username = tb_mhs.username AND tb_presensi.id_mk_sesi = tb_mk_sesi.id_mk_sesi 
        AND tb_presensi.id_mk_sesi = :id_sesi ORDER BY tb_presensi.poin_presensi DESC LIMIT 10');
        $this->db->bind('id_sesi', $id_sesi);
        return $this->db->resulset();
    }

    public function getAllLeaderboard()
    {
        $this->db->query('SELECT tb_mhs.nama_mhs as nama_mhs, SUM(tb_presensi.poin_presensi) AS point 
        FROM tb_user, tb_mhs, tb_presensi WHERE tb_user.username = tb_presensi.username AND 
        tb_mhs.username = tb_presensi.username GROUP BY tb_mhs.nama_mhs ORDER BY point DESC LIMIT 10');
        return $this->db->resulset();
    }

    public function getDataHadirDosen($user)
    {
        $this->db->query('SELECT COUNT(tb_mk_sesi.id_mk_sesi) as jumlah FROM tb_user,tb_mk_sesi, tb_presensi WHERE 
        tb_user.username = tb_mk_sesi.dosen_pengajar AND 
        tb_mk_sesi.dosen_pengajar = :user AND 
        tb_presensi.username = tb_mk_sesi.dosen_pengajar AND 
        tb_presensi.id_mk_sesi = tb_mk_sesi.id_mk_sesi');
        $this->db->bind('user', $user);
        return $this->db->resulset();
    }

    public function getTidakHadirDosen($user)
    {
        $this->db->query('SELECT COUNT(tb_mk_sesi.id_mk_sesi) as jumlah FROM tb_user,tb_mk_sesi, tb_presensi WHERE 
        tb_user.username = tb_mk_sesi.dosen_pengajar AND 
        tb_mk_sesi.dosen_pengajar = :user AND 
        tb_presensi.username = tb_mk_sesi.dosen_pengajar AND 
        tb_presensi.id_mk_sesi != tb_mk_sesi.id_mk_sesi');
        $this->db->bind('user', $user);
        return $this->db->resulset();
    }

    public function getDataHadirMhs($id, $user)
    {
        $this->db->query('SELECT COUNT(tb_mk_sesi.id_mk_sesi) as jumlah FROM tb_mk_kelas, tb_mk, tb_kelas, tb_mk_sesi, tb_presensi WHERE 
        tb_mk_kelas.id_mk = tb_mk.id_mk AND tb_mk_kelas.id_kelas = tb_kelas.id_kelas AND 
        tb_mk_sesi.id_mk = tb_mk.id_mk AND tb_presensi.id_mk_sesi = tb_mk_sesi.id_mk_sesi AND 
        tb_mk_kelas.id_kelas = :id AND tb_presensi.username = :user ORDER BY tb_mk.id_mk');
        $this->db->bind('id', $id);
        $this->db->bind('user', $user);
        return $this->db->resulset();
    }

    public function getTidakHadirMhs($id, $user)
    {
        $this->db->query('SELECT COUNT(tb_mk_sesi.id_mk_sesi) as jumlah FROM tb_mk_kelas, tb_mk, tb_kelas, tb_mk_sesi, tb_presensi WHERE 
        tb_mk_kelas.id_mk = tb_mk.id_mk AND tb_mk_kelas.id_kelas = tb_kelas.id_kelas AND 
        tb_mk_sesi.id_mk = tb_mk.id_mk AND tb_presensi.id_mk_sesi != tb_mk_sesi.id_mk_sesi AND 
        tb_mk_kelas.id_kelas = :id AND tb_presensi.username = :user GROUP BY tb_mk.id_mk ORDER BY tb_mk.id_mk');
        $this->db->bind('id', $id);
        $this->db->bind('user', $user);
        return $this->db->resulset();
    }





    public function getUser($user)
    {
        $this->db->query('SELECT * FROM tb_user WHERE username = :user');
        $this->db->bind('user', $user);
        return $this->db->single();
    }

    // start database mahasiswa
    public function getMahasiswaByUser($user)
    {
        $this->db->query('SELECT * FROM tb_kelas_peserta,
        tb_kelas, tb_mhs, tb_user WHERE tb_kelas_peserta.id_kelas = tb_kelas.id_kelas AND 
        tb_kelas_peserta.username = tb_mhs.username AND tb_mhs.username=tb_user.username AND 
        tb_kelas_peserta.username = :user');
        $this->db->bind('user', $user);
        return $this->db->single();
    }

    public function getMkById($id)
    {
        // username by
        $this->db->query('SELECT tb_mk.id_mk as id_mk, tb_mk.nama_mk as nama_mk,
         tb_mk.mk_desc as mk_desc FROM tb_mk_kelas, tb_mk, tb_kelas
          WHERE tb_mk_kelas.id_mk = tb_mk.id_mk AND tb_mk_kelas.id_kelas = tb_kelas.id_kelas
           AND tb_mk_kelas.id_kelas = :id ORDER BY tb_mk.id_mk');
        $this->db->bind('id', $id);
        return $this->db->resulset();
    }
    
    public function getSesiMkMhsById($id)
    {
        $this->db->query('SELECT *, 
        (SELECT nama_mk FROM tb_mk WHERE id_mk = tb_mk_sesi.id_mk) as nama_mk,
        (SELECT nama_dosen FROM tb_dosen WHERE username = tb_mk_sesi.dosen_pengajar) as nama_dosen 
        FROM tb_mk_sesi WHERE tb_mk_sesi.id_mk = :id
           ORDER BY id_mk_sesi ASC');
        $this->db->bind('id', $id);
        // $this->db->bind('user', $user);
        return $this->db->resulset();
    }
    // end database mahasiswa

    // start database dosen
    public function getDosenByUser($user)
    {
        $this->db->query('SELECT *,
        (SELECT nama_prodi FROM tb_prodi WHERE id_prodi=tb_dosen.id_prodi) as nama_prodi 
        FROM tb_dosen, tb_user WHERE tb_dosen.username = tb_user.username AND tb_dosen.username = :user ');
        $this->db->bind('user', $user);
        return $this->db->single();
    }

    public function getMkByUser($user)
    {
        $this->db->query('SELECT tb_mk.id_mk as id_mk, tb_mk.nama_mk as nama_mk, tb_mk.mk_desc as mk_desc FROM tb_mk, tb_mk_sesi WHERE tb_mk.id_mk = tb_mk_sesi.id_mk AND tb_mk_sesi.dosen_pengajar = :user GROUP BY tb_mk.nama_mk');
        $this->db->bind('user', $user);
        return $this->db->resulset();
    }
    
    public function getSesiMkById($id)
    {
        $this->db->query('SELECT *, 
        (SELECT nama_mk FROM tb_mk WHERE id_mk = tb_mk_sesi.id_mk) as nama_mk,
        (SELECT nama_dosen FROM tb_dosen WHERE username = tb_mk_sesi.dosen_pengajar) as nama_dosen 
        FROM tb_mk_sesi WHERE tb_mk_sesi.id_mk = :id
           ORDER BY id_mk_sesi ASC');
        $this->db->bind('id', $id);
        return $this->db->resulset();
    }

    public function getSesiMkByUserId($user, $id)
    {
        $this->db->query('SELECT * FROM tb_mk_sesi, tb_mk, tb_dosen 
        WHERE tb_mk_sesi.id_mk = tb_mk.id_mk AND tb_mk_sesi.dosen_pengajar = tb_dosen.username AND 
        tb_mk_sesi.dosen_pengajar = :user AND tb_mk_sesi.id_mk = :id');
        $this->db->bind('user', $user);
        $this->db->bind('id', $id);
        return $this->db->resulSet();
    }

    public function ubahMkDesc($data)
    {
        $query = "UPDATE tb_mk SET
          mk_desc= :mk_desc
           WHERE
            id_mk= :id";

       $this->db->query($query);
       $this->db->bind('mk_desc', $data['mk_desc']);
       $this->db->bind('id', $data['id']);

       $this->db->execute();

       return $this->db->rowCount();
    }

    public function getMkSesiById($id_sesi)
    {
        $this->db->query('SELECT *,DATE_ADD(start_sesi_kuliah, INTERVAL 90 HOUR_MINUTE) as jatuh_tempo FROM tb_mk_sesi, tb_mk 
        WHERE tb_mk_sesi.id_mk = tb_mk.id_mk AND tb_mk_sesi.id_mk_sesi = :id_sesi');
        // $this->db->bind('user', $user);
        $this->db->bind('id_sesi', $id_sesi);
        return $this->db->single();
    }

    public function getMkKuliah($id_mk)
    {
        $this->db->query('SELECT * FROM tb_mk WHERE id_mk = :id_mk');
        // $this->db->bind('user', $user);
        $this->db->bind('id_mk', $id_mk);
        return $this->db->single();
    }

    public function updateSesi($id_sesi)
    {
        $query = "UPDATE tb_mk_sesi SET
          no_subject= '1'
           WHERE
            id_mk_sesi= :id_sesi";

       $this->db->query($query);
       $this->db->bind('id_sesi', $id_sesi);

       $this->db->execute();

    //    return $this->db->rowCount();
    }

    public function UpdateMkSesi($id)
    {
        // $id = $_SESSION['id_sesi'];
        $query = "UPDATE tb_mk_sesi SET
          status_mk_sesi= '1',
          start_sesi_kuliah = CURRENT_TIMESTAMP
           WHERE
            id_mk_sesi= :id";

       $this->db->query($query);
    //    $this->db->bind('durasi_kuliah', $durasi_kuliah);
       $this->db->bind('id', $id);

       $this->db->execute();

       return $this->db->rowCount();
    }

    public function UpdateMkSesiDua($id)
    {
        $query = "UPDATE tb_mk_sesi SET
          status_mk_sesi= '0',
          stop_perkuliahan = CURRENT_TIMESTAMP
           WHERE
            id_mk_sesi= :id";

       $this->db->query($query);
       $this->db->bind('id', $id);

       $this->db->execute();

       return $this->db->rowCount();
    }

    public function updateSesiDua($id_sesi)
    {
        $query = "UPDATE tb_mk_sesi SET
          no_subject= '0'
           WHERE
            id_mk_sesi= :id_sesi";

       $this->db->query($query);
       $this->db->bind('id_sesi', $id_sesi);

       $this->db->execute();

    //    return $this->db->rowCount();
    }
    // end database dosen


    // JOIN MHS
    public function getJoinMhs($id_sesi, $id_mk)
    {
        $this->db->query('SELECT * FROM tb_mk_sesi, tb_mk_kelas, tb_kelas, tb_kelas_peserta, tb_mhs, tb_user 
        WHERE tb_mk_sesi.id_mk = tb_mk_kelas.id_mk 
        AND tb_mk_kelas.id_kelas=tb_kelas_peserta.id_kelas AND tb_mk_kelas.id_kelas=tb_kelas.id_kelas AND 
        tb_kelas_peserta.username = tb_mhs.username AND tb_mhs.username = tb_user.username AND 
        tb_mk_sesi.id_mk = :id_mk AND 
        tb_mk_sesi.id_mk_sesi = :id_sesi');
        $this->db->bind('id_mk', $id_mk);
        $this->db->bind('id_sesi', $id_sesi);
        return $this->db->resulSet();
    }
    // END
}