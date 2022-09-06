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
            $this->set('comissao', $comissao);
            $this->set('descricao', $descricao);
            if($this->insert()){
                //Sucesso no registro!!
                echo 'Sucesso no registro!!';
            }
            else{
                //Erro no registro!!
                echo "Erro no registro!! Verifique se os itens abaixo estão de acordo!!\nNOME = $nome\nCOMISSÃO = $comissao\n DESCRIÇÃO = $descricao";
            }
        }
        public function postEditar($id, $coluna, $nvValor){
            if($id){
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
                        echo "Erro na alteração, Verifique os itens\n ID = $id\n COLUNA = $coluna\n NOVO VALOR = $nvValor";
                        return;
                    }
                }
                else{
                    //Coluna Inexistente!
                    echo 'Coluna não encontrada (Verificação por ID)!';
                    return;
                }
            }
        }
        public function postDelete($id){
            if($id){
                $servico = $this->find($id);
                if($this->delete($servico->{'id'})){
                    //Sucesso na exclusão!
                    echo 'Sucesso na exclusão (Verificação por ID)';
                    return;
                }
                else{
                    //Erro na exclusão!
                    echo "Erro na exclusão, Verifique os itens\nID = $id";
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
                    return $servico;
                }
                else if(count($servico) == 0){
                    //Erro na busca
                    echo "Serviço não encontrado (Verificação por ID), Verifique os itens\nID = $id\nNOME = $nome (esta coluna deve ser NULA!)";
                    return;
                }
                //Erro inesperado significa mais de uma coluna com mesmo ID
            }
            //Busca por nome...
            else if($nome && !$id){
                $servico = $this->where(['nome' => $nome])->findAll();
                if(count($servico) == 1){
                    $servico = $servico[0];
                    //Serviço encontrado com sucesso!!
                    return $servico;
                }
                else if(count($servico) == 0){
                    //Erro na busca
                    echo "Serviço não encontrado (Verificação por NOME), Verifique os itens\nNOME = $nome\nID = $id (esta coluna deve ser NULA!)";
                    return;
                }
                else{
                    //Encontrado mais de um serviço de mesmo nome
                    return $servico;
                }
            }
            //Busca por ID e Nome...
            else if($nome && $id){
                $servico = $this->where(['id' => $id, 'nome' => $nome])->findAll();
                if(count($servico) == 1){
                    $servico = $servico[0];
                    //Serviço encontrado com sucesso!!
                    return $servico;
                }
                else if(count($servico) == 0){
                    //Erro na busca
                    echo "Serviço não encontrado (Verificação por ID e NOME), Verifique os itens\nID = $id\nNOME = $nome";
                    return;
                }
                //Erro inesperado significa mais de uma coluna com mesmo ID
            }
        }
    }
?>