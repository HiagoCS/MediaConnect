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
    }