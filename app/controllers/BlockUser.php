<?php

class BlockUser extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            Flasher::setMessage('Failed', 'Mohon login dulu!!!', 'danger');
            header('location: ' . BASEURL . '/AuthUser');
            exit;
        }
    }
    public function index()
    {
        $this->view('templates/header');
        $this->view('BlockUser/index');
        $this->view('templates/footer');
    }

    public function select2()
    {
        $search = explode('=', $_SERVER['REQUEST_URI']);
        $results = $this->model('AnggotaModel')->getSearchData($search[1]);
        echo json_encode($results);
    }

    public function detail($param = null)
    {
        $nik = explode('=', $_SERVER['REQUEST_URI']);
        $nikAnggota = $param ?? $nik[1];
        $employee = $this->model('AnggotaModel')->getDetail($nikAnggota);
        $jawaban = $this->model('BlockUserModel')->getStatus($nikAnggota);
        if ($param) {
            return $employee;
        }
        echo json_encode(["anggota" => $employee, 'status' => $jawaban]);
    }

    public function submit()
    {
        $this->checkEmpCode($_POST['anggota']);

        try {
            $this->model('BlockUserModel')->saveData($_POST);
        } catch (\Throwable $th) {
            Flasher::setMessage('Failed,', 'Check your input', 'danger');
            header('location: ' . BASEURL . '/BlockUser');
            exit;
        }

        $_SESSION['blocked'] = $this->detail($_POST['anggota']);
        Flasher::setMessage('Successfully', 'Created', 'success');
        header('location: ' . BASEURL . '/BlockUser');
        exit;
    }

    public function checkEmpCode($nik)
    {
        $result = $this->model('BlockUserModel')->getStatus($nik);

        if ($result) {
            Flasher::setMessage('Failed', 'NIK Sudah Terblokir!!!', 'danger');
            header('location: ' . BASEURL . '/BlockUser');
            exit;
        }

        return true;
    }
}
