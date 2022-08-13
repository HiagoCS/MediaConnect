<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbPrivilegio extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' =>[
                'type' =>'INT',
                'auto_increment' =>true
            ],
            'nome' =>[
                'type' =>'VARCHAR',
                'constraint' => 199
            ],
            'descricao' =>[
                'type' =>'LONGTEXT'
            ],
            'senha' =>[
                'type' =>'VARCHAR',
                'constraint' => 199,
                'null' => TRUE
            ]
            ]);
        $this->forge->addPrimaryKey('id', TRUE);
        $this->forge->createTable('tb_privilegio', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tb_privilegio', TRUE);
    }
}
