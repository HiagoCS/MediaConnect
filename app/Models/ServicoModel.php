<?php namespace App\Models;
    use CodeIgniter\Model;

    class ServicoModel extends Model{
        protected $table = 'tb_servico';
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
                    $servico = $this->find($id);
                else{
                    //Serviço não encontrado
                    echo 'Serviço não encontrado (Verificação por ID)';
                    return;
                }
                if($servico->{$coluna}){
                    $servico->{$coluna} = $nvValor;
                    if($this->update($servico->{'id'}, $servico)){
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
                $servico = $this->where('nome', $nome)->findAll();
                if(count($servico) == 1){
                    $servico = $servico[0];
                    if($servico->{$coluna}){
                        $servico->{$coluna} = $nvValor;
                        if($this->update($servico->{'id'}, $servico)){
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
                else if(count($servico) == 0){
                    //Serviço não encontrado
                    echo 'Serviço não encontrado (Verificação por Nome)';
                    return;
                }
                else{
                    //Foi encontrado mais de um serviço com o mesmo nome!!
                    //Aqui pode executar multiplas edições ou retornar mensagem de erro!!
                    echo "Foi encontrado mais de um serviço com o mesmo nome";
                    return;
                }
            }
            else{
                $servico = $this->where(['id'=>$id, 'nome'=> $nome])->findAll();
                if(count($servico) == 1){
                    $servico = $servico[0];
                    if($servico->{$coluna}){
                        $servico->{$coluna} = $nvValor;
                        if($this->update($servico->{'id'}, $servico)){
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
                else if(count($servico) == 0){
                    //Serviço não encontrado
                    echo 'Serviço não encontrado (Verificação por Nome e ID)';
                    return;
                }
            }
        }

        public function postDelete($id, $nome){
            if($id && !$nome){
                $servico = $this->find($id);
                if($this->delete($servico->{'id'})){
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
                $servico = $this->where('nome', $nome)->findAll();
                if(count($servico) == 1){
                    $servico = $servico[0];
                    if($this->delete($servico->{'id'})){
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
                else if(count($servico) == 0){
                    //Serviço não encontrado
                    echo 'Serviço não encontrado (Verificação por Nome)';
                    return;
                }
                else{
                    //Foi encontrado mais de um serviço com o mesmo nome!!
                    //Aqui pode executar multiplas edições ou retornar mensagem de erro!!
                    echo "Foi encontrado mais de um serviço com o mesmo nome";
                    return;
                }
            }
            else{
                $servico = $this->where(['id'=>$id, 'nome'=> $nome])->findAll();
                if(count($servico) == 1){
                    $servico = $servico[0];
                    if($this->delete($servico->{'id'})){
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
                else if(count($servico) == 0){
                    //Serviço não encontrado
                    echo 'Serviço não encontrado (Verificação por Nome e ID)';
                    return;
                }
            }
        }
        public function postSelect($id, $nome){
            //Buscar por ID...
            if($id && !$nome){
                $servico = $this->where(['id' => $id])->findAll();
                if(count($servico) == 1){
                    $servico = $servico[0];
                    //Serviço encontrado com sucesso!!
                    echo var_dump($servico);
                    return;
                }
                else if(count($servico) == 0){
                    //Erro na busca
                    echo "Serviço não encontrado (Verificação por ID), Verifique os itens<br>ID = $id<br>NOME = $nome (esta coluna deve ser NULA!)";
                    return;
                }
                //Erro inesperado significa mais de uma coluna com mesmo ID
            }
            //Busca por nome...
            else if($nome && !$id){
                $servico = $this->where('nome', $nome)->findAll();
                if(count($servico) == 1){
                    $servico = $servico[0];
                    //Serviço encontrado com sucesso!!
                    echo var_dump($servico);
                    return;
                }
                else if(count($servico) == 0){
                    //Erro na busca
                    echo "Serviço não encontrado (Verificação por NOME), Verifique os itens<br>NOME = $nome<br>ID = $id (esta coluna deve ser NULA!)";
                    return;
                }
                else{
                    //Encontrado mais de um serviço de mesmo nome
                    echo var_dump($servico);
                    return;
                }
            }
            //Busca por ID e Nome...
            else if($nome && $id){
                $servico = $this->where(['id' => $id, 'nome' => $nome])->findAll();
                if(count($servico) == 1){
                    $servico = $servico[0];
                    //Serviço encontrado com sucesso!!
                    return var_dump($servico);
                }
                else if(count($servico) == 0){
                    //Erro na busca
                    echo "Serviço não encontrado (Verificação por ID e NOME), Verifique os itens<br>ID = $id<br>NOME = $nome";
                    return;
                }
                //Erro inesperado significa mais de uma coluna com mesmo ID
            }
            else{
                echo "Serviço não encontrado, Verifique os itens<br>ID = $id<br>NOME = $nome";
            }
        }
    }
?>