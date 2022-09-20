<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbProfissao extends Migration
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
            'comissao' =>[
                'type' =>'FLOAT',
                'constraint' => 1
            ],
            'descricao' =>[
                'type' =>'LONGTEXT'
            ]
            ]);
        $this->forge->addPrimaryKey('id', TRUE);
        $this->forge->createTable('tb_profissao', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tb_profissao', TRUE);
    }
}
