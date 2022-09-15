<?php namespace App\Models;
    use CodeIgniter\Model;

    class AvalicaoModel extends Model{
        protected $table = 'tb_avalicao';
        protected $primaryKey = 'id';
        protected $allowedFields = ['id_cliente', 'id_anuncio', 'num_avalicao', 'msg_avaliacao'];

        
    }