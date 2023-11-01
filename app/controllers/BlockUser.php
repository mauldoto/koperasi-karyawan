<?php

class BlockUser extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            Flasher::setMessage('Failed', 'Mohon login dulu!!!', 'danger');
            header('location: ' . BASEURL . '/authuser');
            exit;
        }
    }
    public function index()
    {
        $this->view('templates/header');
        $this->view('blockuser/index');
        $this->view('templates/footer');
    }

    public function select2()
    {
        $search = explode('=', $_SERVER['REQUEST_URI']);
        $results = $this->model('AnggotaModel')->getSearchData($search[1]);
        echo json_encode($results);
    }

    public function detail()
    {
        $nik = explode('=', $_SERVER['REQUEST_URI']);
        $employee = $this->model('AnggotaModel')->getDetail($nik[1]);
        $jawaban = $this->model('BlockUserModel')->getStatus($nik[1]);
        echo json_encode(["anggota" => $employee, 'status' => $jawaban]);
    }

    public function submit()
    {
        $this->checkEmpCode($_POST['anggota']);

        try {
            $this->model('BlockUserModel')->saveData($_POST);
        } catch (\Throwable $th) {
            Flasher::setMessage('Failed,', 'Check your input', 'danger');
            header('location: ' . BASEURL . '/blockuser');
            exit;
        }

        Flasher::setMessage('Successfully', 'Created', 'success');
        header('location: ' . BASEURL . '/blockuser');
        exit;
    }

    public function checkEmpCode($nik)
    {
        $result = $this->model('BlockUserModel')->getStatus($nik);

        if ($result) {
            Flasher::setMessage('Failed', 'NIK Sudah Terblokir!!!', 'danger');
            header('location: ' . BASEURL . '/blockuser');
            exit;
        }

        return true;
    }
}
