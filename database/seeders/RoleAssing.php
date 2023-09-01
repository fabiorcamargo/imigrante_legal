<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAssing extends Seeder
{
    public function run()
    {
        // Encontre o usuário para o qual deseja atribuir permissões
        $user = User::where('id', '1')->first();

        // Crie as permissões
        $permissions = [
            'admin',
            // adicione outras permissões aqui
        ];

        foreach ($permissions as $permissionName) {
            $permission = Permission::firstOrCreate(['name' => $permissionName]);
            $user->givePermissionTo($permission);
        }
    }
}
