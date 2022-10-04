<?php namespace App\Models;
    use CodeIgniter\Model;

    class VendaModel extends Model{
        protected $table = 'tb_venda';
        protected $primaryKey = 'id';
        protected $allowedFields = ['id_anuncio', 'id_cliente', 'status'];
        protected $returnType = 'object';

        public function postInserir($venda_data){
            $anuncioModel = new \App\Models\AnuncioModel();
            $usuarioModel = new \App\Models\UsuarioModel();

            if($usuarioModel->find($venda_data['id_cliente'])){
                if($anuncioModel->find($venda_data['id_anuncio'])){
                    if($this->insert($venda_data)){
                        //Sucesso no registro!!
                        echo 'Sucesso no registro!! porém venda pendente.';
                    }
                    else{
                        //Erro no registro!!
                        echo "Erro no registro!! Verifique se os itens abaixo estão de acordo!!<br>";
                        for($i = 0; $i < count($venda_data); $i++){
                            echo "<br>".strtoupper(key($venda_data))." = ".current($venda_data)."<br>";
                            next($venda_data);
                        }
                        return;
                    }
                }
                else{
                    //Erro na inserção de anuncio!!
                    echo "Erro na inserção de anuncio!! Verifique se os itens abaixo estão de acordo!!<br>";
                    for($i = 0; $i < count($venda_data); $i++){
                        echo "<br>".strtoupper(key($venda_data))." = ".current($venda_data)."<br>";
                        next($venda_data);
                    }
                    return;
                }
            }
            else{
                //Erro na inserção de cliente!!
                echo "Erro na inserção de cliente!! Verifique se os itens abaixo estão de acordo!!<br>";
                for($i = 0; $i < count($venda_data); $i++){
                    echo "<br>".strtoupper(key($venda_data))." = ".current($venda_data)."<br>";
                    next($venda_data);
                }
                return;
            }
        }
        public function postDelete($id){
            $venda = $this->find($id);
            if($this->delete($venda->{'id'})){
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
    }