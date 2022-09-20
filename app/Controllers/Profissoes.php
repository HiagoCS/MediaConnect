<?php namespace App\Controllers;
    class Profissoes extends BaseController{
        //Todos os Inputs podem ser renomeados!!
        public function index(){
            //Busca
            $profissaoModel = new \App\Models\ProfissaoModel();
            $id = $this->request->getPost('id');
            $nome = $this->request->getPost('nome');
            if(!$id && !$nome){
                echo "Erro: nenhum parametro POST entregue!!";
                return;
            }
            $profissaoModel->postSelect($id, $nome);
        }
        public function inserir(){
            $profissaoModel = new \App\Models\ProfissaoModel();
            $nome = $this->request->getPost('nomeInput');
            $comissao = $this->request->getPost('comissaoInput'); 
            $descricao = $this->request->getPost('descricaoInput');
            if(!$nome && !$comissao && !$descricao){
                echo "Erro: nenhum parametro POST entregue!!";
                return;
            }

            $profissaoModel->postInserir($nome, $comissao, $descricao);
        }
        public function editar(){
            $profissaoModel = new \App\Models\ProfissaoModel();
            $id = $this->request->getPost('id');
            $nome = $this->request->getPost('nomeInput');
            $coluna = $this->request->getPost('coluna');
            if(strtolower($coluna) == 'comissao'){
                if($this->request->getPost('nvValor') > 1){
                    echo "Erro: Comissão acima de 100%";
                    return;
                }
                else if($this->request->getPost('nvValor') < 0){
                    echo "Erro: Comissão abaixo de 0%";
                    return;
                }
                else{
                    $nvValor = $this->request->getPost('nvValor');
                }
            }

            if(!$id && !$nome && !$coluna && !$nvValor){
                echo "Erro: nenhum parametro POST entregue!!";
            }
            $profissaoModel->postEditar($id, $nome, $coluna, $nvValor);
        }
        public function excluir(){
            $profissaoModel = new \App\Models\ProfissaoModel();
            $id = $this->request->getPost('id');
            $nome = $this->request->getPost('nomeInput');
           
            if(!$id && !$nome){
                echo "Erro: nenhum parametro POST entregue!!";
            }
            $profissaoModel->postDelete($id, $nome);
        }
    }
?>