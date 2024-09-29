<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class MoedaTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('moeda');
        $table->addColumn('id_uuid', 'uuid', ['null' => false,]);
        $table->addIndex('id_uuid', ['unique' => true]);
        $table->addColumn('nome', 'string', ['null' => false,]);
        $table->addIndex('nome', ['unique' => true]);
        $table->addColumn('descricao', 'string', ['null' => true]);
        $table->addColumn('ativo', 'boolean', ['null' => false, 'default' => true]);
        $table->addColumn('data_cadastro', 'timestamp', [
            'null' => false,
            'default' => 'now()',
        ]);
        $table->save();
    }
}
