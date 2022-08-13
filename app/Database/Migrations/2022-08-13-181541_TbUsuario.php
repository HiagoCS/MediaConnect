<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbUsuario extends Migration
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
            'email' =>[
                'type' =>'TEXT'
            ],
            'senha' =>[
                'type' =>'VARCHAR',
                'constraint' => 199
            ],
            'cpf' =>[
                'type' =>'VARCHAR',
                'constraint' => 15
            ],
            'telefone' =>[
                'type' =>'VARCHAR',
                'constraint' => 20
            ],
            'cep' =>[
                'type' =>'VARCHAR',
                'constraint' => 10
            ],
            'status' =>[
                'type' =>'VARCHAR',
                'constraint' => 199
            ]

            ]);
            $this->forge->addPrimaryKey('id', TRUE);
            $this->forge->createTable('tb_usuario', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tbUsuario', TRUE);
    }
}
