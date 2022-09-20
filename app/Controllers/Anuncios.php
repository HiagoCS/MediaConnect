<?php namespace App\Controllers;
    class Anuncios extends BaseController{
        //Todos os Inputs podem ser renomeados!!
        public function index(){
            //Busca
            $anuncioModel = new \App\Models\AnuncioModel();
            $id = $this->request->getPost('id');
            $nome = $this->request->getPost('nomeInput');
            if(!$id && !$nome){
                echo "Erro: nenhum parametro POST entregue!!";
                return;
            }
            $anuncioModel->postSelect($id, $nome);
        }
        public function inserir(){
            $anuncioModel = new \App\Models\AnuncioModel();
            $anunciodata = new Anuncio(
                $this->request->getPost('id_vendedor'), 
                $this->request->getPost('id_profissao'),
                $this->request->getPost('nomeInput'),
                $this->request->getPost('valorInput'),
                $this->request->getPost('qt_vendas'),
                $this->request->getPost('md_avaliacao'),
                $this->request->getPost('descricaoInput')
            );
            $anuncioModel->postInserir((array) $anunciodata);
        }
        public function editar(){
            $anuncioModel = new \App\Models\AnuncioModel();
            $id = $this->request->getPost('id');
            $nome = $this->request->getPost('nomeInput');
            $coluna = $this->request->getPost('coluna');
            $nvValor = $this->request->getPost('nvValor');

            if(!$id && !$nome && !$coluna && !$nvValor){
                echo "Erro: nenhum parametro POST entregue!!";
            }
            $anuncioModel->postEditar($id, $nome, $coluna, $nvValor);
        }
        public function excluir(){
            $anuncioModel = new \App\Models\AnuncioModel();
            $id = $this->request->getPost('id');
            $nome = $this->request->getPost('nomeInput');
           
            if(!$id && !$nome){
                echo "Erro: nenhum parametro POST entregue!!";
                return;
            }
            $anuncioModel->postDelete($id, $nome);
        }
    }
    class Anuncio{
        public function __construct($id_vendedor, $id_profissao, $nome, $valor, $qt_vendas, $md_avaliacao, $descricao){
            $this->id_vendedor = $id_vendedor == '' ? null : $id_vendedor;
            $this->id_profissao = $id_profissao == '' ? null : $id_profissao;
            $this->nome = $nome == '' ? null : $nome;
            $this->valor = $valor == '' ? null : $valor;
            $this->qt_vendas = 0;
            $this->md_avaliacao = 0;
            $this->descricao = $descricao == '' ? null : $descricao;

        }
    }
?>