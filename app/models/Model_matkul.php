<?php

class Model_matkul
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    // ==================== MATA KULIAH UNTUK DI DATA MATKUL ====================
    public function getAllMk()
    {
        $this->db->query('SELECT * FROM tb_dosen, tb_mk WHERE tb_mk.dosen_pengampu = tb_dosen.username ORDER BY tb_mk.nama_mk');
        return $this->db->resulSet();
    }

    // ==================== MATA KULIAH UNTUK DI DATA MATKUL ====================
    public function getMkById($id_mk)
    {
        $this->db->query('SELECT * FROM tb_mk_sesi, tb_mk, tb_dosen WHERE 
        tb_mk_sesi.id_mk = tb_mk.id_mk AND 
        tb_mk_sesi.dosen_pengajar = tb_dosen.username AND 
        tb_mk_sesi.id_mk = :id_mk');
        $this->db->bind('id_mk', $id_mk);
        return $this->db->resulSet();
    }

    // ==================== MATA KULIAH UNTUK DI DATA MATKUL ====================
    public function getAllMkByKls($id_kelas)
    {
        $this->db->query('SELECT *, 
        (SELECT nama_dosen FROM tb_dosen WHERE tb_mk.dosen_pengampu = username) AS nama_dosen 
        FROM tb_mk_kelas, tb_mk, tb_kelas WHERE 
        tb_mk_kelas.id_mk = tb_mk.id_mk AND tb_mk_kelas.id_kelas = tb_kelas.id_kelas AND
        tb_mk_kelas.id_kelas = :id_kelas');
        $this->db->bind('id_kelas', $id_kelas);
        return $this->db->resulSet();
    }

    // ==================== MATA KULIAH UNTUK DI DATA MATKUL ====================
    public function getMk($id_mk)
    {
        $this->db->query('SELECT * FROM tb_mk WHERE id_mk = :id_mk');
        $this->db->bind('id_mk', $id_mk);
        return $this->db->single();
    }

    



    // ==================== CRUD MATA KULIAH ====================
    // start data_mk
    public function tambahDataMk($data)
    {
        $mk_creator = $_SESSION['user'];
	 	$query = "INSERT INTO tb_mk 
         (id_mk, id_prodi, kode_mk, mk_creator, nama_mk, singkatan_mk, mk_desc, 
         mk_created, status_mk, mk_active_points, dosen_pengampu)
         VALUES
         ('', NULL, :kode_mk, :mk_creator, :nama_mk, :singkatan_mk, :mk_desc, 
         current_timestamp(), '1', '1000', :dosen_pengampu)";
         $this->db->query($query);
         $this->db->bind('kode_mk', $data['kode_mk']);
         $this->db->bind('mk_creator', $mk_creator);
         $this->db->bind('nama_mk', $data['nama_mk']);
         $this->db->bind('singkatan_mk', $data['singkatan_mk']);
         $this->db->bind('mk_desc', $data['mk_desc']);
         $this->db->bind('dosen_pengampu', $data['dosen_pengampu']);
         $this->db->execute();
         return $this->db->rowCount();
    }

    public function hapusDataMk($id_mk)
    {
        $query = "DELETE FROM tb_mk WHERE id_mk = :id_mk";
        $this->db->query($query);
        $this->db->bind('id_mk', $id_mk);

        $this->db->execute();

        return $this->db->rowCount();
    }
    
    public function getDataMkById($id)
    {
        $query = ('SELECT *, 
        (SELECT nama_prodi FROM tb_prodi WHERE id_prodi = tb_mk.id_prodi) as nama_prodi, 
        (SELECT nama_dosen FROM tb_dosen WHERE username = tb_mk.dosen_pengampu) as nama_dosen 
        FROM tb_mk WHERE id_mk = :id');
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function ubahDataMk($data)
    {
        $query = "UPDATE tb_mk SET
         nama_mk= :nama_mk,
          kode_mk= :kode_mk,
           singkatan_mk= :singkatan_mk,
           id_prodi= :prodi,
           dosen_pengampu= :dosen_pengampu,
           mk_desc= :mk_desc
            WHERE
             id_mk= :id";

        $this->db->query($query);
        $this->db->bind('nama_mk', $data['nama_mk']);
        $this->db->bind('kode_mk', $data['kode_mk']);
        $this->db->bind('singkatan_mk', $data['singkatan_mk']);
        $this->db->bind('prodi', $data['prodi']);
        $this->db->bind('dosen_pengampu', $data['dosen_pengampu']);
        $this->db->bind('mk_desc', $data['mk_desc']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    // end data_mk


    // ============ CARI DATA MATA KULIAH ============
    public function cariDataMk()
    {
        $keyword = $_POST['keyword'];


        $query = "SELECT * FROM tb_dosen, tb_mk WHERE tb_mk.dosen_pengampu = tb_dosen.username AND tb_mk.nama_mk LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resulSet();
    }

    
    // ============ CARI DATA MATA KULIAH ============
}