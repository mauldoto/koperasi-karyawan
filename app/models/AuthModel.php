<?php

class AuthModel
{
    private $db;
    private $table = 'user';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUser($data)
    {
        $username = $data['username'];
        $password = $data['password'];
        $this->db->query("SELECT id, username FROM " . $this->table . " WHERE username='" . $username . "' AND password='" . $password . "'");
        $result = $this->db->single();

        return $result;
    }
}
