<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'dashboard.index',
            'display_name'  => 'Dashboard',
            'description'   => 'Tela Inicial do Sistema'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.index',
            'display_name'  => 'Sistema',
            'description'   => 'Tela Inicial do módulo Sistema'
        ]);

        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.perfis.index',
            'display_name'  => 'Perfis',
            'description'   => 'Gerenciamento de Perfis'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.perfis.create',
            'display_name'  => 'Cadastrar Perfil',
            'description'   => 'Exibir formulário de cadastro de Perfil'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.perfis.store',
            'display_name'  => 'Cadastrar Perfil',
            'description'   => 'Realizar cadastro de Perfil'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.perfis.show',
            'display_name'  => 'Visualizar Perfil',
            'description'   => 'Visualizar Perfil'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.perfis.edit',
            'display_name'  => 'Editar Perfil',
            'description'   => 'Exibir formulário de edição de Perfil'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.perfis.update',
            'display_name'  => 'Editar Perfil',
            'description'   => 'Realizar edição de Perfil'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.perfis.delete',
            'display_name'  => 'Apagar Perfil',
            'description'   => 'Apagar Perfil'
        ]);

        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.permissoes.index',
            'display_name'  => 'Permissões',
            'description'   => 'Gerenciamento de Permissões'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.permissoes.create',
            'display_name'  => 'Cadastrar Permissão',
            'description'   => 'Exibir formulário de cadastro de Permissão'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.permissoes.store',
            'display_name'  => 'Cadastrar Permissão',
            'description'   => 'Realizar cadastro de Permissão'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.permissoes.show',
            'display_name'  => 'Visualizar Permissão',
            'description'   => 'Visualizar Permissão'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.permissoes.edit',
            'display_name'  => 'Editar Permissão',
            'description'   => 'Exibir formulário de edição de Permissão'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.permissoes.update',
            'display_name'  => 'Editar Permissão',
            'description'   => 'Realizar edição de Permissão'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.permissoes.delete',
            'display_name'  => 'Apagar Permissão',
            'description'   => 'Apagar Permissão'
        ]);

        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.usuarios.index',
            'display_name'  => 'Usuários',
            'description'   => 'Gerenciamento de Usuários'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.usuarios.create',
            'display_name'  => 'Cadastrar Usuário',
            'description'   => 'Exibir formulário de cadastro de Usuário'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.usuarios.store',
            'display_name'  => 'Cadastrar Usuário',
            'description'   => 'Realizar cadastro de Usuário'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.usuarios.show',
            'display_name'  => 'Visualizar Usuário',
            'description'   => 'Visualizar Usuário'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.usuarios.edit',
            'display_name'  => 'Editar Usuário',
            'description'   => 'Exibir formulário de edição de Usuário'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.usuarios.update',
            'display_name'  => 'Editar Usuário',
            'description'   => 'Realizar edição de Usuário'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.usuarios.delete',
            'display_name'  => 'Apagar Usuário',
            'description'   => 'Apagar Usuário'
        ]);

        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.modulos.index',
            'display_name'  => 'Módulos',
            'description'   => 'Gerenciamento de Módulos'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.modulos.create',
            'display_name'  => 'Cadastrar Módulo',
            'description'   => 'Exibir formulário de cadastro de Módulo'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.modulos.store',
            'display_name'  => 'Cadastrar Módulo',
            'description'   => 'Realizar cadastro de Módulo'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.modulos.show',
            'display_name'  => 'Visualizar Módulo',
            'description'   => 'Visualizar Módulo'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.modulos.edit',
            'display_name'  => 'Editar Módulo',
            'description'   => 'Exibir formulário de edição de Módulo'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.modulos.update',
            'display_name'  => 'Editar Módulo',
            'description'   => 'Realizar edição de Módulo'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.modulos.delete',
            'display_name'  => 'Apagar Módulo',
            'description'   => 'Apagar Módulo'
        ]);

        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.submodulos.index',
            'display_name'  => 'Sub Módulos',
            'description'   => 'Gerenciamento de Sub Módulos'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.submodulos.create',
            'display_name'  => 'Cadastrar Sub Módulo',
            'description'   => 'Exibir formulário de cadastro de Sub Módulo'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.submodulos.store',
            'display_name'  => 'Cadastrar Sub Módulo',
            'description'   => 'Realizar cadastro de Sub Módulo'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.submodulos.show',
            'display_name'  => 'Visualizar Sub Módulo',
            'description'   => 'Visualizar Sub Módulo'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.submodulos.edit',
            'display_name'  => 'Editar Sub Módulo',
            'description'   => 'Exibir formulário de edição de Sub Módulo'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.submodulos.update',
            'display_name'  => 'Editar Sub Módulo',
            'description'   => 'Realizar edição de Sub Módulo'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.submodulos.delete',
            'display_name'  => 'Apagar Sub Módulo',
            'description'   => 'Apagar Sub Módulo'
        ]);

        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.acoes.index',
            'display_name'  => 'Ações',
            'description'   => 'Gerenciamento de Ações'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.acoes.create',
            'display_name'  => 'Cadastrar Ação',
            'description'   => 'Exibir formulário de cadastro de Ação'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.acoes.store',
            'display_name'  => 'Cadastrar Ação',
            'description'   => 'Realizar cadastro de Ação'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.acoes.show',
            'display_name'  => 'Visualizar Ação',
            'description'   => 'Visualizar Ação'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.acoes.edit',
            'display_name'  => 'Editar Ação',
            'description'   => 'Exibir formulário de edição de Ação'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.acoes.update',
            'display_name'  => 'Editar Ação',
            'description'   => 'Realizar edição de Ação'
        ]);
        DB::table('permissions')->insert([
            'id'            => Uuid::generate()->string,
            'name'          => 'sistema.acoes.delete',
            'display_name'  => 'Apagar Ação',
            'description'   => 'Apagar Ação'
        ]);
    }
}
