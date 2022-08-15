<?php namespace App\Controllers;
    class Usuarios extends BaseController{
        public function index(){
            //Login
            $usuarioModel = new \App\Models\UsuarioModel();
            //Segundo parametro de where() é o nome do input
            $userRow = $usuarioModel->where(['nome' => $this->request->getPost('apelidoInput'), 'senha' => md5($this->request->getPost('senhaInput'))])->findAll();
            if(count($userRow) == 1){
                if($userRow[0]->{'status'} != 1){
                    //Inserir retorno de verificação de e-mail!
                    echo "E-mail não verificado!!";
                }
                else{
                    //Inserir view de login completo!!
                    echo "Logado com sucesso!!";
                }
            }
            else if(count($userRow) == 0){
                $userRow = $usuarioModel->where(['email' => $this->request->getPost('apelidoInput'), 'senha' => md5($this->request->getPost('senhaInput'))])->findAll();
                if(count($userRow) == 1){
                    if($userRow[0]->{'status'} != 1){
                        //Inserir retorno de verificação de e-mail!
                        echo "E-mail não verificado!!";
                    }
                    else{
                        //Inserir view de login completo!!
                        echo "Logado com sucesso!!";
                    }
                }
                else{
                    //Inserir view de erro!!
                    echo var_dump("Erro no login!!");
                }
            }
            else{
                //Inserir view de erro!!
                echo var_dump("Erro no login!!");
            }
        }
        public function inserir(){
            if($this->request->getMethod() === 'post'){
                $usuarioModel = new \App\Models\UsuarioModel();
                //Segundo parametro de set() é o nome do input
                $usuarioModel->set('nome', $this->request->getPost('nomeInput'));
                $usuarioModel->set('email', $this->request->getPost('emailInput'));
                $usuarioModel->set('senha', md5($this->request->getPost('senhaInput')));
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