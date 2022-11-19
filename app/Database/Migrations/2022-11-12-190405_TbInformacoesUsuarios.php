<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbInformacoesUsuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_usuario' =>[
                'type' =>'INT'
            ],
            'foto_perfil' =>[
                'type' =>'VARCHAR',
                'constraint' => 200
            ],
            'descricao' =>[
                'type' =>'TEXT'
            ],
            'foto_trabalho1' =>[
                'type' =>'VARCHAR',
                'constraint' => 200
            ],
            'foto_trabalho2' =>[
                'type' =>'VARCHAR',
                'constraint' => 200
            ],
            'foto_trabalho3' =>[
                'type' =>'VARCHAR',
                'constraint' => 200
            ],
            'portifolio' =>[
                'type' =>'VARCHAR',
                'constraint' => 50
            ],
            'linkedn' =>[
                'type' =>'VARCHAR',
                'constraint' => 50
            ],
            'instagram' =>[
                'type' =>'VARCHAR',
                'constraint' => 50
            ],

            ]);
            $this->forge->addForeignKey('id_usuario', 'tb_usuario', 'id');
            $this->forge->addPrimaryKey('id_usuario', TRUE);
            $this->forge->createTable('tb_informacoes', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tb_informacoes', TRUE);
    }
}
