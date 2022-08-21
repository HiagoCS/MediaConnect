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
                }
                else{
                    //Inserir view de login completo!!
                }
            }
            else if(count($userRow) == 0){
                $userRow = $usuarioModel->where(['email' => $this->request->getPost('apelidoInput'), 'senha' => md5($this->request->getPost('senhaInput'))])->findAll();
                if(count($userRow) == 1){
                    if($userRow[0]->{'status'} != 1){
                        //Inserir retorno de verificação de e-mail!
                    }
                    else{
                        //Inserir view de login completo!!
                    }
                }
                else{
                    //Inserir view de erro!!
                }
            }
            else{
                //Inserir view de erro!!
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
        public function editar(){
            $usuarioModel = new \App\Models\UsuarioModel();
            if($this->request->getPost('idUsuario')){
                $usuario = $usuarioModel->find($this->request->getPost('idUsuario'));

                if($usuario->{$this->request->getPost('coluna')}){
                    if(strtolower($this->request->getPost('coluna')) === "email" || strtolower($this->request->getPost('coluna')) === "e-mail"){
                        //Coluna não pode ser alterada
                        return;
                    }
                    $usuario->{$this->request->getPost('coluna')} = $this->request->getPost('nvValor');
                    if($usuarioModel->update($this->request->getPost('idUsuario'), $usuario)){
                        //Sucesso na alteração
                    }
                    else{
                        //Erro na alteração
                    }
                }
                else{
                    //Coluna Inexistente!
                }
                
            }
            else if($this->request->getPost('emailUsuario')){
                $usuario = $usuarioModel->where('email', $this->request->getPost('emailUsuario'))->find();
                if(count($usuario) == 1){
                    $usuario = $usuario[0];
                    if($usuario->{$this->request->getPost('coluna')}){
                        if(strtolower($this->request->getPost('coluna')) === "email" || strtolower($this->request->getPost('coluna')) === "e-mail"){
                            //Coluna não pode ser alterada
                            return;
                        }
                        $usuario->{$this->request->getPost('coluna')} = $this->request->getPost('nvValor');
                        if($usuarioModel->update($usuario->{'id'}, $usuario)){
                            //Sucesso na alteração
                        }
                        else{
                            //Erro na alteração
                        }
                    }
                    else{
                        //Coluna Inexistente!
                    }
                }
                else if(count($usuario) == 0){
                    //Usuario não existente
                }
                
            }
        }
        public function excluir(){
            $usuarioModel = new \App\Models\UsuarioModel();
            if($this->request->getPost('idUsuario')){
                $usuario = $usuarioModel->find($this->request->getPost('idUsuario'));
                if($usuarioModel->delete($usuario->{'id'})){
                    //Sucesso na exclusão!
                }
                else{
                    //Erro na exclusão!
                }
            }
            else if($this->request->getPost('emailUsuario')){
                $usuario = $usuarioModel->where('email', $this->request->getPost('emailUsuario'))->find();
                if(count($usuario) == 1){
                    $usuario = $usuario[0];
                    if($usuarioModel->delete($usuario->{'id'})){
                        //Sucesso na exclusão!
                    }
                    else{
                        //Erro na exclusão!
                    }
                }
            }
        }
    }
?>