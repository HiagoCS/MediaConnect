<?php namespace App\Controllers;
    class Anuncios extends BaseController{
        //Todos os Inputs podem ser renomeados!!
        public function index(){
            //Busca
            $anuncioModel = new \App\Models\AnuncioModel();
            $id = $this->request->getPost('id');
            $nome = $this->request->getPost('nome');
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
                $this->request->getPost('id_servico'),
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
            $anuncioModel->postEditar($id, $nome, $coluna, $nvValor);
        }
        public function excluir(){
            $anuncioModel = new \App\Models\AnuncioModel();
            $id = $this->request->getPost('id');
            $nome = $this->request->getPost('nomeInput');
           
            if(!$id && !$nome){
                echo "Erro: nenhum parametro POST entregue!!";
            }
            $anuncioModel->postDelete($id, $nome);
        }
    }
    class Anuncio{
        public function __construct($id_vendedor, $id_servico, $nome, $valor, $qt_vendas, $md_avaliacao, $descricao){
            $this->id_vendedor = $id_vendedor == '' ? null : $id_vendedor;
            $this->id_servico = $id_servico == '' ? null : $id_servico;
            $this->nome = $nome == '' ? null : $nome;
            $this->valor = $valor == '' ? null : $valor;
            $this->qt_vendas = $qt_vendas == '' ? null : $qt_vendas;
            $this->md_avaliacao = $md_avaliacao == '' ? null : $md_avaliacao;
            $this->descricao = $descricao == '' ? null : $descricao;

        }
    }
?>