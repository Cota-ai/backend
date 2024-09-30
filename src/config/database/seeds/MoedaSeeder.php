<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Ramsey\Uuid\Uuid;

class MoedaSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $dataAtual = new DateTime();
        $data = [
            [
                'id_uuid' => Uuid::uuid7()->toString(),
                'nome' => 'real',
                'descricao' => 'Moeda brasileira',
                'ativo' => true,
                'data_cadastro' => $dataAtual->format('Y-m-d H:i:s'),
            ],
            [
                'id_uuid' => Uuid::uuid7()->toString(),
                'nome' => 'dolar americano',
                'descricao' => 'Moeda americana',
                'ativo' => true,
                'data_cadastro' => $dataAtual->format('Y-m-d H:i:s'),
            ],
            [
                'id_uuid' => Uuid::uuid7()->toString(),
                'nome' => 'euro',
                'descricao' => 'Moeda europeia',
                'ativo' => true,
                'data_cadastro' => $dataAtual->format('Y-m-d H:i:s'),
            ],
        ];

        $moeda = $this->table('moeda');
        $moeda->insert($data);
        $moeda->save();
    }
}
