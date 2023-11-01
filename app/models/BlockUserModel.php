<?php

class BlockUserModel
{
    private $db;
    private $table = 'empblokir';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getStatus($kode)
    {
        $nik = strtoupper($kode);
        $this->db->query("SELECT status FROM " . $this->table . " WHERE empcode = '" . $kode . "'");
        $result = $this->db->single();

        return $result;
    }

    public function saveData($data)
    {
        $query = "INSERT INTO empblokir (empcode, status) 
            VALUES(:empcode, :status)";

        // $data['inputdate'] = strtoupper(date('d-M-y'));

        $this->db->query($query);

        $data['empcode'] = $data['anggota'];

        $this->db->bind('empcode', $data['anggota']);
        $this->db->bind('status', $data['status']);
        // $this->db->bind('jawaban', $data['jawaban']);
        // $this->db->bind('inputdate', date('dmY'));
        // $this->db->bind('alasan', $data['alasan']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
