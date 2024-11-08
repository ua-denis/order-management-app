<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->defineRolesAndPermissions();
    }

    private function defineRolesAndPermissions(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $tenantRole = Role::firstOrCreate(['name' => 'tenant']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        Permission::firstOrCreate(['name' => 'manage orders']);
        Permission::firstOrCreate(['name' => 'view orders']);

        $adminRole->givePermissionTo(['manage orders', 'view orders']);
        $tenantRole->givePermissionTo(['view orders']);
    }
}
