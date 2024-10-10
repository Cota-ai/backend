<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class MoedaTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('moeda');

        $table->addColumn('id_uuid', 'uuid', ['null' => false,]);
        $table->addIndex('id_uuid', ['unique' => true]);

        $table->addColumn('nome', 'string', ['null' => false,]);
        $table->addIndex('nome', ['unique' => true]);

        $table->addColumn('descricao', 'string', ['null' => true]);

        $table->addColumn('ativo', 'boolean', ['null' => false, 'default' => true]);

        $table->addColumn('foi_deletado', 'boolean', ['null' => false, 'default' => false]);

        $table->addColumn('data_cadastro', 'timestamp', [
            'null' => false,
            'default' => 'now()',
        ]);

        $table->addColumn('data_atualizacao', 'timestamp', ['null' => false]);

        $table->save();
    }
}
