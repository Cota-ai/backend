<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AlertaMoedaTable extends AbstractMigration
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
        $table = $this->table('alerta_moeda');
        $table->addColumn('id_uuid', 'uuid', ['null' => false,]);
        $table->addIndex('id_uuid');
        $table->addColumn('id_moeda', 'uuid', ['null' => false]);
        $table->addForeignKey('id_uuid', 'moeda', 'id_uuid', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION']);

        $table->save();
    }
}
