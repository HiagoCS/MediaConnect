<?php namespace App\Controllers;
    class Servicos extends BaseController{
        //Todos os Inputs podem ser renomeados!!
        public function index(){
            //Busca
            $servicoModel = new \App\Models\ServicoModel();
            if($this->request->getPost('id') && !$this->request->getPost('nomeInput')){
                $servicoModel->postSelect($this->request->getPost('id'),null);
            }       
            else if($this->request->getPost('nomeInput') && !$this->request->getPost('id')){
                $servicoModel->postSelect(null,$this->request->getPost('nomeInput'));
            }
            else if($this->request->getPost('nomeInput') && $this->request->getPost('id')){
                $servicoModel->postSelect($this->request->getPost('id'),$this->request->getPost('nomeInput'));
            }
            else if(!$this->request->getPost('nomeInput') && !$this->request->getPost('id')){
                $servicoModel->postSelect(null, null);
            }
        }
        public function inserir(){
            $servicoModel = new \App\Models\ServicoModel();
            $servicoModel->postInserir($this->request->getPost('nomeInput'), 
            $this->request->getPost('comissaoInput'),
            $this->request->getPost('descricaoInput'));
        }
        public function editar(){
            $servicoModel = new \App\Models\ServicoModel();
            $servicoModel->postEditar($this->request->getPost('id'), $this->request->getPost('coluna'), $this->request->getPost('nvValor'));
        }
        public function excluir(){
            $servicoModel = new \App\Models\ServicoModel();
            $servicoModel->postDelete($this->request->getPost('id'));
        }
    }
?>