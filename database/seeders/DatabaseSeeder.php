<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //acesso
        DB::table('acesso')->insert([
            'descricao' => 'TI',
        ]);
        DB::table('acesso')->insert([  
            'descricao' => 'Analista',
        ]);
        DB::table('acesso')->insert([  
            'descricao' => 'Solicitante',
        ]);
        DB::table('acesso')->insert([  
            'descricao' => 'INATIVO',
        ]);

        //etapas
        DB::table('etapas')->insert([
            'descricao' => 'Em Andamento',
        ]);
        DB::table('etapas')->insert([
            'descricao' => 'Em Analise',
        ]);
        DB::table('etapas')->insert([
            'descricao' => 'Concluida',
        ]);
        DB::table('etapas')->insert([
            'descricao' => 'Reprovada',
        ]);
        DB::table('etapas')->insert([
            'descricao' => 'Finalizada',
        ]);

        //user adm
        DB::table('users')->insert([
            'usuario' => 'adm',
            'nome' => 'Vinicius Beltran',
            'email' => 'adm@adm.com',
            'id_acesso' => 1,
            'senha' => Hash::make('adm'),
            'data_criacao' => now(),
        ]);
        DB::table('users')->insert([
            'usuario' => 'teste',
            'nome' => 'Paulo Plinio',
            'email' => 'teste@teste.com',
            'id_acesso' => 3,
            'senha' => Hash::make('teste'),
            'data_criacao' => now(),
        ]);
    }
}
