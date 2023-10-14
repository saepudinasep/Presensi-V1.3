<?php

class Model_mahasiswa extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getAllPresensi($id_mk_sesi)
    {
        $id_kelas = $_SESSION['id_kelas'];
        $query = 'SELECT * FROM tb_presensi, tb_kelas, tb_kelas_peserta, tb_mk_sesi WHERE tb_presensi.username = tb_kelas_peserta.username AND tb_kelas.id_kelas = tb_kelas_peserta.id_kelas AND tb_kelas_peserta.id_kelas = :id_kelas AND tb_presensi.id_mk_sesi = tb_mk_sesi.id_mk_sesi AND tb_presensi.id_mk_sesi = :id_mk_sesi';
        $this->db->query($query);
        $this->db->bind('id_kelas', $id_kelas);
        $this->db->bind('id_mk_sesi', $id_mk_sesi);
        return $this->db->resulSet();
    }

    
    // MAHASISWA UNTUK DI DASHBOARD BAAK
    public function getAllMahasiswa()
    {
        $query = ('SELECT * FROM tb_mhs');
        $this->db->query($query);
        return $this->db->resulSet();
    }

    // MAHASISWA UNTUK DI KELAS ATAU DATA AKADEMIK
    public function getMhs($id_kelas)
    {
        $query = 'SELECT * FROM tb_kelas_peserta, tb_kelas, tb_mhs 
        WHERE tb_kelas_peserta.id_kelas = tb_kelas.id_kelas AND 
        tb_kelas_peserta.username = tb_mhs.username AND 
        tb_kelas_peserta.id_kelas = :id_kelas ORDER BY nama_mhs';
        $this->db->query($query);
        $this->db->bind('id_kelas', $id_kelas);
        return $this->db->resulSet();
    }

    // TAMBAH USER MAHASISWA



    // ========================= CRUD MAHASISWA =========================
    
    // start data_mahasiswa
    public function tambahDataMhs($data)
    {
        $id_prodi = $_SESSION['id_prodi'];
        $query = "INSERT INTO tb_mhs (id_mhs, nama_mhs, nama_panggilan, nim, id_prodi, username, status_mhs, tanggal_buat, gender)
         VALUES ('', :nama_mhs, NULL, :nim, :id_prodi, :nim, '1', current_timestamp(), :jk)";

         $this->db->query($query);
         $this->db->bind('nama_mhs', $data['nama_mhs']);
         $this->db->bind('nim', $data['nim']);
         $this->db->bind('id_prodi', $id_prodi);
         $this->db->bind('jk', $data['jk']);

         $this->db->execute();

         return $this->db->rowCount();
    }
    
    public function getDataMhsById($id)
    {
        $query = "SELECT *, 
        (SELECT nama_prodi FROM tb_prodi WHERE id_prodi=tb_mhs.id_prodi) as nama_prodi
         FROM tb_mhs WHERE id_mhs = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function ubahDataMhs($data)
    {
        $query = "UPDATE tb_mhs SET
         nama_mhs= :nama_mhs,
          nim= :nim,
           gender= :jk
            WHERE
             id_mhs= :id";

        $this->db->query($query);
        $this->db->bind('nama_mhs', $data['nama_mhs']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('jk', $data['jk']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    
    public function hapusDataMhs($user)
    {
        $query = "DELETE FROM tb_mhs WHERE username = :user";
        $this->db->query($query);
        $this->db->bind('user', $user);

        $this->db->execute();

        return $this->db->rowCount();
    }
    // end data_mahasiswa





    



    public function getMahasiswaByUser($user)
    {
        $this->db->query('SELECT tb_mhs.username as username, tb_mhs.nama_mhs as nama_mhs, 
        tb_kelas.kode_kelas as kode_kelas, tb_kelas.id_kelas as id_kelas FROM tb_kelas_peserta,
         tb_kelas, tb_mhs WHERE tb_kelas_peserta.id_kelas = tb_kelas.id_kelas AND 
         tb_kelas_peserta.username = tb_mhs.username AND tb_kelas_peserta.username = :user');
        $this->db->bind('user', $user);
        return $this->db->resulset();
    }

    public function getMkById($id)
    {
        $this->db->query('SELECT tb_mk.id_mk as id_mk, tb_mk.nama_mk as nama_mk,
         tb_mk.mk_desc as mk_desc FROM tb_mk_kelas, tb_mk, tb_kelas
          WHERE tb_mk_kelas.id_mk = tb_mk.id_mk AND tb_mk_kelas.id_kelas = tb_kelas.id_kelas
           AND tb_mk_kelas.id_kelas = :id');
        $this->db->bind('id', $id);
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





    
    // ============ CARI DATA PRODI ============
    public function cariDataMahasiswa($id_kelas)
    {
        $keyword = $_POST['keyword'];

        $query = 'SELECT * FROM tb_kelas_peserta, tb_kelas, tb_mhs 
        WHERE tb_kelas_peserta.id_kelas = tb_kelas.id_kelas AND 
        tb_kelas_peserta.username = tb_mhs.username AND 
        tb_kelas_peserta.id_kelas = :id_kelas AND tb_mhs.nama_mhs LIKE :keyword ORDER BY nama_mhs';
        $this->db->query($query);
        $this->db->bind('id_kelas', $id_kelas);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resulSet();
    }
}