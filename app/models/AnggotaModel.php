<?php

class AnggotaModel
{
    private $db;
    private $table = 'anggota';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllData()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' order by NO');
        return $this->db->resultSet();
    }

    public function getSearchData($search)
    {
        $query = strtoupper($search);
        $this->db->query("SELECT kode, nama FROM " . $this->table . " WHERE kode LIKE '%" . $query . "%' OR nama LIKE '%" . $query . "%'");
        $results = $this->db->resultSet();

        $results = array_map(function ($result) {
            return [
                "id"    => $result['kode'],
                "text"  => $result['kode'] . ' - ' . $result['nama']
            ];
        }, $results);

        return $results;
    }

    public function getDetail($nik)
    {
        $nik = strtoupper($nik);
        $this->db->query("SELECT kode, nama FROM " . $this->table . " WHERE kode='" . $nik . "'");
        $result = $this->db->single();

        return $result;
    }
}
