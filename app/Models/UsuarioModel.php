<?php namespace App\Models;
    use CodeIgniter\Model;

    class UsuarioModel extends Model{
        protected $table = 'tb_usuario';
        protected $primaryKey = 'id';
        protected $allowedFields = ['nome', 'email', 'senha', 'cpf', 'telefone', 'cep', 'status'];
        protected $returnType = 'object';

        public function postInserir($user_data){
            //Segundo parametro de set() é o nome do input
            if($this->insert($user_data)){
                //Sucesso no registro!!
                echo 'Sucesso no registro!!';
            }
            else{
                //Erro no registro!!
                echo "Erro no registro!! Verifique se os itens abaixo estão de acordo!!
                    \nNOME = ".$user_data->{'nome'}."
                    \nEMAIL = ".$user_data->{'email'}."
                    \nSENHA = ".$user_data->{'senha'}."
                    \nCPF = ".$user_data->{'cpf'}."
                    \nTELEFONE = ".$user_data->{'telefone'}."
                    \nCEP = ".$user_data->{'cep'};
                return;
            }
        }
        public function postEditar($id, $coluna, $nvValor, $email){
            if($id){
                if($this->find($id))
                    $usuario = $this->find($id);
                else{
                    //Usuario não encontrado
                    echo 'Usuario não encontrado (Verificação por ID)';
                    return;
                }
                if($usuario->{$coluna}){
                    if(strtolower($coluna) === "email" || strtolower($coluna) === "e-mail"){
                        //Coluna não pode ser alterada
                        echo 'A coluna EMAIL não deve ser alterada (Verificação por ID)';
                        return;
                    }
                    $usuario->{$coluna} = $nvValor;
                    if($this->update($usuario->{'id'}, $usuario)){
                        //Sucesso na alteração
                        echo 'Sucesso na alteração (Verificação por ID)';
                        return;
                    }
                    else{
                        //Erro na alteração
                        echo "Erro na alteração, Verifique os itens\n ID = $id\n COLUNA = $coluna\n NOVO VALOR = $nvValor\nEMAIL = $email (esta coluna deve ser nula!)";
                        return;
                    }
                }
                else{
                    //Coluna Inexistente!
                    echo 'Coluna não encontrada (Verificação por ID)!';
                    return;
                }
            }
            else if($email){
                $usuario = $this->where('email', $email)->find();
                if(count($usuario) == 1){
                    $usuario = $usuario[0];
                    if($usuario->{$coluna}){
                        if(strtolower($coluna) === "email" || strtolower($coluna) === "e-mail"){
                            //Coluna não pode ser alterada
                            echo 'A coluna EMAIL não deve ser alterada (Verificação por EMAIL)';
                            return;
                        }
                        $usuario->{$coluna} = $nvValor;
                        if($this->update($usuario->{'id'}, $usuario)){
                            //Sucesso na alteração
                            echo 'Sucesso na alteração (Verificação por EMAIL)';
                            return;
                        }
                        else{
                            //Erro na alteração
                            echo "Erro na alteração, Verifique os itens\n EMAIL = $email\n COLUNA = $coluna\n NOVO VALOR = $nvValor\ID = $id (esta coluna deve ser nula!)";
                            return;
                        }
                    }
                    else{
                        //Coluna Inexistente!
                        echo 'Coluna não encontrada (Verificação por EMAIL)!';
                        return;
                    }
                }
                else if(count($usuario) == 0){
                    //Usuario não existente
                    echo 'Usuario não encontrado (Verificação por EMAIL)';
                    return;
                }
                
            }
        }
        public function postDelete($id, $email){
            if($id){
                $usuario = $this->find($id);
                if($this->delete($usuario->{'id'})){
                    //Sucesso na exclusão!
                    echo 'Sucesso na exclusão (Verificação por ID)';
                    return;
                }
                else{
                    //Erro na exclusão!
                    echo "Erro na exclusão, Verifique os itens\nID = $id\nEMAIL = $email (esta coluna deve ser nula!!)";
                    return;
                }
            }
            else if($email){
                $usuario = $this->where('email', $email)->find();
                if(count($usuario) == 1){
                    $usuario = $usuario[0];
                    if($this->delete($usuario->{'id'})){
                        //Sucesso na exclusão!
                        echo 'Sucesso na exclusão (Verificação por EMAIL)';
                        return;
                    }
                    else{
                        //Erro na exclusão!
                        echo "Erro na exclusão, Verifique os itens\nEMAIL = $email\nID = $id (esta coluna deve ser nula!!)";
                        return;
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
                    echo 'E-mail não verificado! (Login por Nome)';
                    return;
                }
                else{
                    //Login completo!!
                    echo 'Login completo! (Login por Nome)';
                    return;
                }
            }
            else if(count($usuario) == 0){
                $usuario = $this->where(['email' => $apelido, 'senha' => md5($senha)])->findAll();
                if(count($userRow) == 1){
                    $usuario = $usuario[0];
                    if($usuario->{'status'} != 1){
                        //Precisa de verificação de e-mail!
                        echo 'E-mail não verificado! (Login por Email)';
                        return;
                    }
                    else{
                        //Login completo!!
                        echo 'Login completo! (Login por Email)';
                        return;
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