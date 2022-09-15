<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbAvaliacao extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' =>[
                'type' =>'INT',
                'auto_increment' =>true
            ],
            'id_cliente' =>[
                'type' =>'INT'
            ],
            'id_anuncio' =>[
                'type' =>'INT'
            ],
            'num_avaliacao' =>[
                'type' => 'INT',
                'constraint' =>10
            ],
            'msg_avaliacao' =>[
                'type' =>'LONGTEXT'
            ]
        ]);
        $this->forge->addForeignKey('id_cliente', 'tb_usuario', 'id');
        $this->forge->addForeignKey('id_anuncio', 'tb_anuncio', 'id');
        $this->forge->addPrimaryKey('id', TRUE);
        $this->forge->createTable('tb_avaliacao', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tb_avaliacao', TRUE);
    }
}
