<?php namespace App\Models;
    use CodeIgniter\Model;

    class AvaliacaoModel extends Model{
        protected $table = 'tb_avaliacao';
        protected $primaryKey = 'id';
        protected $allowedFields = ['id_cliente', 'id_anuncio', 'num_avaliacao', 'msg_avaliacao'];
        protected $returnType = 'object';

        public function postInserir($avaliacao_data){
            $usuarioModel = new \App\Models\UsuarioModel();
            $anuncioModel = new \App\Models\AnuncioModel();
            if($usuarioModel->find($avalicao_data['id_cliente'])){
                if($anuncioModel->find($avaliacao_data['id_anuncio'])){
                    if($this->insert($avaliacao_data)){
                        //Sucesso no registro!!
                        if($anuncioModel->updateAvaliacao($avaliacao_data['id_anuncio'])){
                            //Média de avaliação do anuncio atualizada
                            echo "Sucesso no registro!!";
                            return;
                        }
                        else{
                            //Erro na atualização da média
                            echo "Erro na atualização da média!! Verifique se os itens abaixo estão de acordo!!<br>";
                            for($i = 0; $i < count($avaliacao_data); $i++){
                                echo "<br>".strtoupper(key($avaliacao_data))." = ".current($avaliacao_data)."<br>";
                                next($avaliacao_data);
                            }
                            return;
                        }
                    }
                    else{
                        //Erro no registro!!
                        echo "Erro no registro!! Verifique se os itens abaixo estão de acordo!!<br>";
                        for($i = 0; $i < count($avaliacao_data); $i++){
                            echo "<br>".strtoupper(key($avaliacao_data))." = ".current($avaliacao_data)."<br>";
                            next($avaliacao_data);
                        }
                        return;
                    }
                }
                else{
                    //Erro na inserção de anuncio!!
                    echo "Erro na inserção de anuncio!! Verifique se os itens abaixo estão de acordo!!<br>";
                    for($i = 0; $i < count($avaliacao_data); $i++){
                        echo "<br>".strtoupper(key($avaliacao_data))." = ".current($avaliacao_data)."<br>";
                        next($avaliacao_data);
                    }
                    return;
                }
            }
            else{
                //Erro na inserção de cliente!!
                echo "Erro na inserção de cliente!! Verifique se os itens abaixo estão de acordo!!<br>";
                for($i = 0; $i < count($avaliacao_data); $i++){
                    echo "<br>".strtoupper(key($avaliacao_data))." = ".current($avaliacao_data)."<br>";
                    next($avaliacao_data);
                }
                return;
            }
        }
        public function postEditar($id_avaliacao, $id_cliente, $nvValor){
            $avaliacao = $this->where('id_cliente', $id_cliente)->find($id_avaliacao);
            if(gettype($nvValor) == 'integer'){
                $avaliacao->{'num_avaliacao'} = $nvValor;
                if($this->update($avaliacao->{'id'}, $avaliacao)){
                    $anuncioModel = new \App\Models\AnuncioModel();
                    if($anuncioModel->updateAvaliacao($avaliacao->{'id_anuncio'})){
                        //Média de avaliação do anuncio atualizada
                        echo "Sucesso no registro!!";
                        return;
                    }
                    else{
                        //Erro na atualização da média
                        echo "Erro na atualização da média, Verifique os itens<br> ID_AVALIACAO = $id_avaliacao<br> ID_CLIENTE = $id_cliente<br> NOVO VALOR = $nvValor";
                        return;
                    }
                }
                else{
                    //Erro na alteração
                    echo "Erro na alteração, Verifique os itens<br> ID_AVALIACAO = $id_avaliacao<br> ID_CLIENTE = $id_cliente<br> NOVO VALOR = $nvValor";
                    return;
                }
            }   
            else{
                $avaliacao->{'msg_avaliacao'} = $nvValor;
                $anuncioModel = new \App\Models\AnuncioModel();
                if($this->update($avaliacao->{'id'}, $avaliacao)){
                    if($anuncioModel->updateAvaliacao($avaliacao->{'id_anuncio'})){
                        //Média de avaliação do anuncio atualizada
                        echo "Sucesso no registro!!";
                        return;
                    }
                    else{
                        //Erro na atualização da média
                        echo "Erro na atualização da média, Verifique os itens<br> ID_AVALIACAO = $id_avaliacao<br> ID_CLIENTE = $id_cliente<br> NOVO VALOR = $nvValor";
                        return;
                    }
                }
                else{
                    //Erro na alteração
                    echo "Erro na alteração, Verifique os itens<br> ID_AVALIACAO = $id_avaliacao<br> ID_CLIENTE = $id_cliente<br> NOVO VALOR = $nvValor";
                    return;
                }
            }
        }
        public function postDelete($id_avaliacao, $id_cliente){
            $avaliacao = $this->where('id_cliente', $id_cliente)->find($id_avaliacao);
            if($this->delete($avaliacao->{'id'})){
                $anuncioModel = new \App\Models\AnuncioModel();
                if($anuncioModel->updateAvaliacao($avaliacao->{'id_anuncio'})){
                    //Média de avaliação do anuncio atualizada
                    echo "Sucesso na exclusão!!";
                    return;
                }
                else{
                    //Erro na atualização da média
                    echo "Erro na atualização da média, Verifique os itens<br> ID_AVALIACAO = $id_avaliacao<br> ID_CLIENTE = $id_cliente";
                    return;
                }
            }
            else{
                //Erro na exclusão
                echo "Erro na exclusão!! Verifique os itens<br> ID_AVALICAO = $id_avaliacao<br> ID_CLIENTE = $id_cliente";
                return;
            }
        }
        public function postSelect($id_anuncio){
            $avaliacoes = $this->where('id_anuncio', $id_anuncio)->findAll();
            if($avaliacoes){
                return var_dump($avaliacoes);
            }
            else{
                echo "Sem avaliações!!";
                return;
            }
        }
    }