<?php namespace App\Models;
    use CodeIgniter\Model;

    class ProfissaoModel extends Model{
        protected $table = 'tb_profissao';
        protected $primaryKey = 'id';
        protected $allowedFields = ['nome', 'comissao', 'descricao'];
        protected $returnType = 'object';
            
        public function postInserir($nome, $comissao, $descricao){
            //Segundo parametro de set() é o nome do input
            $this->set('nome', $nome);
            $this->set('descricao', $descricao);
            //Comissao só vai de 0 a 1, em numero flutuante
            if($comissao > 1){
                echo "Erro: Comissão acima de 100%";
                return;
            }
            else if($comissao < 0){
                echo "Erro: Comissão abaixo de 0%";
                return;
            }
            else{
                $this->set('comissao', $comissao);
                if($this->insert()){
                    //Sucesso no registro!!
                    echo 'Sucesso no registro!!';
                    return;
                }
                else{
                    //Erro no registro!!
                    echo "Erro no registro!! Verifique se os itens abaixo estão de acordo!!<br>NOME = $nome<br>COMISSÃO = $comissao<br>DESCRIÇÃO = $descricao";
                    return;
                }
            }
        }
        public function postEditar($id, $nome, $coluna, $nvValor){
            if($id && !$nome){
                if($this->find($id))
                    $profissao = $this->find($id);
                else{
                    //Profissão não encontrada
                    echo 'Profissão não encontrada (Verificação por ID)';
                    return;
                }
                if($profissao->{$coluna}){
                    $profissao->{$coluna} = $nvValor;
                    if($this->update($profissao->{'id'}, $profissao)){
                        //Sucesso na alteração
                        echo 'Sucesso na alteração (Verificação por ID)';
                        return;
                    }
                    else{
                        //Erro na alteração
                        echo "Erro na alteração, Verifique os itens<br> ID = $id<br> Nome = $nome (esta coluna deve ser NULA!)<br> COLUNA = $coluna<br> NOVO VALOR = $nvValor";
                        return;
                    }
                }
                else{
                    //Coluna Inexistente!
                    echo 'Coluna não encontrada (Verificação por ID)!';
                    return;
                }
            }
            else if($nome && !$id){
                $profissao = $this->where('nome', $nome)->findAll();
                if(count($profissao) == 1){
                    $profissao = $profissao[0];
                    if($profissao->{$coluna}){
                        $profissao->{$coluna} = $nvValor;
                        if($this->update($profissao->{'id'}, $profissao)){
                            //Sucesso na alteração
                            echo 'Sucesso na alteração (Verificação por Nome)';
                            return;
                        }
                        else{
                            //Erro na alteração
                            echo "Erro na alteração, Verifique os itens<br>ID = $id (esta coluna deve ser nula!)<br>NOME = $nome<br>COLUNA = $coluna<br>NOVO VALOR = $nvValor";
                            return;
                        }
                    }
                    else{
                        //Coluna Inexistente!
                        echo 'Coluna não encontrada (Verificação por Nome)!';
                        return;
                    }
                }
                else if(count($profissao) == 0){
                    //Profissão não encontrada
                    echo 'Profissão não encontrada (Verificação por Nome)';
                    return;
                }
                else{
                    //Foi encontrado mais de uma profissão com o mesmo nome!!
                    //Aqui pode executar multiplas edições ou retornar mensagem de erro!!
                    echo "Foi encontrado mais de uma profissão com o mesmo nome";
                    return;
                }
            }
            else{
                $profissao = $this->where(['id'=>$id, 'nome'=> $nome])->findAll();
                if(count($profissao) == 1){
                    $profissao = $profissao[0];
                    if($profissao->{$coluna}){
                        $profissao->{$coluna} = $nvValor;
                        if($this->update($profissao->{'id'}, $profissao)){
                            //Sucesso na alteração
                            echo 'Sucesso na alteração (Verificação por Nome e ID)';
                            return;
                        }
                        else{
                            //Erro na alteração
                            echo "Erro na alteração, Verifique os itens<br>ID = $id <br>NOME = $nome<br>COLUNA = $coluna<br>NOVO VALOR = $nvValor";
                            return;
                        }
                    }
                    else{
                        //Coluna Inexistente!
                        echo 'Coluna não encontrada (Verificação por Nome e ID)!';
                        return;
                    }
                }
                else if(count($profissao) == 0){
                    //Profissão não encontrada
                    echo 'Profissão não encontrada (Verificação por Nome e ID)';
                    return;
                }
            }
        }

        public function postDelete($id, $nome){
            if($id && !$nome){
                $profissao = $this->find($id);
                if($this->delete($profissao->{'id'})){
                    //Sucesso na exclusão!
                    echo 'Sucesso na exclusão (Verificação por ID)';
                    return;
                }
                else{
                    //Erro na exclusão!
                    echo "Erro na exclusão, Verifique os itens<br>ID = $id";
                    return;
                }
            }
            else if($nome && !$id){
                $profissao = $this->where('nome', $nome)->findAll();
                if(count($profissao) == 1){
                    $profissao = $profissao[0];
                    if($this->delete($profissao->{'id'})){
                        //Sucesso na exclusão!
                        echo 'Sucesso na exclusão (Verificação por Nome)';
                        return;
                    }
                    else{
                        //Erro na exclusão!
                        echo "Erro na exclusão, Verifique os itens<br>ID = $id";
                        return;
                    }
                }
                else if(count($profissao) == 0){
                    //Profissão não encontrada
                    echo 'Profissão não encontrada (Verificação por Nome)';
                    return;
                }
                else{
                    //Foi encontrado mais de uma profissão com o mesmo nome!!
                    //Aqui pode executar multiplas edições ou retornar mensagem de erro!!
                    echo "Foi encontrado mais de uma profissão com o mesmo nome";
                    return;
                }
            }
            else{
                $profissao = $this->where(['id'=>$id, 'nome'=> $nome])->findAll();
                if(count($profissao) == 1){
                    $profissao = $profissao[0];
                    if($this->delete($profissao->{'id'})){
                        //Sucesso na exclusão!
                        echo 'Sucesso na exclusão (Verificação por Nome e ID)';
                        return;
                    }
                    else{
                        //Erro na exclusão!
                        echo "Erro na exclusão, Verifique os itens<br>ID = $id";
                        return;
                    }
                }
                else if(count($profissao) == 0){
                    //Profissão não encontrada
                    echo 'Profissão não encontrada (Verificação por Nome e ID)';
                    return;
                }
            }
        }
        public function postSelect($id, $nome){
            //Buscar por ID...
            if($id && !$nome){
                $profissao = $this->where(['id' => $id])->findAll();
                if(count($profissao) == 1){
                    $profissao = $profissao[0];
                    //Profissão encontrada com sucesso!!
                    echo var_dump($profissao);
                    return;
                }
                else if(count($profissao) == 0){
                    //Erro na busca
                    echo "Profissão não encontrada (Verificação por ID), Verifique os itens<br>ID = $id<br>NOME = $nome (esta coluna deve ser NULA!)";
                    return;
                }
                //Erro inesperado significa mais de uma coluna com mesmo ID
            }
            //Busca por nome...
            else if($nome && !$id){
                $profissao = $this->where('nome', $nome)->findAll();
                if(count($profissao) == 1){
                    $profissao = $profissao[0];
                    //Profissão encontrada com sucesso!!
                    echo var_dump($profissao);
                    return;
                }
                else if(count($profissao) == 0){
                    //Erro na busca
                    echo "Profissão não encontrada (Verificação por NOME), Verifique os itens<br>NOME = $nome<br>ID = $id (esta coluna deve ser NULA!)";
                    return;
                }
                else{
                    //Encontrado mais de uma profissão de mesmo nome
                    echo var_dump($profissao);
                    return;
                }
            }
            //Busca por ID e Nome...
            else if($nome && $id){
                $profissao = $this->where(['id' => $id, 'nome' => $nome])->findAll();
                if(count($profissao) == 1){
                    $profissao = $profissao[0];
                    //Profissão encontrada com sucesso!!
                    return var_dump($profissao);
                }
                else if(count($profissao) == 0){
                    //Erro na busca
                    echo "Profissão não encontrada (Verificação por ID e NOME), Verifique os itens<br>ID = $id<br>NOME = $nome";
                    return;
                }
                //Erro inesperado significa mais de uma coluna com mesmo ID
            }
            else{
                echo "Profissão não encontrada, Verifique os itens<br>ID = $id<br>NOME = $nome";
            }
        }
    }
?>