<?php

class Model_prodi extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    // ================UNTUK DI DASHBOARD BAAK================
    public function getAllProdi()
    {
        $this->db->query('SELECT * FROM tb_prodi');
        return $this->db->resulSet();
    }


    

    public function getProdi($id_prodi)
    {
        $query = 'SELECT * FROM tb_prodi WHERE id_prodi = :id_prodi';
        $this->db->query($query);
        $this->db->bind('id_prodi', $id_prodi);
        return $this->db->single();
    }

    public function tambahDataProdi($data)
    {
        $query = "INSERT INTO tb_prodi
        VALUES
        ('', :nama_prodi, :singkatan, :nama_kaprodi, :nidn)";

        $this->db->query($query);
        $this->db->bind('nama_prodi', $data['nama_prodi']);
        $this->db->bind('singkatan', $data['singkatan']);
        $this->db->bind('nama_kaprodi', $data['nama_kaprodi']);
        $this->db->bind('nidn', $data['nidn']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataProdi($id_prodi)
    {
        $query = "DELETE FROM tb_prodi WHERE id_prodi = :id_prodi";
        $this->db->query($query);
        $this->db->bind('id_prodi', $id_prodi);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getDataProdiById($id)
    {
        $query = "SELECT *
         FROM tb_prodi WHERE id_prodi = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function ubahDataProdi($data)
    {
        $query = "UPDATE tb_prodi SET
         nama_prodi= :nama_prodi,
          singkatan_prodi= :singkatan,
           nama_kaprodi= :nama_kaprodi,
           nidn_kaprodi= :nidn
            WHERE
             id_prodi= :id";

        $this->db->query($query);
        $this->db->bind('nama_prodi', $data['nama_prodi']);
        $this->db->bind('singkatan', $data['singkatan']);
        $this->db->bind('nama_kaprodi', $data['nama_kaprodi']);
        $this->db->bind('nidn', $data['nidn']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    // ============ CARI DATA PRODI ============
    public function cariDataProdi()
    {
        $keyword = $_POST['keyword'];


        $query = "SELECT * FROM tb_prodi WHERE nama_prodi LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resulSet();
    }
}