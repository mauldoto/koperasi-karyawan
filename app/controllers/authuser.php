<?php

class authuser extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $this->view('templates/header');
        $this->view('auth/index');
        $this->view('templates/footer');
    }

    public function login()
    {
        if (isset($_SESSION['user'])) {
            header('location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $dataLogin = $_POST;
        $user = $this->model('AuthModel')->getUser($dataLogin);
        if ($user) {
            session_start();
            $_SESSION['user'] = $user;
            header('location: ' . BASEURL . '/BlockUser');
            exit;
        }

        Flasher::setMessage('Failed', 'Username atau password salah!!!', 'danger');
        header('location: ' . BASEURL . '/authuser');
        exit;
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            session_destroy();
        }

        header('location: ' . BASEURL . '/authuser');
        exit;
    }
}
