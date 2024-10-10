<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AlertaMoedaTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('alerta_moeda');
        $table->addColumn('id_uuid', 'uuid', ['null' => false,]);
        $table->addIndex('id_uuid');

        $table->addColumn('id_moeda', 'uuid', ['null' => false]);
        $table->addForeignKey('id_uuid', 'moeda', 'id_uuid', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION']);

        $table->addColumn('valor', 'float', ['null' => false]);

        $table->addColumn('usuario', 'string', ['null' => false]);

        $table->addColumn('foi_deletado', 'boolean', ['null' => false, 'default' => false]);

        $table->addColumn('data_cadastro', 'timestamp', [
            'null' => false,
            'default' => 'now()',
        ]);

        $table->addColumn('data_atualizacao', 'timestamp', ['null' => false]);

        $table->addColumn('data_termino_alerta', 'date', ['null' => false]);

        $table->save();
    }
}
