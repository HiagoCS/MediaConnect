<?php namespace App\Models;
    use CodeIgniter\Model;

    class AnuncioModel extends Model{
        protected $table = 'tb_anuncio';
        protected $primaryKey = 'id';
        protected $allowedFields = ['id_vendedor', 'id_servico', 'nome', 'valor', 'qt_vendas', 'md_avaliacao', 'descricao'];
        protected $returnType = 'object';

        
    }