<?php

class AuthUser extends Controller
{
    public function index()
    {
        $this->view('templates/header');
        $this->view('auth/index');
        $this->view('templates/footer');
    }

    public function login()
    {
        session_start();
        $dataLogin = $_POST;
        $user = $this->model('AuthModel')->getUser($dataLogin);
        if ($user) {
            $_SESSION['user'] = $user;
            header('location: ' . BASEURL . '/blockuser');
            exit;
        }

        Flasher::setMessage('Failed', 'Username atau password salah!!!', 'danger');
        header('location: ' . BASEURL . '/authuser');
        exit;
        session_destroy();
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            session_destroy();
        }

        header('location: ' . BASEURL . '/authuser');
        exit;
    }
}
