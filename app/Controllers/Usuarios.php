<?php namespace App\Controllers;
    $userdata = [
        'nome'=> null,
        'email'=> null,
        'senha'=> null,
        'cpf'=> null,
        'telefone'=> null,
        'cep'=> null
    ];
    class Usuarios extends BaseController{
        //Todos os Inputs podem ser renomeados!!
        public function index(){
            //Login
            $usuarioModel = new \App\Models\UsuarioModel();
            $usuarioModel->postLogin($this->request->getPost('apelidoInput'),$this->request->getPost('senhaInput'));
        }
        public function inserir(){
            $usuarioModel = new \App\Models\UsuarioModel();
            
            $userdata->{'nome'} = $this->request->getPost('nomeInput');
            $userdata->{'email'} = $this->request->getPost('emailInput');
            $userdata->{'senha'} = $this->request->getPost('senhaInput');
            $userdata->{'cpf'} = $this->request->getPost('cpfInput');
            $userdata->{'telefone'} = $this->request->getPost('telefoneInput');
            $userdata->{'cep'} = $this->request->getPost('cepInput');

            $usuarioModel->postInserir($userdata);
           
        }
        public function editar(){
            $usuarioModel = new \App\Models\UsuarioModel();
            $usuarioModel->postEditar($this->request->getPost('idUsuario'), $this->request->getPost('coluna'), $this->request->getPost('nvValor'), null);
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