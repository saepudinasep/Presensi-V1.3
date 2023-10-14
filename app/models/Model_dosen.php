<?php

class Model_dosen extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db= new Database;
    }

    
    public function getAllDosen()
    {
        $this->db->query('SELECT * FROM tb_dosen ORDER BY nama_dosen');
         return $this->db->resulSet();
    }

    public function getDosenByUser($user)
    {
        $this->db->query('SELECT *,
        (SELECT nama_prodi FROM tb_prodi WHERE id_prodi=tb_dosen.id_prodi) as nama_prodi
         FROM tb_dosen WHERE username = :user ');
        $this->db->bind('user', $user);
        return $this->db->single();
    }
    
    public function getUserByUser($user)
    {
        $this->db->query('SELECT * FROM tb_user WHERE username = :user ');
        $this->db->bind('user', $user);
        return $this->db->single();
    }

    public function getMkByUser($user)
    {
        $this->db->query('SELECT tb_mk.id_mk as id_mk, tb_mk.nama_mk as nama_mk, tb_mk.mk_desc as mk_desc FROM tb_mk, tb_mk_sesi WHERE tb_mk.id_mk = tb_mk_sesi.id_mk AND tb_mk_sesi.dosen_pengajar = :user GROUP BY tb_mk.nama_mk');
        $this->db->bind('user', $user);
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

    public function getSesiMkJoinById($id_sesi)
    {
        $this->db->query('SELECT * FROM tb_mk_sesi, tb_mk
         WHERE tb_mk_sesi.id_mk = tb_mk.id_mk AND
          tb_mk_sesi.id_mk_sesi = :id_sesi');
        $this->db->bind('id_sesi', $id_sesi);
        return $this->db->single();
    }

    public function getJoinMhs($id_sesi, $id_mk)
    {
        $this->db->query('SELECT * FROM tb_mk_sesi, tb_mk_kelas, tb_kelas, tb_kelas_peserta, tb_mhs 
        WHERE tb_mk_sesi.id_mk = tb_mk_kelas.id_mk 
        AND tb_mk_kelas.id_kelas=tb_kelas_peserta.id_kelas AND tb_mk_kelas.id_kelas=tb_kelas.id_kelas AND 
        tb_kelas_peserta.username = tb_mhs.username AND tb_mk_sesi.id_mk = :id_mk AND 
        tb_mk_sesi.id_mk_sesi = :id_sesi');
        $this->db->bind('id_mk', $id_mk);
        $this->db->bind('id_sesi', $id_sesi);
        return $this->db->resulSet();
    }


    // =============== CRUD DOSEN ===============
    public function tambahDataDosen($data)
    {
        if ($data['nidn']=='') {
            $nidn = NULL;
        }else {
            $nidn = $data['nidn'];
        }
        $query = "INSERT INTO tb_dosen
                VALUES
                ('', :nama, :nidn, NULL, :username, '1', current_timestamp())";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nidn', $nidn);
        $this->db->bind('username', $data['username']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataDosen($user)
    {
        $query = "DELETE FROM tb_dosen WHERE username = :user";
        $this->db->query($query);
        $this->db->bind('user', $user);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getDataDosenById($id)
    {
        $query = "SELECT *, 
        (SELECT nama_prodi FROM tb_prodi WHERE id_prodi=tb_dosen.id_prodi) as nama_prodi
         FROM tb_dosen WHERE id_dosen = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function ubahDataDosen($data)
    {
        if ($data['nidn']=='') {
            $nidn = NULL;
        }else {
            $nidn = $data['nidn'];
        }
        $query = "UPDATE tb_dosen SET
         nama_dosen= :nama,
          nidn= :nidn
            WHERE
             id_dosen= :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nidn', $nidn);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }





    // =============== PRESENSI DOSEN ===============
    public function getDosen($username)
    {
        $this->db->query('SELECT *,
        (SELECT nama_prodi FROM tb_prodi WHERE id_prodi=tb_dosen.id_prodi) as nama_prodi
         FROM tb_dosen WHERE username = :username ');
        $this->db->bind('username', $username);
        return $this->db->single();
    }


    
    // =============== CARI DATA DOSEN ===============
    public function cariDataDosen()
    {
        $keyword = $_POST['keyword'];


        $query = "SELECT * FROM tb_dosen WHERE nama_dosen LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resulSet();
    }
}