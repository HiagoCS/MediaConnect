<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbVenda extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' =>[
                'type' =>'INT',
                'auto_increment' =>true
            ],
            'id_anuncio' =>[
                'type' =>'INT'
            ],
            'id_cliente' =>[
                'type' =>'INT'
            ],
            'status' =>[
                'type' =>'VARCHAR',
                'constraint' => 199
            ]
        ]);
        $this->forge->addForeignKey('id_cliente', 'tb_usuario', 'id');
        $this->forge->addForeignKey('id_anuncio', 'tb_anuncio', 'id');
        $this->forge->addPrimaryKey('id', TRUE);
        $this->forge->createTable('tb_venda', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tb_venda', TRUE);
    }
}
