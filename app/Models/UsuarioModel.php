<?php namespace App\Models;
    use CodeIgniter\Model;

    class UsuarioModel extends Model{
        protected $table = 'tb_usuario';
        protected $primaryKey = 'id';
        protected $allowedFields = ['nome', 'email', 'senha', 'cpf', 'telefone', 'cep', 'status'];
        protected $returnType = 'object';

        public function postInserir($nome, $email, $senha, $cpf, $telefone, $cep){
            //Segundo parametro de set() é o nome do input
            $this->set('nome', $nome);
            $this->set('email', $email);
            $this->set('senha', md5($senha));
            $this->set('cpf', $cpf);
            $this->set('telefone', $telefone);
            $this->set('cep', $cep);
            $this->set('status', md5(3));
            if($this->insert()){
                //Sucesso no registro!!
            }
            else{
                //Erro no registro!!
            }
        }
        public function postEditar($id, $coluna, $nvValor, $email){
            if($id){
                if($this->find($id))
                    $usuario = $this->find($id);
                else{
                    //Usuario Não existente
                    return;
                }
                if($usuario->{$coluna}){
                    if(strtolower($coluna) === "email" || strtolower($coluna) === "e-mail"){
                        //Coluna não pode ser alterada
                        return;
                    }
                    $usuario->{$coluna} = $nvValor;
                    if($this->update($usuario->{'id'}, $usuario)){
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
            else if($email){
                $usuario = $this->where('email', $email)->find();
                if(count($usuario) == 1){
                    $usuario = $usuario[0];
                    if($usuario->{$coluna}){
                        if(strtolower($coluna) === "email" || strtolower($coluna) === "e-mail"){
                            //Coluna não pode ser alterada
                            return;
                        }
                        $usuario->{$coluna} = $nvValor;
                        if($this->update($usuario->{'id'}, $usuario)){
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
        public function postDelete($id, $email){
            if($id){
                $usuario = $this->find($id);
                if($this->delete($usuario->{'id'})){
                    //Sucesso na exclusão!
                }
                else{
                    //Erro na exclusão!
                }
            }
            else if($email){
                $usuario = $this->where('email', $email)->find();
                if(count($usuario) == 1){
                    $usuario = $usuario[0];
                    if($this->delete($usuario->{'id'})){
                        //Sucesso na exclusão!
                    }
                    else{
                        //Erro na exclusão!
                    }
                }
            }
        }
        public function postLogin($apelido, $senha){
            //Segundo parametro de where() é o nome do input
            $usuario = $this->where(['nome' => $apelido, 'senha' => md5($senha)])->findAll();
            if(count($usuario) == 1){
                $usuario = $usuario[0];
                if($usuario->{'status'} != 1){
                    //Precisa de verificação de e-mail!
                    echo 'Precisa de verificação de e-mail!';
                }
                else{
                    //Login completo!!
                    echo 'Login completo!';
                }
            }
            else if(count($usuario) == 0){
                $usuario = $this->where(['email' => $apelido, 'senha' => md5($senha)])->findAll();
                if(count($userRow) == 1){
                    $usuario = $usuario[0];
                    if($usuario->{'status'} != 1){
                        //Precisa de verificação de e-mail!
                        echo 'Precisa de verificação de e-mail!';
                    }
                    else{
                        //Login completo!!
                        echo 'Login completo!';
                    }
                }
                else{
                    //Error!!
                    echo "Error: Não achado usuario ou achado mais de um usuario!! (Login por Email)";
                }
            }
            else{
                //Error!!
                echo "Error: Não achado usuario ou achado mais de um usuario!! (Login por Nome)";
            }
        }

    }
?>