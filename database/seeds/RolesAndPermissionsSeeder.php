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
        Permission::findOrCreate('view footer links');
        Permission::findOrCreate('create footer links');
        Permission::findOrCreate('edit footer links');
        Permission::findOrCreate('delete footer links');
        Permission::findOrCreate('view disabled footer links');

        // Carousel
        Permission::findOrCreate('view carousel slides');
        Permission::findOrCreate('create carousel slides');
        Permission::findOrCreate('edit carousel slides');
        Permission::findOrCreate('delete carousel slides');

        // Deparments
        Permission::findOrCreate('view departments');
        Permission::findOrCreate('create departments');
        Permission::findOrCreate('edit departments');
        Permission::findOrCreate('delete departments');
        Permission::findOrCreate('assign departments');

        // Pages
        Permission::findOrCreate('view pages');
        Permission::findOrCreate('edit pages');

        // Sponsors
        Permission::findOrCreate('view sponsors');
        Permission::findOrCreate('create sponsors');
        Permission::findOrCreate('edit sponsors');
        Permission::findOrCreate('delete sponsors');
        Permission::findOrCreate('view disabled sponsors');

        // Cars
        Permission::findOrCreate('view cars');
        Permission::findOrCreate('create cars');
        Permission::findOrCreate('edit cars');
        Permission::findOrCreate('delete cars');

        // Competitions
        Permission::findOrCreate('view competitions');
        Permission::findOrCreate('create competitions');
        Permission::findOrCreate('edit competitions');
        Permission::findOrCreate('delete competitions');

        // Training
        Permission::findOrCreate('create training sessions');
        Permission::findOrCreate('view training sessions');
        Permission::findOrCreate('edit training sessions');
        Permission::findOrCreate('delete training sessions');

        // Press
        Permission::findOrCreate('view press posts');
        Permission::findOrCreate('create press posts');
        Permission::findOrCreate('edit press posts');
        Permission::findOrCreate('delete press posts');
        Permission::findOrCreate('view disabled press posts');

        // Pictures
        Permission::findOrCreate('view pictures');
        Permission::findOrCreate('create pictures');
        Permission::findOrCreate('edit pictures');
        Permission::findOrCreate('delete pictures');
        Permission::findOrCreate('view disabled pictures');

        // Media manager
        Permission::findOrCreate('create files');
        Permission::findOrCreate('rename files');
        Permission::findOrCreate('move files');
        Permission::findOrCreate('view files');
        Permission::findOrCreate('delete files');

        // Avatars
        Permission::findOrCreate('view avatars');
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
            'view disabled press posts',
            'view disabled pictures',
            'view files',
            'view footer links',
            'view sponsors',
            'view press posts',
            'view pictures',
            'view carousel slides',
            'view cars',
            'view competitions',
            'view avatars',
            'view departments'
        ]);

        Role::findOrCreate('alumni')->givePermissionTo([
            'view disabled footer links',
            'view disabled sponsors',
            'view training sessions',
            'view disabled press posts',
            'view disabled pictures',
            'view files',
            'view footer links',
            'view sponsors',
            'view press posts',
            'view pictures',
            'view carousel slides',
            'view cars',
            'view competitions',
            'view avatars',
            'view departments'
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
            'create press posts',
            'edit press posts',
            'view disabled press posts',
            'delete press posts',
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
            'view roles',
            'view footer links',
            'view sponsors',
            'view press posts',
            'view pictures',
            'view carousel slides',
            'view cars',
            'view competitions',
            'view avatars',
            'view departments',
            'create departments',
            'edit departments',
            'delete departments',
            'assign departments',
        ]);

        Role::findOrCreate('website-admin')->givePermissionTo(Permission::all());
    }
}
