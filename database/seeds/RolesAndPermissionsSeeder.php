<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $this->createPermissions();
        $this->createRolesAndAssignPermissions();

    }

    protected function createPermissions() {
        // Note: findOrCreate is preferred over just create as it is idempotent
        // and therefore allows seeding the database again using the same seeder
        // if additional permissions are required.

        // Footer links
        Permission::findOrCreate(['name' => 'create footer links']);
        Permission::findOrCreate(['name' => 'edit footer links']);
        Permission::findOrCreate(['name' => 'delete footer links']);
        Permission::findOrCreate(['name' => 'view disabled footer links']);

        // Carousel
        Permission::findOrCreate(['name' => 'create carousel slides']);
        Permission::findOrCreate(['name' => 'edit carousel slides']);
        Permission::findOrCreate(['name' => 'delete carousel slides']);

        // About page
        Permission::findOrCreate(['name' => 'edit about page']);

        // Home page - welcome
        Permission::findOrCreate(['name' => 'edit home page']);

        // Recruitment page
        Permission::findOrCreate(['name' => 'edit recruitment page']);

        // Sponsors
        Permission::findOrCreate(['name' => 'create sponsors']);
        Permission::findOrCreate(['name' => 'edit sponsors']);
        Permission::findOrCreate(['name' => 'delete sponsors']);
        Permission::findOrCreate(['name' => 'view disabled sponsors']);

        // Sponsor page
        Permission::findOrCreate(['name' => 'edit sponsor page']);

        // Contact page
        Permission::findOrCreate(['name' => 'edit contact page']);

        // Cars
        Permission::findOrCreate(['name' => 'create cars']);
        Permission::findOrCreate(['name' => 'edit cars']);
        Permission::findOrCreate(['name' => 'delete cars']);

        // Competitions
        Permission::findOrCreate(['name' => 'create competitions']);
        Permission::findOrCreate(['name' => 'edit competitions']);
        Permission::findOrCreate(['name' => 'delete competitions']);

        // Training
        Permission::findOrCreate(['name' => 'create training sessions']);
        Permission::findOrCreate(['name' => 'view training sessions']);
        Permission::findOrCreate(['name' => 'edit training sessions']);
        Permission::findOrCreate(['name' => 'delete training sessions']);

        // Press
        Permission::findOrCreate(['name' => 'create news refrences']);
        Permission::findOrCreate(['name' => 'edit news refrences']);
        Permission::findOrCreate(['name' => 'view disabled news refrences']);
        Permission::findOrCreate(['name' => 'delete news refrences']);

        // Pictures
        Permission::findOrCreate(['name' => 'create pictures']);
        Permission::findOrCreate(['name' => 'edit pictures']);
        Permission::findOrCreate(['name' => 'view disabled pictures']);
        Permission::findOrCreate(['name' => 'delete pictures']);

        // Media manager
        Permission::findOrCreate(['name' => 'create files']);
        Permission::findOrCreate(['name' => 'rename files']);
        Permission::findOrCreate(['name' => 'move files']);
        Permission::findOrCreate(['name' => 'view files']);
        Permission::findOrCreate(['name' => 'delete files']);

        // Avatars
        Permission::findOrCreate(['name' => 'create avatars']);
        Permission::findOrCreate(['name' => 'edit avatars']);
        Permission::findOrCreate(['name' => 'delete avatars']);

        // Roles
        Permission::findOrCreate(['name' => 'grant role']);
        Permission::findOrCreate(['name' => 'revoke role']);
    }

    protected function createRolesAndAssignPermissions() {
        $role = Role::findOrCreate(['name' => 'member'])->givePermissionTo([
            'view disabled footer links',
            'view disabled sponsors',
            'create training sessions',
            'view training sessions',
            'edit training sessions',
            'delete training sessions',
            'view disabled news refrences',
            'view disabled pictures',
            'view files'
        ]);

        $role = Role::findOrCreate(['name' => 'alumni'])->givePermissionTo([
            'view disabled footer links',
            'view disabled sponsors',
            'view training sessions',
            'view disabled news refrences',
            'view disabled pictures',
            'view files'
        ]);

        // or may be done by chaining
        $role = Role::findOrCreate(['name' => 'moderator'])->givePermissionTo([
                'create footer links',
                'edit footer links',
                'delete footer links',
                'view disabled footer links',
                'create carousel slides',
                'edit carousel slides',
                'delete carousel slides',
                'edit about page',
                'edit home page',
                'edit recruitment page',
                'create sponsors',
                'edit sponsors',
                'delete sponsors',
                'view disabled sponsors',
                'edit sponsor page',
                'edit contact page',
                'create cars',
                'edit cars',
                'delete cars',
                'create competitions',
                'edit competitions',
                'delete competitions',
                'create training sessions',
                'view training sessions',
                'edit training sessions',
                'delete training sessions',
                'create news refrences',
                'edit news refrences',
                'view disabled news refrences',
                'delete news refrences',
                'create pictures',
                'edit pictures',
                'view disabled pictures',
                'delete pictures',
                'create files',
                'rename files',
                'move files',
                'view files',
                'delete files',
                'create avatars',
                'edit avatars',
                'delete avatars'
        ]);

        $role = Role::findOrCreate(['name' => 'wesbite-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
