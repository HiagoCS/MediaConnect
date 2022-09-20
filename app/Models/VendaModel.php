<?php namespace App\Models;
    use CodeIgniter\Model;

    class VendaModel extends Model{
        protected $table = 'tb_venda';
        protected $primaryKey = 'id';
        protected $allowedFields = ['id_anuncio', 'id_cliente', 'status'];
        protected $returnType = 'object';
        
    }