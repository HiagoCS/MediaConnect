<?php namespace App\Controllers;
    class Vendas extends BaseController{
        public function index(){
            
        }
        public function inserir(){
            $vendaModel = new \App\Models\VendaModel();
            $venda = new Venda(
                $this->request->getPost('id_anuncio'), 
                $this->request->getPost('id_cliente'),
                0
            );
            $vendaModel->postInserir((array) $venda);
        }
    }
    class Venda{
        public function __construct($id_anuncio, $id_cliente, $status){
            $this->id_anuncio = $id_anuncio == '' ? null : $id_anuncio;
            $this->id_cliente = $id_cliente == '' ? null : $id_cliente;
            $this->status = $status;
        }
    }