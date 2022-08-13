<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PrivilegioSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nome' => 'admin', 
                'descricao' => 'Nivel fornecido apenas para os desenvolvedores e administradores.', 
                'senha' => '@senhaForte'
            ],
            [
                'nome' => 'vendedor', 
                'descricao' => 'Nivel fornecido para quem vai trabalhar no site.'
            ],
            [
                'nome' => 'cliente', 
                'descricao' => 'Nivel fornecido para clientes do site.'
            ]
        ];
        for($i = 0; $i < count($data); $i++){
            $this->db->table('tb_privilegio')->insert($data[$i]);
        } 
    }
}
