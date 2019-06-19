<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;

class ModulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modulos')->insert([
            'id' => Uuid::generate()->string,
            'nome' => 'Dashboard',
            'icone' => 'trending-up',
            'tema' => 'indigo',
            'cor' => 'indigo',
            'prefixo' => 'dashboard'
        ]);

        $sistema = Uuid::generate()->string;
        DB::table('modulos')->insert([
            'id' => $sistema,
            'nome' => 'Sistema',
            'icone' => 'settings-square',
            'tema' => 'blue',
            'cor' => 'blue',
            'prefixo' => 'sistema'
        ]);
        
        $acessos = Uuid::generate()->string;
        DB::table('sub_modulos')->insert([
            'id' => $acessos,
            'modulo_id' => $sistema,
            'nome' => 'Acessos',
            'icone' => 'account',
            'rota' => null
        ]);
        
        $menus = Uuid::generate()->string;
        DB::table('sub_modulos')->insert([
            'id' => $menus,
            'modulo_id' => $sistema,
            'nome' => 'Menus',
            'icone' => 'view-list',
            'rota' => null
        ]);
            
        DB::table('acoes')->insert([
            'id' => Uuid::generate()->string,
            'sub_modulo_id' => $menus,
            'nome' => 'Ações',
            'rota' => 'sistema.acoes.index',
            'icone' => 'badge-check'
        ]);
        DB::table('acoes')->insert([
            'id' => Uuid::generate()->string,
            'sub_modulo_id' => $menus,
            'nome' => 'Módulos',
            'rota' => 'sistema.modulos.index',
            'icone' => 'collection-item'
        ]);
        DB::table('acoes')->insert([
            'id' => Uuid::generate()->string,
            'sub_modulo_id' => $menus,
            'nome' => 'Sub Módulos',
            'rota' => 'sistema.submodulos.index',
            'icone' => 'puzzle-piece'
        ]);

        DB::table('acoes')->insert([
            'id' => Uuid::generate()->string,
            'sub_modulo_id' => $acessos,
            'nome' => 'Usuários',
            'rota' => 'sistema.usuarios.index',
            'icone' => 'accounts'
        ]);
        DB::table('acoes')->insert([
            'id' => Uuid::generate()->string,
            'sub_modulo_id' => $acessos,
            'nome' => 'Perfis',
            'rota' => 'sistema.perfis.index',
            'icone' => 'account-box'
        ]);
        DB::table('acoes')->insert([
            'id' => Uuid::generate()->string,
            'sub_modulo_id' => $acessos,
            'nome' => 'Permissões',
            'rota' => 'sistema.permissoes.index',
            'icone' => 'check-all'
        ]);
    }
}
