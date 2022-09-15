<?php namespace App\Controllers;
    class Avaliacoes extends BaseController{
        public function index(){

        }
        public function inserir(){
            $avaliacaoModel = new \App\Models\AvaliacaoModel();
            $avaliacaodata = new Avaliacao(
                $this->request->getPost('id_cliente'),
                $this->request->getPost('id_anuncio'),
                $this->request->getPost('num_avaliacao'),
                $this->request->getPost('msg_avaliacao')
            );
            $avaliacaoModel->postInserir((array) $avaliacaodata);
        }
    }

    class Avaliacao{
        public function __construct($id_cliente, $id_anuncio, $num_avaliacao, $msg_avaliacao){
            $this->id_cliente = $id_cliente == '' ? null : intval($id_cliente);
            $this->id_anuncio = $id_anuncio == '' ? null : intval($id_anuncio);
            $this->num_avaliacao = $num_avaliacao == '' ? null : intval($num_avaliacao);
            $this->msg_avaliacao = $msg_avaliacao == '' ? null : $msg_avaliacao;
        }
    }