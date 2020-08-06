<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $this->createPermissions();
        $this->createRolesAndAssignPermissions();

    }

    protected function createPermissions() {
        // Note: findOrCreate is preferred over just create as it is idempotent
        // and therefore allows seeding the database again using the same seeder
        // if additional permissions are required.

        // Footer links
        Permission::findOrCreate('create footer links');
        Permission::findOrCreate('edit footer links');
        Permission::findOrCreate('delete footer links');
        Permission::findOrCreate('view disabled footer links');

        // Carousel
        Permission::findOrCreate('create carousel slides');
        Permission::findOrCreate('edit carousel slides');
        Permission::findOrCreate('delete carousel slides');

        // Pages
        Permission::findOrCreate('view pages');
        Permission::findOrCreate('edit pages');

        // Sponsors
        Permission::findOrCreate('create sponsors');
        Permission::findOrCreate('edit sponsors');
        Permission::findOrCreate('delete sponsors');
        Permission::findOrCreate('view disabled sponsors');

        // Cars
        Permission::findOrCreate('create cars');
        Permission::findOrCreate('edit cars');
        Permission::findOrCreate('delete cars');

        // Competitions
        Permission::findOrCreate('create competitions');
        Permission::findOrCreate('edit competitions');
        Permission::findOrCreate('delete competitions');

        // Training
        Permission::findOrCreate('create training sessions');
        Permission::findOrCreate('view training sessions');
        Permission::findOrCreate('edit training sessions');
        Permission::findOrCreate('delete training sessions');

        // Press
        Permission::findOrCreate('create news refrences');
        Permission::findOrCreate('edit news refrences');
        Permission::findOrCreate('view disabled news refrences');
        Permission::findOrCreate('delete news refrences');

        // Pictures
        Permission::findOrCreate('create pictures');
        Permission::findOrCreate('edit pictures');
        Permission::findOrCreate('view disabled pictures');
        Permission::findOrCreate('delete pictures');

        // Media manager
        Permission::findOrCreate('create files');
        Permission::findOrCreate('rename files');
        Permission::findOrCreate('move files');
        Permission::findOrCreate('view files');
        Permission::findOrCreate('delete files');

        // Avatars
        Permission::findOrCreate('edit avatars');
        Permission::findOrCreate('delete avatars');

        // Roles
        Permission::findOrCreate('view roles');
        Permission::findOrCreate('alter roles');

        // Profiles
        Permission::findOrCreate('view all profiles');
        Permission::findOrCreate('edit all profiles');
        Permission::findOrCreate('delete users');
    }

    protected function createRolesAndAssignPermissions() {
        Role::findOrCreate('member')->givePermissionTo([
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

        Role::findOrCreate('alumni')->givePermissionTo([
            'view disabled footer links',
            'view disabled sponsors',
            'view training sessions',
            'view disabled news refrences',
            'view disabled pictures',
            'view files'
        ]);

        Role::findOrCreate('moderator')->givePermissionTo([
                'create footer links',
                'edit footer links',
                'delete footer links',
                'view disabled footer links',
                'create carousel slides',
                'edit carousel slides',
                'delete carousel slides',
                'create sponsors',
                'edit sponsors',
                'delete sponsors',
                'view disabled sponsors',
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
                'edit avatars',
                'delete avatars',
                'view roles'
        ]);

        Role::findOrCreate('website-admin')->givePermissionTo(Permission::all());
    }
}
