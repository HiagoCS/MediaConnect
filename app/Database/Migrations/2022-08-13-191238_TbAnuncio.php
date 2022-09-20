<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbAnuncio extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' =>[
                'type' =>'INT',
                'auto_increment' =>true
            ],
            'id_vendedor' =>[
                'type' =>'INT'
            ],
            'id_profissao' =>[
                'type' =>'INT'
            ],
            'nome' =>[
                'type' =>'VARCHAR',
                'constraint' => 199
            ],
            'valor' =>[
                'type' =>'FLOAT'
            ],
            'qt_vendas' =>[
                'type' =>'INT'
            ],
            'md_avaliacao' =>[
                'type' =>'INT',
                'constraint' => 10
            ],
            'descricao' =>[
                'type' => 'LONGTEXT'
            ]
        ]);
        $this->forge->addForeignKey('id_vendedor', 'tb_usuario', 'id');
        $this->forge->addForeignKey('id_profissao', 'tb_profissao', 'id');
        $this->forge->addPrimaryKey('id', TRUE);
        $this->forge->createTable('tb_anuncio', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tb_anuncio', TRUE);
    }
}
