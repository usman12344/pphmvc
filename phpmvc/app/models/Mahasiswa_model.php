<?php

class Mahasiswa_model
{
    // private $nama = [
    //     [
    //         "nama" => 'usman',
    //         "nim" => '56541',
    //         "email" => 'ssjsj@gmail.com',
    //         "jurusan" => 'ti',
    //     ],
    //     [
    //         "nama" => 'usman',
    //         "nim" => '54554',
    //         "email" => 'bbbb@gmail.com',
    //         "jurusan" => 'ti',
    //     ],
    //     [
    //         "nama" => 'usman',
    //         "nim" => '7878',
    //         "email" => 'aaa@gmail.com',
    //         "jurusan" => 'ti',
    //     ],
    //     [
    //         "nama" => 'usman',
    //         "nim" => '13213',
    //         "email" => 'gggg@gmail.com',
    //         "jurusan" => 'ti',
    //     ],
    // ];

    // private $dbh; // datatabse handler
    // private $stms;

    // public function __construct()
    // {
    //     // data source name
    //     $dsn = 'mysql:host=localhost;dbname=phpmvc';

    //     try {
    //         $this->dbh = new PDO($dsn, 'root', '');
    //     } catch (PDOException $e) {
    //         die($e->getMessage());
    //     }
    // }


    // public function getMahasiswa()
    // {
    //     $this->stms = $this->dbh->prepare('SELECT * FROM mahasiswa');
    //     $this->stms->execute();
    //     return $this->stms->fetchAll(PDO::FETCH_ASSOC);
    // }
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Databases;
    }

    public function getMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getDetail($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id'); // untuk menyaimpan data yg akan dibinding jadi id tdk lgsng dimasukin $id utk menghindari sql injection dan amanin query kita
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa VALUES ('', :nama, :nim, :email, :jurusan)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET nama = :nama, nim = :nim, email = :email, jurusan = :jurusan WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataMahasiswa()
    {
        $keyword = $_POST["keyword"];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
