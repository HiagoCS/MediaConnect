<?php namespace App\Controllers;
    class Usuarios extends BaseController{
        public function index(){
            echo view("usuario_teste", $msg = 'Index');
        }
        public function inserir(){
            if($this->request->getMethod() === 'post'){
                $usuarioModel = new \App\Models\UsuarioModel();
                //Segundo parametro de set() é o nome do input
                $usuarioModel->set('nome', $this->request->getPost('nomeInput'));
                $usuarioModel->set('email', $this->request->getPost('emailInput'));
                $usuarioModel->set('senha', $this->request->getPost('senhaInput'));
                $usuarioModel->set('cpf', $this->request->getPost('cpfInput'));
                $usuarioModel->set('telefone', $this->request->getPost('telInput'));
                $usuarioModel->set('cep', $this->request->getPost('cepInput'));
                $usuarioModel->set('status', md5(3));
                if($usuarioModel->insert()){
                    //Inserir View de sucesso!!
                }
                else{
                    //Inserir View de Erro!!
                }
            }
        }
    }
?>