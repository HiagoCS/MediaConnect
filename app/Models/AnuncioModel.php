<?php namespace App\Models;
    use CodeIgniter\Model;

    class AnuncioModel extends Model{
        protected $table = 'tb_anuncio';
        protected $primaryKey = 'id';
        protected $allowedFields = ['id_vendedor', 'id_profissao', 'nome', 'valor', 'qt_vendas', 'md_avaliacao', 'descricao'];
        protected $returnType = 'object';

        public function postInserir($anuncio_data){
            //Segundo parametro de set() é o nome do input
            $usuarioModel = new \App\Models\UsuarioModel();
            $profissaoModel = new \App\Models\ProfissaoModel();
            if($usuarioModel->find($anuncio_data['id_vendedor'])){
                if($profissaoModel->find($anuncio_data['id_profissao'])){
                    if($this->insert($anuncio_data)){
                        //Sucesso no registro!!
                        echo 'Sucesso no registro!!';
                    }
                    else{
                        //Erro no registro!!
                        echo "Erro no registro!! Verifique se os itens abaixo estão de acordo!!<br>";
                        for($i = 0; $i < count($anuncio_data); $i++){
                            echo "<br>".strtoupper(key($anuncio_data))." = ".current($anuncio_data)."<br>";
                            next($anuncio_data);
                        }
                        return;
                    }
                }
                else{
                    //Erro na inserção de profissão!!
                    echo "Erro na inserção de profissão!! Verifique se os itens abaixo estão de acordo!!<br>";
                    for($i = 0; $i < count($anuncio_data); $i++){
                        echo "<br>".strtoupper(key($anuncio_data))." = ".current($anuncio_data)."<br>";
                        next($anuncio_data);
                    }
                    return;
                }
            }
            else{
                //Erro na inserção de vendedor!!
                echo "Erro na inserção de vendedor!! Verifique se os itens abaixo estão de acordo!!<br>";
                for($i = 0; $i < count($anuncio_data); $i++){
                    echo "<br>".strtoupper(key($anuncio_data))." = ".current($anuncio_data)."<br>";
                    next($anuncio_data);
                }
                return;
            }

        }

        public function postEditar($id, $nome, $coluna, $nvValor){
            if($id && !$nome){
                if($this->find($id))
                    $anuncio = $this->find($id);
                else{
                    //Anuncio não encontrado
                    echo 'Anuncio não encontrado (Verificação por ID)';
                    return;
                }
                if($anuncio->{$coluna}){
                    $anuncio->{$coluna} = $nvValor;
                    if($this->update($anuncio->{'id'}, $anuncio)){
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
                $anuncio = $this->where('nome', $nome)->findAll();
                if(count($anuncio) == 1){
                    $anuncio = $anuncio[0];
                    if($anuncio->{$coluna}){
                        $anuncio->{$coluna} = $nvValor;
                        if($this->update($anuncio->{'id'}, $anuncio)){
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
                else if(count($anuncio) == 0){
                    //Anuncio não encontrado
                    echo 'Anuncio não encontrado (Verificação por Nome)';
                    return;
                }
                else{
                    //Foi encontrado mais de um anuncio com o mesmo nome!!
                    //Aqui pode executar multiplas edições ou retornar mensagem de erro!!
                    echo "Foi encontrado mais de um anuncio com o mesmo nome";
                    return;
                }
            }
            else{
                $anuncio = $this->where(['id'=>$id, 'nome'=> $nome])->findAll();
                if(count($anuncio) == 1){
                    $anuncio = $anuncio[0];
                    if($anuncio->{$coluna}){
                        $anuncio->{$coluna} = $nvValor;
                        if($this->update($anuncio->{'id'}, $anuncio)){
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
                else if(count($anuncio) == 0){
                    //Serviço não encontrado
                    echo 'Serviço não encontrado (Verificação por Nome e ID)';
                    return;
                }
            }
        }

        public function postDelete($id, $nome){
            if($id && !$nome){
                $anuncio = $this->find($id);
                if($this->delete($anuncio->{'id'})){
                    //Sucesso na exclusão!
                    echo 'Sucesso na exclusão (Verificação por ID)';
                    return;
                }
                else{
                    //Erro na exclusão!
                    echo "Erro na exclusão (Verificação por ID), Verifique os itens<br>ID = $id";
                    return;
                }
            }
            else if($nome && !$id){
                $anuncio = $this->where('nome', $nome)->findAll();
                if(count($anuncio) == 1){
                    $anuncio = $anuncio[0];
                    if($this->delete($anuncio->{'id'})){
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
                else if(count($anuncio) == 0){
                    //Anuncio não encontrado
                    echo 'Anuncio não encontrado (Verificação por Nome)';
                    return;
                }
                else{
                    //Foi encontrado mais de um anuncio com o mesmo nome!!
                    //Aqui pode executar multiplas exclusões ou retornar mensagem de erro!!
                    echo "Foi encontrado mais de um anuncio com o mesmo nome";
                    return;
                }
            }
            else{
                $anuncio = $this->where(['id'=>$id, 'nome'=> $nome])->findAll();
                if(count($anuncio) == 1){
                    $anuncio = $anuncio[0];
                    if($this->delete($anuncio->{'id'})){
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
                else if(count($anuncio) == 0){
                    //Anuncio não encontrado
                    echo 'Anuncio não encontrado (Verificação por Nome e ID)';
                    return;
                }
            }
        }
        public function postSelect($id, $nome){
            //Buscar por ID...
            if($id && !$nome){
                $anuncio = $this->where(['id' => $id])->findAll();
                if(count($anuncio) == 1){
                    $anuncio = $anuncio[0];
                    //Serviço encontrado com sucesso!!
                    echo var_dump($anuncio);
                    return;
                }
                else if(count($anuncio) == 0){
                    //Erro na busca
                    echo "Anuncio não encontrado (Verificação por ID), Verifique os itens<br>ID = $id<br>NOME = $nome (esta coluna deve ser NULA!)";
                    return;
                }
                //Erro inesperado significa mais de uma coluna com mesmo ID
            }
            //Busca por nome...
            else if($nome && !$id){
                $anuncio = $this->where('nome', $nome)->findAll();
                if(count($anuncio) == 1){
                    $anuncio = $anuncio[0];
                    //Anuncio encontrado com sucesso!!
                    echo var_dump($anuncio);
                    return;
                }
                else if(count($anuncio) == 0){
                    //Erro na busca
                    echo "Anuncio não encontrado (Verificação por NOME), Verifique os itens<br>NOME = $nome<br>ID = $id (esta coluna deve ser NULA!)";
                    return;
                }
                else{
                    //Encontrado mais de um serviço de mesmo nome
                    echo var_dump($anuncio);
                    return;
                }
            }
            //Busca por ID e Nome...
            else if($id && $nome){
                $anuncio = $this->where(['id' => $id, 'nome' => $nome])->findAll();
                if(count($anuncio) == 1){
                    $anuncio = $anuncio[0];
                    //Serviço encontrado com sucesso!!
                    return var_dump($anuncio);
                }
                else if(count($anuncio) == 0){
                    //Erro na busca
                    echo "Anuncio não encontrado (Verificação por ID e NOME), Verifique os itens<br>ID = $id<br>NOME = $nome";
                    return;
                }
                //Erro inesperado significa mais de uma coluna com mesmo ID
            }
            else{
                echo "Anuncio não encontrado, Verifique os itens<br>ID = $id<br>NOME = $nome";
            }
        }
        public function updateAvaliacao($id_anuncio){
            $avaliacaoModel = new \App\Models\AvaliacaoModel();
            $array_avalicao = $avaliacaoModel->where('id_anuncio', $id_anuncio)->findColumn('num_avaliacao');
            $md_avalicao = $array_avalicao != null ? array_sum($array_avalicao) / count($array_avalicao) : 0;
            $anuncio = $this->find($id_anuncio);
            $anuncio->{'md_avaliacao'} = $md_avalicao;
            if($this->update($anuncio->{'id'}, $anuncio)){
                return true;
            }
            else{
                return false;
            }
        }
    }