<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsuarioPrivilegio extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' =>[
                'type' =>'INT',
                'auto_increment' =>true
            ],
            'id_usuario' =>[
                'type' =>'INT'
            ],
            'id_privilegio' =>[
                'type' =>'INT'
            ]
            ]);
        $this->forge->addForeignKey('id_usuario', 'tb_usuario', 'id');
        $this->forge->addForeignKey('id_privilegio', 'tb_privilegio', 'id');
        $this->forge->addPrimaryKey('id', TRUE);
        $this->forge->createTable('usuario_privilegio', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('usuario_privilegio', TRUE);
    }
}
