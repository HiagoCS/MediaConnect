<?php
namespace App\Controllers;

class Usuarios extends BaseController{
    //Todos os Inputs podem ser renomeados!!
    public function index()
    {
        //Login
        $usuarioModel = new \App\Models\UsuarioModel();
        $usuarioModel->postLogin($this->request->getPost('email'),$this->request->getPost('senha'));
    }

    public function inserir()
    {
        $usuarioModel = new \App\Models\UsuarioModel();
        $userdata = new Usuario(
            $this->request->getPost('nome'), 
            $this->request->getPost('email'),
            md5($this->request->getPost('senha')),
            $this->request->getPost('cpf'),
            $this->request->getPost('telefone'),
            $this->request->getPost('cep'),
            1
        );

        $idUsuario = $usuarioModel->postInserir((array) $userdata);
        $data = [
            'id_usuario' => $idUsuario
        ];

        echo view('template/header');
        echo view('informacoesPerfil', $data);
        echo view('template/footer');
    }

    public function editar()
    {
        $usuarioModel = new \App\Models\UsuarioModel();
        $usuarioModel->postEditar($this->request->getPost('idUsuario'), $this->request->getPost('coluna'), $this->request->getPost('nvValor'), null);
    }

    public function excluir()
    {
        $usuarioModel = new \App\Models\UsuarioModel();
        if($this->request->getPost('idUsuario')){
            $usuarioModel->postDelete($this->request->getPost('idUsuario'), null);
        }
        else if($this->request->getPost('emailUsuario')){
            $usuarioModel->postDelete(null, $this->request->getPost('emailUsuario'));
        }
    }
}

class Usuario
{
    public function __construct($nome, $email, $senha, $cpf, $telefone, $cep, $status){
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->cep = $cep;
        $this->status = $status;
    }
}
    
?>