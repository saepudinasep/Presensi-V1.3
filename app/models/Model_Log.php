<?php

class Model_Log extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getLogin($user, $pass)
    {
        $this->db->query('SELECT *,
                        (SELECT nama_mhs FROM tb_mhs WHERE username=tb_user.username) as nama_mhs,
                        (SELECT nama_dosen FROM tb_dosen WHERE username=tb_user.username) as nama_dosen
                        FROM tb_user WHERE username = :user AND password = md5(:pass)');


        $this->db->bind('user', $user);
        $this->db->bind('pass', $pass);
        return $this->db->resulset();
    }

    public function pass_ubah($user, $pass_new)
    {
        $query = "UPDATE tb_user SET password = :pass_new WHERE username = :user";

        $this->db->query($query);

        $this->db->bind('pass_new', $pass_new);
        $this->db->bind('user', $user);

        $this->db->execute();
    }

    public function uploadFoto($user, $gambar)
    {
        $query = "UPDATE tb_user SET folder_uploads = :gambar WHERE username = :user";

        $this->db->query($query);

        $this->db->bind('gambar', $gambar);
        $this->db->bind('user', $user);

        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function UpdateLogin($user)
    {
        $query = "UPDATE tb_user SET last_login = current_timestamp() WHERE username = :user";

        $this->db->query($query);

        // $this->db->bind('gambar', $gambar);
        $this->db->bind('user', $user);

        $this->db->execute();
    }

    public function updateLastActivity($user)
    {
        $query = "UPDATE tb_user SET last_activity = current_timestamp() WHERE username = :user";

        $this->db->query($query);

        $this->db->bind('user', $user);

        $this->db->execute();

        return $this->db->rowCount();

    }


}