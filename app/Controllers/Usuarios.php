<?php namespace App\Controllers;
    class Usuarios extends BaseController{
        public function index(){
            //Login
            $usuarioModel = new \App\Models\UsuarioModel();
            $usuarioModel->postLogin($this->request->getPost('apelidoInput'),$this->request->getPost('senhaInput'));
        }
        public function inserir(){
            $usuarioModel = new \App\Models\UsuarioModel();
            $usuarioModel->postInserir($this->request->getPost('nomeInput'), 
            $this->request->getPost('emailInput'),
            $this->request->getPost('senhaInput'), 
            $this->request->getPost('cpfInput'), 
            $this->request->getPost('telInput'),
            $this->request->getPost('cepInput'));
        }
        public function editar(){
            $usuarioModel = new \App\Models\UsuarioModel();
            if($this->request->getPost('idUsuario')){
                $usuarioModel->postEditar($this->request->getPost('idUsuario'), $this->request->getPost('coluna'), $this->request->getPost('nvValor'), null);
            }
            else if($this->request->getPost('emailUsuario')){
                $usuarioModel->postEditar(null, $this->request->getPost('coluna'), $this->request->getPost('nvValor'), $this->request->getPost('emailUsuario'));
            }
        }
        public function excluir(){
            $usuarioModel = new \App\Models\UsuarioModel();
            if($this->request->getPost('idUsuario')){
                $usuarioModel->postDelete($this->request->getPost('idUsuario'), null);
            }
            else if($this->request->getPost('emailUsuario')){
                $usuarioModel->postDelete(null, $this->request->getPost('emailUsuario'));
            }
        }
    }
?>