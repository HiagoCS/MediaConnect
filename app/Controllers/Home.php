<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('template/header');
        echo view('home');
        echo view('template/footer');
    }

    public function login()
    {
        echo view('template/header');
        echo view('login');
        echo view('template/footer');
    }

    public function cadastro()
        {
            echo view('template/header');
            echo view('cadastro');
            echo view('template/footer');
        }

    public function feed()
    {
        echo view('template/header');
        echo view('feed');
        echo view('template/footer');
    }

    public function perfilSm()
    {
        echo view('template/header');
        echo view('perfilSm');
        echo view('template/footer');
    }

    public function perfilUsuario()
    {
        echo view('template/header');
        echo view('perfilUsuario');
        echo view('template/footer');
    }

    public function informacoesPerfil()
    {
        echo view('template/header');
        echo view('informacoesPerfil');
        echo view('template/footer');
    }
}
