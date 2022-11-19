<?php namespace App\Models;
    use CodeIgniter\Model;

    class UsuarioModel extends Model{
        protected $table = 'tb_usuario';
        protected $primaryKey = 'id';
        protected $allowedFields = ['nome', 'email', 'senha', 'cpf', 'telefone', 'cep', 'status'];
        protected $returnType = 'object';
        
        public function postInserir($user_data)
        {
            //Segundo parametro de set() é o nome do input
            if(count($this->where('email', $user_data['email'])->findAll()) == 0){
                $idUsuario = $this->insert($user_data);
                if($idUsuario){
                    //Sucesso no registro!!
                    return $idUsuario;
                }
                else{
                    //Erro no registro!!
                    echo "Erro no registro!! Verifique se os itens abaixo estão de acordo!!<br>";
                    for($i = 0; $i < count($user_data); $i++){
                        echo "<br>".strtoupper(key($user_data))." = ".current($user_data)."<br>";
                        next($user_data);
                    }
                    return;
                }
            }
            else{
                //Erro no registro, email já existe!!
                echo "Erro no registro, email já existe!! Verifique se os itens abaixo estão de acordo!!<br>";
                for($i = 0; $i < count($user_data); $i++){
                    echo "<br>".strtoupper(key($user_data))." = ".current($user_data)."<br>";
                    next($user_data);
                }
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
                        echo "Erro na alteração, Verifique os itens<br>ID = $id<br> COLUNA = $coluna<br>NOVO VALOR = $nvValor<br>EMAIL = $email (esta coluna deve ser nula!)";
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
                            echo "Erro na alteração, Verifique os itens<br>EMAIL = $email<br>COLUNA = $coluna<br>NOVO VALOR = $nvValor<br>ID = $id (esta coluna deve ser nula!)";
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
                    echo "Erro na exclusão, Verifique os itens<br>ID = $id<br>EMAIL = $email (esta coluna deve ser nula!!)";
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
                        echo "Erro na exclusão, Verifique os itens<br>EMAIL = $email<br>ID = $id (esta coluna deve ser nula!!)";
                        return;
                    }
                }
            }
        }
        public function postLogin($apelido, $senha){
            //Segundo parametro de where() é o nome do input
            $usuario = $this->where(['email' => $apelido, 'senha' => md5($senha)])->findAll();
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
                if(count($usuario) == 1){
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