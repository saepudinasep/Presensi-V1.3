<?php

class Model_sesi
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getMkSesi($id_mk)
    {
        $this->db->query('SELECT * FROM tb_dosen, tb_mk_sesi WHERE
        tb_dosen.username = tb_mk_sesi.dosen_pengajar AND tb_mk_sesi.id_mk = :id_mk ORDER BY tb_mk_sesi.id_mk_sesi');
        $this->db->bind('id_mk', $id_mk);
        return $this->db->resulSet();
    }

    
    public function getSesi($id_mk)
    {
        $query = 'SELECT * FROM tb_dosen, tb_mk_sesi WHERE 
        tb_dosen.username = tb_mk_sesi.dosen_pengajar AND tb_mk_sesi.id_mk = :id_mk';
        $this->db->query($query);
        $this->db->bind('id_mk', $id_mk);
        return $this->db->single();
    }



    // ============== CRUD SESI MATA KULIAH ==============
    // start mk_sesi
    public function tambahDataMkSesi($data)
    {
        $id_mk = $_SESSION['id_mk'];
	 	$query = "INSERT INTO tb_mk_sesi
         VALUES
         ('', :id_mk, :no_subject, :nama_mk_sesi, :dosen_pengajar, '-1', '01:30:00', NULL, NULL, NULL)";
         $this->db->query($query);
         $this->db->bind('id_mk', $id_mk);
         $this->db->bind('no_subject', $data['no_subject']);
         $this->db->bind('nama_mk_sesi', $data['nama_mk_sesi']);
         $this->db->bind('dosen_pengajar', $data['dosen_pengajar']);
         $this->db->execute();

         return $this->db->rowCount();
    }
    
    public function hapusDataMkSesi($id)
    {
        $query = "DELETE FROM tb_mk_sesi WHERE id_mk_sesi = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function getDataMkSesiById($id)
    {
        $query = ('SELECT * FROM tb_mk_sesi, tb_mk, tb_dosen WHERE tb_mk_sesi.dosen_pengajar = tb_dosen.username AND
        tb_mk_sesi.id_mk = tb_mk.id_mk AND tb_mk_sesi.id_mk_sesi = :id');
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function ubahDataMkSesi($data)
    {
        $id_mk = $_SESSION['id_mk'];
        $query = "UPDATE tb_mk_sesi SET
        nama_mk_sesi= :nama_mk_sesi,
        dosen_pengajar= :dosen_pengajar,
        no_subject= :no_subject
        WHERE
        id_mk_sesi= :id";

        $this->db->query($query);
        $this->db->bind('nama_mk_sesi', $data['nama_mk_sesi']);
        $this->db->bind('dosen_pengajar', $data['dosen_pengajar']);
        $this->db->bind('no_subject', $data['no_subject']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    // end mk_sesi
}