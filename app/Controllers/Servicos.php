<?php namespace App\Controllers;
    class Servicos extends BaseController{
        //Todos os Inputs podem ser renomeados!!
        public function index(){
            //Busca
            $servicoModel = new \App\Models\ServicoModel();
            $id = $this->request->getPost('id');
            $nome = $this->request->getPost('nome');
            if(!$id && !$nome){
                echo "Erro: nenhum parametro POST entregue!!";
                return;
            }
            $servicoModel->postSelect($id, $nome);
        }
        public function inserir(){
            $servicoModel = new \App\Models\ServicoModel();
            $nome = $this->request->getPost('nomeInput');
            $comissao = $this->request->getPost('comissaoInput'); 
            $descricao = $this->request->getPost('descricaoInput');
            if(!$nome && !$comissao && !$descricao){
                echo "Erro: nenhum parametro POST entregue!!";
                return;
            }

            $servicoModel->postInserir($nome, $comissao, $descricao);
        }
        public function editar(){
            $servicoModel = new \App\Models\ServicoModel();
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
            $servicoModel->postEditar($id, $nome, $coluna, $nvValor);
        }
        public function excluir(){
            $servicoModel = new \App\Models\ServicoModel();
            $id = $this->request->getPost('id');
            $nome = $this->request->getPost('nomeInput');
           
            if(!$id && !$nome){
                echo "Erro: nenhum parametro POST entregue!!";
            }
            $servicoModel->postDelete($id, $nome);
        }
    }
?>