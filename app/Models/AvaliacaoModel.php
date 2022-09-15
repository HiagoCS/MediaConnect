<?php namespace App\Models;
    use CodeIgniter\Model;

    class AvalicaoModel extends Model{
        protected $table = 'tb_avaliacao';
        protected $primaryKey = 'id';
        protected $allowedFields = ['id_cliente', 'id_anuncio', 'num_avalicao', 'msg_avaliacao'];
        protected $returnType = 'object';

        public function postInserir($avalicao_data){
            $usuarioModel = new \App\Models\UsuarioModel();
            $anuncioModel = new \App\Models\AnuncioModel();
            if($usuarioModel->find($avalicao_data['id_cliente'])){
                if($anuncioModel->find($avalicao_data['id_anuncio'])){
                    if($this->insert($avalicao_data)){
                        //Sucesso no registro!!
                        echo 'Sucesso no registro!!';
                    }
                    else{
                        //Erro no registro!!
                        echo "Erro no registro!! Verifique se os itens abaixo estão de acordo!!<br>";
                        for($i = 0; $i < count($avalicao_data); $i++){
                            echo "<br>".strtoupper(key($avalicao_data))." = ".current($avalicao_data)."<br>";
                            next($avalicao_data);
                        }
                        return;
                    }
                }
                else{
                    //Erro na inserção de anuncio!!
                    echo "Erro na inserção de anuncio!! Verifique se os itens abaixo estão de acordo!!<br>";
                    for($i = 0; $i < count($avalicao_data); $i++){
                        echo "<br>".strtoupper(key($avalicao_data))." = ".current($avalicao_data)."<br>";
                        next($avalicao_data);
                    }
                    return;
                }
            }
            else{
                //Erro na inserção de cliente!!
                echo "Erro na inserção de cliente!! Verifique se os itens abaixo estão de acordo!!<br>";
                for($i = 0; $i < count($avalicao_data); $i++){
                    echo "<br>".strtoupper(key($avalicao_data))." = ".current($avalicao_data)."<br>";
                    next($avalicao_data);
                }
                return;
            }
        }
    }