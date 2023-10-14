<?php

class Model_kelas extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    // ================UNTUK DI DASHBOARD BAAK================
    public function getAllKelas()
    {
        $query = ('SELECT * FROM tb_kelas');
        $this->db->query($query);
        return $this->db->resulSet();
    }


    
    
    public function getKelas($id_kelas)
    {
        $query = 'SELECT * FROM tb_kelas WHERE id_kelas = :id_kelas';
        $this->db->query($query);
        $this->db->bind('id_kelas', $id_kelas);
        return $this->db->single();
    }
    
    public function getAllKelasProdi($id_prodi)
    {
        $query = 'SELECT * FROM tb_kelas WHERE id_prodi = :id_prodi ORDER BY kode_kelas';
        $this->db->query($query);
        $this->db->bind('id_prodi', $id_prodi);
        return $this->db->resulSet();
    }


    // ================ CRUD DATA JADWAL KELAS ================
    


    // ================ CRUD DATA KELAS ================
    // start data_kelas
    public function tambahDataKelas($data)
    {
        $id_prodi = $_SESSION['id_prodi'];
        if ($data['semester']=="") {
            $semester = NULL;
        }else {
            $semester = $data['semester'];
        }
	 	$query = "INSERT INTO tb_kelas
         VALUES
         ('', :kode_kelas, :nama_kelas, :id_prodi, :jenis_jalur, :jenis_kelas, :kelas_ket, :semester)";
         $this->db->query($query);
         $this->db->bind('kode_kelas', $data['kode_kelas']);
         $this->db->bind('nama_kelas', $data['nama_kelas']);
         $this->db->bind('id_prodi', $id_prodi);
         $this->db->bind('jenis_jalur', $data['jenis_jalur']);
         $this->db->bind('jenis_kelas', $data['jenis_kelas']);
         $this->db->bind('kelas_ket', $data['kelas_ket']);
         $this->db->bind('semester', $semester);
         $this->db->execute();
         return $this->db->rowCount();
    }

    public function hapusDataKelas($id)
    {
        $query = "DELETE FROM tb_kelas WHERE id_kelas = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();

    }
    
    public function getDataKelasById($id)
    {
        $query = ('SELECT *, 
        (SELECT nama_prodi FROM tb_prodi WHERE id_prodi = tb_kelas.id_prodi) as nama_prodi 
        FROM tb_kelas WHERE id_kelas = :id');
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function ubahDataKelas($data)
    {
        $id_prodi = $_SESSION['id_prodi'];
        if ($data['semester']=="") {
            $semester = NULL;
        }else {
            $semester = $data['semester'];
        }
        $query = "UPDATE tb_kelas SET
        kode_kelas= :kode_kelas,
        nama_kelas= :nama_kelas,
        id_prodi= :id_prodi,
        jenis_jalur= :jenis_jalur,
        jenis_kelas= :jenis_kelas,
        kelas_ket= :kelas_ket,
        semester= :semester
        WHERE
        id_kelas= :id";

        $this->db->query($query);
        $this->db->bind('kode_kelas', $data['kode_kelas']);
        $this->db->bind('nama_kelas', $data['nama_kelas']);
        $this->db->bind('id_prodi', $id_prodi);
        $this->db->bind('jenis_jalur', $data['jenis_jalur']);
        $this->db->bind('jenis_kelas', $data['jenis_kelas']);
        $this->db->bind('kelas_ket', $data['kelas_ket']);
        $this->db->bind('semester', $semester);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    // end data_kelas



    // ================ CRUD KELAS PESERTA ================
    
    // START MAHASISWA

    public function tambahKelasPeserta($data)
    {
        $id_kelas = $_SESSION['id_kelas'];
        $id_kelas_peserta = $id_kelas.'_'.$data['nim'];
        $user = $_SESSION['user'];
        $query = "INSERT INTO tb_kelas_peserta (id_kelas_peserta, id_kelas, username, insert_by, date_insert)
         VALUES (:id_kelas_peserta, :id_kelas, :nim, :user, current_timestamp())";

         $this->db->query($query);
         $this->db->bind('id_kelas_peserta', $id_kelas_peserta);
         $this->db->bind('id_kelas', $id_kelas);
         $this->db->bind('nim', $data['nim']);
         $this->db->bind('user', $user);

         $this->db->execute();

         return $this->db->rowCount();
    }


    public function hapusKelasPeserta($user)
    {
        $query = "DELETE FROM tb_kelas_peserta WHERE username = :user";
        $this->db->query($query);
        $this->db->bind('user', $user);

        $this->db->execute();

        return $this->db->rowCount();
    }
    // END MAHASISWA


    
    // ============ CARI DATA KELAS ============
    public function cariDataKelasProdi($id_prodi)
    {
        $keyword = $_POST['keyword'];

        $query = 'SELECT * FROM tb_kelas WHERE id_prodi = :id_prodi AND kode_kelas LIKE :keyword ORDER BY kode_kelas';
        $this->db->query($query);
        $this->db->bind('id_prodi', $id_prodi);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resulSet();
    }
}