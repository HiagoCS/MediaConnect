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
                'descricao' => 'Nivel fornecido para os profissionais do site.',
                'senha' => null
            ],
            [
                'nome' => 'cliente', 
                'descricao' => 'Nivel fornecido para clientes do site.',
                'senha' => null
            ]
        ];
        $this->db->table('tb_privilegio')->insertBatch($data);
    }
}
